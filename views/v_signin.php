<?php
//  En tête de page
require_once(PATH_VIEWS . 'head.php');
?>
<!--  Début de la page -->
<img src="<?=PATH_LOGOS . "crouskie-geant.png"?>" alt="<?= CROUKIE_GEANT ?>" class="background">
<div class="flex column content center">
    <div class="logo">
        <a href="index.php">
            <!-- Il faut trouver une solution pour le changement de couleur dynamique -->
            <img src=<?= PATH_LOGOS . "crouskie-text-outlined-red.svg" ?> height="120px" width="414px" alt="<?= LOGO ?>">
        </a>
    </div>
    <div class="flex column center instruction">
        <!-- Enregistrer les textes dans les langs -->
        <h3><?= CONNEXION ?></h3>
        <p>Entrez votre mot de passe afin de vous connecter.</p>
    </div>
    <form action="index.php?page=signin" method="post" class="card flex column center shadow rounded">
        <input type="hidden" name="email" id="email" value="<?= $_GET['email']?>">
        <a href="index.php?page=portal"><?=$_GET['email']?><iconify-icon icon="material-symbols:edit"></iconify-icon></a>
        <input type="password" name="password" id="password" placeholder="Mot de passe" class="icon rounded shadow-small" required>
        <input type="submit" id="form-confirm" value="<?= CONNEXION_INSCRIPTION ?>" class="valid circle">
    </form>
    <a href="#" class="underlined">Gérer mes crouskies</a>
</div>

<!--  Fin de la page -->