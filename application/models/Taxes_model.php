<?php

class Taxes_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }
    public function addTax($fields){
        $result = $this->db->insert('tax', $fields);
        $insert_id =  $this->db->insert_id();
        if($insert_id > 0){
         return $insert_id;
        }else{
         return 0;
        }
    }
    public function getAllTax(){
        $where = array('virtual_status' => 'ACTIVE');
        $result = $this->db->select('*')->where($where)->order_by('id', 'DESC')->get('tax')->result_array();
        return $result;
    } 
    
    public function updateDefaultTax_new($fields,$taxID) {
        $taxID = base64_decode($taxID);
        if($fields['isDefault'] == 1){
            if ($getDefaultTax = $this->db->select('id')->where('isDefault', 1)->get('tax')) {
                if ($getDefaultTax->num_rows() > 0) {
                    if ($this->db->where('isDefault', 1)->update('tax', array('isDefault' => 0))) {
                        $result = $this->db->where('id', $taxID)->update('tax', array('isDefault' => 1));
                        return $result;
                    }
                } else {
                    $result = $this->db->where('id', $taxID)->update('tax', $fields);
                    return $result;
                }
            }
        }else {
                $result = $this->db->where('id', $taxID)->update('tax', $fields);
                return $result;
            }
        }
    public function updateDefaultTax($taxID) {
        $fieldNew = array('isDefault' => 1);
        $fieldUpdate = array('isDefault' => 0);
        if ($getDefaultTax = $this->db->select('id')->where('isDefault', 1)->get('tax')) {
            if ($getDefaultTax->num_rows() > 0) {
                if ($this->db->where('isDefault', 1)->update('tax', $fieldUpdate)) {
                    $result = $this->db->where('id', $taxID)->update('tax', $fieldNew);
                    return $result;
                }
            } 
            else {
                $result = $this->db->where('id', $taxID)->update('tax', $fieldNew);
                return $result;
            }
        }
    }
   public function nameExistsCheck($getname)
   {
    $where = array('name' => $getname, 'virtual_status' => 'ACTIVE');
    $result = $this->db->select('*')->where($where)->get('tax')->result_array();
    return $result;
   }
   public function editNameExistsCheck($getname,$id)
   {
    $where = array('name' => $getname, 'virtual_status' => 'ACTIVE');
    $id = base64_decode($id);
    $result = $this->db->select('*')->where($where)->where('id !=',$id)->get('tax')->result_array();
    return $result;
   }
   

   public function updateTax($fields,$taxID){
     $result = $this->db->where('id',base64_decode($taxID))->update('tax', $fields);
    //  print_r($this->db->last_query());
     return $result;
    }

    public function deleteTax($taxID){
    $fields = array('virtual_status' => 'DELETED');
    $result = $this->db->where('id',base64_decode($taxID))->update('tax', $fields);
    return $result;
    }
}    