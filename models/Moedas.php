<?php
	class Moedas extends model {

		public function getMoedas() {

			$mdc = new Mdc();
			$id_mdc = $mdc->getMdcUsuarioId($_SESSION['usuario']);

			$array = array();

			$sql = $this->connection->query("SELECT moeda.id, nome_moeda FROM moeda 	
			WHERE id_mdc = ".$id_mdc);

			if($sql->rowCount() > 0) {

				$array = $sql->fetchAll();

				return $array;
			}
		} 
	}
?>