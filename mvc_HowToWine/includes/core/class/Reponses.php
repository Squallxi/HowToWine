<?php

	class Reponses{
		private int $id;

		public function __construct(){
				
		}

		public function getIdReponses(): int{
			return $this->id;
		}

		public function setIdReponses(int $id): void{
			$this->id = $id;
		}	
	}