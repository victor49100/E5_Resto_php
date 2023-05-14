<?php

use modele\dao\Bdd;
use modele\dao\UtilisateurDAO;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


$idU = getIdULoggedOn();
$mailU = getMailULoggedOn();
$util = UtilisateurDAO::getOneById($idU);
$titre = "page d'administration";
if (isLoggedOn()) {

    if ($util->getEstAdmin() === false) {
        ?> 
        <div style="text-align:center; padding: 35px; font-size: 19px">Vous n'êtes pas administrateur ! <br> Vous allez être redirigé vers l'accueil dans 3 secondes...</div>
        <?php
        header('Refresh: 3; URL=http://localhost/Resto/ProjetBase/projet-resto/?action=accueil');
        exit;
    } else {
        require_once "$racine/vue/entete.html.php";
        ?> <h1>Menu administration</h1><?php
        ?> 
        <div style="text-align:center; padding: 35px; font-size: 19px">Page d'administration</div>
            <?php
        }
    } else {
        ?> 
    <div style="text-align:center; padding: 35px; font-size: 19px">Vous n'êtes pas administrateur ! <br> Vous allez être redirigé vers l'accueil dans 3 secondes...</div>
        <?php
        header('Refresh: 3; URL=http://localhost/Resto/ProjetBase/projet-resto/?action=accueil');
        exit;
    }
    ?> <br/>