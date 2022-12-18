<?php
//  En tête de page
require_once(PATH_VIEWS . 'head.php');
require_once(PATH_VIEWS . 'header.php');
?>

<?php
    // echo "$cart";
?>

<div class="card center shadow rounded content" id="panier-non-vide">

    <h2>Mon panier</h2> 

    <div class='flex row legende'>
        <table><tr> 
        <!-- Il faudra rajouter la taille et la couleur du vêtement commandé dans le panier -->
            <td class="col1">
                <p>Article</p>
            </td>
            <td class="col2">
                <table><tr> 
                <td><p>Couleur</p></td>
                <td><p>Taille</p></td>
                </tr></table>
            </td>
            <td class="col3">
                <table><tr> 
                <td></td>
                <td><p>Prix</p></td>
                <td><p>Quantité</p></td>
                <td></td>
                </tr></table>
            </td> 
        </tr></table>
    </div>
    <center><hr width="90%" color="#565656" size="0.5"></center>

    <!-- Affichage à régler  -->
    <?php if(!$isCartEmpty && $isLogged) { ?>
        <?php foreach ($infosProdsCart as $product) { ?>

            <div class='flex row liste-panier'>
               <table><tr> 
                <!-- Il faudra rajouter la taille et la couleur du vêtement commandé dans le panier -->
                    <td class="col1">
                        <p><?php $info = $product['NAMEPROD'] ; echo "$info"; ?></p>
                    </td>
                    <td class="col2">
                        <table><tr> 
                        <td><p><?php $info = $product['COLOR']; echo "$info"; ?></p></td>
                        <td><p><?php $info = $product['SIZE']; echo "$info"; ?></p></td>
                        </tr></table>
                    </td>
                    <td class="col3">
                        <table><tr> 
                        <td></td>
                        <td><p><?php $info = $product['PRICEPROD']; echo "$info"; ?> €</p></td>
                        <td><p><?php $info = $product['QUANTITYCART']; echo "$info"; ?></p></td>
                        <td>
                            <iconify-icon icon="mdi:cards-heart-outline"></iconify-icon> <!-- Icone pour ajouter 1 -->
                            <iconify-icon icon="mdi:cards-heart-outline"></iconify-icon> <!-- Icone pour enlever 1 -->
                            <iconify-icon icon="mdi:cards-heart-outline"></iconify-icon> <!-- Icone pour supprimer -->
                        </td>
                        </tr></table>
                    </td> 
                </tr></table>
            </div>
            <center><hr width="90%" color="#565656" size="0.5"></center>
            
        <?php } ?>

        <h3><?= MONTANT_TOTAL ?><?php echo "$montantTotal"; ?> €</h3>

        <form class="flex row wrap right contenu center">
            <input type="button" id="form-info" value="<?= PASSER_COMMANDE ?>" class="valid circle">
            <input type="button" id="form-enregistrer" value="<?= VIDER_PANIER ?>" class="valid circle">
        </form>

    <?php } ?>
</div>

<div class="card center shadow rounded panier-vide" id="panier-vide">
    <h1><?= PANIER_VIDE ?></h1>
</div>
<div class="card center shadow rounded panier-vide" id="panier-pas-connecte">
    <h1><?= PANIER_PAS_CONNECTE ?></h1>
</div>

<!-- Affichage selon si le panier est vide ou non -->
<script>
        // transforme la variable isCartEmpty PHP en variable page JavaScript
        var estVide = <?php echo json_encode($isCartEmpty); ?>;
        // transforme la variable isLogged PHP en variable page JavaScript
        var estConnecte = <?php echo json_encode($isLogged); ?>;
        const divPanier = document.getElementById("panier-non-vide")
        const divPanierVide = document.getElementById("panier-vide")
        const divPanierPasConnecte = document.getElementById("panier-pas-connecte")
        // gestion de l'affichage de la bonne div
        if (!estConnecte) {
            divPanier.style.display = "none"
            divPanierVide.style.display = "none"
            divPanierPasConnecte.style.display = "block"
        } else if (estVide) {
            divPanier.style.display = "none"
            divPanierPasConnecte.style.display = "none"
            divPanierVide.style.display = "block"
        } else {
            divPanier.style.display = "block"
            divPanierPasConnecte.style.display = "none"
            divPanierVide.style.display = "none"
        }
</script>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php') ?>