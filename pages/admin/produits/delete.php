<?php
$produitTable = App::getInstance()->getTable('Produit');
if(!empty($_POST)){
    $result = $produitTable->delete($_POST['id']);
    header('Location: admin.php');
}
?>