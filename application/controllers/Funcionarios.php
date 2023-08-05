<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionarios extends CI_Controller {
	public function index() {
		if ($this->isLogged()){
            $this->load->model('FuncModel');
		    $funcionarios = new FuncModel();
			
			$lista = $funcionarios->listing();
            $itens = count($lista);

            if(($itens % 10) == 0) {
    			$mult = true;
    		} else {
    			$mult = false;
    		}
						
			$content = array(
				"funcionarios" => $lista,
                "pagina" => 0, 
    			"itens" => $itens, 
    			"mult" => $mult);
			
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/menu');
			$this->load->view('admin/funcionarios', $content);
			$this->load->view('template/admin/footer');
			
        }else{
            redirect(base_url('login'));
        }
	}
	
	public function ordenacao($formato) {
		if ($this->isLogged()){
            $this->load->model('FuncModel');
		    $funcionarios = new FuncModel();
			
            switch ($formato) {
                case 1:
                    $lista = $funcionarios->listingOld();
                    break;
                case 2:
                    $lista = $funcionarios->listingNew();
                    break;
                case 3:
                    $lista = $funcionarios->listingreverse();
                    break;
            }
			
						
			$content = array(
				"funcionarios" => $lista);
			
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/menu');
			$this->load->view('admin/funcionarios', $content);
			$this->load->view('template/admin/footer');
			
        }else{
            redirect(base_url('login'));
        }
	}

	public function sucesso() {

		if ($this->isLogged()){
            $this->load->model('FuncModel');
		    $funcionarios = new FuncModel();
			
			$lista = $funcionarios->listing();
						
            $alert = array(
                "class" => "success",
                "message" => "Funcionário cadastrado com sucesso");

			$content = array(
				"funcionarios" => $lista,
                "alert" => $alert);
			
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/menu');
			$this->load->view('admin/funcionarios', $content);
			$this->load->view('template/admin/footer');
			
        }else{
            redirect(base_url('login'));
        }
		
	}

	public function atualizado() {

		if ($this->isLogged()){
            $this->load->model('FuncModel');
		    $funcionarios = new FuncModel();
			
			$lista = $funcionarios->listing();
						
            $alert = array(
                "class" => "success",
                "message" => "Funcionário atualizado com sucesso");

			$content = array(
				"funcionarios" => $lista,
                "alert" => $alert);
			
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/menu');
			$this->load->view('admin/funcionarios', $content);
			$this->load->view('template/admin/footer');
			
        }else{
            redirect(base_url('login'));
        }
		
	}
}