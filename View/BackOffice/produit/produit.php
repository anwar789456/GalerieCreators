<?php
    include "../../../Controller/ProduitC.php";
    include "../../../Model/Produit_Model.php";
    $c = new ProduitC();
    $tab = $c->list_Produit();
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
                <a href="../produit/produit.php" class="active">
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
            <h1>Produits</h1>
            <div class="new-users">
                <div class="user-list" id="adding_produit_key">
                    <div class="user" onclick="produit_formulaire()">
                        <img src="../images/plus.png">
                        <h2>ajouter</h2>
                        <p>produit</p>
                    </div>
                </div>
            </div>
            <!-- Users Table -->
            <div class="recent-orders">
                <h2>utilisateurs</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Id produit</th>
                            <th>Nom produit</th>
                            <th>prix produit</th>
                            <th>image produit</th>
                            <th>update</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tab as $produit) { ?>
                            <tr>
                                <td><h2><?= $produit['idProduit']; ?></h2></td>
                                <td><h2><?= $produit['nomProduit']; ?></h2></td>
                                <td><h2><?= $produit['prixProduit']; ?></h2></td>
                                <td><h2><?= $produit['imgProduit']; ?></h2></td>
                                <td><h1><a href="updateProduit.php?idProduit=<?= $produit['idProduit']; ?>">Update</a></h1></td>
                                <td><h1><a href="deleteProduit.php?idProduit=<?= $produit['idProduit']; ?>">Delete</a></h1></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- End Users Table -->
            <div class="new-produit-form" id="formulaire-new-produit" style="display:none;">
        <form action="addProduit.php" method="POST">
            <table>
                <tr>
                    <td><label for="nom_produit">Nom</label></td>
                    <td><input type="text" id="nom_produit" name="nom_produit" autocomplete="off"/></td>
                </tr>
                <tr>
                    <td><label for="prix_produit">prix</label></td>
                    <td><input type="text" id="prix_produit" name="prix_produit" autocomplete="off" /></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Save"></td>
                    <td><input type="reset"  value="Reset"></td>
                    <td><input type="button" value="cancel" onclick="hide_formulaire_produit()"></td>
                </tr>
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
                        <p>Hey, <b id="admin_name">aziz</b></p>
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
        function produit_formulaire(){
            formu =document.getElementById("formulaire-new-produit");
            formu.style.display = "block";
        }
        function hide_formulaire_produit(){
            formu =document.getElementById("formulaire-new-produit");
            formu.style.display = "none";
        }
        function validateInput() {
                       
                       var inputValue = document.getElementById("nom_produit").value;

                    
                       inputValue = inputValue.trim();

                      
                       if (/^[a-zA-Z]+$/.test(inputValue)) {
                           
                           alert("Valid input");
                       } else {
                           
                           alert("Invalid input. Please enter only characters.");
                           
                           document.getElementById("nom_produit").value = '';
                       }
                   }
    </script>
</html>