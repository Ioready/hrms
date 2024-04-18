<?php

class Client_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }
    public function addClient_ctrl($fields){
        $result = $this->db->insert('client_admin_login', $fields);
        $insert_id =  $this->db->insert_id();
        if($insert_id > 0){
         return $insert_id;
        }else{
         return 0;
        }
    }
    public function getAllClient(){
        $where = array('ca_virtualStatus' => 'ACTIVE');
        $result = $this->db->select('*')->where($where)->order_by('ca_id', 'DESC')->get('client_admin_login')->result_array();
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
    public function deletetax(){
       $taxid = base64_decode(isset($_POST['taxId']) ? $_POST['taxId'] : '');
       $date = date('Y-m-d H:i:s');
       $deleteArray = array(
           'virtual_status' => 'DELETE'
       );
       $this->db->where('id', $taxid);
       $deletetax = $this->db->update('tax', $deleteArray);
       return $deletetax;
   }
   public function nameexitscheck($getname)
   {
    $where = array('name' => $getname);
    $result = $this->db->select('*')->where($where)->get('tax')->result_array();
    return $result;
   }
   public function deleteclient(){
    $clientid = base64_decode(isset($_POST['clientId']) ? $_POST['clientId'] : '');
    $date = date('Y-m-d H:i:s');
    $deleteArray = array(
        'ca_virtualStatus' => 'DELETE'
    );
    $this->db->where('ca_id', $clientid);
    $deleteclient = $this->db->update('client_admin_login', $deleteArray);
    return $deleteclient;
}
public function getSingleClient($cilentId){
    $where = array('ca_virtualStatus' => 'ACTIVE', 'ca_id' => base64_decode(($cilentId)));
    $result = $this->db->select('*')->where($where)->get(TBL_ADMIN_LOGIN)->result_array(); 
    return $result;
}
public function updateClient($fields,$where){
    $result = $this->db->where($where)->update('client_admin_login', $fields);
    return $result;
} 
public function nameexitsclientcheck($getname)
{
 $where = array('ca_fname' => $getname);
 $result = $this->db->select('*')->where($where)->get('client_admin_login')->result_array();
 return $result;
}
}    