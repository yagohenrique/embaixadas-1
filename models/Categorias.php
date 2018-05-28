<?php
	class Categorias extends model {

		public function getCategoria($tipo) {

			$array = array();
			
			$sql = $this->connection->query("SELECT id, nome_categoria FROM categorias 
			WHERE tipo = '$tipo'");

			if($sql->rowCount() > 0) {

				$array = $sql->fetchAll();

				return $array;
			}
		} 
	}
?>