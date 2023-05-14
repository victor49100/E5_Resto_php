<?php

namespace modele\metier;

/**
 * Description of Utilisateur
 * Données relatives à un utilisateur du site resto
 * @author N. Bourgeois
 * @version 07/2021
 */
class Utilisateur {

    /** @var int identifiant, valeur auto-incrémentée dans la BDD  */
    private int $idU;

    /** @var string adresse de courrier électronique */
    private string $mailU;

    /** @var string mot de passe chiffré */
    private ?string $mdpU;

    /** @var string pseudonyme */
    private ?string $pseudoU;

    /** @var array tableau<Resto> : liste des restaurants "aimés" par l'utilisateur */
    private array $lesRestosAimes;
    private array $lesTagsAimes;
    private array $lesTagsPasAimes;
    private bool $estAdmin;

    function __construct(int $idU, string $mailU, ?string $mdpU, ?string $pseudoU) {
        $this->idU = $idU;
        $this->mailU = $mailU;
        $this->mdpU = $mdpU;
        $this->pseudoU = $pseudoU;
        $this->lesTagsAimes = array();
        $this->lesTagsPasAimes = array();
        $this->lesRestosAimes = array();
        
    }

    public function __toString() {
        return get_class() . "{id=" . $this->idU . ", mail=" . $this->mailU . " ,mdp=" . $this->mdpU . " ,pseudo=" . $this->pseudoU . $this->estAdmin . ", ... }";
    }

    public function getEstAdmin(): bool {
        return $this->estAdmin;
    }

    public function setEstAdmin(bool $estAdmin): void {
        $this->estAdmin = $estAdmin;
    }

    function getIdU(): int {
        return $this->idU;
    }

    function getMailU(): string {
        return $this->mailU;
    }

    function getMdpU(): ?string {
        return $this->mdpU;
    }

    function getPseudoU(): ?string {
        return $this->pseudoU;
    }

    public function getLesTagsAimes(): array {
        return $this->lesTagsAimes;
    }

    public function setLesTagsAimes(array $lesTagsAimes): void {
        $this->lesTagsAimes = $lesTagsAimes;
    }

    function getLesRestosAimes(): array {
        return $this->lesRestosAimes;
    }

    public function getLesTagsPasAimes(): array {
        return $this->lesTagsPasAimes;
    }

    public function setLesTagsPasAimes(array $lesTagsPasAimes): void {
        $this->lesTagsPasAimes = $lesTagsPasAimes;
    }

    function setIdU(int $idU): void {
        $this->idU = $idU;
    }

    function setMailU(string $mailU): void {
        $this->mailU = $mailU;
    }

    function setMdpU(string $mdpU): void {
        $this->mdpU = $mdpU;
    }

    function setPseudoU(string $pseudoU): void {
        $this->pseudoU = $pseudoU;
    }

    function setLesRestosAimes(array $lesRestosAimes): void {
        $this->lesRestosAimes = $lesRestosAimes;
    }

}
