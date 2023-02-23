<?php

	class Reponse{
		private int $id;
		private string $libelle;
		private bool $bonne_reponse;

		public function __construct(string $libelle ="", bool $bonne_reponse= false){
			$this->libelle = $libelle;
			$this->bonne_reponse = $bonne_reponse;
		}

		public function getIdReponse(): int{
			return $this->id;
		}

		public function setIdReponse(int $id): void{
			$this->id = $id;
		}
		public function getLibelleReponse(): string{
			return $this->libelle;
		}

		public function setLibelleReponse(string $libelle): void{
			$this->libelle = $libelle;
		}	
		public function getBonneReponse(): bool{
			return $this->bonne_reponse;
		}

		public function setBonneReponse(bool $bonne_reponse): void{
			$this->bonne_reponse = $bonne_reponse;
		}		
	}