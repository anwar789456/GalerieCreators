<?php
require_once(__DIR__ . '/../config.php');
class EvenementC{
    function list_adresse(){
        $req = "SELECT rue FROM adresse";
        $db = configurer::getConnexion();

        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    public function list_Event_jointure($rue){
        $sql = "SELECT * FROM evenement JOIN adresse ON evenement.idEvent = adresse.idEvent where adresse.rue LIKE :rue";

        $db = configurer::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindParam(':rue', $rue);
            $req->execute();
            $list = $req->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function searchEvent($nom){
        $sql = "SELECT * FROM evenement WHERE nomEvent LIKE :nom OR lieuEvent LIKE :lieu";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':nom', '%' . $nom . '%');
            $query->bindValue(':lieu', '%' . $nom . '%');
            $query->execute();
            $events = $query->fetchAll();
            return $events;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function list_Event(){
        $req = "SELECT * FROM evenement";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    public function filterEvent_nom_a_z(){
        $req = "SELECT * FROM evenement ORDER BY nomEvent ASC";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    public function filterEvent_nom_z_a(){
        $req = "SELECT * FROM evenement ORDER BY nomEvent DESC";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    public function filterEvent_lieu_a_z(){
        $req = "SELECT * FROM evenement ORDER BY lieuEvent ASC";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    public function filterEvent_lieu_z_a(){
        $req = "SELECT * FROM evenement ORDER BY lieuEvent DESC";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    
    
    function deleteEvenement($id_event){
        $sql = "DELETE FROM evenement WHERE idEvent = :id";
        $db = configurer::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id_event);
        try{
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addEvent($new_event){
        $sql = "INSERT INTO evenement
        VALUES (null, :nom_event, :date_event, :lieu_event, :img_event)";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_event'  => $new_event->getNomEvent(),
                'date_event' => $new_event->getDate_evenement(),
                'lieu_event' => $new_event->get_lieu(),
                'img_event'  => $new_event->get_img(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updateEvenement($Event, $id_event){
        try {
            $db = configurer::getConnexion();
            $query = $db->prepare(
                'UPDATE evenement SET 
                    nomEvent  = :nom_event,
                    dateEvent = :date_event,
                    lieuEvent = :lieu_event,
                    imgEvent  = :img_event
                WHERE idEvent = :id_event'
            );
            $query->execute([
                'id_event' => $id_event,
                'nom_event' => $Event->getNomEvent(),
                'date_event' => $Event->getDate_evenement(),
                'lieu_event' => $Event->get_lieu(),
                'img_event' => $Event->get_img(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showEvent($id_event){
        $sql = "SELECT * from evenement where idEvent = :id_event";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_event', $id_event);
            $query->execute();
            $Event = $query->fetch();
            return $Event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}

class adresseC{
    function ajouter_adresse($lien){
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
    /*function showGalerie($id_gal){
        $sql = "SELECT * FROM galeries
        JOIN links ON galeries.idGalerie = links.idGalerie";
        $db = configurer::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->execute();
            $list = $req->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }*/
}
?>