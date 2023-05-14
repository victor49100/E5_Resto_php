<?php

use modele\dao\Bdd;
use modele\dao\RestoDAO;
//
/**
 * Contrôleur rechercheResto
 * Gère la recherche de restaurants par filtrage
 * 
 * Vues contrôlées : vueRechercheResto, vueListeRestos
 * Données GET : critere (nom, adresse, multi) = critere de filtrage
 * 
 * @version 07/2021 intégration couche modèle objet
 */
Bdd::connecter();

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url" => "./?action=recherche&critere=nom", "label" => "Recherche par nom");
$menuBurger[] = Array("url" => "./?action=recherche&critere=adresse", "label" => "Recherche par adresse");
$menuBurger[] = Array("url" => "./?action=recherche&critere=type", "label" => "Recherche par type de cuisine");
$menuBurger[] = Array("url" => "./?action=recherche&critere=multi", "label" => "Recherche multicritère");

// recuperation des donnees GET, POST, et SESSION
// critere de recherche par defaut : le nom
$testPostal = 00000;
$critere = "nom";
if (isset($_GET["critere"])) {
    $critere = $_GET["critere"];
}

$nomR = "";
if (isset($_POST["nomR"])) {
    $nomR = $_POST["nomR"];
}

$voieAdrR = "";
if (isset($_POST["voieAdrR"])) {
    $voieAdrR = $_POST["voieAdrR"];
}

$cpR = "";
if (isset($_POST["cpR"])) {
    if (preg_match("#^[0-9]{5}$#",$_POST["cpR"]) || $_POST["cpR"] === "") {
        $cpR = $_POST["cpR"];
    } else {
        ajouterMessage("le code postal saisi est mauvais");
        unset($_POST);
    }
}

$villeR = "";
if (isset($_POST["villeR"])) {
    $villeR = $_POST["villeR"];
}


//$tabIdTC = array("0"=>2);
//if (isset($_POST["tabIdTC"])) {
//    $tabIdTC = $_POST["tabIdTC"];
//}

//iteration5 recuperer le typeCuisine apres recherche
$tagR = 0 ;
if (isset($_POST["listeTags"])) {
    $tagR = $_POST["listeTags"];
}


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage
switch ($critere) {
    case 'nom':
        // recherche par nom
        $listeRestos = RestoDAO::getAllByNomR($nomR);
        break;
    case 'adresse':
        // recherche par adresse
        $listeRestos = RestoDAO::getAllByAdresse($voieAdrR, $cpR, $villeR);
        break;
    case 'multi':
        // recherche multi-critere
        $listeRestos = RestoDAO::getAllMultiCriteres($nomR, $voieAdrR, $cpR, $villeR, $tagR);
        break;
    case 'type':
    // recher par type de cuisine
    $listeRestos = RestoDAO::getAllByTag($tagR);
}


// Construction de la vue
$titre = "Recherche d'un restaurant";
require_once "$racine/vue/entete.html.php";
if (empty($_POST)) {
    require_once "$racine/vue/vueRechercheResto.php";
} else {
    // affichage des resultats de la recherche
    include "$racine/vue/vueListeRestos.php";
}
require_once "$racine/vue/pied.html.php";
