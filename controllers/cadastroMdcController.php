<?php
	class cadastroMdcController extends Controller {

	   public function index() {

			$data = array();

			if(isset($_POST['nome_mdc']) && !empty($_POST['nome_mdc'])) {

				$nome_mdc = addslashes($_POST['nome_mdc']);
				$cidade = addslashes($_POST['cidade_mdc']);
				$funcao_chefe = addslashes($_POST['funcao_chefe']);
				$nome_chefe = addslashes($_POST['nome_chefe']);
				$adido_financeiro = addslashes($_POST['adido_financeiro']);
				$nome_usuario = addslashes($_POST['nome_usuario']);
				$email_usuario = addslashes($_POST['email_usuario']);
				$senha = addslashes($_POST['senha']);
				$pais = addslashes($_POST['pais']);
				$telefone = addslashes($_POST['telefone']);
				$ano = date("Y");
				
				$mdc = new Mdc();

				$mdc->cadastrarMDC($nome_mdc, $cidade, $funcao_chefe, $nome_chefe, 
				$adido_financeiro, $ano);

				$id_mdc = $mdc->getMdcIdPeloNome($nome_mdc);

				$usuario = new Usuarios();

				if($usuario->cadastrarUsuario($nome_usuario, $email_usuario, $senha, 
				$pais, $telefone, $id_mdc)) {
					$data['msg'] = "Sua MDC foi cadastrada com sucesso! <br> 
					<a href='".BASE_URL."'>Fazer Login</a>";
				} else {
					$data['msg'] = "Erro ao cadastrar a MDC";
				}
			}

			$this->loadTemplate('cadastro_mdc', $data);
	   }
	}
?>