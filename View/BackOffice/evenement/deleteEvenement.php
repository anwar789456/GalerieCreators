<?php
include "../../../Controller/EvenementC.php";
$EventC = new EvenementC();
$EventC->deleteEvenement($_GET["idEvent"]);
header('Location:./evenement.php');
?>