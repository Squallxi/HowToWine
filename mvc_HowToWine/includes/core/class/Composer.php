<?php

	class Composer{
		private int $idQuestionnaire;
        private int $idQuestion;

		public function __construct(int $idQuestionnaire = 0, int $idQuestion = 0){
				$this->idQuestionnaire = $idQuestionnaire;
				$this->idQuestion = $idQuestion;
		}

		public function getIdQuestion(): int{
			return $this->idQuestionnaire;
		}

		public function setIdQuestion(int $idQuestionnaire): void{
			$this->idQuestionnaire = $idQuestionnaire;
		}

		public function getIdReponse(): int{
			return $this->idQuestion;
		}

		public function setIdReponse(int $idQuestion): void{
			$this->idQuestion = $idQuestion;
		}

		
	}