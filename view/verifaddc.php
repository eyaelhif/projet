
<?php

include "C:/xampp/htdocs/lalou/controller/categoriep.php";
include_once 'C:/xampp/htdocs/lalou/model/categorie.php';



//if (isset($_POST['name'])  && isset($_POST['nombre']) && isset($_POST['img']) && isset($_POST['prix']))  // CAUSING ERROR
 {

  //echo $_POST['nombre']; 
	$type = $_POST['type']; //
    $genre = $_POST['genre'];
 


  


$categorie = new categorie(null,null,null);
$categoriep = new categoriep();

$categorie->settype($type);
$categorie->setgenre($genre);

  

 

//$categorie->setidp($id);
//var_dump($categorie);

$categoriep->add($categorie);
header('Location: afficherc.php');

 }


?>