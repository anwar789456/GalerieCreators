<?php
include "../../../controller/CommandeC.php";
include "../../../Model/Commande_Model.php";
$commandeC = new CommandeC();

if (isset($_POST["nom_client"])&& isset($_POST["produit_commande"])&& isset($_POST["quantite_commande"])
    && isset($_POST["date_commande"])){
    if(!empty($_POST["nom_client"])&&!empty($_POST["produit_commande"])
        &&!empty($_POST["quantite_commande"]) && !empty($_POST['date_commande'])){
        $nom = $_POST["nom_client"];
        $produit = $_POST["produit_commande"];
        $quantite = $_POST["quantite_commande"];
        $datec = $_POST['date_commande'];
        $comm = new Commande(null, $nom, $produit, $quantite, $datec);
        $commandeC->updateCommande($comm, $_GET['idCommande']);

        header('Location:commande.php');
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../style.css">
    <title>Update commande</title>
</head>
<body>    
        <?php if (isset($_GET['idCommande'])){
            $oldcommande = $commandeC->showCommande($_GET['idCommande']);
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
            <tr>
                <td><label for="idCommande">Id :</label></td>
                <td><input type="text" id="idCommande" name="idCommande"
                                             value="<?php echo $_GET['idCommande'] ?>" readonly/></td>
            </tr>
            <tr>
                <td><label for="nom_client">Nom :</label></td>
                <td><input type="text" id="nom_client" name="nom_client" 
                                             value="<?php echo $oldcommande['nom_client']?>"/></td>
            </tr>
            <tr>
                <td><label for="produit_commande">produit:</label></td>
                <td><input type="text" id="produit_commande" name="produit_commande"
                value="<?php echo $oldcommande['produitCommande']?>" /></td>
            </tr>

            <tr>
                <td><label for="quantite_commande">quantite:</label></td>
                <td><input type="text" id="quantite_commande" name="quantite_commande"
                value="<?php echo $oldcommande['quantiteCommande']?>" /></td>
            </tr>

            <tr>
                <td><label for="date_commande">Date:</label></td>
                <td><input type="date" id="date_commande" name="date_commande"
                                             value="<?php echo $oldcommande['dateCommande']?>" /></td>
            </tr>
            <td><input type="submit" value="Save"></td>
            <td><input type="reset" value="Reset"></td>
            <td><a href="commande.php">Cancel</a></td>
            </table>
        </form>
        <?php 
        } ?>
</body> 

</html>
