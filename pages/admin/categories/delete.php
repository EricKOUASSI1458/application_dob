<?php
$categorieTable = App::getInstance()->getTable('Categorie');
if(!empty($_POST)){
    $result = $categorieTable->delete($_POST['id']);
    header('Location: admin.php?p=categories.all');
}
?>