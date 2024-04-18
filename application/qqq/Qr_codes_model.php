<?php

class Qr_codes_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }
    public function addQrcodes($fields){
       
        $result = $this->db->insert('qr_code', $fields);
        $insert_id =  $this->db->insert_id();
        if($insert_id > 0){
         return $insert_id;
        }else{
         return 0;
        }
    }
    public function getAllqrcodes(){
        $where = array('virtual_status' => 'ACTIVE');
        $result = $this->db->select('*')->where($where)->order_by('id', 'DESC')->get('qr_code')->result_array();
        return $result;
    } 
    public function updateDefaultQrcode($field) {
       
        $fieldNew = array('isDefault' => 1);
        $fieldUpdate = array('isDefault' => 0);
        if ($getDefaultTax = $this->db->select('id')->where('isDefault', 1)->get('qr_code')) {
            if ($getDefaultTax->num_rows() > 0) {
                if ($this->db->where('isDefault', 1)->update('qr_code', $fieldUpdate)) {
                    $result = $this->db->where('id', $field['name'])->update('qr_code', $fieldNew);
                    return $result;
                }
            } 
            else {
                $result = $this->db->where('id', $field['name'])->update('qr_code', $fieldNew);
                return $result;
            }
        }
    }
    
    public function deleteQrcode($id){

        $fields = array('virtual_status' => 'DELETED');
        $data_delete=$this->db->where('id', $id['qrcodeid'])->update('qr_code', $fields);
        return $data_delete;
    }

}    