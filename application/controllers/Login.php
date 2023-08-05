<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function index() {
        if ($this->isLogged()){
            redirect(base_url('welcome'));
        } else {
            $this->load->view('publico/login');
        }
    }
	public function signin() {
		if ($this->isLogged()){
			redirect(base_url('welcome'));
		} else {
			$this->load->model("LoginModel");
			
			$adm_login = $this->input->post("adm_login");
			$adm_senha = md5($this->input->post("adm_senha"));
			
			$admin = $this->LoginModel->search($adm_login, $adm_senha);
			
			if($admin){
                $session = array(
                    'adm_id' => $admin["adm_id"],
                    'adm_nome' => $admin["adm_nome"],
                    'admin' => TRUE,
                    'logged' => TRUE
                );

                $this->session->set_userdata($session);

                redirect(base_url('login'));
			}else {
				$alert = array(
					"class" => "danger",
					"message" => "Usuário ou senha incorretos");
				
				$info = array("alert" => $alert);
				
				$this->load->view('publico/login', $info);
			}
		}
    }
    
    public function signout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}