<h1>Cadastro de Conta Bancária</h1>

<form method="POST">
	<label for="nome_conta">Nome da Conta:</label>
	<input type="text" name="nome_conta" id="nome_conta"><br><br>

	<label for="numero_conta">Número da Conta:</label>
	<input type="text" name="numero_conta" id="numero_conta"><br><br>

	<label for="conta_iban">Conta Iban:</label>
	<input type="text" name="conta_iban" id="conta_iban"><br><br>

	<label for="conta_swift">Conta Swift:</label>
	<input type="text" name="conta_swift" id="conta_swift"><br><br>

	<label for="banco">Banco:</label>
	<input type="text" name="banco" id="banco"><br><br>

	<label for="saldo">Saldo:</label>
	<input type="text" name="saldo" id="saldo"><br><br>

	<label for="moeda">Moeda:</label>
	<select name="moeda" id="moeda">
		<option>Selecione</option>
		<?php foreach($nome_moedas as $moeda): ?>
			<option value="<?php echo $moeda['id']; ?>">
				<?php echo $moeda['nome_moeda']; ?>
			</option>
		<?php endforeach; ?>
	</select><br><br>

	<label for="ano_abertura">Ano de abertura:</label>
	<input type="text" name="ano_abertura" id="ano_abertura"><br><br>

	<label for="conta_tipo">Conta tipo:</label>
	<select name="conta_tipo" id="conta_tipo">
		<option>Selecione</option>
		<option value="0">Conta</option>
		<option value="1">Caixa</option>
	</select><br><br>

	<input type="submit" value="Cadastrar Conta">
</form>

<br>

<?php if(isset($msg)) {echo $msg;} ?>

<br><br>

<a href="<?php echo BASE_URL; ?>mdc/conta_bancaria">Voltar</a>