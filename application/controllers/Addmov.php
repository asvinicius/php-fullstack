<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addmov extends CI_Controller {
	public function index() {
		if ($this->isLogged()){
            $this->load->model('FuncModel');
		    $funcionarios = new FuncModel();

            $lista = $funcionarios->listing();

            $content = array(
				"funcionarios" => $lista);

			$this->load->view('template/admin/header');
			$this->load->view('template/admin/menu');
			$this->load->view('admin/novamov', $content);
			$this->load->view('template/admin/footer');
			
        }else{
            redirect(base_url('login'));
        }		
	}

    public function salvar() {
        if ($this->isLogged()){
            $this->load->model('FuncModel');
            $this->load->model('MovModel');
		    $funcionarios = new FuncModel();
		    $movimentacoes = new MovModel();
            
            $mov_tipo = $this->input->post('mov_tipo');
            $mov_fun = $this->input->post('mov_fun');
            $mov_valor = $this->input->post('mov_valor');
            $mov_obs = $this->input->post('mov_obs');

            $movdata['mov_id'] = null;
            $movdata['mov_tipo'] = $mov_tipo;
            $movdata['mov_valor'] = $mov_valor;
            $movdata['mov_obs'] = $mov_obs;
            $movdata['mov_fun'] = $mov_fun;
            $movdata['mov_adm'] = $this->session->userdata('adm_id');
            $movdata['mov_data'] = date('Y-m-d H:i:s');

            if($movimentacoes->save($movdata)){
                $fundata = $funcionarios->search($mov_fun);

                $fundata['fun_id'] = $fundata['fun_id'];
                $fundata['fun_nome'] = $fundata['fun_nome'];
                $fundata['fun_login'] = $fundata['fun_login'];
                $fundata['fun_senha'] = $fundata['fun_senha'];
                if($mov_tipo == 1){
                    $fundata['fun_saldo'] = $fundata['fun_saldo'] + $mov_valor;
                } else {
                    $fundata['fun_saldo'] = $fundata['fun_saldo'] - $mov_valor;
                }
                $fundata['fun_adm'] = $fundata['fun_adm'];
                $fundata['fun_foto'] = $fundata['fun_foto'];
                $fundata['fun_criacao'] = $fundata['fun_criacao'];
                $fundata['fun_alteracao'] = $fundata['fun_alteracao'];
                $fundata['fun_status'] = $fundata['fun_status'];

                if($funcionarios->update($fundata)){
                    redirect(base_url('movimentacoes/sucesso'));
                }
            }

        }else{
            redirect(base_url('login'));
        }
    }
}