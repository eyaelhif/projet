<?php
include 'C:/xampp/htdocs/lalou/controller/produitp.php';
$produit = new produitp();
$produit->delete($_GET['idp']);
header('Location:afficher.php');
?>