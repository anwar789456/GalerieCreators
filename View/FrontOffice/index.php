<?php
include "../../controller/EvenementC.php";
include "../../Model/Evenement_Model.php";
include "../../Controller/galerieC.php";
include "../../controller/CommandeC.php";
include "../../Model/Commande_Model.php";

$cc = new CommandeC();
$tabcomm = $cc->list_Commande();
$commandeC = new CommandeC();

$galc = new GalerieC();
$tabgal = $galc->list_Galerie();


$c = new EvenementC();
$tab = $c->list_Event();
$eventC = new EvenementC();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Galerie</title>
</head>
<body>
    
<header>
    <a href="#" class="logo"><span>Galerie</span>Creators</a>
    <div class="menuToggle" onclick="toggleMenu();"></div>
    <ul class="navbar">
        <li><a href="#banniere" onclick="toggleMenu();">Accueil</a></li>
        <li><a href="#apropos" onclick="toggleMenu();">A Propos</a></li>
        <li><a href="#menu" onclick="toggleMenu();">Galeries</a></li>
        <li><a href="#events" onclick="toggleMenu();">Evenements</a></li>
        <li><a href="#expert" onclick="toggleMenu();">Post</a></li>
        <li><a href="#temoignage" onclick="toggleMenu();">Temoignage</a></li>
        <li><a href="#commander" onclick="toggleMenu();">Commande</a></li>
        <li><a href="#contact" onclick="toggleMenu();">Contact</a></li>
        <li><a href="#login" onclick="toggleMenu();">Login</a></li>

        <a href="Module_Evenement/addEvenement.php" class="btn-reserve"onclick="toggleMenu();">Reservation</a>
    </ul>
</header>


<section class="banniere" id="banniere">
    <div class="contenu">
        <h2>"Inspiration exists, but it has to find you working." <span ><br>PABLO PICASSO</span></h2>
        <p>ART ET CULTURE</p>
        <a href="#menu" class="btn1">Galeries</a>
        <a href="#commander" class="btn2">Commandez ici</a>
    </div>
</section>


<section class="apropos" id="apropos">
    <div class="row">
        <div class="col50">
            <h2 class="titre-texte"><span>A</span> Propos De Nous</h2>
            <p>Restaurant et accueil très agréable, avec des plats et une présentation surprenante, le tout agrémenté de saveurs et de portions généreuse. Une ambiance de très bon goûts, une qualité de service très peu reprochable. Des prix très abordable vu la situation du restaurant, avec des produits frais.
            </p>
        </div>
        <div class="col50">
            <div class="image-slideshow">
                <div class="image fade">
                    <img src="assets/wallpaperflare.com_wallpaper_1.jpg">
                </div>     
                <div class="image fade">
                    <img src="assets/painting.jpg">
                </div>
                <div class="image fade">
                    <img src="assets/painting2.jpg">
                </div>
              </div>
        </div>
    </div>
</section>


