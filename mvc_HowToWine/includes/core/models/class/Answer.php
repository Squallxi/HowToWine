<?php

	class Answer{
		private int $id;
		private string $content;
		private bool $good_anwser;

		public function __construct(string $content ="", bool $good_anwser= false){
			$this->id = 0;
			$this->content = $content;
			$this->good_anwser = $good_anwser;
		}

		public function getId(): int{
			return $this->id;
		}

		public function setId(int $id): void{
			$this->id = $id;
		}
		public function getContent(): string{
			return $this->content;
		}

		public function setContent(string $content): void{
			$this->content = $content;
		}	
		public function getGoodAnwser(): bool{
			return $this->good_anwser;
		}

		public function setGoodAnwser(bool $good_anwser): void{
			$this->good_anwser = $good_anwser;
		}		
	}