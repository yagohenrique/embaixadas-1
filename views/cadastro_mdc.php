<h1>Cadastre sua MDC</h1>

<form method="POST">
	<label for="nome_mdc">Nome MDC:</label>
	<input type="text" name="nome_mdc" id="nome_mdc"><br><br>

	<label for="cidade_mdc">Cidade MDC:</label>
	<input type="text" name="cidade_mdc" id="cidade_mdc"><br><br>

	<label for="funcao_chefe">Função Chefe:</label>
	<input type="text" name="funcao_chefe" id="funcao_chefe"><br><br>

	<label for="nome_chefe">Nome Chefe:</label>
	<input type="text" name="nome_chefe" id="nome_chefe"><br><br>

	<label for="adido_financeiro">Adido Financeiro:</label>
	<input type="text" name="adido_financeiro" id="adido_financeiro"><br><br>

	<label for="nome_usuario">Nome usuário:</label>
	<input type="text" name="nome_usuario" id="nome_usuario"><br><br>

	<label for="email_usuario">E-mail usuário:</label>
	<input type="email" name="email_usuario" id="email_usuario"><br><br>

	<label for="senha">Senha:</label>
	<input type="password" name="senha" id="senha"><br><br>

	<label for="pais">País:</label>
	<input type="pais" name="pais" id="pais"><br><br>

	<label for="telefone">Telefone:</label>
	<input type="text" name="telefone" id="telefone"><br><br>

	<input type="submit" value="Cadastrar MDC">
</form><br>

<?php if(isset($msg)) {echo $msg;} ?>