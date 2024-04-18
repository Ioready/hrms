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
}    