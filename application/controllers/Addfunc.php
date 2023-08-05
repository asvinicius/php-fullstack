<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addfunc extends CI_Controller {
	public function index() {

		if ($this->isLogged()){
			
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/menu');
			$this->load->view('admin/novofunc');
			$this->load->view('template/admin/footer');
			
        }else{
            redirect(base_url('login'));
        }		
	}

    public function salvar() {
        if ($this->isLogged()){
            $config = $this->getConfig();
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
			$this->load->model('FuncModel');
			$funcionarios = new FuncModel();
			
			$fun_nome = $this->input->post('fun_nome');
			$fun_login = $this->input->post('fun_login');

            $exist = $funcionarios->searchlogin($fun_login);

            if(!$exist){

                $fun_senha_prim = $this->input->post('fun_senha');
                $fun_senha_conf = $this->input->post('fun_senha_conf');

                if($fun_senha_prim == $fun_senha_conf){
                    $fun_senha = md5($this->input->post('fun_senha'));

                    $fun_saldo = $this->input->post('fun_saldo');

                    if($this->upload->do_upload('fun_foto')) {
                        
                        $imginfo = $this->upload->data();
                        $fun_foto = $imginfo['file_name'];

                        $fundata['fun_id'] = null;
                        $fundata['fun_nome'] = $fun_nome;
                        $fundata['fun_login'] = $fun_login;
                        $fundata['fun_senha'] = $fun_senha;
                        $fundata['fun_saldo'] = $fun_saldo;
                        $fundata['fun_adm'] = $this->session->userdata('adm_id');
                        $fundata['fun_foto'] = $fun_foto;
                        $fundata['fun_criacao'] = date('Y-m-d H:i:s');
                        $fundata['fun_alteracao'] = null;
                        $fundata['fun_status'] = 1;

                        if($funcionarios->save($fundata)){
                            redirect(base_url('funcionarios/sucesso'));
                        }

                    } else {
                        echo $this->upload->display_errors();
                    }

                }
            } else {

                $alert = array(
                    "class" => "warning",
                    "message" => "O login <strong>".$fun_login."</strong> já está em uso");
    
                $content = array(
                    "alert" => $alert);

                $this->load->view('template/admin/header');
                $this->load->view('template/admin/menu');
                $this->load->view('admin/novofunc', $content);
                $this->load->view('template/admin/footer');
            }

        }else{
            redirect(base_url('login'));
        }
    }

    public function getConfig(){
		$config = array(
			"upload_path" => "assets/fotos",
			"allowed_types" => "jpg|jpeg|png",
			"encrypt_name" => true
		);
		
		return $config;
	}
}