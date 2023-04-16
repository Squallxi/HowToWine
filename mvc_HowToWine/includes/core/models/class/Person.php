<?php
require_once "Titre.php";
	class Person{
		private int $id;
		private string $pseudo, $email, $photo_Profil, $mot_de_passe;
		private ?Titre $titre;

		public function __construct(string $pseudo = '', string $email = '', string $photo_Profil = '', string $mot_de_passe ='',?Titre $titre = null){
				$this->id = 0;
				$this->pseudo = $pseudo;
				$this->email = $email;
				$this->photo_Profil = $photo_Profil;
				$this->mot_de_passe = $mot_de_passe;
				$this->titre = $titre ?? new Titre;
		}

		public function getId(): int{
			return $this->id;
		}

		public function setId(int $id): void{
			$this->id = $id;
		}

		public function getPseudo(): string{
			return $this->pseudo;
		}

		public function setPseudo(string $pseudo): void{
			$this->pseudo = $pseudo;
		}

		public function getEmail(): string{
			return $this->email;
		}

		public function setEmail(string $email): void{
			$this->email = $email;
		}

		public function getPhotoProfil(): string{
			return $this->photo_Profil;
		}

		public function setPhotoProfil(string $photo_Profil): void{
			$this->photo_Profil = $photo_Profil;
		}

		public function getPassword(): string{
			return $this->mot_de_passe;
		}

		public function setPassword(string $mot_de_passe): void{
			$this->mot_de_passe = $mot_de_passe;
		}
		public function getTitre(): ?Titre{
			return $this->titre;
		}

		public function setTitre(Titre $titre): void{
			$this->titre = $titre;
		}			
	}