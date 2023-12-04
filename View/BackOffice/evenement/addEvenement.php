<?php
include "../../../Controller/EvenementC.php";
include "../../../Model/Evenement_Model.php";
function is_word($ch) {
    $allowedChars = ' abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    for ($i = 0; $i < strlen($ch); $i++) {
        if (strpos($allowedChars, $ch[$i]) === false) {
            return false;
        }
    }
    return true;
}

if (isset($_POST["nom_event"]) && isset($_POST["date_event"])
    && isset($_POST["lieu_event"]) && isset($_FILES["image_event"])){
    $nom_event = $_POST["nom_event"];
    $date_event = $_POST["date_event"];
    $lieu_event = $_POST["lieu_event"];
    $img_name = $_FILES['image_event']['name'];
	$tmp_name = $_FILES['image_event']['tmp_name'];
    if (!empty($nom_event)&& (is_word($nom_event)) 
        && !empty($date_event)&&!empty($lieu_event)){
        move_uploaded_file($tmp_name, 'uploads/'.$img_name);
        $event = new Evenement(null,$nom_event,$date_event,$lieu_event,$img_name);
        $eventC = new EvenementC();
        $eventC->addEvent($event);
        header('Location:./evenement.php');
    }
}?>