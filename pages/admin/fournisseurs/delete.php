<?php
$fournisseurTable = App::getInstance()->getTable('Fournisseur');
if(!empty($_POST)){
    $result = $fournisseurTable->delete($_POST['id']);
    header('Location: admin.php?p=fournisseurs.all');
}
?>