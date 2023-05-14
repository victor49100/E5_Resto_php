<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>AimerDAO : tests unitaires</title>
    </head>

    <body>

        <?php
        use modele\metier\Utilisateur;
        use modele\dao\UtilisateurDAO;
        use modele\dao\Bdd;

require_once '../../includes/autoload.inc.php';

        try {
            Bdd::connecter();
            ?>
            <h3>1- Utilisateur Admin</h3>
            <?php
            $unIdU = 1;
            $adm = UtilisateurDAO::estAdmin($unIdU);
            $user = new Utilisateur($unIdU, 'test@bts.sio', 'seSzpoUAQgIl', 'testeur SIO');
            $user->setEstAdmin($adm)
            ?>
            est Admin ? : 
            <?php var_dump($user); ?>
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