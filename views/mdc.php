<h2>Informações da MDC</h2>

<form method="POST">
	<label for="mdc">MDC:</label><br>
	<input type="text" name="mdc" id="mdc" 
	value="<?php echo $dados_mdc['nome_mdc']; ?>" readonly><br><br>

	<label for="cidade">Cidade:</label><br>
	<input type="text" name="cidade" id="cidade" 
	value="<?php echo $dados_mdc['cidade_mdc']; ?>" readonly><br><br>

	<label for="funcao_chefe">Função do chefe:</label><br>
	<input type="text" name="funcao_chefe" id="funcao_chefe"
	value="<?php echo $dados_mdc['funcao_chefe']; ?>"><br><br>

	<label for="adido_financeiro">Adido financeiro</label><br>
	<input type="text" name="adido_financeiro" id="adido_financeiro"
	value="<?php echo $dados_mdc['adido_financeiro']; ?>"><br><br>

	<label for="nome_chefe">Nome do chefe:</label><br>
	<input type="text" name="nome_chefe" id="nome_chefe"
	value="<?php echo $dados_mdc['nome_chefe']; ?>"><br><br>

	<input type="hidden" name="id_mdc" value="<?php echo $dados_mdc['id']; ?>">

	<input type="submit" value="Atualizar">
</form><br>

<?php if(isset($msg)) {echo $msg;} ?>

<br>

<a href="<?php echo BASE_URL; ?>mdc/funcionarios">Funcionários</a><br>
<a href="<?php echo BASE_URL; ?>mdc/conta_bancaria">Conta Bancária</a><br>
<a href="<?php echo BASE_URL; ?>mdc/beneficiario">Beneficiário</a>