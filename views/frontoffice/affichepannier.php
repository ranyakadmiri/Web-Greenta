<?php
// initializ shopping cart class
// include('header.php') ;
session_start();

include '../../controller/pannierC.php';
$cart = new Cart;

?>


<link rel="stylesheet" type="text/css" media="all" href="style.css" />



<div class="container">
    <h1>Panier</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantite</th>
                <th>Total</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($cart->total_items() > 0) {
                //get cart items from session
                $cartItems = $cart->contents();

                foreach ($cartItems as $item) {
            ?>
                    <tr>
                        <td><?php echo $item["nomp"]; ?></td>
                        <td><?php echo $item["prix"] . ' DT'; ?></td>
                        <td><?php echo $item["rowid"]; ?>
                            <input type="number" class="form-control text-center" value="<?php echo $item["quantite"]; ?>">
                        </td>
                        <td><?php echo $item["subtotal"] . ' DT'; ?></td>
                        <td>
                            <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Vous etes sur ?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="5">
                        <p>Le Panier Est Vide.....</p>
                    </td>
                <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td><a href="shop.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Retour au menu</a></td>
                <td colspan="2"></td>
                <?php if ($cart->total_items() > 0) { ?>
                    <td class="text-center"><strong>Total <?php echo $cart->total() . ' DT'; ?></strong></td>
                    <td><a href="checkout.php" class="btn btn-success btn-block">Valider <i class="glyphicon glyphicon-menu-right"></i></a></td>
                <?php } ?>
            </tr>
        </tfoot>
    </table>
</div>
</div>

<!-- <?php //include('footer.php') ; 
        ?> -->