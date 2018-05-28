<?php
	class loginController extends Controller {
		
		public function index() {
			
			$data = array();

			unset($_SESSION['usuario']);

			if(isset($_POST['email']) && !empty($_POST['email'])) {

				$email = addslashes($_POST['email']);
				$senha = addslashes($_POST['senha']);

				$usuario = new Usuarios();

				if($usuario->verificarUsuario('usuarios', $email, $senha)) {

					$token = $usuario->createToken('usuarios', $email);

					$_SESSION['usuario'] = $token;

					header("Location: ".BASE_URL."home");
					exit;
				} else {
					$data['msg'] = "Usuário e/ou Senha estão incorretos.";
				}
			}

			$this->loadView('login', $data);
		}
	}
?>