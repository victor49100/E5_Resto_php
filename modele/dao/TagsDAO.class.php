<?php

namespace modele\dao;

use modele\metier\Tags;
use modele\dao\Bdd;
use PDO;
use PDOException;
use Exception;

class TagsDAO {

//recupere les tags d'un resturant via son id

    public static function getTagsByIdr(int $idR): array {
        $lesTags = array();
        try {
            $requete = "SELECT tc.idTC,tc.libelleTC FROM resto r
        INNER JOIN hashtag h ON r.idR = h.idR
        INNER JOIN type_cuisine tc ON h.idTC = tc.idTC
        WHERE r.idR = :idR;
        ";
            $stmt = Bdd::getConnexion()->prepare($requete);
            $stmt->bindParam(':idR', $idR, PDO::PARAM_INT);
            $ok = $stmt->execute();
            if ($ok) {
// Pour chaque enregistrement
                while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $lesTags[] = new Tags($enreg['idTC'], $enreg['libelleTC']);
                }
            }
        } catch (PDOException $e) {
            throw new Exception("Erreur dans la méthode " . get_called_class() . "::getTagsByIdr : <br/>" . $e->getMessage());
        }
        return $lesTags;
    }

// iteration 5 recupère les restaurants via le tag

    public static function getAllTags(): array {
        $lesTags = array();
        try {
            $requete = "SELECT * FROM type_cuisine;";
            $stmt = Bdd::getConnexion()->query($requete);
            $ok = $stmt->execute();
            if ($ok) {
                // Pour chaque enregistrement
                while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    //enregistrelent objet tags
                    $lesTags[] = new Tags($enreg['idTC'], $enreg['libelleTC']);
                }
            }
        } catch (PDOException $e) {
            throw new Exception("Erreur dans la méthode " . get_called_class() . "::getTagsByIdr : <br/>" . $e->getMessage());
        }
        return $lesTags;
    }

    public static function getTagsAimer(int $idU): array {
        $lesTags = array();
        try {
            $requete = "SELECT tc.* FROM utilisateur util 
            INNER JOIN aimertc aTC ON util.idU = aTC.idU
            INNER JOIN type_cuisine tc ON tc.idTC = aTC.idTC
            WHERE util.idU = :idU;";
            $stmt = Bdd::getConnexion()->prepare($requete);
            $stmt->bindParam(':idU', $idU, PDO::PARAM_INT);
            $ok = $stmt->execute();
            if ($ok) {
                // Pour chaque enregistrement
                while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $lesTags[] = new Tags($enreg['idTC'], $enreg['libelleTC']);
                }
            }
        } catch (PDOException $e) {
            throw new Exception("Erreur dans la méthode " . get_called_class() . "::getTagsAimer : <br/>" . $e->getMessage());
        }
        return $lesTags;
    }

    public static function getTagsPasAimer(int $idU): array {
        $lesTags = array();
        try {
            $requete = "SELECT tc.* FROM type_cuisine tc
            WHERE tc.idTC
            NOT IN (SELECT tc.idTC FROM utilisateur util 
            INNER JOIN aimertc aTC ON util.idU = aTC.idU
            INNER JOIN type_cuisine tc ON tc.idTC = aTC.idTC
            WHERE util.idU = :idU)";
            $stmt = Bdd::getConnexion()->prepare($requete);
            $stmt->bindParam(':idU', $idU, PDO::PARAM_INT);
            $ok = $stmt->execute();
            if ($ok) {
                // Pour chaque enregistrement
                while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $lesTags[] = new Tags($enreg['idTC'], $enreg['libelleTC']);
                }
            }
        } catch (PDOException $e) {
            throw new Exception("Erreur dans la méthode " . get_called_class() . "::getTagsAimer : <br/>" . $e->getMessage());
        }
        return $lesTags;
    }

}
