<?php

	class Respond{
		private int $idPerson, $idAnswer, $idSubTheme, $idQuiz;
		public function __construct(int $idPerson = 0, int $idAnswer = 0, int $idSubTheme = 0, int $idQuiz = 0){
				$this->idPerson = $idPerson;
				$this->idAnswer = $idAnswer;
				$this->idSubTheme = $idSubTheme;
				$this->idQuiz = $idQuiz;
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
		public function getIdSubTheme(): int{
			return $this->idSubTheme;
		}

		public function setIdSubTheme(int $idSubTheme): void{
			$this->idSubTheme = $idSubTheme;
		}	
		public function getIdQuiz(): int{
			return $this->idQuiz;
		}

		public function setIdQuiz(int $idQuiz): void{
			$this->idQuiz = $idQuiz;
		}	
	}