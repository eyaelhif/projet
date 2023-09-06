<?php
include 'C:/xampp/htdocs/lalou/config.php';

//include 'C:/xampp/htdocs/produit/controller/produitp.php';
class produitp { //record
    public function listepro (){
    $sql = "SELECT * FROM produit";
    $db  = config ::getConnexion();
        try {
        $list = $db->query($sql);
        //var_dump($list);
        return $list->fetchAll(PDO::FETCH_DEFAULT);
        }
         catch (Exception $e){
        echo('Error:'.$e->getMessage());
        }
    }
    public function showDetails($idp){
    $sql = "SELECT * FROM produit WHERE idp = ". $idp; 
    $db  = config ::getConnexion();
    try {
     $query = $db->prepare($sql);
     $query->execute();
     $produit= $query->fetch();
     return $produit;
    }

    catch (Exception $e){
    echo('Error:'.$e->getMessage());
    }

    }
    public function add($produit){
  
    $sql = "INSERT INTO produit VALUES (NULL, :nom, :nombre, :prix, :idc, :img)";

    $db = config ::getConnexion(); //moujouda fel config 
    try {
       // print_r($produit->getdate()->format('Y-m-d'));
        $query = $db->prepare($sql);
       
        $query->execute([
            'nom'=> $produit->getnom(),
            'nombre'=> $produit->getnombre(),
            'prix'=>$produit->getprix(),
            'idc'=>$produit->getidc(),
            'img'=>$produit->getimg(),

        ]);
    }catch(Exception $e){
        echo('hello:'.$e->getMessage());
    }
    }
    public function delete($idp) {
    $sql ="DELETE FROM produit WHERE idp = :id";
    $db = config::getConnexion();
    var_dump($db);
    try {
        $query = $db->prepare($sql);
        $query->bindValue('id',$idp);
        $query->execute();
        return $query;
    }
        catch(Exception $e){
            echo('Error:'.$e->getMessage());
        }
    }
    function updateproduit($produit, $idp)
    {     $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produit SET 
                    nom = :nom, 
                    prix = :prix,
                    nombre = :nombre,  
                    idc = :idc
                WHERE idp= :idp'
            );
        try {
       
            $query->execute([
                'idp' => $idp,
                'nom' => $produit->getnom(),
                'prix' => $produit->getprix(),
                'nombre' => $produit->getnombre(),
                'idc' => $produit->getidc(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function afficherproduit($id)
    {
        $sql = "SELECT * from produit where idp = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $produit= $query->fetch();
            return $produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function chercherproduit($searchTerm) {
        $sql = "SELECT * FROM produit WHERE CONCAT_WS(' ', idp, nom, nombre, prix, idc, img) LIKE :searchTerm ;";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':searchTerm', '%'.$searchTerm.'%', PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch(PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function sortproduit (){
        $sql = "SELECT * FROM produit ORDER BY prix ASC";
        $db  = config ::getConnexion();
        try {
         $list = $db->query($sql);
         return $list;
        }
    
        catch (Exception $e){
        echo('Error:'.$e->getMessage());
        }
        }
        public function sortproduitd ()
        {
            $sql = "SELECT * FROM produit ORDER BY prix DESC";
            $db  = config ::getConnexion();
            try {
             $list = $db->query($sql);
             return $list;
            }
        
            catch (Exception $e){
            echo('Error:'.$e->getMessage());
            }
        }
       /* public function calculnombre ()
        {
          $sql="SELECT COALESCE(COUNT(produit.idc), 0) AS count
          FROM (
              SELECT 'Outdoor' AS idc
              UNION SELECT 'indoor' AS idc
              UNION SELECT 'office' AS idc
              UNION SELECT 'others' AS idc
              UNION SELECT 'potted' AS idc
          ) AS idcs
          LEFT JOIN produit ON produit.idc = idcs.idc
          GROUP BY idcs.idc;
          ";

            $db  = config ::getConnexion();
            try {
            $list = $db->query($sql);
            return $list;
                }

            catch (Exception $e){
            echo('Error:'.$e->getMessage());
            }


        }*/
        

        

        
}
    ?>