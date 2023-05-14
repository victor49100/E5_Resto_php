<?php
namespace modele\metier;
use modele\metier\Tags;

class Tags{
    private ?int $idTC;
    private ?string $Libelle;
    
    function __construct(?int $idTC,?string $Libelle) {
        $this->Libelle = $Libelle;
        $this->idTC = $idTC;
    }
    
    public function getIdTC(): ?int {
        return $this->idTC;
    }

    public function getLibelle(): ?string {
        return $this->Libelle;
    }

    public function setIdTC(?int $idTC): void {
        $this->idTC = $idTC;
    }

    public function setLibelle(?string $Libelle): void {
        $this->Libelle = $Libelle;
    }


}