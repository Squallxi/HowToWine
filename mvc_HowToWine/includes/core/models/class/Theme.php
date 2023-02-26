<?php

	class Theme{
		private int $id, $idLesson;
		private string $themeName, $content, $logoTheme;

		public function __construct(string $themeName = '', string $content = '', string $logoTheme = '', int $idLesson = 0){
				$this->id = 0;
				$this->themeName = $themeName;
				$this->content = $content;
				$this->logoTheme = $logoTheme;
				$this->idLesson = $idLesson;
		}

		public function getId(): int{
			return $this->id;
		}

		public function setId(int $id): void{
			$this->id = $id;
		}
		public function getIdLesson(): int{
			return $this->idLesson;
		}

		public function setIdLesson(int $idLesson): void{
			$this->idLesson = $idLesson;
		}

		public function getName(): string{
			return $this->themeName;
		}

		public function setName(string $themeName): void{
			$this->themeName = $themeName;
		}

		public function getContent(): string{
			return $this->content;
		}

		public function setContent(string $content): void{
			$this->content = $content;
		}
		public function getLogoTheme(): string{
			return $this->logoTheme;
		}

		public function setLogoTheme(string $logoTheme): void{
			$this->logoTheme = $logoTheme;
		}
    }