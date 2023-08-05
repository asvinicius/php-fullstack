<?php
class LoginModel extends CI_Model{
    
    public function search($adm_login, $adm_senha){
        $this->db->where("adm_login", $adm_login);
        $this->db->where("adm_senha", $adm_senha);
        
        return $this->db->get("administrador")->row_array();
    }
}