<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>AimerDAO : tests unitaires</title>
    </head>

    <body>

        <?php

        use modele\dao\UtilisateurDAO;
        use modele\dao\Bdd;

        require_once '../../includes/autoload.inc.php';

        try {
            Bdd::connecter();
            ?>
             <h3>1- estAdmin</h3>
            <?php 
            $unIdU = 6; 
            $ok = UtilisateurDAO::estAdmin($unIdU);
            ?>
            est Admin ? : 
            <?php var_dump($ok); ?>
            <?php
             
             
            Bdd::deconnecter();
        } catch (Exception $ex) {
            ?>
            <h4>*** Erreur récupérée : <br/> <?= $ex->getMessage() ?> <br/>***</h4>
            <?php
        }
        ?>

    </body>
</html>
