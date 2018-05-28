<?php
	class gerenciamentoController extends Controller {
		
		public function __construct() {
				
			$usuario = new Usuarios();
			
			if(!$usuario->checkLogin('admin', $_SESSION['admin'])) {
				header("Location: ".BASE_URL);
			}
		}
		
		public function index() {
			
			$data = array();

			if(isset($_POST['nome']) && !empty($_POST['nome'])) {

				$nome = addslashes($_POST['nome']);
				$email = addslashes($_POST['email']);
				$senha = addslashes($_POST['senha']);
				$pais = addslashes($_POST['pais']);
				$telefone = addslashes($_POST['telefone']);
				$id_mdc = addslashes($_POST['mdc']);

				$usuario = new Usuarios();

				if($usuario->cadastrarUsuario($nome, $email, $senha, $pais, $telefone, $id_mdc)) {
					$data['msg'] = "Usuário cadastrado com sucesso!";
				} else {
					$data['msg'] = "Erro ao cadastrar usuário.";
				}
			}

			$mdc = new Mdc();
			$data['mdcs'] = $mdc->getMdc();

			$this->loadView('gerenciamento', $data);
		}
	}
?>