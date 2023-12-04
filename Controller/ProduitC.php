<?php
require_once(__DIR__ . '/../config.php');
class ProduitC{
    public function list_Produit(){
        $req = "SELECT * FROM produit";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    function deleteProduit($id_produit){
        $sql = "DELETE FROM produit WHERE idProduit = :id";
        $db = configurer::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id_produit);
        try{
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addProduit($new_produit){
        $sql = "INSERT INTO produit
        VALUES (null, :nom_produit, :prix_produit, :img_produit)";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_produit'  => $new_produit->getNomProduit(),
                'prix_produit' => $new_produit->get_prix(),
                'img_produit'  => $new_produit->get_img(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function showProduit($id_produit){
        $sql = "SELECT * from produit where idProduit = :id_produit";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_produit', $id_produit);
            $query->execute();
            $Produit = $query->fetch();
            return $Produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function updateProduit($Produit, $id_produit){
        try {
            $db = configurer::getConnexion();
            $query = $db->prepare(
                'UPDATE produit SET 
                    nomProduit  = :nom_produit,
                    prixProduit = :prix_produit,
                    imgProduit  = :img_produit
                WHERE idProduit = :id_produit'
            );
            $query->execute([
                'id_produit' => $id_produit,
                'nom_produit' => $Produit->getNomProduit(),
                'prix_produit' => $Produit->get_prix(),
                'img_produit' => $Produit->get_img(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>