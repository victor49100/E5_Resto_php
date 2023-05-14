<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TagsDAO : tests unitaires</title>
    </head>

    <body>

        <?php

        use modele\metier\Tags;
        use modele\dao\TagsDAO;
        use modele\dao\Bdd;
        use modele\dao\CritiqueDAO;

require_once '../../includes/autoload.inc.php';

        try {
            Bdd::connecter();
            ?>
            <h2>Test TagsDao</h2>
            
            <h3>1- getTagsAimer</h3>
            
            <?php
            $idU = 6;
            $lesTags[] = TagsDAO::getTagsAimer($idU);
            var_dump($lesTags);
            ?>

            <h3>1- getAllTags</h3>
            
           
            <?php
            $lesTags[] = TagsDAO::getAllTags();
            var_dump($lesTags);
            ?>
            
            <?php var_dump($ok); ?>
            <p>Après suppression, la critique subsiste-t-elle pour le restaurant d'id <?= $unIdR ?> ? </p>
            
                <?php
            var_dump(CritiqueDAO::getOneById($unIdR, $unIdU));
            
            //getTagsAimer

            Bdd::deconnecter();
        } catch (Exception $ex) {
            ?>
            <h4>*** Erreur récupérée : <br/> <?= $ex->getMessage() ?> <br/>***</h4>
            <?php
        }
        ?>

    </body>
</html>
