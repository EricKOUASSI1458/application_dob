<?php
$auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
$auth->delogged();
header('Location: index.php?p=login');
?>