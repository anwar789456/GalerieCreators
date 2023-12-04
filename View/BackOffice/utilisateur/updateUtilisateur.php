<?php
include "../../../controller/UtilisateurC.php";
include "../../../Model/Utilisateur_Model.php";
$user = null;
$userC = new UtilisateurC();
if (isset($_POST["nom_user"]) && isset($_POST["prenom_user"])
 &&isset($_POST["tel_user"]) && isset($_POST["email_user"])&&isset($_POST["role_user"])){
        $nom_user = $_POST["nom_user"];
        $prenom_user = $_POST["prenom_user"];
        $tel_user = $_POST["tel_user"];
        $email_user = $_POST["email_user"];
        $role_user = $_POST["role_user"];
        if (!empty($nom_user) &&!empty($prenom_user)&&!empty($tel_user)&&!empty($email_user)&&!empty($role_user)){
            $user = new Utilisateur(null, $nom_user, $prenom_user, $tel_user, $email_user,$role_user);
            $userC->updateUtilisateur($user, $_GET['idUtilisateur']);
            header('Location:utilisateur.php');
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produit update</title>
</head>
<body>
    <?php
    if (isset($_GET['idUtilisateur'])) {
        $old = $userC->showUtilisateur($_GET['idUtilisateur']);
        
    ?>
    <form action="" method="POST">
        <table>
        <tr>
            <td><label for="iduser">Id produit :</label></td>
            <td>
                <input type="text" id="iduser" name="iduser" 
                value="<?php echo $_GET['idUtilisateur'] ?>" readonly/>
            </td>
            </tr>
            <tr>
                <td><label for="nom_user">Nom :</label></td>
                <td>
                    <input type="text" id="nom_user" name="nom_user" 
                    value="<?php echo $old['nomUtilisateur']?>"/>
                </td>
            </tr>
            <tr>
                <td><label for="prenom_user">prenom:</label></td>
                <td>
                    <input type="text" id="prenom_user" name="prenom_user" 
                    value="<?php echo $old['preUtilisateur']?>"/>
                </td>
            </tr>
            <tr>
                <td><label for="tel_user">tel:</label></td>
                <td>
                    <input type="text" id="tel_user" name="tel_user" 
                    value="<?php echo $old['telUtilisateur']?>"/>
                </td>
            </tr>
            <tr>
                <td><label for="email_user">email:</label></td>
                <td>
                    <input type="text" id="email_user" name="email_user" 
                    value="<?php echo $old['emailUtilisateur']?>"/>
                </td>
            </tr>
            <tr>
                <td><label for="role_user">role:</label></td>
                <td>
                    <input type="text" id="role_user" name="role_user" 
                    value="<?php echo $old['roleUtilisateur']?>"/>
                </td>
            </tr>
            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

    </form>
    <?php
    }
    ?>
</body>

</html>