<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Login</title>
	</head>
	<body>
		<h1>Faça seu login</h1>

		<form method="POST">
			<label for="email">E-mail: </label><br>
			<input type="email" name="email" id="email"><br><br>

			<label for="senha">Senha</label><br>
			<input type="password" name="senha" id="senha"><br><br>

			<input type="submit" value="Entrar">
		</form><br>

		<?php if(isset($msg)) {echo $msg;} ?>
	</body>
</html>