<h1>Funcionários</h1>

<table width="1000" border="1" style="text-align: center;">
	<tr>
		<th>Nome</th>
		<th>Categoria</th>
		<th>Ações</th>
	</tr>
	<?php foreach($lista_funcionarios as $funcionario): ?>
		<tr>
			<td><?php echo $funcionario['nome_funcionario']; ?></td>
			<td><?php echo $funcionario['nome_categoria']; ?></td>
			<td>
				<a href="#">Editar</a> - <a href="#">Excluir</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table><br>

<a href="<?php echo BASE_URL; ?>mdc/cadastrar_funcionario">Cadastrar Funcionário</a>