<?php

	class Question{
		private int $id;
		private string $entitled;
		private $answers = array();

		public function __construct(string $entitled = ""){
			$this->id = 0;
			$this->entitled = $entitled;
			$this->answers = array();
		}

		public function getId(): int{
			return $this->id;
		}

		public function setId(int $id): void{
			$this->id = $id;
		}
		public function getEntitled(): string{
			return $this->entitled;
		}

		public function setEntitled(string $entitled): void{
			$this->entitled = $entitled;
		}
			
		public function getAnswers(): array{
			return $this->answers;
		}
	
		public function setAnswers($answers = array()): void{
			$this->answers = $answers;
		}			
	}