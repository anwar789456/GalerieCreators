<?php
include "../../Controller/CommandeC.php";
include "../../Model/Commande_Model.php";
if (isset($_POST["nom_client"]) && isset($_POST["produit_commande"])
    && isset($_POST["quantite_commande"]) && isset($_POST["date_commande"])){
    $nom = $_POST["nom_client"];
    $produit = $_POST["produit_commande"];
    $quantite = $_POST["quantite_commande"];
    $date = $_POST["date_commande"];
    if (!empty($nom)&& !empty($produit)&&!empty($quantite)&& !empty($date)){
        $commande = new Commande(null,$nom,$produit,$quantite,$date);
        $eventC = new CommandeC();
        $eventC->addCommande($commande);
        header('Location:../BackOffice/commande/commande.php');
    }
}
?>