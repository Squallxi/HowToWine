<?php

	class Question{
		private int $id;
		private string $intitule;
		private $reponses = array();

		public function __construct(string $intitule = ""){
			$this->id = 0;
			$this->intitule = $intitule;
			$this->reponses = array();
		}

		public function getIdQuestion(): int{
			return $this->id;
		}

		public function setIdQuestion(int $id): void{
			$this->id = $id;
		}
		public function getIntitule(): string{
			return $this->intitule;
		}

		public function setIntitule(string $intitule): void{
			$this->intitule = $intitule;
		}
			
		public function getReponses(): array{
			return $this->reponses;
		}
	
		public function setReponse($reponses = array()): void{
			$this->reponses = $reponses;
		}			
	}