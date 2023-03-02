<?php

	class Personne{
		private int $id;
		private string $pseudo, $email, $photoProfil, $password;

		public function __construct(string $pseudo = '', string $email = '', string $photoProfil = '', string $password =''){
				$this->id = 0;
				$this->pseudo = $pseudo;
				$this->email = $email;
				$this->photoProfil = $photoProfil;
				$this->password = $password;
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
			return $this->photoProfil;
		}

		public function setPhotoProfil(string $photoProfil): void{
			$this->photoProfil = $photoProfil;
		}

		public function getPassword(): string{
			return $this->password;
		}

		public function setPassword(string $password): void{
			$this->password = $password;
		}		
	}