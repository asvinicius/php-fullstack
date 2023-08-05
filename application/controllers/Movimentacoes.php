<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movimentacoes extends CI_Controller {
	public function funcionario($fun_id = null) {
		if ($this->isLogged()){
            $this->load->model('MovModel');
		    $movimentacoes = new MovModel();
			
			$lista = $movimentacoes->listingfunc($fun_id);
						
			$content = array(
				"tipo" => 2, // Tipo 1: Movimentações gerais | Tipo 2: Movimentações por funcionário
				"movimentacoes" => $lista);
			
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/menu');
			$this->load->view('admin/movimentacoes', $content);
			$this->load->view('template/admin/footer');
			
        }else{
            redirect(base_url('login'));
        }
	}
}