<?php

	class Questionnaire{
		private int $id;

		public function __construct(){
				
		}

		public function getIdQuestionnaire(): int{
			return $this->id;
		}

		public function setIdQuestionnaire(int $id): void{
			$this->id = $id;
		}	
	}