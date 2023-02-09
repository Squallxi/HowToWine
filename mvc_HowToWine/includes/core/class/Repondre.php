<?php

	class Repondre{
		private int $idPersonne;
        private int $idReponses;

		public function __construct(int $idPersonne = 0, int $idReponses = 0){
				$this->idPersonne = $idPersonne;
				$this->idReponses = $idReponses;
		}

		public function getIdPersonne(): int{
			return $this->idPersonne;
		}

		public function setIdPersonne(int $idPersonne): void{
			$this->idPersonne = $idPersonne;
		}

		public function getIdReponses(): int{
			return $this->idReponses;
		}

		public function setIdReponses(int $idReponses): void{
			$this->idReponses = $idReponses;
		}

		
	}