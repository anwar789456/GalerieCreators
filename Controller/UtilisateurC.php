<?php
require_once(__DIR__ . '/../config.php');
class UtilisateurC{
    public function list_Utilisateur(){
        $req = "SELECT * FROM utilisateur";
        $db = configurer::getConnexion();
        try{
            $utilisateurs = $db->query($req);
            return $utilisateurs;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    function deleteUtilisateur($id_utilisateur){
        $sql = "DELETE FROM utilisateur WHERE idUtilisateur = :id";
        $db = configurer::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id_utilisateur);
        try{
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addUtilisateur($new_user){
        $sql = "INSERT INTO utilisateur
        VALUES (null, :nomUtilisateur, :preUtilisateur, :telUtilisateur, :emailUtilisateur,:roleUtilisateur)";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomUtilisateur'  => $new_user->getNom(),
                'preUtilisateur' => $new_user->getpreNom(),
                'telUtilisateur' => $new_user->gettel(),
                'emailUtilisateur'  => $new_user->getemail(),
                'roleUtilisateur'  => $new_user->getrole(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updateUtilisateur($utilisateur, $id_utilisateur){
        try {
            $db = configurer::getConnexion();
            $query = $db->prepare(
                'UPDATE utilisateur SET 
                    nomUtilisateur  = :nom_utilisateur,
                    preUtilisateur = :prenom_utilisateur,
                    telUtilisateur = :tel_utilisateur,
                    emailUtilisateur  = :email_utilisateur,
                    roleUtilisateur  = :role_utilisateur,
                WHERE idUtilisateur = :id_utilisateur'
            );
            $query->execute([
                'id_utilisateur' => $id_utilisateur,
                'nom_utilisateur' => $utilisateur->getNom(),
                'prenom_utilisateur' => $utilisateur->getpreNom(),
                'tel_utilisateur' => $utilisateur->gettel(),
                'email_utilisateur' => $utilisateur->getemail(),
                'role_utilisateur' => $utilisateur->getrole(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showUtilisateur($id_utilisateur){
        $sql = "SELECT * from utilisateur where idUtilisateur = :id_utilisateur";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_utilisateur', $id_utilisateur);
            $query->execute();
            $Event = $query->fetch();
            return $Event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>