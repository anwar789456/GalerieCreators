<?php
include "../../../controller/CommandeC.php";
include "../../../Model/Commande_Model.php";

$c = new CommandeC();
$tab = $c->list_Commande();
$commandeC = new CommandeC();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
                <a href="commande.php" class="active">
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
                <a href="../galerie/galerie.php" class="not-active">
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
            <!-- <h1>Commandes</h1>
            <div class="new-users">
                <div class="user-list" id="adding_events_key">
                    <div class="user" onclick="commande_formulaire()">
                        <img src="../images/plus.png">
                         <h2>ajouter</h2>
                        <p>commande</p> 
                    </div>
                </div>
            </div> -->

        <!-- Users Table -->
        <div class="recent-orders">
                <h2>utilisateurs</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>produit</th>
                            <th>quantite</th>
                            <th>date</th>
                             <!-- <th>update</th> -->
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tab as $comm) { ?>
                            <tr>
                                <td><h2><?= $comm['idCommande']; ?></h2></td>
                                <td><h2><?= $comm['nom_client']; ?></h2></td>
                                <td><h2><?= $comm['produitCommande']; ?></h2></td>
                                <td><h2><?= $comm['quantiteCommande']; ?></h2></td>
                                <td><h2><?= $comm['dateCommande']; ?></h2></td>
                                <!-- <td><h1><a href="updateCommande.php?idCommande=<?= $comm['idCommande']; ?>">Update</a></h1></td> -->
                                <td><h1><a href="deleteCommande.php?idCommande=<?= $comm['idCommande']; ?>">Delete</a></h1></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- End Users Table -->



                            <!-- formulaire new event -->
    <div class="new-commande-form" id="formulaire-new-comm" style="display:none;">
        <form action="addCommande.php" method="POST">
            <table>
                <tr>
                    <td><label for="nom_client">Nom</label></td>
                    <td><input type="text" id="nom_client" name="nom_client" autocomplete="off"/></td>
                </tr>
                <tr>
                    <td><label for="produit_commande">produit</label></td>
                    <td><input type="text" id="produit_commande" name="produit_commande" autocomplete="off" /></td>
                </tr>
                <tr>
                    <td><label for="quantite_commande">quantite</label></td>
                    <td><input type="text" id="quantite_commande" name="quantite_commande" autocomplete="off" /></td>
                </tr>
                <tr>
                    <td><label for="date_commande">date</label></td>
                    <td><input type="date" id="date_commande" name="date_commande"/></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Save"></td>
                    <td><input type="reset"  value="Reset"></td>
                    <td><input type="button" value="cancel" onclick="hide_formulaire_commande()"></td>
                </tr>
            </table>
        </form>
    </div>
    <!-- end formulaire new event-->



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
                        <p>Hey, <b id="admin_name">Aziz</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="../images/profile-1.jpg">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="../images/logo.png">
                    <h2>GalerieCreators</h2>
                    <p>Best Fullstack Web Developer Team</p>
                </div>
            </div>
        </div>


    </div>

    <script src="../orders.js"></script>
    <script src="../index.js"></script>
</body>

    <script>
    function commande_formulaire(){
        formulair = document.getElementById("formulaire-new-comm");
        formulair.style.display = "block";
    }
    function hide_formulaire_commande(){
        formulair = document.getElementById("formulaire-new-comm");
        formulair.style.display = "none";
    }
</script>

</html>