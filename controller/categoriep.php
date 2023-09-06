<?php
include 'C:/xampp/htdocs/lalou/config.php';

//include 'C:/xampp/htdocs/categori/controller/categoriep.php';
class categoriep { //record
    public function listecategorie (){
    $sql = "SELECT * FROM categorie";
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
    public function showDetails($idc){
    $sql = "SELECT * FROM categorie WHERE idc = ". $idc; 
    $db  = config ::getConnexion();
    try {
     $query = $db->prepare($sql);
     $query->execute();
     $categorie= $query->fetch();
     return $categorie;
    }

    catch (Exception $e){
    echo('Error:'.$e->getMessage());
    }

    }
    public function add($categorie){
  
    $sql = "INSERT INTO categorie VALUES (NULL, :genre, :type)";

    $db = config ::getConnexion(); //moujouda fel config 
    try {
       // print_r($categorie->getdate()->format('Y-m-d'));
        $query = $db->prepare($sql);
       
        $query->execute([
            'genre'=> $categorie->getgenre(),
            'type'=> $categorie->gettype(),

        ]);
    }catch(Exception $e){
        echo('hello:'.$e->getMessage());
    }
    }
    public function delete($idc) {
    $sql ="DELETE FROM categorie WHERE idc = :id";
    $db = config::getConnexion();
    var_dump($db);
    try {
        $query = $db->prepare($sql);
        $query->bindValue('id',$idc);
        $query->execute();
        return $query;
    }
        catch(Exception $e){
            echo('Error:'.$e->getMessage());
        }
    }
    function updatecategorie($categorie, $idc)
    {     $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE categorie SET 
                    genre = :genre, 
                    type = :type,  
                WHERE idc= :idc'
            );
        try {
       
            $query->execute([
                'idc' => $idc,
                'genre' => $categorie->getgenre(),
                'type' => $categorie->gettype(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function affichercategorie($id)
    {
        $sql = "SELECT * from categorie where idc = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $categorie= $query->fetch();
            return $categorie;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function cherchercategorie($searchTerm) {
        $sql = "SELECT * FROM categorie WHERE CONCAT_WS(' ',idc, genre, type) LIKE :searchTerm ;";
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
    /*public function sortcategorie (){
        $sql = "SELECT * FROM categorie ORDER BY genre ASC";
        $db  = config ::getConnexion();
        try {
         $list = $db->query($sql);
         return $list;
        }
    
        catch (Exception $e){
        echo('Error:'.$e->getMessage());
        }
        }
        public function sortcategoried ()
        {
            $sql = "SELECT * FROM categorie ORDER BY prix DESC";
            $db  = config ::getConnexion();
            try {
             $list = $db->query($sql);
             return $list;
            }
        
            catch (Exception $e){
            echo('Error:'.$e->getMessage());
            }
        }
        public function calcultype ()
        {
          $sql="SELECT COALESCE(COUNT(categorie.idc), 0) AS count
          FROM (
              SELECT 'Outdoor' AS idc
              UNION SELECT 'indoor' AS idc
              UNION SELECT 'office' AS idc
              UNION SELECT 'others' AS idc
              UNION SELECT 'potted' AS idc
          ) AS idcs
          LEFT JOIN categorie ON categorie.idc = idcs.idc
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