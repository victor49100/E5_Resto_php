<?php
/**
 * --------------
 * vueListeRestos
 * --------------
 * 
 * @version 07/2021 par NB : intégration couche modèle objet
 * @version 09/2021 par NC : remplace vueResultRecherche
 * 
 * Variables transmises par le contrôleur listeRestos ou rechercheresto contenant les données à afficher : 
  ---------------------------------------------------------------------------------------- */
/** @var array $listeRestos les restaurants filtrés */
/**
 * Variables supplémentaires :  
  ------------------------- */
/** @var Resto $unResto */
/** @var array $lesPhotos */
/** @var Photo $unePhoto */
?>
<h1>Liste des restaurants</h1>

<?php
foreach ($listeRestos as $unResto) {

    $lesPhotos = $unResto->getLesPhotos();
    ?>
    <div class="card">
        <div class="photoCard">
            <?php
            if (count($lesPhotos) > 0) {
                $unePhoto = $lesPhotos[0];
                ?>
                <img src="photos/<?= $unePhoto->getCheminP() ?>" alt="photo du restaurant" />
                <?php
            }
            ?>

        </div>
        <div class="descrCard">
            <a href="./?action=detail&idR=<?= $unResto->getIdR() ?>"><?= $unResto->getNomR() ?></a>
            <br />
            <?= $unResto->getNumAdr() ?>
            <?= $unResto->getVoieAdr() ?>
            <br />
            <?= $unResto->getCpR() ?>
            <?= $unResto->getVilleR() ?>
            
            <?php foreach ($unResto->getLesTags() as $leTag) { ?>
                <?= '#' . $leTag->getLibelle() . ' '; ?>

            <?php } ?>
        </div>

    </div>
    <?php
}
?>
