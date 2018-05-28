<?php
	class adminController extends Controller {
		
		public function index() {
			
			$data = array();

			unset($_SESSION['admin']);

			if(isset($_POST['email']) && !empty($_POST['email'])) {

				$email = addslashes($_POST['email']);
				$senha = addslashes($_POST['senha']);

				$usuario = new Usuarios();

				if($usuario->verificarUsuario('admin', $email, $senha)) {

					$token = $usuario->createToken('admin', $email);

					$_SESSION['admin'] = $token;

					header("Location: ".BASE_URL."gerenciamento");
					exit;
				} else {
					$data['msg'] = "Usuário e/ou Senha estão incorretos.";
				}
			}

			$this->loadView('login', $data);
		}
	}
?>