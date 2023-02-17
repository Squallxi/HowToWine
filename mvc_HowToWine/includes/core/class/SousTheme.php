<?php

	class SousTheme{
		private int $id, $id_theme;
		private string $nom;

		public function __construct(string $nom = '', int $id_theme = 0){
				$this->nom = $nom;
				$this->id_theme = $id_theme;
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
    }