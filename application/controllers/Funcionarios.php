<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionarios extends CI_Controller {
	public function index() {

		if ($this->isLogged()){
            $this->load->model('FuncModel');
		    $funcionarios = new FuncModel();
			
			$lista = $funcionarios->listing();
						
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


}