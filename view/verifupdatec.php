
<?php

include "C:/xampp/htdocs/lalou/controller/categoriep.php";
include_once 'C:/xampp/htdocs/lalou/model/categorie.php';






//if (isset($_POST['name'])  && isset($_POST['nombre']) && isset($_POST['img']) && isset($_POST['prix']))  // CAUSING ERROR
 
 
   
	$type = $_POST['type']; //
    $genre = $_POST['genre'];
	$idc=$_POST['idc'];
 



$categorie = new categorie (null,null,null);
$categoriep = new categoriep();

$categorie->settype($type);
$categorie->setgenre($genre);
var_dump(intval($idc));
$categorie->setidc(intval($idc));


  

 

//$categorie->setidc($id);
var_dump($categorie);



$categoriep->updatecategorie($categorie,intval($idc));
header('Location:afficherc.php');
?>