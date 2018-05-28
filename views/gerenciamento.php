<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Gerenciamento (Admin)</title>
		<style>
			input, select {
				display: block;
				margin-bottom: 20px;
			}
		</style>
	</head>
	<body>
		<h1>Bem vindo ao gerenciamento</h1>

		<?php if(isset($_SESSION['admin'])) {echo "sessão admin: ". $_SESSION['admin'];} ?>

		<br><br>

		<?php if(isset($_SESSION['usuario'])) {echo "sessão usuário: ".$_SESSION['usuario'];} ?>

		<h3>Cadastro de usuário</h3>
		<form method="POST">
			<input type="text" name="nome" placeholder="Nome">

			<input type="email" name="email" placeholder="Email">

			<input type="password" name="senha" placeholder="Senha">

			<input type="text" name="pais" placeholder="País">

			<input type="text" name="telefone" placeholder="Telefone">

			<select name="mdc">
				<option>Selecione a MDC</option>
				<?php foreach($mdcs as $mdc): ?>
					<option value="<?php echo $mdc['id']; ?>"><?php echo $mdc['nome_mdc']; ?></option>
				<?php endforeach; ?>
			</select>

			<input type="submit" value="Cadastrar Usuário">
		</form>

		<?php if(isset($msg)) {echo $msg;} ?>
	</body>
</html>