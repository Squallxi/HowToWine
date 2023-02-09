<?php

	class Reponses{
		private int $id;

		public function __construct(){
				
		}

		public function getIdQuestion(): int{
			return $this->id;
		}

		public function setIdQuestion(int $id): void{
			$this->id = $id;
		}	
	}