<?php

	class Avatar{
		private int $id;
		private string $path, $baliseImg;
		public function __construct(string $baliseImg = "", string $path =""){
			$this->id = 0;
			$this->baliseImg = $baliseImg;
			$this->path = $path;
		}

		public function getId(): int{
			return $this->id;
		}

		public function setId(int $id): void{
			$this->id = $id;
		}
		public function getPath(): string{
			return $this->path;
		}

		public function setPath(string $path): void{
			$this->path = $path;
		}
		public function getBaliseImg(): string{
			return $this->baliseImg;
		}

		public function setBaliseImg(string $baliseImg): void{
			$this->baliseImg = $baliseImg;
		}				
	}