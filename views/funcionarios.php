<h1>Funcionários</h1>

<?php if(isset($msg)) {echo $msg;} ?>

<?php if($lista_funcionarios == null):  ?>
	<h3>Não existe funcionários cadastrados.</h3>
<?php else: ?>
	<table width="1000" border="1" style="text-align: center;">
		<tr>
			<th>Nome</th>
			<th>Categoria</th>
			<th>Status</th>
			<th>Ações</th>
		</tr>
		
		<?php foreach($lista_funcionarios as $funcionario): ?>
			<tr>
				<td><?php echo $funcionario['nome_funcionario']; ?></td>
				<td><?php echo $funcionario['nome_categoria']; ?></td>
				<td>
					<?php if($funcionario['status'] == 1): ?>
						<a href="<?php echo BASE_URL; ?>mdc/funcionarios?id=<?php echo $funcionario['id']; ?>&status=inativo">
							Desativar funcionário
						</a>
					<?php else: ?>
						<a href="<?php echo BASE_URL; ?>mdc/funcionarios?id=<?php echo $funcionario['id']; ?>&status=ativo">
							Ativar funcionário
						</a>
					<?php endif; ?>
				</td>
				<td>
					<a href="#">Editar</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table><br>
<?php endif; ?>

<a href="<?php echo BASE_URL; ?>mdc/cadastrar_funcionario">Cadastrar Funcionário</a><br><br>

<a href="<?php echo BASE_URL; ?>mdc">Voltar</a>