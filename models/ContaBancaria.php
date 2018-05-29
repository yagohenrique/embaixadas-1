<?php
	class ContaBancaria extends model {

		public function cadastrarContaBancaria($nome_conta, $numero_conta, $conta_iban, 
		$conta_swift, $banco, $saldo, $moeda, $ano_abertura, $conta_tipo, $id_mdc) {

			$sql = $this->connection->prepare("SELECT id FROM conta 
			WHERE numero = ? OR conta_iban = ? OR conta_swift = ?");

			$sql->bindValue(1, $numero_conta);
			$sql->bindValue(2, $conta_iban);
			$sql->bindValue(3, $conta_swift);
			$sql->execute();

			if($sql->rowCount() <= 0) {

				$sql = $this->connection->prepare("INSERT INTO conta (nome, conta_iban, 
				conta_swift, numero, id_moeda, banco, conta_tipo, saldo, id_mdc, conta_ano) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

				$sql->bindValue(1, $nome_conta);
				$sql->bindValue(2, $conta_iban);
				$sql->bindValue(3, $conta_swift);
				$sql->bindValue(4, $numero_conta);
				$sql->bindValue(5, $moeda);
				$sql->bindValue(6, $banco);
				$sql->bindValue(7, $conta_tipo);
				$sql->bindValue(8, $saldo);
				$sql->bindValue(9, $id_mdc);
				$sql->bindValue(10, $ano_abertura);
				$sql->execute();

				return true;
			}
		}

		public function getContas() {

			$mdc = new Mdc();
			$id_mdc = $mdc->getMdcUsuarioId($_SESSION['usuario']);

			$array = array();

			$sql = $this->connection->query("SELECT conta.id, nome, numero, nome_moeda, 
			saldo, conta_ano, conta_tipo FROM conta INNER JOIN moeda 
			ON conta.id_moeda = moeda.id WHERE conta.id_mdc = ".$id_mdc);

			if($sql->rowCount() > 0) {

				$array = $sql->fetchAll();

				return $array;
			}
		}
	}
?>