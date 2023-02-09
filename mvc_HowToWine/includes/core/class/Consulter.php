<?php

	class Consulter{
		private int $idLecon;
        private int $idPersonne;

		public function __construct(int $idLecon = 0, int $idPersonne = 0){
				$this->idLecon = $idLecon;
				$this->idPersonne = $idPersonne;
		}

		public function getIdLecon(): int{
			return $this->idLecon;
		}

		public function setIdLecon(int $idLecon): void{
			$this->idLecon = $idLecon;
		}

		public function getIdPersonne(): int{
			return $this->idPersonne;
		}

		public function setIdPersonne(int $idPersonne): void{
			$this->idPersonne = $idPersonne;
		}

		
	}