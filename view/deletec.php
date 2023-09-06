<?php
include 'C:/xampp/htdocs/lalou/controller/categoriep.php';
$categorie = new categoriep();
$categorie->delete($_GET['idc']);
header('Location:afficherc.php');
?>