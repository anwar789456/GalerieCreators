<?php
require_once(__DIR__ . '/../config.php');
class PostC{
    public function listPost(){
        $sql = "SELECT * FROM post";
        $db = configurer::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deletePost($id_post){
        $sql = "DELETE FROM post WHERE idPost = :id";
        $db = configurer::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id_post);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function showPost($id){
        $sql = "SELECT * from post where idPost = $id";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $post = $query->fetch();
            return $post;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function addPost($post){
        $sql = "INSERT INTO post
        VALUES (NULL, :description_Post,:id_Artiste,:titre_actualite,
                      :source_actualite,:date_pub_actualiter,:contenu_actualiter)";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'description_Post' => $post->getdescription(),
                'id_Artiste' => $post->getidArtiste(),
                'titre_actualite' => $post->getTitre(),
                'source_actualite' => $post->getSource(),
                'date_pub_actualiter' => $post->getDatePublication(),
                'contenu_actualiter' => $post->getContenu(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updatePost($post, $id){
        try {
            $db = configurer::getConnexion();
            $query = $db->prepare(
                'UPDATE post SET 
                    descriptionPost = :descriptionP,
                    idArtiste = :idArtist,
                    titreActualite = :titre,
                    sourceActualite = :source, 
                    date_pubActualite = :datePublication,
                    contenuActualite = :contenu, 
                WHERE idPost = :id_Post'
            );

            $query->execute([
                'id_Post' => $id,
                'descriptionP'=> $post->getdescription(),
                'idArtist' => $post->getidArtiste(),
                'titre' => $post->getTitre(),
                'source' => $post->getSource(),
                'datePublication' => $post->getDatePublication(),
                'contenu' => $post->getContenu(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    /* ____________________________________________________________________________ */
    /* ---------------------------------------------------------------------------- */
    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    /* ____________________________________________________________________________ */


    public function listArtistes(){
        $sql = "SELECT * FROM artistes";
        $db = configurer::getConnexion();
        try {
            $artistes = $db->query($sql);
            return $artistes;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteArtiste($ide){
        $sql = "DELETE FROM artistes WHERE idArtiste = :id";
        $db = configurer::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addArtiste($artiste){
        $sql = "INSERT INTO artistes  
        VALUES (NULL, :nom,:prenom, :specialite, :biographie)";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomArtiste' => $artiste->getNom(),
                'prenomArtiste' => $artiste->getPrenom(),
                'specialiteArtiste' => $artiste->getSpecialite(),
                'biographieArtiste' => $artiste->getBiographie(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function showArtiste($id){
        $sql = "SELECT * from artistes where idArtiste = $id";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $artiste = $query->fetch();
            return $artiste;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function updateArtiste($artiste, $id){
        try {
            $db = configurer::getConnexion();
            $query = $db->prepare(
                'UPDATE artiste SET 
                    nomArtiste = :nom, 
                    prenomArtiste = :prenom, 
                    specialiteArtiste = :specialite, 
                    biographieArtiste = :biographie
                WHERE idArtiste= :idArtiste'
            );

            $query->execute([
                'idArtiste' => $id,
                'nom' => $artiste->getNom(),
                'prenom' => $artiste->getPrenom(),
                'specialite' => $artiste->getSpecialite(),
                'biographie' => $artiste->getBiographie(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>
