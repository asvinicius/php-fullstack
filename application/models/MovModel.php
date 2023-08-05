<?php
class MovModel extends CI_Model{
    
    protected $mov_id;
    protected $mov_tipo;
    protected $mov_valor;
    protected $mov_obs;
    protected $mov_fun;
    protected $mov_adm;
    protected $mov_data;
    
    function __construct() {
        parent::__construct();
		
        $this->setMov_id(null);
        $this->setMov_tipo(null);
        $this->setMov_valor(null);
        $this->setMov_obs(null);
        $this->setMov_fun(null);
        $this->setMov_adm(null);
        $this->setMov_data(null);
    }
	
	public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('movimentacao', $data)) {
                return true;
            }
        }
    }
	
    public function search($mov_id) {
        if ($mov_id != null) {
            $this->db->where("mov_id", $mov_id);
			$this->db->join('funcionario', 'fun_id=mov_fun', 'inner');
			$this->db->join('administrador', 'adm_id=mov_adm', 'inner');
			return $this->db->get("movimentacao")->row_array();
        }
    }
    
    public function listing(){
        $this->db->select('*');
        $this->db->join('funcionario', 'fun_id=mov_fun', 'inner');
        $this->db->join('administrador', 'adm_id=mov_adm', 'inner');
        $this->db->order_by("mov_id", "desc");
        return $this->db->get("movimentacao", 10, 0)->result();
    }
    
    public function listingfunc($fun_id){
        $this->db->where("mov_fun", $fun_id);
        $this->db->join('funcionario', 'fun_id=mov_fun', 'inner');
        $this->db->join('administrador', 'adm_id=mov_adm', 'inner');
        $this->db->order_by("mov_id", "desc");
        return $this->db->get("movimentacao", 10, 0)->result();
    }
    
    function getMov_id() {
        return $this->mov_id;
    }
    
    function getMov_tipo() {
        return $this->mov_tipo;
    }
    
    function getMov_valor() {
        return $this->mov_valor;
    }
    
    function getMov_obs() {
        return $this->mov_obs;
    }
    
    function getMov_fun() {
        return $this->mov_fun;
    }
    
    function getMov_adm() {
        return $this->mov_adm;
    }
    
    function getMov_data() {
        return $this->mov_data;
    }

    function setMov_id($mov_id) {
        $this->mov_id = $mov_id;
    }

    function setMov_tipo($mov_tipo) {
        $this->mov_tipo = $mov_tipo;
    }

    function setMov_valor($mov_valor) {
        $this->mov_valor = $mov_valor;
    }

    function setMov_obs($mov_obs) {
        $this->mov_obs = $mov_obs;
    }

    function setMov_fun($mov_fun) {
        $this->mov_fun = $mov_fun;
    }

    function setMov_adm($mov_adm) {
        $this->mov_adm = $mov_adm;
    }

    function setMov_data($mov_data) {
        $this->mov_data = $mov_data;
    }
}