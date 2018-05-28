<?php
	class Funcionarios extends model {

		public function getFuncionarios() {

			$array = array();
			$mdc = new Mdc();

			// Função para capturar o id da mdc do usuário
			$id_mdc = $mdc->getMdcUsuarioId($_SESSION['usuario']);

			$sql = $this->connection->query("SELECT nome_funcionario, nome_categoria  
			FROM funcionario INNER JOIN categorias ON categorias.id = funcionario.id_categoria 
			WHERE funcionario.id_mdc = ".$id_mdc);

			if($sql->rowCount() > 0) {

				$array = $sql->fetchAll();

				return $array;
			}
		}

		public function cadastrarFuncionario($nome_funcionario, $categoria) {

			$mdc = new Mdc();

			// Função para capturar o id da mdc do usuário
			$id_mdc = $mdc->getMdcUsuarioId($_SESSION['usuario']);

			$sql = $this->connection->prepare("INSERT INTO funcionario (nome_funcionario, 
			id_categoria, id_mdc) VALUES (?, ?, ?)");

			$sql->bindValue(1, $nome_funcionario);
			$sql->bindValue(2, $categoria);
			$sql->bindValue(3, $id_mdc);
			$sql->execute();

			return true;
		}
	}
?>