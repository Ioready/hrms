<?php

class Quotes_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }
    public function addQuotes_model($fields){
      
        $result = $this->db->insert('quotes', $fields);
        $insert_id =  $this->db->insert_id();

        if($insert_id > 0){
         return $insert_id;
        }else{
         return 0;
        }
    
    }
    public function getAllQuotes(){
        $where = array('virtual_status' => 'ACTIVE');
        $result = $this->db->select('*')->where($where)->order_by('id', 'DESC')->get('quotes')->result_array();
        return $result;
    } 
    public function getSingleProduct($id){
        $where = array('virtual_status' => 'ACTIVE', 'id' => base64_decode(($id)));
        $result = $this->db->select('*')->where($where)->get('quotes')->result_array(); 
        return $result;
    }
    public function updateDefaultQuotes($fields,$quotes_id) {
      
        $this->db->where('id', $quotes_id);
        $this->db->where('virtual_status', 'ACTIVE');
        $data_update=$this->db->update('quotes', $fields);
        return $data_update;
         
    }
    public function deleteQuotes($id){

        $fields = array('virtual_status' => 'DELETED');
        $data_delete=$this->db->where('id', $id['quotes_id'])->update('quotes', $fields);
        return $data_delete;
    }

}    