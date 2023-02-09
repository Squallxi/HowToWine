<?php

	class Lecon{
		private int $id;
        private int $titre;

		public function __construct(int $id = '', int $titre = ''){
				$this->id = $id;
				$this->titre = $titre;
		}

		public function getId(): int{
			return $this->id;
		}

		public function setId(int $id): void{
			$this->id = $id;
		}

		public function getTitre(): int{
			return $this->titre;
		}

		public function setTitre(int $titre): void{
			$this->titre = $titre;
		}
	}