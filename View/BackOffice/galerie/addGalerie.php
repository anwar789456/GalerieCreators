<?php
include "../../../Controller/galerieC.php";
include "../../../Model/Galerie_Model.php";
if (isset($_POST["nom_galerie"])
    && isset($_POST["propriete_galerie"])
    && isset($_POST["lieu_galerie"])
    && isset($_FILES["img_galerie"])
    && isset($_POST["lien_galerie"])){

    $nom_gal = $_POST["nom_galerie"];
    $propriete_gal = $_POST["propriete_galerie"];
    $lieu_gal = $_POST["lieu_galerie"];
    $lien_gal = $_POST["lien_galerie"];

    // <<============= debut image ===================== >>
    $img_name = $_FILES['img_galerie']['name']; // nom d'image
	$tmp_name = $_FILES['img_galerie']['tmp_name']; // 

    // <<============= fin image ===================== >>

    if (!empty($nom_gal)&& !empty($propriete_gal)&&!empty($lieu_gal)){
        move_uploaded_file($tmp_name, 'uploads/'.$img_name); // ajouter l'image au dossier "uploads"
        
        $galerie = new Galerie(null,$nom_gal,$propriete_gal,$lieu_gal,$img_name);
        $galerieC = new GalerieC();
        $galerieC->addGalerie($galerie);

        $id = $galerieC->last_id_inserted();
        $link = new link_galerie(null,$id,$lien_gal);
        
        $linkC = new linkC();
        $linkC->ajouter_lien($link);
        header('Location:galerie.php');
    }
}
?>