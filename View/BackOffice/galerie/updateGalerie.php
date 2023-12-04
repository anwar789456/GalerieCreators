<?php
include "../../../Controller/galerieC.php";
include "../../../Model/Galerie_Model.php";
$galerie = null;
$galerieC = new GalerieC();
$linkc = new linkC();
$old_lien =null;
if (isset($_POST["nom_galerie"]) 
    && isset($_POST["propriete_galerie"]) 
    && isset($_POST["lieu_galerie"])
    && isset($_POST["lien_galerie"])
    && ($_FILES['img_galerie']['name']!="")){

        $nom_gal = $_POST["nom_galerie"];
        $date_gal = $_POST["propriete_galerie"];
        $lieu_gal = $_POST["lieu_galerie"];
        $new_link = $_POST["lien_galerie"];
        // <<============= debut image ===================== >>
        $img_name = $_FILES['img_galerie']['name']; // nom d'image
        $tmp_name = $_FILES['img_galerie']['tmp_name']; // 
        // <<============= fin image ===================== >>
        move_uploaded_file($tmp_name, 'uploads/'.$img_name);

        $galerie = new Galerie(null, $nom_gal, $date_gal, $lieu_gal,$img_name);
        
        
        $id_link_tab = $galerieC->showlink_jointure($_GET['idGalerie']);
        $id_gal =$_GET['idGalerie'];
        $id_link = $id_link_tab["id_link"];
        $linkc->updatelink($id_link,$id_gal,$new_link);
        $galerieC->updateGalerie($galerie, $_GET['idGalerie']);

        header('Location:galerie.php');
    
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>User Display</title>
</head>

<body>
    <?php
    if (isset($_GET['idGalerie'])) {
        $old_gal = $galerieC->showGalerie($_GET['idGalerie']);
        $old_lien = $galerieC->showlink_jointure($_GET['idGalerie']);
    ?>
    <div class="update-galerie-formulaire">
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
            <tr>
                <td><label for="idGalerie">Id galerie</label></td>
                <td>
                    <input type="text" id="idGalerie" name="idGalerie" 
                    value="<?php echo $_GET['idGalerie'] ?>" readonly/>
                </td>
                </tr>
                <tr>
                    <td><label for="nom_galerie">Nom galerie</label></td>
                    <td>
                        <input type="text" id="nom_galerie" name="nom_galerie" 
                        value="<?php echo $old_gal['nomGalerie']?>"/>
                    </td>
                </tr>
                <tr>
                    <td><label for="propriete_galerie">propriete galerie</label></td>
                    <td>
                        <input type="text" id="propriete_galerie" name="propriete_galerie"
                        value="<?php echo $old_gal['proprieteGalerie']?>"/>
                    </td>
                </tr>
                <tr>
                    <td><label for="lieu_galerie">lieu galerie</label></td>
                    <td>
                        <input type="text" id="lieu_galerie" name="lieu_galerie"
                        value="<?php echo $old_gal['lieuGalerie']?>"/>
                    </td>
                </tr>

                <tr>
                    <td><label for="img_galerie">image galerie</label></td>
                    <td>
                        <img class="images_table" src="uploads/<?= $old_gal['imgGalerie'] ?>">
                        <input type="file" required id="img_galerie" name="img_galerie"
                        value="<?php echo $old_gal['imgGalerie']?>"/>
                    </td>
                </tr>


                <tr>
                    <td><label for="lien_galerie">lien site web</label></td>
                    <td>
                        <input type="text" id="lien_galerie" name="lien_galerie"
                        value="<?php echo $old_lien["link"]?>"/>
                    </td>
                </tr>

                <td>
                    <input type="submit" value="Save" onclick="return valider_formulaire_update_galerie()">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
                <td>
                    <a href="./galerie.php">Cancel</a>
                </td>
            </table>

        </form>
    </div>
    <?php
    }
    ?>
</body>
<script>
    function is_word(ch) {
        var allowedChars = ' abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for (var i = 0; i < ch.length; i++) {
            if (allowedChars.indexOf(ch[i]) === -1) {
                return false;
            }
        }
        return true;
    }

    function valider_formulaire_update_galerie(){
        nom = document.getElementById("nom_galerie").value;
        propriete = document.getElementById("propriete_galerie").value;
        lieu = document.getElementById("lieu_galerie").value;

        if (!nom || !is_word(nom) || nom.length > 20) {
            alert("le Nom doit etre une chaine alphabetique de longueur inferieur a 20");
            return false;
        }

        if (!propriete || !is_word(propriete) || propriete.length > 20) {
            alert("propriete doit etre une chaine alphabetique de longueur inferieur a 20");
            return false;
        }
        
        if (!lieu || lieu.length > 20) {
            alert("lieu doit etre de longueur inferieur a 20");
            return false;
        }

    }
</script>

<style>
    
.update-galerie-formulaire{
    background-color: var(--color-white);
    padding: var(--card-padding);
    border-radius: var(--card-border-radius);
    box-shadow: var(--box-shadow);
    width: 70%;
    top: 10vh;
    left: 15%;
    position: absolute;
}
.update-galerie-formulaire label{
    font-size: 2rem;
}

.update-galerie-formulaire input[type="text"]{
    font-size: 3rem;
    color: var(--color-primary);
    background-color: transparent;
    border: 2px solid #34a83c;
    cursor: text;
    padding: 15px;
    border-radius: 10px;
}

.update-galerie-formulaire input[type="submit"], input[type="reset"],a{
    padding: 10px;
    border: 2px solid #34a83c;
    border-radius: 10px;
    font-size: 3rem;
    color: #34a83c;
    cursor: pointer;
    background-color: transparent;
}

.update-galerie-formulaire input[type="submit"]:hover, input[type="reset"]:hover,a:hover{
    color: white;
    background-color: #34a83c;
}
</style>
</html>