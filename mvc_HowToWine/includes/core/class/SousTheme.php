<?php

	class SousTheme{
		private int $id, $id_theme;
		private string $nom;
		private $questions = array();

		public function __construct(string $nom = '', int $id_theme = 0, $questions = array()){
				$this->nom = $nom;
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
			return $this->nom;
		}

		public function setName(string $nom): void{
			$this->nom = $nom;
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