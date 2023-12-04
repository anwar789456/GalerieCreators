<?php
include "../../../Controller/UtilisateurC.php";
$userC = new UtilisateurC();
$userC->deleteUtilisateur($_GET["idUtilisateur"]);
header('Location:./utilisateur.php');
?>