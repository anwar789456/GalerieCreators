<?php
include "../../../Controller/CommandeC.php";
$CommandeC = new CommandeC();
$CommandeC->deleteCommande($_GET["idCommande"]);
header('Location:./commande.php');
?>