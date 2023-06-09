<?php
//  En tête de page
require_once(PATH_VIEWS . 'head.php');
require_once(PATH_VIEWS . 'header.php');
require_once(PATH_VIEWS . 'alert.php');
// $alert = showAlert(3,CONNEXION,MAUVAIS_MDP);
?>

<?php
    // echo "$cart";
?>

<div class="card center shadow rounded content" id="panier-non-vide">

    <h2><?= MON_PANIER ?></h2> 

    <div class='flex row legende'>
        <table><tr> 
            <td class="col1">
                <p><?= CART_ARTICLE ?></p>
            </td>
            <td class="col2">
                <table><tr> 
                <td><p><?= CART_COULEUR ?></p></td>
                <td><p><?= CART_TAILLE ?></p></td>
                </tr></table>
            </td>
            <td class="col3">
                <table><tr> 
                <td></td>
                <td><p><?= CART_PRIX ?></p></td>
                <td><p><?= CART_QUANTITE ?></p></td>
                <td></td>
                </tr></table>
            </td> 
        </tr></table>
    </div>
    <center><hr width="90%" color="#565656" size="0.5"></center>

    <!-- Affichage des informations sur chaque produit du panier  -->
    <?php if(!$isCartEmpty && $isLogged) { ?>
        <?php foreach ($infosProdsCart as $product) { ?>

            <div class='flex row liste-panier'>
               <form id="form" action="" method="POST"> 
                    <input type="hidden" name="hid-num" class="inp-num-hidden"value="<?= $product['compteur'] ?>">
                    <input type="hidden" name="hid-quantity" class="inp-quantity-hidden" value="<?= $product['quantitycart'] ?>">
                    <input type="submit" name="form-quantity" class="form-quantity" value="modif-quantity" style="display: none">
                </form>
               <table><tr> 
                    <td class="col1">
                        <p><?php $info = $product['nameprod'] ; echo "$info"; ?></p>
                    </td>
                    <td class="col2">
                        <table><tr> 
                        <td><p><?php $info = $product['color']; echo "$info"; ?></p></td>
                        <td><p><?php $info = $product['size']; echo "$info"; ?></p></td>
                        </tr></table>
                    </td>
                    <td class="col3">
                        <table><tr> 
                        <td></td>
                        <td><p><?php $info = $product['priceprod']; echo "$info"; ?> €</p></td>
                        <td><p class="quantite"><?php $info = $product['quantitycart']; echo "$info"; ?></p></td>
                        <td>
                            <!-- Icones pour ajouter 1, enlever 1, supprimer du panier -->
                            <iconify-icon icon="ic:baseline-plus" width="34" height="34" class="ic-plus"></iconify-icon>
                            <iconify-icon icon="ic:baseline-minus" width="34" height="34" class="ic-moins"></iconify-icon> 
                            <iconify-icon icon="uil:trash-alt" width="34" height="34" class="ic-poubelle"></iconify-icon>
                        </td>
                        
                        </tr></table>
                    </td> 
                </tr></table>
            </div>
            <center><hr width="90%" color="#565656" size="0.5"></center>
            
        <?php }// fin for ?>

        <h3><?= MONTANT_TOTAL ?><?php echo "$montantTotal"; ?> €</h3>
        
        <!-- TESTS -->
        <?php 
            // foreach ($cart as $productCart) {
            //     $p = $productCart->getIdProd();
            //     echo "product: $p ";
            //     if(isset($kc)){
            //         echo "$kc";
            //     }
                
            // }
        ?>



        <div class="flex row wrap right contenu center">
            <form action="index.php?page=cart" method="POST" class="contenu center">
                <input type="hidden" name="action" value="valider">
                <input type="submit" id="form-commander" value="<?= PASSER_COMMANDE ?>" class="valid circle">
            </form>
            <form action=""form action="index.php?page=cart" method="POST" class="contenu center">
                <input type="hidden" name="action" value="vider">
                <input type="submit" id="form-vider" value="<?= VIDER_PANIER ?>" class="valid circle">
            </form>
        </div>
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

<?php require_once(PATH_VIEWS . 'footer.php') ?>
