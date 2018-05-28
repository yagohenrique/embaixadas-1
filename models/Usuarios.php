<?php
	class Usuarios extends model {

		public function verificarUsuario($tabela, $email, $senha) {

			$sql = $this->connection->prepare("SELECT id FROM $tabela WHERE email = ? AND senha = ?");
			$sql->bindValue(1, $email);
			$sql->bindValue(2, md5($senha));
			$sql->execute();

			if($sql->rowCount() > 0) {
				return true;
			} else {
				return false;
			}
 		}

 		public function createToken($tabela, $email) {

 			$token = md5(time().rand(0, 9999).time().rand(0, 9999));

 			$sql = $this->connection->prepare("UPDATE $tabela SET token_usuario = ? WHERE email = ?");
			$sql->bindValue(1, $token);
			$sql->bindValue(2, $email);
			$sql->execute();

			return $token;
 		}

 		public function checkLogin($tabela, $sessao) {

 			if(!empty($sessao)) {

 				$token = $sessao;

 				$sql = $this->connection->prepare("SELECT id FROM $tabela 
 				WHERE token_usuario = ?");

 				$sql->bindValue(1, $token);
	 			$sql->execute();

	 			if($sql->rowCount() > 0) {
	 				return true;
				} else {
					return false;
				}
			}
 		}

 		public function cadastrarUsuario($nome, $email, $senha, $pais, $telefone, $id_mdc) {

 			$sql = $this->connection->prepare("INSERT INTO usuarios 
 			SET nome = ?, email = ?, senha = ?, pais = ?, telefone = ?, id_mdc = ?");
 			$sql->bindValue(1, $nome);
 			$sql->bindValue(2, $email);
 			$sql->bindValue(3, md5($senha));
 			$sql->bindValue(4, $pais);
 			$sql->bindValue(5, $telefone);
 			$sql->bindValue(6, $id_mdc);
 			$sql->execute();

 			return true;
 		}
	}
?>