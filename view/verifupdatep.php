
<?php

include "C:/xampp/htdocs/lalou/controller/produitp.php";
include_once 'C:/xampp/htdocs/lalou/model/produit.php';
$target_dir = 'C:/xampp/htdocs/lalou/view/images/products/';
define('STORAGE_PATH','C:/xampp/htdocs/lalou/view/images/products/'); 



$target_file = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//if (isset($_POST['name'])  && isset($_POST['nombre']) && isset($_POST['img']) && isset($_POST['prix']))  // CAUSING ERROR
 {
 echo $_FILES['img']['tmp_name']; 
   
	$nom = $_POST['nom']; //
    $idc = $_POST['idc'];
	$nombre = intval($_POST['nombre']);
    
	$prix = intval($_POST['prix']);
 


  $allowTypes = array('jpg','png','jpeg','gif','pdf');


    $check = getimagesize($_FILES["img"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;

  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  move_uploaded_file($_FILES["img"]["tmp_name"],
  STORAGE_PATH . '/' . $_FILES["img"]["name"]);

    $file = $_FILES['img'];
    $file_name = $_FILES["img"]["name"] ;
    
}



$produit = new produit(null,null,null,null,null,null);
$produitp = new produitp();

$produit->setprix($prix);
$produit->setnombre($nombre);
$produit->setnom($nom); 
$produit->setidc($idc);

$produit->setimg($file_name) ;

  

 

//$produit->setidp($id);
var_dump($produit);



$produitp->updateproduit($produit,$produit->getidp());
header('Location:afficher.php');
?>