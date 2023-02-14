<?php

	class Lecon{
		private int $id;
        private string $titre;

		public function __construct(string $titre = ''){
				$this->titre = $titre;
		}

		public function getId(): int{
			return $this->id;
		}

		public function setId(int $id): void{
			$this->id = $id;
		}

		public function getTitre(): string{
			return $this->titre;
		}

		public function setTitre(string $titre): void{
			$this->titre = $titre;
		}
	}