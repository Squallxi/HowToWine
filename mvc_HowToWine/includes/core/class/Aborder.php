<?php

	class Aborder{

		private int $idQuestion, $idViticulture, $idElevage, $idVinification;

		public function __construct(int $idQuestion = 0, int $idViticulture = 0, int $idElevage= 0, int $idVinification = 0){
				$this->idQuestion = $idQuestion;
				$this->idViticulture = $idViticulture;
				$this->idElevage = $idElevage;
				$this->idVinification = $idVinification;
		}

		public function getIdQuestion(): int{
			return $this->idQuestion;
		}

		public function setIdQuestion(int $idQuestion): void{
			$this->idQuestion = $idQuestion;
		}

		public function getIdViticulture(): int{
			return $this->idViticulture;
		}

		public function setIdViticulture(int $idViticulture): void{
			$this->idViticulture = $idViticulture;
		}

		public function getIdElevage(): int{
			return $this->idElevage;
		}

		public function setIdElevage(int $idElevage): void{
			$this->idElevage = $idElevage;
		}

		public function getIdVinification(): int{
			return $this->idVinification;
		}

		public function setIdVinification(int $idVinification): void{
			$this->idVinification = $idVinification;
		}	
	}