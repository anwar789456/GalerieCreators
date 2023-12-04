<?php
include "../../../Controller/galerieC.php";
$GalC = new GalerieC();
$GalC->deleteGalerie($_GET["idGalerie"]);
header('Location:galerie.php');
?>