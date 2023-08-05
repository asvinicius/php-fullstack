<?php
class AdminModel extends CI_Model{
    
    protected $adm_id;
    protected $adm_nome;
    protected $adm_login;
    protected $adm_senha;
    protected $adm_criacao;
    protected $adm_alteracao;
    
    function __construct() {
        parent::__construct();
        $this->setAdm_id(null);
        $this->setAdm_nome(null);
        $this->setAdm_login(null);
        $this->setAdm_senha(null);
        $this->setAdm_criacao(null);
        $this->setAdm_alteracao(null);
    }
    
    public function listing(){
        $this->db->select('*');
        $this->db->order_by("adm_id", "acsc");
        return $this->db->get("administrador")->result();
    }
    
    public function search($adm_id){
        $this->db->where("adm_id", $adm_id);
        return $this->db->get("administrador")->row_array();
    }
    
    function getAdm_id() {
        return $this->adm_id;
    }
    
    function getAdm_nome() {
        return $this->adm_nome;
    }
    
    function getAdm_login() {
        return $this->adm_login;
    }
    
    function getAdm_senha() {
        return $this->adm_senha;
    }
    
    function getAdm_criacao() {
        return $this->adm_criacao;
    }
    
    function getAdm_alteracao() {
        return $this->adm_alteracao;
    }

    function setAdm_id($adm_id) {
        $this->adm_id = $adm_id;
    }

    function setAdm_nome($adm_nome) {
        $this->adm_nome = $adm_nome;
    }

    function setAdm_login($adm_login) {
        $this->adm_login = $adm_login;
    }

    function setAdm_senha($adm_senha) {
        $this->adm_senha = $adm_senha;
    }

    function setAdm_criacao($adm_criacao) {
        $this->adm_criacao = $adm_criacao;
    }

    function setAdm_alteracao($adm_alteracao) {
        $this->adm_alteracao = $adm_alteracao;
    }

}