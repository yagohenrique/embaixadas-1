<?php
/**
 * Created by PhpStorm.
 * User: cttde
 * Date: 28/05/2018
 * Time: 11:13
 */
class Benificiario extends Model {

function getBenificiario($id_mdc) {

	$array = array();

	$sql = $this->connection->prepare( "SELECT * FROM beneficiario WHERE id_mdc = ?" );

	$sql->bindValue( 1, $id_mdc);
	$sql->execute();

	if ( $sql->rowCount() > 0 ) {

	$array = $sql->fetchAll();
	}
	return $array;
}
	public function addBenificiario($nome, $contribuinte,$id_mdc){

		$sql = $this->connection->prepare("SELECT * FROM beneficiario WHERE nome = ?");
		$sql->bindValue(1,$nome);
		$sql->execute();

		if ($sql->rowCount() > 0){
			return false;
		} else{
			$sql = $this->connection->prepare("INSERT INTO beneficiario (nome, contribuinte, id_mdc) 
			VALUES  (?, ?, ?)");
			$sql->bindValue(1, $nome);
			$sql->bindValue(2, $contribuinte);
			$sql->bindValue(3, $id_mdc);
			$sql->execute();
		}
		return true;
	}
	public function editarBeneficiario($nome, $contribuinte, $id){
		$sql = $this->connection->prepare("UPDATE beneficiario SET nome = ?, contribuinte = ? WHERE id = ?");
		$sql->bindValue(1, $nome);
		$sql->bindValue(2,$contribuinte);
		$sql->bindValue(3,$id);
		$sql->execute();
	}
	//Criei uma classe para mostrar o nome e contribuinte no input de atualização
	public function getBeneficiariosAtualizar($id){
		$array = array();
		$sql = $this->connection->prepare("SELECT * FROM beneficiario WHERE id = ?");
		$sql->bindValue(1,$id);
		$sql->execute();

		if ($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}
}