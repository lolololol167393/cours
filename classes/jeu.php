<?php

   require_once 'personnage.php';

   class Jeu {
      private Personnage $chevalier;
      private Personnage $dragon;
      private string $logCombat = "";

      public function __construct(Personnage $chevalier, Personnage $dragon) {
         $this->chevalier = $chevalier;
         $this->dragon = $dragon;
      }
      public function lancerCombat(): string {
      while ($this->chevalier->estVivant() && $this->dragon->estVivant()) {
         $chev_nb = rand(1, 7);
         $drag_nb = rand(1, 7);

         if ($chev_nb > $drag_nb) {
            $this->dragon->recevoirDegats($this->chevalier->getAtk());
            $this->logCombat .= "{$this->chevalier->getNom()} attaque {$this->dragon->getNom()} (-{$this->chevalier->getAtk()} HP)<br>";
         } else {
            $this->chevalier->recevoirDegats($this->dragon->getAtk());
            $this->logCombat .= "{$this->dragon->getNom()} attaque {$this->chevalier->getNom()} (-{$this->dragon->getAtk()} HP)<br>";
         }
      }
      if ($this->chevalier->estVivant()) {
         $this->logCombat .= "<strong>{$this->chevalier->getNom()} a gagné !</strong>";
      } else {
         $this->logCombat .= "<strong>{$this->dragon->getNom()} a gagné !</strong>";
      }
      return $this->logCombat;
      }
   }
?>