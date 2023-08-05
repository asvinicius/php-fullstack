<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editafunc extends CI_Controller {
	public function id($fun_id) {
		if ($this->isLogged()){
            $this->load->model('FuncModel');
		    $funcionarios = new FuncModel();

            $item = $funcionarios->search($fun_id);

            $content = array(
				"funcionario" => $item);

			$this->load->view('template/admin/header');
			$this->load->view('template/admin/menu');
			$this->load->view('admin/editafunc', $content);
			$this->load->view('template/admin/footer');
			
        }else{
            redirect(base_url('login'));
        }		
	}

    public function atualizar() {
        if ($this->isLogged()){
            $config = $this->getConfig();
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
			$this->load->model('FuncModel');
			$funcionarios = new FuncModel();
			
			$fun_id = $this->input->post('fun_id');
			$fun_nome = $this->input->post('fun_nome');
			$fun_login = $this->input->post('fun_login');

            $fundata = $funcionarios->search($fun_id);

            if($fundata['fun_login'] != $fun_login){
                echo "O login é diferente";
                $exist = $funcionarios->searchlogin($fun_login);
                if($exist){
                    $alert = array(
                        "class" => "warning",
                        "message" => "O login <strong>".$fun_login."</strong> já está em uso");
        
                    $content = array(
                        "alert" => $alert,
                        "funcionario" => $fundata);
    
                    $this->load->view('template/admin/header');
                    $this->load->view('template/admin/menu');
                    $this->load->view('admin/editafunc', $content);
                    $this->load->view('template/admin/footer');
                    return false;
                }
            }

            $fun_senha_nova = $this->input->post('fun_senha_nova');
            $fun_senha_conf = $this->input->post('fun_senha_conf');

            if($fun_senha_nova){
                if($fun_senha_nova == $fun_senha_conf){
                    $fun_senha = md5($this->input->post('fun_senha_nova'));
                } else {
                    $alert = array(
                        "class" => "warning",
                        "message" => "As senhas inseridas são diferentes");
        
                    $content = array(
                        "alert" => $alert,
                        "funcionario" => $fundata);
    
                    $this->load->view('template/admin/header');
                    $this->load->view('template/admin/menu');
                    $this->load->view('admin/editafunc', $content);
                    $this->load->view('template/admin/footer');
                    return false;
                }
            } else {
                $fun_senha = $this->input->post('fun_senha');
            }

			$fun_saldo = $this->input->post('fun_saldo');
			$fun_adm = $this->input->post('fun_adm');

            if($this->upload->do_upload('fun_foto_atualizada')) {
                $imginfo = $this->upload->data();
                $fun_foto = $imginfo['file_name'];
            } else {
                $fun_foto = $this->input->post('fun_foto');
            }
            
			$fun_criacao = $this->input->post('fun_criacao');
			$fun_status = $this->input->post('fun_status');

            $fundata['fun_id'] = $fun_id;
            $fundata['fun_nome'] = $fun_nome;
            $fundata['fun_login'] = $fun_login;
            $fundata['fun_senha'] = $fun_senha;
            $fundata['fun_saldo'] = $fun_saldo;
            $fundata['fun_adm'] = $fun_adm;
            $fundata['fun_foto'] = $fun_foto;
            $fundata['fun_criacao'] = $fun_criacao;
            $fundata['fun_alteracao'] = null;
            $fundata['fun_status'] = $fun_status;

            if($funcionarios->update($fundata)){
                redirect(base_url('funcionarios/atualizado'));
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