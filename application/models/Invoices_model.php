<?php

class Invoices_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }
    public function addInvoices_model($fields){
      
        $result = $this->db->insert('invoices', $fields);
        $insert_id =  $this->db->insert_id();

        if($insert_id > 0){
         return $insert_id;
        }else{
         return 0;
        }
    
    }
    public function getAllInvoice(){
        $where = array('virtual_status' => 'ACTIVE');
        $result = $this->db->select('*')->where($where)->order_by('id', 'DESC')->get('invoices')->result_array();
        return $result;
    } 
    public function getSingleProduct($id){
        $where = array('virtual_status' => 'ACTIVE', 'id' => base64_decode(($id)));
        $result = $this->db->select('*')->where($where)->get('product')->result_array(); 
        return $result;
    }
    public function updateDefaultProduct($fields,$product_id) {
      
        $this->db->where('id', $product_id);
        $this->db->where('virtual_status', 'ACTIVE');
        $data_update=$this->db->update('product', $fields);
        return $data_update;
         
    }
    public function deleteProduct($id){

        $fields = array('virtual_status' => 'DELETED');
        $data_delete=$this->db->where('id', $id['product_id'])->update('product', $fields);
        return $data_delete;
    }
    public function getSingleInvoice($id){
       
        $where = array('deleted' => 'N', 'dbRowId' => $id);
        $result = $this->db->select('*')->where($where)->get('db')->result_array(); 
        return $result;
    }

}    