<?php
include "../../../controller/EvenementC.php";
include "../../../Model/Evenement_Model.php";
$eventC = new EvenementC();
if (isset($_POST["submit"])){
    if(!empty($_POST["nom_event_update"])&&!empty($_POST["date_event_update"])
        &&!empty($_POST["lieu_event_update"]) && ($_FILES['image_event_update']['name']!="")){
        $nom_event = $_POST["nom_event_update"];
        $date_event = $_POST["date_event_update"];
        $lieu_event = $_POST["lieu_event_update"];
        $img_name = $_FILES['image_event_update']['name'];
        $tmp_name = $_FILES['image_event_update']['tmp_name'];
        move_uploaded_file($tmp_name, 'uploads/'.$img_name);
        $event = new Evenement(null, $nom_event, $date_event, $lieu_event, $img_name);
        $eventC->updateEvenement($event, $_GET['idEvent']);
        header('Location:evenement.php');
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="index_event.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="style_event.css">
    <title>Update evenement</title>
</head>
<body class="update-body">    
    <div class="update-event-form" id="update_form">
        <?php if (isset($_GET['idEvent'])){
            $oldEvent = $eventC->showEvent($_GET['idEvent']);
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
            <tr>
                <td><label for="idEvent">Id event :</label></td>
                <td><input type="text" id="idEvent" name="idEvent"
                                             value="<?php echo $_GET['idEvent'] ?>" readonly/></td>
            </tr>
            <tr>
                <td><label for="nom_event_update">Nom event :</label></td>
                <td><input type="text" id="nom_event_update" name="nom_event_update" 
                                             value="<?php echo $oldEvent['nomEvent']?>"/></td>
            </tr>
            <tr>
                <td><label for="date_event_update">Date event :</label></td>
                <td><input type="date" id="date_event_update" name="date_event_update"
                                             value="<?php echo $oldEvent['dateEvent']?>" /></td>
            </tr>
            <tr>
                <td><label for="lieu_event_update">lieu event:</label></td>
                <td><input type="text" id="lieu_event_update" name="lieu_event_update"
                                             value="<?php echo $oldEvent['lieuEvent']?>" /></td>
            </tr>
            <tr>
                <td><label for="image_event_update">old image :</label></td>
                <td>
                    <img class="image-update" src="uploads/<?= $oldEvent['imgEvent'] ?>">
                    <input type="file" name="image_event_update" required 
                                             value="<?php echo $oldEvent['imgEvent']?>"/></td>
            </tr>
                <td><input type="submit" name="submit" value="Save"></td>
                <td><input type="reset" value="Reset"></td>
                <td><a href="evenement.php">Cancel</a></td>
            </table>
        </form>
        <?php 
        } ?>
    </div>
</body>
<style>
    .update-body{
    background-color: #96a1b3 ;
}
    #update_form{
    background-color: #161b22;
    padding: var(--card-padding);
    border-radius: var(--card-border-radius);
    box-shadow: var(--box-shadow);
    width: 80%;
    top: 5px;
    left: 10%;
    position: absolute;
}

#update_form input[type="date"]{
    font-size: 2.8rem;
    color: #34a83c;
    background-color: transparent;
    cursor: pointer;
}
#update_form label{
    font-size: 1.5rem;
    color: white;
}
#update_form td{
    padding-bottom: 2rem;
    padding-left: 8rem;
}
#update_form input[type="text"]{
    font-size: 2rem;
    color: var(--color-primary);
    background-color: transparent;
    border-bottom: 2px solid #34a83c;
    cursor: text;
    padding: 15px;
    border-radius: 10px;
}
#update_form input[type="submit"], input[type="reset"], a{
    padding: 8px;
    border: 2px solid #34a83c;
    border-radius: 10px;
    font-size: 2rem;
    color: #34a83c;
    cursor: pointer;
    background-color: transparent;
}
#update_form input[type="date"]{
    font-size: 2.8rem;
    background-color: transparent;
    cursor: pointer;
}
#update_form input[type="file"]{
    color: rgb(255, 255, 255);
    font-size: 1rem;
}
#update_form input[type="submit"]:hover,input[type="reset"]:hover, a:hover{
    color: white;
    background-color: #34a83c;
}

#update_form img{
    height: 10rem;
}

</style>
</html>
