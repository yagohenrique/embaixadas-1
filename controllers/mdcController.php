<?php
	class mdcController extends Controller {

		public function __construct() {
				
			$usuario = new Usuarios();

			if(!$usuario->checkLogin('usuarios', $_SESSION['usuario'])) {
				header("Location: ".BASE_URL."login");
			}
		}
		
		public function index() {
			
			$data = array();

			if(isset($_POST['mdc']) && !empty($_POST['mdc'])) {

				$id_mdc = addslashes($_POST['id_mdc']);
				$funcao_chefe = addslashes($_POST['funcao_chefe']);
				$adido_financeiro = addslashes($_POST['adido_financeiro']);
				$nome_chefe = addslashes($_POST['nome_chefe']);

				$mdc = new Mdc();

				if($mdc->atualizarDadosMdc($funcao_chefe, $adido_financeiro, 
				$nome_chefe, $id_mdc)) {

					$data['msg'] = "Dados atualizados com sucesso!";
				}
			}

			$mdc = new Mdc();
			$data['dados_mdc'] = $mdc->getDadosMdc($_SESSION['usuario']);

			$this->loadTemplate('mdc', $data);
		}

		public function funcionarios() {

			$data = array();

			$funcionario = new Funcionarios();

			$data['lista_funcionarios'] = $funcionario->getFuncionarios();

			$this->loadTemplate('funcionarios', $data);
		}

		public function cadastrar_funcionario() {

			$data = array();

			if(isset($_POST['nome_funcionario']) && !empty($_POST['nome_funcionario'])) {

				$nome_funcionario = addslashes($_POST['nome_funcionario']);
				$categoria = addslashes($_POST['categoria']);

				$funcionario = new Funcionarios();

				if($funcionario->cadastrarFuncionario($nome_funcionario, $categoria)) {
					$data['msg'] = "Funcionário cadastrado com sucesso!";
				} else {
					$data['msg'] = "Erro ao cadastrar funcionário.";
				}
			}

			$categoria = new Categorias();

			$data['categoria_chefe'] = $categoria->getCategoria('chefe');
			$data['categoria_funcionario'] = $categoria->getCategoria('funcionario');

			$this->loadTemplate('cadastro_funcionario', $data);
		}

		public function conta_bancaria() {

			$data = array();

			$this->loadTemplate('conta_bancaria', $data);
		}

		public function beneficiario() {

			$data = array();


			$benificiario = new Benificiario();
			$mdc = new Mdc();

			$id_mdc = $mdc->getMdcUsuarioId($_SESSION['usuario']);

			$data['benificiario'] = $benificiario->getBenificiario($id_mdc);



			$this->loadTemplate('beneficiario', $data);
		}

		public function cadastrar_beneficiario() {

			$data = array();

			if(isset($_POST['nome_beneficiario']) && !empty($_POST['nome_beneficiario'])) {

			$nome_beneficiario = addslashes($_POST['nome_beneficiario']);
			$beneficiario = addslashes($_POST['nome_contribuinte']);

			$funcionario = new Benificiario();
			$mdc = new Mdc();

			$id_mdc = $mdc->getMdcUsuarioId($_SESSION['usuario']);

			if($funcionario->addBenificiario($nome_beneficiario, $beneficiario, $id_mdc)) {
				$data['msg'] = "Beneficiario cadastrado com sucesso!";
			} else {
				$data['msg'] = "Beneficiario já cadastrado.";
			}
		}

			$this->loadTemplate('cadastrar_beneficiario', $data);
		}

		public function editar_beneficiario(){
			$data = array();
			$editar = new Benificiario();


			if(isset($_POST['nome_editar']) && !empty($_POST['nome_editar'])){
				$nome_editar = addslashes($_POST['nome_editar']);
				$contribuinte_editar = addslashes($_POST['contribuinte_editar']);
				$id = addslashes($_GET['id']);

				if($editar->editarBeneficiario($nome_editar,$contribuinte_editar,$id)){
					$data['msg'] = "Erro ao atualizar beneficiario";
				}else{
					$data['msg'] = "Foi atualizado com sucesso o beneficiario ";
				}
			}

			if (isset($_GET['id']) && !empty($_GET['id'])){
				$id = addslashes($_GET['id']);

				$data['beneficiario'] = $editar->getBeneficiariosAtualizar($id);


			}
			$this->loadTemplate('editar_beneficiario', $data);
		}
	}
