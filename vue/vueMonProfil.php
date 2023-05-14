<?php
/**
 * --------------
 * vueMonProfil
 * --------------
 * 
 * @version 07/2021 par NB : intégration couche modèle objet
 * 
 * Variables transmises par le contrôleur detailResto contenant les données à afficher : 
  ---------------------------------------------------------------------------------------- */
/** @var Utilisateur  $util utilisteur à afficher */
/** @var array $mesRestosAimes  */
/** @var int $idU  */
/** @var string $mailU  */
/**
 * Variables supplémentaires :  
  ------------------------- */
/** @var Resto $unResto */
?>

<h1>Mon profil</h1>

Mon adresse électronique : <?= $util->getMailU() ?> <br />
Mon pseudo : <?= $util->getPseudoU() ?> <br />
Administrateur : <?php
if ($util->getEstAdmin() === false) {
    ?> NON <?php
} else {
    ?> OUI <?php
}
?> <br/>

<hr>

les restaurants que j'aime : <br />
<?php
foreach ($mesRestosAimes as $unResto) {
    ?>
    <a href="./?action=detail&idR=<?= $unResto->getIdR() ?>"><?= $unResto->getNomR() ?></a><br />
    <?php
}
?>

<hr>
les types de cuisine que j'aime : <br />

<?php
$mesTagsAimes = modele\dao\TagsDAO::getTagsAimer($idU);
for ($i = 0; $i < count($mesTagsAimes); $i++) {
    $unTag = $mesTagsAimes[$i];
    ?>
    <div class="lesTags" ><?= $unTag->getLibelle() ?></div>
    <?php
}
?>
<?php
if ($util->getEstAdmin() === True) {
    ?> <a href="./?action=admin">Mode Administrateur </a> <?php
} else {
    ?><?php
}
?>

<br/>
<a href="./?action=deconnexion">se deconnecter</a>


