<?php
	class Titre{
		private int $id;
		private string $name, $prerequisite;

		public function __construct(string $name = '', string $prerequisite = ''){
				$this->id = 0;
				$this->name = $name;
				$this->prerequisite = $prerequisite;
		}

		public function getId(): int{
			return $this->id;
		}

		public function setId(int $id): void{
			$this->id = $id;
		}

		public function getName(): string{
			return $this->name;
		}

		public function setName(string $name): void{
			$this->name = $name;
		}

		public function getPrerequisite(): string{
			return $this->prerequisite;
		}

		public function setPrerequisite(string $prerequisite): void{
			$this->prerequisite = $prerequisite;
		}
	}