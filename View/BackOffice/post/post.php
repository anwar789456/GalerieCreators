<?php
include "../../../controller/PostC.php";
include "../../../Model/Post_Model.php";

$c = new PostC();
$tab = $c->listPost();
$postC = new PostC();
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
                <a href="../commande/commande.php" class="not-active">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Commandes</h3>
                </a>
                <a href="../post/post.php" class="active">
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
            <h1>Post</h1>
            <div class="new-users">
                <div class="user-list" id="adding_posts_key">
                    <div class="user" onclick="user_formulaire()">
                        <img src="../images/plus.png">
                        <h2>ajouter</h2>
                        <p>Post</p>
                    </div>
                </div>
            </div>

            <!-- Users Table -->
            <div class="recent-orders" id="recent_posts">
                <h2>Les Posts</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>description post</th>
                            <th>Id artiste</th>
                            <th>Titre actualite</th>
                            <th>Source actualite</th>
                            <th>Date publication</th>
                            <th>contenu actualite</th>
                            <th>update</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tab as $Post) { ?>
                            <tr>
                                <td><h2><?= $Post['idPost']; ?></h2></td>
                                <td><h2><?= $Post['descriptionPost']; ?></h2></td>
                                <td><h2><?= $Post['idArtiste']; ?></h2></td>
                                <td><h2><?= $Post['titreActualite']; ?></h2></td>
                                <td><h2><?= $Post['sourceActualite']; ?></h2></td>
                                <td><h2><?= $Post['date_pubActualite']; ?></h2></td>
                                <td><h2><?= $Post['contenuActualite']; ?></h2></td>
                                <td><h1><a href="updateUtilisateur.php?idUtilisateur=<?= $Post['idPost']; ?>">Update</a></h1></td>
                                <td><h1><a href="deleteUtilisateur.php?idUtilisateur=<?= $Post['idPost']; ?>">Delete</a></h1></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>description post</th>
                            <th>Id artiste</th>
                            <th>Titre actualite</th>
                            <th>Source actualite</th>
                            <th>Date publication</th>
                            <th>contenu actualite</th>
                            <th>update</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tab as $Post) { ?>
                            <tr>
                                <td><h2><?= $Post['idPost']; ?></h2></td>
                                <td><h2><?= $Post['descriptionPost']; ?></h2></td>
                                <td><h2><?= $Post['idArtiste']; ?></h2></td>
                                <td><h2><?= $Post['titreActualite']; ?></h2></td>
                                <td><h2><?= $Post['sourceActualite']; ?></h2></td>
                                <td><h2><?= $Post['date_pubActualite']; ?></h2></td>
                                <td><h2><?= $Post['contenuActualite']; ?></h2></td>
                                <td><h1><a href="updateUtilisateur.php?idUtilisateur=<?= $Post['idPost']; ?>">Update</a></h1></td>
                                <td><h1><a href="deleteUtilisateur.php?idUtilisateur=<?= $Post['idPost']; ?>">Delete</a></h1></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- End Users Table -->

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
                        <p>Hey, <b id="admin_name">Anwar</b></p>
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

    <script src="../orders.js"></script>
    <script src="../index.js"></script>
    <style>
        #recent_posts{
            margin-top: 5rem;
            width: 135%;
        }
        #adding_posts_key{
            width: 10rem;
            position: absolute;
            right: 25%;
            top: -1.5rem;
        }
        #adding_posts_key img{
            width: 3rem;
            height: 3rem;
        }
    </style>
</body>

</html>