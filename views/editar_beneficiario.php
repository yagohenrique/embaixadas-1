<h1>Atualizar Beneficiario</h1>
<br>
<?php
	if (isset($msg)){
		echo $msg;
	}

?>
<br><br>
<form method="post">
	Nome:
	<input type="text" name="nome_editar" value="<?php foreach ($beneficiario as $beneficiarios){echo $beneficiarios['nome'];} ?>" ><br><br>
	Contribuite:
	<input type="text" name="contribuinte_editar" value="<?php foreach ($beneficiario as $beneficiarios){echo $beneficiarios['contribuinte'];} ?>">
	<br><br><br>
	<input type="submit" value="Atualizar"><br><br>
	<button><a href="<?php echo BASE_URL; ?>mdc/beneficiario">Voltar</a></button>
</form>

