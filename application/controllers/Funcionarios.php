<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionarios extends CI_Controller {
	public function index() {
		if ($this->isLogged()){
            $this->load->model('FuncModel');
		    $funcionarios = new FuncModel();
			
			$lista = $funcionarios->listing();
			$lconta = $funcionarios->getcount();
            $itens = count($lconta);

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

	public function pagina($pagina) {
		if ($this->isLogged()){
            $this->load->model('FuncModel');
		    $funcionarios = new FuncModel();
			
			$lista = $funcionarios->listpaginado($pagina);
			$lconta = $funcionarios->getcount();
            $itens = count($lconta);

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

			$lconta = $funcionarios->getcount();
            $itens = count($lconta);

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

	public function sucesso() {

		if ($this->isLogged()){
            $this->load->model('FuncModel');
		    $funcionarios = new FuncModel();
			
			$lista = $funcionarios->listing();
			$lconta = $funcionarios->getcount();
            $itens = count($lconta);

            if(($itens % 10) == 0) {
    			$mult = true;
    		} else {
    			$mult = false;
    		}
						
            $alert = array(
                "class" => "success",
                "message" => "Funcionário cadastrado com sucesso");

			$content = array(
				"funcionarios" => $lista,
                "pagina" => 0, 
    			"itens" => $itens, 
    			"mult" => $mult,
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
			$lconta = $funcionarios->getcount();
            $itens = count($lconta);

            if(($itens % 10) == 0) {
    			$mult = true;
    		} else {
    			$mult = false;
    		}
						
            $alert = array(
                "class" => "success",
                "message" => "Funcionário atualizado com sucesso");

			$content = array(
				"funcionarios" => $lista,
				"pagina" => 0, 
				"itens" => $itens, 
				"mult" => $mult,
				"alert" => $alert);
			
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/menu');
			$this->load->view('admin/funcionarios', $content);
			$this->load->view('template/admin/footer');
			
        }else{
            redirect(base_url('login'));
        }
		
	}

	public function removido() {

		if ($this->isLogged()){
            $this->load->model('FuncModel');
		    $funcionarios = new FuncModel();
			
			$lista = $funcionarios->listing();
			$lconta = $funcionarios->getcount();
            $itens = count($lconta);

            if(($itens % 10) == 0) {
    			$mult = true;
    		} else {
    			$mult = false;
    		}
						
            $alert = array(
                "class" => "warning",
                "message" => "Funcionário removido com sucesso");

			$content = array(
				"funcionarios" => $lista,
				"pagina" => 0, 
				"itens" => $itens, 
				"mult" => $mult,
				"alert" => $alert);
			
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/menu');
			$this->load->view('admin/funcionarios', $content);
			$this->load->view('template/admin/footer');
			
        }else{
            redirect(base_url('login'));
        }
		
	}

	public function remover($fun_id = null) {
        if ($this->isLogged()){
            $this->load->model('FuncModel');
		    $funcionarios = new FuncModel();
			
			$fundata = $funcionarios->search($fun_id);
            
            if($funcionarios->delete($fundata['fun_id'])){
                redirect(base_url('funcionarios/removido'));
            }
        }else{
            redirect(base_url('login'));
        }
    }
}