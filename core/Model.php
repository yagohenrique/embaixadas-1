<?php
	class Model {
		
		protected $connection;

		public function __construct() {
			global $connection;
			$this->connection = $connection;
		}
	}
?>