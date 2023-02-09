<?php

	class Associer{
		private int $idQuestion;
        private int $idReponses;

		public function __construct(int $idQuestion = 0, int $idReponses = 0){
				$this->idQuestion = $idQuestion;
				$this->idReponses = $idReponses;
		}

		public function getIdQuestion(): int{
			return $this->idQuestion;
		}

		public function setIdQuestion(int $idQuestion): void{
			$this->idQuestion = $idQuestion;
		}

		public function getIdReponse(): int{
			return $this->idReponses;
		}

		public function setIdReponse(int $idReponses): void{
			$this->idReponses = $idReponses;
		}

		
	}