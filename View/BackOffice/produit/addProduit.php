<?php
include "../../../Controller/ProduitC.php";
include "../../../Model/Produit_Model.php";
if (isset($_POST["nom_produit"])&& isset($_POST["prix_produit"])){
    $nom_produit = $_POST["nom_produit"];
    $prix_produit = $_POST["prix_produit"];
    
    // ++++++++++++ the image handling ++++++++++++++++++
    $img_name = $_FILES['img_produit']['name'];
	$tmp_name = $_FILES['img_produit']['tmp_name'];
    //  ----------- image handling ends here ------------
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
	$img_ex_lc = strtolower($img_ex);
	$allowed_exs = array("jpg", "jpeg", "png"); 
    
    if (!empty($nom_produit)&&!empty($prix_produit)){
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path = 'uploads/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            $produit = new Produit(null,$nom_produit,$prix_produit,$new_img_name);
            $produitC = new ProduitC();
            $produitC->addProduit($produit);
            header('Location:produit.php');

    }
}
?>