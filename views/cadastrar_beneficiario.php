<h1>Cadastrar Beneficiario</h1>
<br>
<form method="POST">
	Nome: <input type="text" name="nome_beneficiario" required="required"><br><br>
	Contribuinte: <input type="text" name="nome_contribuinte" required="required"><br><br>
	<input type="submit" value="Cadastrar">
</form>
<br>
<button><a href="<?php echo BASE_URL; ?>mdc/beneficiario">Voltar</a></button>

<?php if(isset($msg)) {echo $msg;} ?>