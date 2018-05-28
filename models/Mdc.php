<?php
	class Mdc extends model {

		public function getMdc() {

			$array = array();

			$sql = "SELECT * FROM mdc";
			$sql = $this->connection->query($sql);

			if($sql->rowCount() > 0) {

				$array = $sql->fetchAll();

				return $array;
			}
		}

		public function getMdcUsuarioId($sessao) {

			$sql = $this->connection->prepare("SELECT mdc.id FROM mdc INNER JOIN usuarios 
			ON mdc.id = usuarios.id_mdc WHERE token_usuario = ?");

			$sql->bindValue(1, $sessao);
			$sql->execute();

			if($sql->rowCount() > 0) {
				
				$sql = $sql->fetch();
				$id_mdc = $sql['id'];

				return $id_mdc;
			}
		}

		public function getDadosMdc($sessao) {

			$array = array();

			$sql = $this->connection->prepare("SELECT mdc.id, nome_mdc, cidade_mdc, funcao_chefe, 
			adido_financeiro, nome_chefe  FROM mdc INNER JOIN usuarios 
			ON mdc.id = usuarios.id_mdc WHERE token_usuario = ?");

			$sql->bindValue(1, $sessao);
			$sql->execute();

			if($sql->rowCount() > 0) {
				
				$array = $sql->fetch();

				return $array;
			}
		}

		public function atualizarDadosMdc($funcao_chefe, $adido_financeiro, $nome_chefe, $id_mdc) {

			$sql = $this->connection->prepare("UPDATE mdc SET funcao_chefe = ?, 
			adido_financeiro = ?, nome_chefe = ? WHERE id = ?");

			$sql->bindValue(1, $funcao_chefe);
			$sql->bindValue(2, $adido_financeiro);
			$sql->bindValue(3, $nome_chefe);
			$sql->bindValue(4, $id_mdc);
			$sql->execute();

			return true;
		}
	}
?>