<?php

class Personnage {
    private string $nom;
    private int $hp;
    private int $atk;

    public function __construct(string $nom, int $hp, int $atk) {
        $this->nom = $nom;
        $this->hp = max(0, $hp);
        $this->atk = max(0, $atk);
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getHp(): int {
        return $this->hp;
    }

    public function getAtk(): int {
        return $this->atk;
    }

    public function attaquer(Personnage $adversaire) {
        $adversaire->recevoirDegats($this->atk);
    }

    public function recevoirDegats(int $degats) {
        $this->hp = max(0, $this->hp - $degats);
    }

    public function estVivant(){
        return $this->hp > 0;
    }
}