<?php

	class Theme{
		private int $id;
		private string $nomTheme, $Contenu;

		public function __construct(string $nomTheme = '', string $Contenu = ''){
				$this->nomTheme = $nomTheme;
				$this->Contenu = $Contenu;
				$this->idLecon = $idLecon;
		}

		public function getId(): int{
			return $this->id;
		}

		public function setId(int $id): void{
			$this->id = $id;
		}

		public function getName(): string{
			return $this->nomTheme;
		}

		public function setName(string $nomTheme): void{
			$this->nomTheme = $nomTheme;
		}

		public function getContenu(): string{
			return $this->Contenu;
		}

		public function setContenu(string $Contenu): void{
			$this->Contenu = $Contenu;
		}
    }