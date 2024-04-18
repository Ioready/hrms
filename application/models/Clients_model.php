<?php

class Clients_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getAllClients(){
        $where = array('virtual_status' => 'ACTIVE');
        $results = $this->db->select('*')->where($where)->get('client')->result_array();
        return $results;
    }

    public function getclient($cilentId){
        $where = array('virtual_status' => 'ACTIVE', 'id' => passwordAPIDecryptionMethod($cilentId));
        $result = $this->db->select('*')->where($where)->get('client')->result_array(); 
        return $result;
    }

}