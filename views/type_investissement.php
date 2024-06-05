<?php
include "../controller/add_agriculteur.php";

$c = new agriculteur();
$tab = $c->type_inv();

?>

<center>
    <h1>List of agriculteur</h1>
    <h2>
        <a href="type_inv.php">add_agriculteur</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Client</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Date of Birth</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $agriculteur) {
    ?>




        <tr>
            <td><?= $agriculteur['idClient']; ?></td>
            <td><?= $agriculteur['lastName']; ?></td>
            <td><?= $agriculteur['firstName']; ?></td>
            <td><?= $agriculteur['adress']; ?></td>
            <td><?= $agriculteur['dob']; ?></td>
            <td align="center">
                <form method="POST" action="update_inv.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $agriculteur['idinv']; ?> name="idinv">
                </form>
            </td>
            <td>
                <a href="delete_agriculteur.php?id=<?php echo $agriculteur['idinv']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>