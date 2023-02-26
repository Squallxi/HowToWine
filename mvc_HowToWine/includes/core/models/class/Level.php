<?php

	class Level{
		private int $id;
		private string $name, $content;

		public function __construct(string $name = '', string $content = ''){
				$this->id = 0;	
				$this->name = $name;
				$this->content = $content;
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

		public function getContent(): string{
			return $this->content;
		}

		public function setContent(string $content): void{
			$this->content = $content;
		}
    }