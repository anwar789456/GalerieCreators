<?php
require_once(__DIR__ . '/../config.php');
class GalerieC{
    function showlink_jointure($id_gal){
        $sql = "SELECT * from links where idGalerie = :idG";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':idG', $id_gal);
            $query->execute();
            $Event = $query->fetch();
            return $Event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function last_id_inserted(){
        $req = "SELECT idGalerie FROM galeries ORDER BY idGalerie DESC LIMIT 1";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            $lastId = $list->fetch(PDO::FETCH_ASSOC);
            return $lastId['idGalerie'];
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    function list_liens(){
        $req = "SELECT * FROM links";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    public function jointure($link){
        $sql = "SELECT * FROM galeries 
        JOIN links ON galeries.idGalerie = links.idGalerie
        where links.link LIKE :link";

        $db = configurer::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindParam(':link', $link);
            $req->execute();
            $list = $req->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function rechercher($valeur){
        $sql = "SELECT * FROM galeries
        WHERE nomGalerie LIKE :valeur_one
        OR proprieteGalerie LIKE :valeur_two
        OR lieuGalerie LIKE :valeur_three";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':valeur_one', '%' . $valeur . '%');
            $query->bindValue(':valeur_two', '%' . $valeur . '%');
            $query->bindValue(':valeur_three', '%' . $valeur . '%');
            $query->execute();
            $events = $query->fetchAll();
            return $events;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function filter_nomGal_ASC(){
        $req = "SELECT * FROM galeries ORDER BY nomGalerie ASC";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    public function filter_nomGal_DESC(){
        $req = "SELECT * FROM galeries ORDER BY nomGalerie DESC";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    public function filter_proprieteGal_ASC(){
        $req = "SELECT * FROM galeries ORDER BY proprieteGalerie ASC";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    public function filter_proprieteGal_DESC(){
        $req = "SELECT * FROM galeries ORDER BY proprieteGalerie DESC";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    public function filter_lieuGal_ASC(){
        $req = "SELECT * FROM galeries ORDER BY lieuGalerie ASC";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    public function filter_lieuGal_DESC(){
        $req = "SELECT * FROM galeries ORDER BY lieuGalerie DESC";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    function list_Galerie(){
        $req = "SELECT * FROM galeries";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    function deleteGalerie($id_gal){
        $sql = "DELETE FROM galeries WHERE idGalerie = :id";
        $db = configurer::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id_gal);
        try{
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addGalerie($galerie){
        $sql = "INSERT INTO galeries
        VALUES (null, :nom_gal, :propriete_gal, :lieu_gal, :img_gal)";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_gal'  => $galerie->getNomGalerie(),
                'propriete_gal' => $galerie->GetProprieteGalerie(),
                'lieu_gal' => $galerie->get_lieuGalerie(),
                'img_gal' => $galerie->get_imgGalerie()

            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function showGalerie($id_gal){
        $sql = "SELECT * from galeries where idGalerie = :idG";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':idG', $id_gal);
            $query->execute();
            $Event = $query->fetch();
            return $Event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function updateGalerie($galerie, $id_galerie){
        try {
            $db = configurer::getConnexion();
            $query = $db->prepare(
                'UPDATE galeries SET
                    nomGalerie  =       :nom_galerie,
                    proprieteGalerie =  :propriete_galerie,
                    lieuGalerie =       :lieu_galerie,
                    imgGalerie =        :img_galerie
                WHERE idGalerie =       :id_galerie'
            );
            $query->execute([
                'id_galerie' => $id_galerie,
                'nom_galerie' => $galerie->getNomGalerie(),
                'propriete_galerie' => $galerie->GetProprieteGalerie(),
                'lieu_galerie' => $galerie->get_lieuGalerie(),
                'img_galerie' => $galerie->get_imgGalerie()
            ]);
            echo $query->rowCount() . " Galerie records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}

class linkC{
    function ajouter_lien($lien){
        $sql = "INSERT INTO links
        VALUES (null, :idGalerie, :link)";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idGalerie'  => $lien->getIdGalerie(),
                'link' => $lien->getLinkGalerie()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updatelink($id_link, $id_galerie, $new_link){
        try {
            $db = configurer::getConnexion();
            $query = $db->prepare(
                'UPDATE links SET
                    idGalerie = :id_galerie,
                    link  = :link_updated
                WHERE id_link = :id_link'
            );
    
            $query->execute([
                'id_galerie' => $id_galerie,
                'link_updated' => $new_link,
                'id_link' => $id_link,
            ]);
    
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            // Output the error message
            echo 'Error: ' . $e->getMessage();
        }
    }
    
}
?>