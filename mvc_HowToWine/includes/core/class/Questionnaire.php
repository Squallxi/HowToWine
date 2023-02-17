<?php

	class Questionnaire{
		private int $id;
		private ?int $id_theme;
		private string $intitule, $img_questionnaire;
		private $sous_theme = array();

		public function __construct(string $intitule = '', ?int $id_theme = null, string $img_questionnaire ='', $sous_theme = array()){
				$this->intitule = $intitule;
				$this->id_theme = $id_theme;
				$this->img_questionnaire = $img_questionnaire;
				$this->setSousThemes($sous_theme);
		}

		public function getId(): int{
			return $this->id;
		}

		public function setId(int $id): void{
			$this->id = $id;
		}
		public function getIntituleQuestionnaire(): string{
			return $this->intitule;
		}

		public function setIntituleQuestionnaire(string $intitule): void{
			$this->intitule = $intitule;
		}	
		public function getIdTheme(): ?int{
			return $this->id_theme;
		}

		public function setIdTheme(?int $id_theme): void{
			$this->id_theme = $id_theme;
		}		
		public function getImgQuestionnaire(): string{
			return $this->img_questionnaire;
		}

		public function setImgQuestionnaire(string $img_questionnaire): void{
			$this->img_questionnaire = $img_questionnaire;
		}
		public function getSousThemes(): array{
			return $this->sous_theme;
		}
	
		public function setSousThemes($sous_theme = array()): void{
			$this->sous_theme = $sous_theme;
		}	
	}