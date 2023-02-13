<?php

	class Niveau{
		private int $id;
		private string $nomNiveau, $Contenu;

		public function __construct(string $nomNiveau = '', string $Contenu = ''){
				$this->nomNiveau = $nomNiveau;
				$this->Contenu = $Contenu;
		}

		public function getId(): int{
			return $this->id;
		}

		public function setId(int $id): void{
			$this->id = $id;
		}

		public function getName(): string{
			return $this->nomNiveau;
		}

		public function setName(string $nomNiveau): void{
			$this->nomNiveau = $nomNiveau;
		}

		public function getContenu(): string{
			return $this->Contenu;
		}

		public function setContenu(string $Contenu): void{
			$this->Contenu = $Contenu;
		}
    }