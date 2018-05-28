<?php
	class homeController extends Controller {

		public function __construct() {
				
			$usuario = new Usuarios();
			
			if(!$usuario->checkLogin('usuarios', $_SESSION['usuario'])) {
				header("Location: ".BASE_URL."login");
			}
		}

	   public function index() {
	   	
	      $data = array();
	        
	      $this->loadView('home', $data);
	   }
	}
?>