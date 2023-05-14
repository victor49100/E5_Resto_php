<?php
/**
 * --------------
 * vueUpdProfil
 * --------------
 * 
 * @version 07/2021 par NB : intégration couche modèle objet
 * 
 * Variables transmises par le contrôleur detailResto contenant les données à afficher : 
  ---------------------------------------------------------------------------------------- */
/** @var Utilisateur  $util utilisateur à afficher */
/** @var array $mesRestosAimes  */
/**
 * Variables supplémentaires :  
  ------------------------- */
/** @var Resto $unResto */
?>

<h1>Modifier mon profil</h1>

Mon adresse électronique : <?= $util->getMailU() ?> <br />
Mon pseudo : <?= $util->getPseudoU() ?> <br />
Mettre à jour mon pseudo : 
<form action="./?action=updProfil" method="POST">
    <input type="text" name="pseudoU" placeholder="Nouveau pseudo" /><br />
    <input type="submit" value="Enregistrer" />
    <hr>
    Mettre à jour mon mot de passe : <br />
    <input type="password" name="mdpU" placeholder="Nouveau mot de passe" /><br />
    <input type="password" name="mdpU2" placeholder="Confirmer la saisie" /><br />
    <input type="submit" value="Enregistrer" />

    <hr>

    Gerer les restaurants que j'aime : <br />
    <?php
    for ($i = 0; $i < count($mesRestosAimes); $i++) {
        $unResto = $mesRestosAimes[$i];
        ?>
        <input type="checkbox" name="lstidR[]" id="resto<?= $i ?>" value="<?= $unResto->getIdR() ?>" >
        <label for="resto<?= $i ?>"><?= $unResto->getNomR() ?></label><br />
    <?php }
    ?>
    <input type="submit" value="Supprimer" />
    <hr>

    Ajouter des Types de cuisines que j'aime : <br />
    <?php
    $k = 0;
    for ($i = 0; $i < count($mesTagsPasAimes); $i++) {
        $unTag = $mesTagsPasAimes[$i];
        ?>
        <input type="checkbox" name="lsaddTag[]" id="resto<?= $i ?>" value="<?= $unTag->getIdTC() ?>" >
        <label for="resto<?= $i ?>"><?= $unTag->getLibelle() ?></label>
        <?php
        if ($k >= 3) {
            $k = 0;
            ?><br/><?php
        } else {
            $k = $k + 1
            ?><?php
        }
        ?>
        <?php
    }
    ?>
    <br/>   
    <input type="submit" value="Ajouter" />
    <hr>


    Suprimmer des Types de cuisines que j'ai aimé : <br />
    <?php
    $f = 0;
    for ($i = 0; $i < count($mesTagsAimes); $i++) {
        $unTag = $mesTagsAimes[$i];
        ?>
        <input type="checkbox" name="lsrmTag[]" id="resto<?= $i ?>" value="<?= $unTag->getIdTC() ?>" >
        <label for="resto<?= $i ?>"><?= $unTag->getLibelle() ?></label>
        <?php
        if ($f >= 3) {
            $f = 0;
            ?><br/><?php
        } else {
            $f = $f + 1
            ?><?php
        }
        ?>
        <?php
    }
    ?>
    <br/>
    <input type="submit" value="Supprimer" />
    <hr>



    <br /><br />

</form>


