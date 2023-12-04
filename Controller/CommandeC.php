<?php
require_once(__DIR__ . '/../config.php');
class CommandeC{
    public function list_Commande(){
        $req = "SELECT * FROM commandes";
        $db = configurer::getConnexion();
        try{
            $commandes = $db->query($req);
            return $commandes;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    function deleteCommande($id_commande){
        $sql = "DELETE FROM commandes WHERE idCommande = :id";
        $db = configurer::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id_commande);
        try{
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addCommande($new_commande){
        $sql = "INSERT INTO commandes
        VALUES (null, :nom, :produit, :quantite, :datecommande)";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom'  => $new_commande->getNomCommande(),
                'produit' => $new_commande->get_produit(),
                'quantite'  => $new_commande->get_quantite(),
                'datecommande' => $new_commande->getDate_commande(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updateCommande($commande, $id_commande){
        try {
            $db = configurer::getConnexion();
            $query = $db->prepare(
                'UPDATE commandes SET 
                    nom_client  = :nom,
                    produitCommande = :produit,
                    quantiteCommande = :quantite,
                    dateCommande  = :date_commande,
                WHERE idCommande = :id'
            );
            $query->execute([
                'id' => $id_commande,
                'nom' => $commande->getNomCommande(),
                'produit' => $commande->get_produit(),
                'quantite' => $commande->get_quantite(),
                'date_commande' => $commande->getDate_commande(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showCommande($id_commande){
        $sql = "SELECT * from commandes where idCommande = :id";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id_commande);
            $query->execute();
            $commande = $query->fetch();
            return $commande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>