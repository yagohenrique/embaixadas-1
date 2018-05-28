<h1>Cadastro de funcionário</h1>

<form method="POST">
	Nome: <br>
	<input type="text" name="nome_funcionario"><br><br>

	Categoria: <br>
	<select name="categoria" style="width: 174px;">
		<option>Selecione</option>
		
		<option disabled>Chefe MDC</option>
		<?php foreach($categoria_chefe as $categoria): ?>
			<option value="<?php echo $categoria['id']; ?>">
				<?php echo " - ".$categoria['nome_categoria']; ?>
			</option>
		<?php endforeach; ?>

		<option disabled>Funcionário</option>
		<?php foreach($categoria_funcionario as $categoria): ?>
			<option value="<?php echo $categoria['id']; ?>">
				<?php echo " - ".$categoria['nome_categoria']; ?>
			</option>
		<?php endforeach; ?>
	</select><br><br>

	<input type="submit" value="Cadastrar">
</form><br>

<?php if(isset($msg)) {echo $msg;} ?>

<a href="<?php echo BASE_URL; ?>mdc/funcionarios">Voltar</a>