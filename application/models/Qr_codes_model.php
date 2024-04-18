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
        if ($getDefaultqr_code = $this->db->select('id')->where('isDefault', 1)->get('qr_code')) {
            if ($getDefaultqr_code->num_rows() > 0) {
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
    public function updateQrcode($id, $fields){

        $data_update=$this->db->where('id', $id)->update('qr_code', $fields);
        return $data_update;
    }
    public function deleteQrcode($id){

        $fields = array('virtual_status' => 'DELETED');
        $data_delete=$this->db->where('id', $id)->update('qr_code', $fields);
        return $data_delete;
    }
    
    public function updateDefaultQR_new($fields,$qrID) {
        $qrID = base64_decode($qrID);
        if($fields['isDefault'] == 1){
            if ($getDefaultqr_code = $this->db->select('id')->where('isDefault', 1)->get('qr_code')) {
                if ($getDefaultqr_code->num_rows() > 0) {
                    if ($this->db->where('isDefault', 1)->update('qr_code', array('isDefault' => 0))) {
                        $result = $this->db->where('id', $qrID)->update('qr_code', array('isDefault' => 1));
                        return $result;
                    }
                } else {
                    $result = $this->db->where('id', $qrID)->update('qr_code', $fields);
                    return $result;
                }
            }
        }else {
                $result = $this->db->where('id', $qrID)->update('qr_code', $fields);
                return $result;
            }
        }
        public function nameExistsCheck($getname)
        {
         $where = array('name' => $getname, 'virtual_status' => 'ACTIVE');
         $result = $this->db->select('*')->where($where)->get('qr_code')->result_array();
         return $result;
        }
        public function editNameExistsCheck($getname,$id)
        {
         $where = array('name' => $getname,'virtual_status' => 'ACTIVE');
         $id = base64_decode($id);
         $result = $this->db->select('*')->where($where)->where('id !=',$id)->get('qr_code')->result_array();
         return $result;
        }
}    