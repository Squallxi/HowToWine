<?php

	class Quiz{
		private int $id;
		private ?int $id_theme;
		private string $entitled, $quiz_img;
		private $subTheme = array();

		public function __construct(string $entitled = '', ?int $id_theme = null, string $quiz_img ='', $subTheme = array()){
				$this->id = 0;
				$this->entitled = $entitled;
				$this->id_theme = $id_theme;
				$this->quiz_img = $quiz_img;
				$this->setSubThemes($subTheme);
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
		public function getIdTheme(): ?int{
			return $this->id_theme;
		}

		public function setIdTheme(?int $id_theme): void{
			$this->id_theme = $id_theme;
		}		
		public function getQuizImg(): string{
			return $this->quiz_img;
		}

		public function setQuizImg(string $quiz_img): void{
			$this->quiz_img = $quiz_img;
		}
		public function getSubThemes(): array{
			return $this->subTheme;
		}
	
		public function setSubThemes($subTheme = array()): void{
			$this->subTheme = $subTheme;
		}	
	}