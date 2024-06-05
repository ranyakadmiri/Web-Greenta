<?php

require_once 'C:\xampp\htdocs\integrationf/config.php';

class Cart
{
    protected $cart_contents = array();


    public function __construct()
    {
        // get the shopping cart array from the session
        $this->cart_contents = !empty($_SESSION['cart_contents']) ? $_SESSION['cart_contents'] : NULL;
        if ($this->cart_contents === NULL) {
            // set some base values
            $this->cart_contents = array('cart_total' => 0, 'total_items' => 0,);
        }
    }

    /**
     * Cart Contents: Returns the entire cart array
     * @param    bool
     * @return    array
     */
    public function contents()
    {
        // rearrange the newest first
        $cart = array_reverse($this->cart_contents);

        // remove these so they don't create a problem when showing the cart table
        unset($cart['total_items']);
        unset($cart['cart_total']);

        return $cart;
    }

    /**
     * Get cart item: Returns a specific cart item details
     * @param    string    $row_id
     * @return    array
     */
    public function get_item($row_id)
    {
        return (in_array($row_id, array('total_items', 'cart_total'), TRUE) or !isset($this->cart_contents[$row_id]))
            ? FALSE
            : $this->cart_contents[$row_id];
    }

    /**
     * Total Items: Returns the total item count
     * @return    int
     */
    public function total_items()
    {
        return $this->cart_contents['total_items'];
    }

    /**
     * Cart Total: Returns the total price
     * @return    int
     */
    public function total()
    {
        return $this->cart_contents['cart_total'];
    }

    /**
     * Insert items into the cart and save it to the session
     * @param    array
     * @return    bool
     */
    public function insert($item = array())
    {
        if (!is_array($item) or count($item) === 0) {

            return FALSE;
        } else {
            if (!isset($item['idpr'], $item['nomp'], $item['prix'], $item['img'], $item['quantite'])) {

                return FALSE;
            } else {
                /*
                 * Insert Item
                 */
                // prep the quantity
                $item['quantite'] = (float) $item['quantite'];
                if ($item['quantite'] == 0) {
                    return FALSE;
                }
                // prep the price
                $item['prix'] = (float) $item['prix'];
                // create a unique identifier for the item being inserted into the cart
                $rowid = $item['idpr'];
                // get quantity if it's already there and add it on
                $old_quantite = isset($this->cart_contents[$rowid]['quantite']) ? (int) $this->cart_contents[$rowid]['quantite'] : 0;
                // re-create the entry with unique identifier and updated quantity
                $item['rowid'] = $rowid;
                $item['quantite'] += $old_quantite;
                $this->cart_contents[$rowid] = $item;

                // save Cart Item

                if ($this->save_cart()) {
                    return isset($rowid) ? $rowid : TRUE;
                } else {
                    return FALSE;
                }
            }
        }
    }

    /**
     * Update the cart
     * @param    array
     * @return    bool
     */
    public function update($item = array())
    {
        if (!is_array($item) or count($item) === 0) {
            return FALSE;
        } else {
            if (!isset($item['rowid'], $this->cart_contents[$item['rowid']])) {
                return FALSE;
            } else {
                // prep the quantity
                if (isset($item['quantite'])) {
                    $item['quantite'] = (float) $item['quantite'];
                    // remove the item from the cart, if quantity is zero
                    if ($item['quantite'] == 0) {
                        unset($this->cart_contents[$item['rowid']]);
                        return TRUE;
                    }
                }

                // find updatable keys

                // prep the price
                if (isset($item['prix'])) {
                    $item['prix'] = (float) $item['prix'];
                }
                // product id & name shouldn't be changed

                // save cart data
                $this->save_cart();
                return TRUE;
            }
        }
    }

    /**
     * Save the cart array to the session
     * @return    bool
     */
    protected function save_cart()
    {
        $this->cart_contents['total_items'] = $this->cart_contents['cart_total'] = 0;
        foreach ($this->cart_contents as $key => $val) {
            // make sure the array contains the proper indexes
            if (!is_array($val) or !isset($val['prix'], $val['quantite'])) {
                continue;
            }

            $this->cart_contents['cart_total'] += ($val['prix'] * $val['quantite']);
            $this->cart_contents['total_items'] += $val['quantite'];
            $this->cart_contents[$key]['subtotal'] = ($this->cart_contents[$key]['prix'] * $this->cart_contents[$key]['quantite']);
            $this->cart_contents[$key]['totalafterdisc'] = ($this->cart_contents[$key]['prix'] * $this->cart_contents[$key]['quantite']);
        }

        // if cart empty, delete it from the session
        if (count($this->cart_contents) <= 2) {
            unset($_SESSION['cart_contents']);
            return FALSE;
        } else {
            $_SESSION['cart_contents'] = $this->cart_contents;
            return TRUE;
        }
    }

    /**
     * Remove Item: Removes an item from the cart
     * @param    int
     * @return    bool
     */
    public function remove($row_id)
    {
        // unset & save
        unset($this->cart_contents[$row_id]);
        $this->save_cart();
        return TRUE;
    }

    /**
     * Destroy the cart: Empties the cart and destroy the session
     * @return    void
     */
    public function destroy()
    {
        $this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
        unset($_SESSION['cart_contents']);
    }
    function afficherCommande()
    {
        $sql = "SElECT * From commandes";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function confirmerCommande($id)
    {
        $date = date("Y-m-d H:i:s");
        $timestamp = strtotime($date);
        var_dump($date);
        $sql = "UPDATE commandes SET status= 2 , modified=NOW() WHERE id=$id ";
        $db = config::getConnexion();
        try {
            $result = $db->query($sql);
            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    /**
     * Apply discount coupon to the cart
     * @param string $code The discount coupon code
     * @param float $discount The discount percentage (e.g. 0.1 for 10%)
     * @return bool
     */
    public function apply_discount($code)
    {
        // Define an array of valid coupon codes and their corresponding discount percentages
        $valid_codes = array(
            'SUMMER10' => 0.1,
            'FALL15' => 0.15,
            'WINTER20' => 0.2
        );

        // Check if the provided coupon code matches any of the valid codes and apply the discount
        if (isset($valid_codes[$code])) {
            $discount = $valid_codes[$code];

            // Loop through the cart contents and apply the discount
            foreach ($this->cart_contents as $key => $item) {
                if (isset($item['prix']) && isset($item['quantite'])) {

                    $new_price = $item['prix'] * (1 - $discount);

                    $this->cart_contents[$key]['prix'] = $new_price;
                    $this->cart_contents[$key]['totalafterdisc'] = $new_price * $item['quantite'];
                }
            }

            // Recalculate the cart total and save the cart data
            $this->save_cart();
            return true;
        } else {
            return false;
        }
    }
}
