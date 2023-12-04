<?php
include "../../../controller/UtilisateurC.php";
include "../../../Model/Utilisateur_Model.php";

$c = new UtilisateurC();
$tab = $c->list_Utilisateur();
$userC = new UtilisateurC();
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
                <a href="utilisateur.php" class="active">
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
                <a href="../commande/commande.html" class="not-active">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Commandes</h3>
                </a>
                <a href="../post/post.html" class="not-active">
                    <span class="material-icons-sharp">
                        mail_outline
                    </span>
                    <h3>Posts</h3>
                    <span class="message-count">27</span>
                </a>
                <a href="../galerie/galerie.html" class="not-active">
                    <span class="material-icons-sharp">inventory</span>
                    <h3>Galeries</h3>
                </a>
                <a href="../produit/produit.html" class="not-active">
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
            <!-- Users Table -->
            <div class="recent-orders">
                <h2>utilisateurs</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>prenom</th>
                            <th>tel</th>
                            <th>email</th>
                            <th>role</th>
                            <th>update</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tab as $User) { ?>
                            <tr>
                                <td><h2><?= $User['idUtilisateur']; ?></h2></td>
                                <td><h2><?= $User['nomUtilisateur']; ?></h2></td>
                                <td><h2><?= $User['preUtilisateur']; ?></h2></td>
                                <td><h2><?= $User['telUtilisateur']; ?></h2></td>
                                <td><h2><?= $User['emailUtilisateur']; ?></h2></td>
                                <td><h2><?= $User['roleUtilisateur']; ?></h2></td>
                                <td><h1><a href="updateUtilisateur.php?idUtilisateur=<?= $User['idUtilisateur']; ?>">Update</a></h1></td>
                                <td><h1><a href="deleteUtilisateur.php?idUtilisateur=<?= $User['idUtilisateur']; ?>">Delete</a></h1></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- End Users Table -->


            <!--<div class="new-users">
                <div class="user-list" id="adding_events_key">
                    <div class="user" onclick="user_formulaire()">
                        <img src="../images/plus.png">
                        <h2>ajouter</h2>
                        <p>Utilisateur</p>
                    </div>
                </div>
            </div>
            -->


            <!-- formulaire new event -->
    <div class="new-user-form" id="formulaire-new-user" style="display:none;">
        <form action="addUtilisateur.php" method="POST">
            <table>
                <tr>
                    <td><label for="nom_utilisateur">Nom</label></td>
                    <td><input type="text" id="nom_utilisateur" name="nom_utilisateur" autocomplete="off"/></td>
                </tr>
                <tr>
                    <td><label for="prenom_utilisateur">prenom</label></td>
                    <td><input type="text" id="prenom_utilisateur" name="prenom_utilisateur" autocomplete="off" /></td>
                </tr>
                <tr>
                    <td><label for="tel_utilisateur">tel</label></td>
                    <td><input type="text" id="tel_utilisateur" name="tel_utilisateur" autocomplete="off" /></td>
                </tr>
                <tr>
                    <td><label for="emailtilisateur">email</label></td>
                    <td><input type="text" id="emailtilisateur" name="email_utilisateur"/></td>
                </tr>
                <tr>
                    <td><label for="roleUtilisateur">role</label></td>
                    <td><input type="text" id="roleUtilisateur" name="role_utilisateur"/></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Save"></td>
                    <td><input type="reset"  value="Reset"></td>
                    <td><input type="button" value="cancel" onclick="hide_formulaire_users()"></td>
                </tr>
            </table>
        </form>
    </div>
    <!-- end formulaire new event-->
        




    </main>
    <!-- End Main Content -->







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
                        <p>Hey, <b id="admin_name">Anwar</b></p>
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
        <script>
            function user_formulaire(){
                formulairee = document.getElementById("formulaire-new-user");
                formulairee.style.display = "block";
            }
            function hide_formulaire_users(){
                formulairee = document.getElementById("formulaire-new-user");
                formulairee.style.display = "none";
            }

        </script>

    <script src="../index.js"></script>
</body>


</html>