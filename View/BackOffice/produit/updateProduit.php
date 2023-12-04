<?php
include "../../../controller/ProduitC.php";
include "../../../Model/Produit_Model.php";
$produit = null;
$ProduitC = new ProduitC();
if (isset($_POST["nom_produit"]) && isset($_POST["prix_produit"])){
        $nom_produit = $_POST["nom_produit"];
        $prix_produit = $_POST["prix_produit"];
        if (!empty($nom_produit) &&!empty($prix_produit)){
            $produit = new Produit(null, $nom_produit, $prix_produit, null);
            var_dump($produit);
            $ProduitC->updateProduit($produit, $_GET['idProduit']);
            header('Location:produit.php');
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
    <button><a href="produit.php">Back to produits</a></button>

    <?php
    if (isset($_GET['idProduit'])) {
        $oldProduit = $ProduitC->showProduit($_GET['idProduit']);
        
    ?>
    <form action="" method="POST">
        <table>
        <tr>
            <td><label for="idProduit">Id produit :</label></td>
            <td>
                <input type="text" id="idProduit" name="idProduit" 
                value="<?php echo $_GET['idProduit'] ?>" readonly/>
            </td>
            </tr>
            <tr>
                <td><label for="nom_produit">Nom produit :</label></td>
                <td>
                    <input type="text" id="nom_produit" name="nom_produit" 
                    value="<?php echo $oldProduit['nomProduit']?>"/>
                </td>
            </tr>
            <tr>
                <td><label for="prix_produit">prix produit:</label></td>
                <td>
                    <input type="text" id="prix_produit" name="prix_produit" 
                    value="<?php echo $oldProduit['prixProduit']?>"/>
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