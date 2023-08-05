<?php
class FuncModel extends CI_Model{
    
    protected $fun_id;
    protected $fun_nome;
    protected $fun_login;
    protected $fun_senha;
    protected $fun_saldo;
    protected $fun_adm;
    protected $fun_foto;
    protected $fun_criacao;
    protected $fun_alteracao;
    protected $fun_status;
    
    function __construct() {
        parent::__construct();
        $this->setFun_id(null);
        $this->setFun_nome(null);
        $this->setFun_login(null);
        $this->setFun_senha(null);
        $this->setFun_saldo(null);
        $this->setFun_adm(null);
        $this->setFun_foto(null);
        $this->setFun_criacao(null);
        $this->setFun_alteracao(null);
        $this->setFun_status(null);
    }
    
    public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('funcionario', $data)) {
                return true;
            }
        }
    }
	
    public function update($data = null) {
        if ($data != null) {
            $this->db->where("fun_id", $data['fun_id']);
            if ($this->db->update('funcionario', $data)) {
                return true;
            }
        }
    }
	
    public function delete($fun_id) {
        if ($fun_id != null) {
            $this->db->where("fun_id", $fun_id);
            if ($this->db->delete("funcionario")) {
                return true;
            }
        }
    }
    
    public function listing(){
        $this->db->select('*');
        $this->db->order_by("fun_nome", "desc");
        return $this->db->get("funcionario")->result();
    }

    public function search($fun_id) {
        $this->db->where("fun_id", $fun_id);
        return $this->db->get("funcionario")->row_array();
    }

    public function searchlogin($fun_login) {
        $this->db->where("fun_login", $fun_login);
        return $this->db->get("funcionario")->row_array();
    }
    
    public function searchlabel($searchlabel){
        $this->db->like("fun_nome", $searchlabel);
        return $this->db->get("funcionario")->result();
    }
    
    public function getFun_id(){
		return $this->fun_id;
	}

	public function getFun_nome(){
		return $this->fun_nome;
	}

	public function getFun_login(){
		return $this->fun_login;
	}

	public function getFun_senha(){
		return $this->fun_senha;
	}

	public function getFun_saldo(){
		return $this->fun_saldo;
	}

	public function getFun_adm(){
		return $this->fun_adm;
	}

	public function getFun_foto(){
		return $this->fun_foto;
	}

	public function getFun_criacao(){
		return $this->fun_criacao;
	}

	public function getFun_alteracao(){
		return $this->fun_alteracao;
	}

	public function getFun_status(){
		return $this->fun_status;
	}

	public function setFun_id($fun_id){
		$this->fun_id = $fun_id;
	}

	public function setFun_nome($fun_nome){
		$this->fun_nome = $fun_nome;
	}

	public function setFun_login($fun_login){
		$this->fun_login = $fun_login;
	}

	public function setFun_senha($fun_senha){
		$this->fun_senha = $fun_senha;
	}

	public function setFun_saldo($fun_saldo){
		$this->fun_saldo = $fun_saldo;
	}

	public function setFun_adm($fun_adm){
		$this->fun_adm = $fun_adm;
	}

	public function setFun_foto($fun_foto){
		$this->fun_foto = $fun_foto;
	}

	public function setFun_criacao($fun_criacao){
		$this->fun_criacao = $fun_criacao;
	}

	public function setFun_alteracao($fun_alteracao){
		$this->fun_alteracao = $fun_alteracao;
	}

	public function setFun_status($fun_status){
		$this->fun_status = $fun_status;
	}

}