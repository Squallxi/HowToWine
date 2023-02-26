<?php

	class SubTheme{
		private int $id, $id_theme;
		private string $name;
		private $questions = array();

		public function __construct(string $name = '', int $id_theme = 0, $questions = array()){
				$this->id = 0;
				$this->name = $name;
				$this->id_theme = $id_theme;
				$this->setQuestions($questions);
		}

		public function getId(): int{
			return $this->id;
		}

		public function setId(int $id): void{
			$this->id = $id;
		}

		public function getName(): string{
			return $this->name;
		}

		public function setName(string $name): void{
			$this->name = $name;
		}

		public function getIdTheme(): int{
			return $this->id_theme;
		}

		public function setIdTheme(int $id_theme): void{
			$this->id_theme = $id_theme;
		}
		public function getQuestions(): array{
			return $this->questions;
		}
	
		public function setQuestions($questions = array()): void{
			$this->questions = $questions;
		}	
    }