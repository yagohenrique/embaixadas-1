<h1>Conta Bancária</h1>

<table width="1000" border="1" style="text-align: center;">
	<tr>
		<th>Nome da conta</th>
		<th>Número da conta</th>
		<th>Moeda</th>
		<th>Saldo</th>
		<th>Ano</th>
		<th>Conta tipo</th>
		<th>Ações</th>
	</tr>
	<?php foreach($contas as $conta): ?>
		<tr>
			<td><?php echo $conta['nome']; ?></td>
			<td><?php echo $conta['numero']; ?></td>
			<td><?php echo $conta['nome_moeda']; ?></td>
			<td><?php echo $conta['saldo']; ?></td>
			<td><?php echo $conta['conta_ano']; ?></td>
			<td><?php echo ($conta['conta_tipo'] == 0) ? 'Conta' : 'Caixa' ?></td>
			<td>
				<a href="<?php echo $conta['id']; ?>">Editar</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table><br><br>

<a href="<?php echo BASE_URL; ?>mdc/cadastrarContaBancaria">Cadastrar Conta Bancária</a><br><br>

<a href="<?php echo BASE_URL; ?>mdc">Voltar</a>