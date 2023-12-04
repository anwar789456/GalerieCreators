<?php
include "../../../Controller/galerieC.php";
$c = new GalerieC();
$tab = $c->list_Galerie();


$filtre ="Selectionner un filtre";
if (isset($_POST['filtre_boutton'])) {
    if (isset($_POST['filtre'])) {
        $filtre = $_POST['filtre'];
    }
    if($filtre === "Selectionner un filtre") {
        $tab = $c->list_Galerie();
    }
    else if ($filtre === 'Nom galerie Asc') {
        $tab = $c->filter_nomGal_ASC();
    } 
    else if ($filtre === 'Nom galerie Desc') {
        $tab = $c->filter_nomGal_DESC();
    }
    else if($filtre === "Propriete Asc") {
        $tab = $c->filter_proprieteGal_ASC();
    }
    else if($filtre === "Propriete Desc") {
        $tab = $c->filter_proprieteGal_DESC();
    }
    else if($filtre === "lieu galerie Asc") {
        $tab = $c->filter_lieuGal_ASC();
    }
    else if($filtre === "lieu galerie Desc") {
        $tab = $c->filter_lieuGal_DESC();
    }
}


if (isset($_POST["submit_btn_recherche"])){
    $recherche = $_POST["recherche"];
    $tab = $c->rechercher($recherche);
}


$liens = $c->list_liens();
if (isset($_POST["submit_jointure"])) {
    $link = $_POST["lien"];
    $tab = $c->jointure($link);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../style.css">
    <title>Evenement Administration</title>
</head>
<body>
    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <h2>Galerie<span class="danger">Creators</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="../index.php" class="not-active">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="../utilisateur/utilisateur.php" class="not-active">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Utilisateurs</h3>
                </a>
                <a href="../evenement/evenement.php" class="not-active">
                    <span class="material-symbols-outlined">
                    event
                    </span>
                    <h3>Evenements</h3>
                </a>
                <a href="../commande/commande.php" class="not-active">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Commandes</h3>
                </a>
                <a href="../post/post.php" class="not-active">
                    <span class="material-icons-sharp">
                        mail_outline
                    </span>
                    <h3>Posts</h3>
                    <span class="message-count">27</span>
                </a>
                <a href="../galerie/galerie.php" class="active">
                    <span class="material-icons-sharp">inventory</span>
                    <h3>Galeries</h3>
                </a>
                <a href="../produit/produit.php" class="not-active">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Produits</h3>
                </a>
                <a href="#" class="not-active">
                    <span class="material-icons-sharp">report_gmailerrorred</span>
                    <h3>Reports</h3>
                </a>
                
                <a href="#">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->
        <!-- Main Content -->
        <main>
            <div class="content">
                <nav>
                    <form action="" method="POST">
                        <div class="form-input">
                            <input type="search" name="recherche" autocomplete="off" placeholder="rechercher">
                            <button type="submit" class="search-btn" name="submit_btn_recherche" ><i class='bx bx-search'></i></button>
                        </div>
                    </form>

            <form action="" method="POST">
                <select name="lien">
                <?php
                        foreach ($liens as $lien) {
                            echo "<option value='" . $lien["link"] . "'>" . $lien["link"] . "</option>";
                        }
                    ?>
                </select>
                <input type="submit" name="submit_jointure" value="afficher">
            </form>


                    <!-- <<=========================  filter ==================================>> -->
                    <div class="select-container">
                        <form action="" method="POST">
                            <select class="select-box" name="filtre" >
                                <option hidden><?= $filtre ?></option>
                                <option value="Selectionner un filtre">Selectionner un filtre</option>
                                <option value="Nom galerie Asc">Nom galerie Asc</option>
                                <option value="Nom galerie Desc">Nom galerie Desc</option>
                                <option value="Propriete Asc">Propriete Asc</option>
                                <option value="Propriete Desc">Propriete Desc</option>
                                <option value="lieu galerie Asc">lieu galerie Asc</option>
                                <option value="lieu galerie Desc">lieu galerie Desc</option>
                            </select>
                            <input type="submit" class="appliquer" name="filtre_boutton" value="filtrer">
                        </form>
                    </div>
                    <!-- <<=========================  filter fin ==================================>> -->

                </nav>
            </div>
            <h1>Galeries</h1>
            <div class="new-users">
                <div class="user-list" id="adding_galeries_key">
                    <div class="user" onclick="galerie_formulaire()">
                        <img src="../images/plus.png">
                        <h2>ajouter</h2>
                        <p>Galerie</p>
                    </div>
                </div>
            </div>
            <!-- Users Table -->
            <div class="recent-orders">
                <table>
                    <thead>
                        <tr>
                            <th>Id Galerie</th>
                            <th>Nom Galerie</th>
                            <th>propriete Galerie</th>
                            <th>lieu Galerie</th>
                            <th>image Galerie</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tab as $galerie) { ?>
                            <tr>
                                <td><h2><?= $galerie['idGalerie']; ?></h2></td>
                                <td><h2><?= $galerie['nomGalerie']; ?></h2></td>
                                <td><h2><?= $galerie['proprieteGalerie']; ?></h2></td>
                                <td><h2><?= $galerie['lieuGalerie']; ?></h2></td>
                                <td><img class="images_table" src="uploads/<?= $galerie['imgGalerie'] ?>"></td>
                                <td><h1><a href="updateGalerie.php?idGalerie=<?php echo $galerie['idGalerie'];?>">Update</a></h1></td>
                                <td><h1><a href="deleteGalerie.php?idGalerie=<?php echo $galerie['idGalerie'];?>">Delete</a></h1></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- End Users Table -->
        <div class="new-galerie-form" id="formulaire-new-galerie" style="display: none;">
            <form action="addGalerie.php" method="POST"  enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="nom_galerie">Nom </label></td>
                        <td><input type="text" id="nom_galerie" name="nom_galerie" autocomplete="off"/></td>
                    </tr>
                    <tr>
                        <td><label for="propriete_galerie">propriete </label></td>
                        <td><input type="text" id="propriete_galerie" name="propriete_galerie" autocomplete="off"/></td>
                    </tr>
                    <tr>
                        <td><label for="lieu_galerie">lieu </label></td>
                        <td><input type="text" id="lieu_galerie" name="lieu_galerie" autocomplete="off"/></td>
                    </tr>
                    <tr>
                        <td><label for="img_galerie">image</label></td>
                        <td><input type="file" required id="img_galerie" name="img_galerie"/></td>
                    </tr>

                    <tr>
                        <td><label for="lien_galerie">lien site web </label></td>
                        <td><input type="text" id="lien_galerie" name="lien_galerie" autocomplete="off"/></td>
                    </tr>

                    <td><input type="submit" value="Save" onclick="return valider_formulaire_galerie()"></td>
                    <td><input type="reset" value="Reset"></td>
                    <td><input type="button" value="cancel" onclick="hide_formulaire_galerie()"></td>
                </table>
            </form>
        </div>
        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b id="admin_name">zeineb</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="../images/profile-1.jpg">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

        </div>


    </div>

    <script src="../index.js"></script>
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

    function valider_formulaire_galerie(){
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
    function hide_formulaire_galerie(){
        form = document.getElementById("formulaire-new-galerie");
        form.style.display = "none";
    }
    function galerie_formulaire(){
        form = document.getElementById("formulaire-new-galerie");
        form.style.display = "block";
    }
</script>
</html>