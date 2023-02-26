<?php

	class Chapter{
		private int $id, $idLesson, $idLevel, $idTheme;
		private string $name, $content;

		public function __construct(string $name = '', string $content = '', int $idLesson = 0, int $idLevel = 0,
		int $idTheme = 0){
				$this->id = 0;
				$this->name = $name;
				$this->content = $content;
				$this->idLesson = $idLesson;
				$this->idLevel = $idLevel;
				$this->idTheme = $idTheme;
		}

		public function getId(): int{
			return $this->id;
		}

		public function setId(int $id): void{
			$this->id = $id;
		}

		public function getChapter(): string{
			return $this->name;
		}

		public function setChapter(string $name): void{
			$this->name = $name;
		}

		public function getContent(): string{
			return $this->content;
		}

		public function setContent(string $content): void{
			$this->content = $content;
		}

		public function getIdLesson(): int{
			return $this->idLesson;
		}

		public function setIdLesson(int $idLesson): void{
			$this->idLesson = $idLesson;
		}
		public function getIdLevel(): int{
			return $this->idLevel;
		}

		public function setIdLevel(int $idLevel): void{
			$this->idLevel = $idLevel;
		}
		public function getIdTheme(): int{
			return $this->idTheme;
		}

		public function setIdTheme(int $idTheme): void{
			$this->idTheme = $idTheme;
		}
	}