<section class="menu" id="menu">
    <div class="titre">
        <h2 class="titre-texte"><span>G</span>aleries</h2>
        <p>Ceci sont nos galeries. </p>
    </div>
    
    <div class="body-of-page">
        <div class="collection">
            <div class="galerie-group">
                <?php foreach ($tabgal as $gal){ ?>
                    <div class="museum1">
                        <div class="card">
                            <p class="p-collection"><h2><?= $gal['nomGalerie']; ?></h2></p>
                            <img src="../BackOffice/galerie/uploads/<?= $gal['imgGalerie'] ?>">
                            <button class="butt-explorer">Explorer</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

 </div>
 <div class="titre">
    <a href="#" class="btn1">Voir Plus</a>
 </div>
</section>


<section class="events" id="events">
    <div class="titre">
        <h2 class="titre-texte"><span>E</span>venements</h2>
        <p>Ceci sont nos evenements. </p>
    </div>
    
    <div class="body-of-page">
        <div class="collection">
            <div class="galerie-group">
            <?php foreach ($tab as $event){ ?>
                <div class="museum1">
                    <div class="card">
                        <p class="p-collection"><?= $event['nomEvent']; ?></h2></p>
                        <img src="../BackOffice/evenement/uploads/<?= $event['imgEvent'] ?>">
                        <button class="butt-explorer">S'inscrire</button>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>

 <div class="titre">
    <a href="#" class="btn1">Voir Plus</a>
 </div>
</section>


<section class="expert" id="expert">
    <h1>Ajouter un(e) artist(e)</h1>
    <form action="ajouter_artiste" method="post">
        <label for="nom_artiste">Nom de l'artiste:</label>
        <input type="text" id="nom_artiste" name="nom_artiste" required><br><br>

        <label for="genre_artiste">Genre de l'artiste:</label>
        <select id="genre_artiste" name="genre_artiste" required>
            <option value="female">Femme</option>
            <option value="male">Homme</option>
        </select>

        <input type="submit" value="Ajouter artiste">
    </form>

    <h1>Ajouter une actualité</h1>
    <form action="ajouter_actualite" method="post">
        <label for="titre_actualite">Titre de l'actualité:</label>
        <input type="text" id="titre_actualite" name="titre_actualite" required><br><br>

        <label for="contenu_actualite">Contenu de l'actualité:</label>
        <textarea id="contenu_actualite" name="contenu_actualite" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Ajouter actualité">
    </form> 
    
</section>


 <section class="temoignage" id="temoignage">
    <div class="titre blanc">
        
        <h2 class="titre-texte">Que Disent Nos <span>C</span>lients</h2>
        <p>Tout jugement est accepté par notre restaurant. </p>
    </div>
    <div class="contenu">
        <div class="box">
            <div class="imbox">
                <img src="assets/lady.avif">
            </div>
            <div class="text">
                <p>J'ai adoré la variété du menu.</p>
                <h3>Mariem</h3>
            </div>
        </div>
        <div class="box">
            <div class="imbox">
                <img src="assets/man.jpg">
            </div>
            <div class="text">
                <p>C'est vraiment délicieux.</p>
                <h3>Ilyes</h3>
            </div>
        </div>
        <div class="box">
            <div class="imbox">
                <img src="assets/man2.jpg">
            </div>
            <div class="text">
                <p>Je deteste leur service.</p>
                <h3>Japa</h3>
            </div>
        </div>
    </div>
 </section>


<!-- commmander -->
<section class="commander" id="commander">

  <div class="container" id="com">
    <div class="container">
        <h2>Product List</h2>
        <div class="products">
            <!-- Product list will be displayed here -->
        </div>

    <h2>Order Cart</h2>
    <div class="cart">
        <div id="cart-items">
            <div class="product">
                <form action="addCommande.php" method="POST">
                <table>
                    <tr>
                        <td><label for="nom_client">Nom</label></td>
                        <td><input type="text" id="nom_client" name="nom_client" autocomplete="off"/></td>
                    </tr>
                    <tr>
                        <select name="produit_commande" id="">
                            <option value="produit1">Product 1 - $10.99</option>
                            <option value="produit2">Product 2 - $20.49</option>
                            <option value="produit3">Product 3 - $15.99</option>
                        </select>
                    </tr>
                    <tr>
                        <td><label for="quantite_commande">quantite</label></td>
                        <td><input type="text" id="quantite_commande" 
                                    name="quantite_commande" autocomplete="off"/></td>
                    </tr>

                    <tr>
                        <td><label for="date_commande">date</label></td>
                        <td><input type="date" id="date_commande" name="date_commande" autocomplete="off"/></td>
                    </tr>
                    <tr>
                        <td><button type="submit" class="add-to-cart">Add to Cart</button></td>
                    </tr>
                </table>
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>produit</th>
                            <th>quantite</th>
                            <th>date</th>
                             <!-- <th>update</th> -->
                            <th>update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tabcomm as $comm) { ?>
                            <tr>
                                <td><h2><?= $comm['idCommande']; ?></h2></td>
                                <td><h2><?= $comm['nom_client']; ?></h2></td>
                                <td><h2><?= $comm['produitCommande']; ?></h2></td>
                                <td><h2><?= $comm['quantiteCommande']; ?></h2></td>
                                <td><h2><?= $comm['dateCommande']; ?></h2></td>
                                <td><h1><a href="../BackOffice/commande/updateCommande.php?idCommande=<?= $comm['idCommande']; ?>">Update</a></h1></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Cart items will be displayed here -->
        </div>
        <!--
        <p>Total: $<span id="total">0.00</span></p>
        <button class="btn-checkout" onclick="checkout()">Checkout</button>
        -->
    </div>
    </div>
  </div>
</section>

 <section class="contact" id="contact">
     <div class="titre noir">
         <h2 class="titre-text"><span>C</span>ontact</h2>
         <p>Contactez-nous à tous moments.</p>
     </div>
     <div class="contactform">
         <h3>Envoyer un message</h3>
         <div class="inputboite">
             <input type="text" placeholder="Nom" id="input1" >
         </div>
         <div class="inputboite">
            <input type="text" placeholder="email" id="input2" >
         </div>
         <div class="inputboite">
            <textarea placeholder="message" id="input3" ></textarea>
         </div>
         <div class="inputboite">
             <button class="btn-reserve" id="submit-btn" >Envoyer</button>
         </div>
     </div>
 </section>

 <section class="login" id="login">
    <div class="titre noir">
        <h2 class="titre-text"><span>L</span>ogin</h2>
    </div>
    <div class="contactform">
        <h3>Login</h3>
        <div class="inputboite">
            <input type="text" placeholder="Nom" id="input11" >
        </div>
        <div class="inputboite">
           <input type="password" placeholder="mot de passe" id="input22" >
        </div>
        <div class="inputboite">
            <button class="btn-reserve" id="submit-btn1" >Login</button>
        </div>
    </div>
 
</section>


 <div class="copyright">
     <p>ESPRIT 2023 GalerieCreators</p>
 </div>

 <script type="text/javascript">
     window.addEventListener('scroll', function(){
         const header =document.querySelector('header');
         header.classList.toggle("sticky", window.scrollY > 0 );
     });
     function toggleMenu(){
         const tmenuToggle = document.querySelector('.menuToggle');
         const navbar = document.querySelector('.navbar');
         navbar.classList.toggle('active');
         menuToggle.classList.toggle('active');
     }

 </script>
 <script src="main.js"></script>
</body>
</html>