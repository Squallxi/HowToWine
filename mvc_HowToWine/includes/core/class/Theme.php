<?php

	class Theme{
		private int $id, $idLecon;
		private string $nomTheme, $Contenu, $logoTheme;

		public function __construct(string $nomTheme = '', string $Contenu = '', string $logoTheme = '', int $idLecon = 0){
				$this->nomTheme = $nomTheme;
				$this->Contenu = $Contenu;
				$this->logoTheme = $logoTheme;
				$this->idLecon = $idLecon;
		}

		public function getId(): int{
			return $this->id;
		}

		public function setId(int $id): void{
			$this->id = $id;
		}
		public function getIdLecon(): int{
			return $this->idLecon;
		}

		public function setIdLecon(int $idLecon): void{
			$this->idLecon = $idLecon;
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
		public function getLogoTheme(): string{
			return $this->logoTheme;
		}

		public function setLogoTheme(string $logoTheme): void{
			$this->logoTheme = $logoTheme;
		}
    }