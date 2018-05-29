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

			// Status do funcionário (ativo/inativo)
			if(isset($_REQUEST['status']) && isset($_REQUEST['id'])) {
				
				$status = $_REQUEST['status'];
				$id = $_REQUEST['id'];

				if($status == "ativo") {
					$status = 1;
				} else if($status == "inativo") {
					$status = 0;
				} else {
					header("Location: ".BASE_URL."mdc/funcionarios");
				}

				if($funcionario->alterarStatusFuncionario($status, $id)) {
					$data['msg'] = "Status alterado com sucesso!";
				}
			}
			
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

			$conta = new ContaBancaria();

			$data['contas'] = $conta->getContas();

			$this->loadTemplate('conta_bancaria', $data);
		}

		public function cadastrarContaBancaria() {

			$data = array();

			$moeda = new Moedas();

			$data['nome_moedas'] = $moeda->getMoedas();

			if(isset($_POST['nome_conta']) && !empty($_POST['nome_conta'])) {

				$nome_conta = addslashes($_POST['nome_conta']);
				$numero_conta = addslashes($_POST['numero_conta']);
				$conta_iban = addslashes($_POST['conta_iban']);
				$conta_swift = addslashes($_POST['conta_swift']);
				$banco = addslashes($_POST['banco']);
				$saldo = addslashes($_POST['saldo']);
				$moeda = addslashes(intval($_POST['moeda']));
				$ano_abertura = addslashes($_POST['ano_abertura']);
				$conta_tipo = addslashes(intval($_POST['conta_tipo']));

				$mdc = new Mdc();
				$id_mdc = $mdc->getMdcUsuarioId($_SESSION['usuario']);

				$conta = new ContaBancaria();

				if($conta->cadastrarContaBancaria($nome_conta, $numero_conta, $conta_iban, 
				$conta_swift, $banco, $saldo, $moeda, $ano_abertura, $conta_tipo, $id_mdc)) {
					$data['msg'] = "Conta criada com sucesso!";
				} else {
					$data['msg'] = "Conta já existente.";
				}
			}

			$this->loadTemplate('cadastro_conta_bancaria', $data);
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

		public function editar_beneficiario() {
			
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

			if(isset($_GET['id']) && !empty($_GET['id'])){
				
				$id = addslashes($_GET['id']);

				$data['beneficiario'] = $editar->getBeneficiariosAtualizar($id);
			}

			$this->loadTemplate('editar_beneficiario', $data);
		}
	}
?>