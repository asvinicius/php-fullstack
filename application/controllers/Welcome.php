<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index() {

		if ($this->isLogged()){
            //$this->load->model('XXXXModel');
		    //$xxxx = new XXXXModel();
			
			//$QQR = $xxxxx->listing();
			
			
			//$content = array(
			//	"xxxxx" => $QQR);
			
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/menu');
			$this->load->view('admin/inicio');
			$this->load->view('template/admin/footer');
			
        }else{
            redirect(base_url('login'));
        }


		
	}


}
