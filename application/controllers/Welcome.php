<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index() {

		if ($this->isLogged()){
            //$this->load->model('SpinModel');
		    //$spin = new SpinModel();
			
			//$completed = $spin->completed();
			
			
			//$content = array("rodadas" => $rodadas, "completed" => $completed, "json" => $json, "numreq" => $numreq);
			
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/menu');
			$this->load->view('admin/inicio');
			$this->load->view('template/admin/footer');
			
        }else{
            redirect(base_url('login'));
        }


		
	}


}
