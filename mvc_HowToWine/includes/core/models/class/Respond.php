<?php

	class Respond{
		private int $idPerson, $idAnswer;
		public function __construct(int $idPerson = 0, int $idAnswer = 0){
				$this->idPerson = $idPerson;
				$this->idAnswer = $idAnswer;
		}

		public function getIdPerson(): int{
			return $this->idPerson;
		}

		public function setIdPerson(int $idPerson): void{
			$this->idPerson = $idPerson;
		}
		public function getIdAnswer(): int{
			return $this->idAnswer;
		}

		public function setIdAnswer(int $idAnswer): void{
			$this->idAnswer = $idAnswer;
		}	
	}