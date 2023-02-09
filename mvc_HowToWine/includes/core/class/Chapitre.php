<?php

	class Chapitre{
		private int $id, $idLecon;
		private string $nomChapitre, $Contenu;

		public function __construct(string $nomChapitre = '', string $Contenu = '', int $idLecon = 0){
				$this->nomChapitre = $nomChapitre;
				$this->Contenu = $Contenu;
				$this->idLecon = $idLecon;
		}

		public function getId(): int{
			return $this->id;
		}

		public function setId(int $id): void{
			$this->id = $id;
		}

		public function getChapitre(): string{
			return $this->nomChapitre;
		}

		public function setChapitre(string $nomChapitre): void{
			$this->nomChapitre = $nomChapitre;
		}

		public function getContenu(): string{
			return $this->Contenu;
		}

		public function setContenu(string $Contenu): void{
			$this->Contenu = $Contenu;
		}

		public function getIdLecon(): int{
			return $this->idLecon;
		}

		public function setIdLecon(int $idLecon): void{
			$this->idLecon = $idLecon;
		}
	}