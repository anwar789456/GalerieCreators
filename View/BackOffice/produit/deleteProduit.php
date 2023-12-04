<?php
include "../../../Controller/ProduitC.php";
$produitC = new ProduitC();
$produitC->deleteProduit($_GET["idProduit"]);
header('Location:./produit.php');
?>