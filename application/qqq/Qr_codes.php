<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr_codes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Qr_codes_model');
    }

    public function index() { 
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Payment QR Codes');
        $data['getAllqrcodes'] = $this->Qr_codes_model->getAllqrcodes();
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('qr_codes',$data);
        $this->load->view('includes/footer', $title);
    }
    public function addQrcodes() { 
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'QR Codes');
       
        $fields = array(
            'name' => $_POST['qr_name'],
            'isDefault' => $_POST['is_default'],
            'created_ipaddress' => $_SERVER['REMOTE_ADDR'],
            'virtual_status' => 'ACTIVE'
        );
        $data = $this->Qr_codes_model->addQrcodes($fields);
        print_r($data);
        return $data;
        // if($data == true){
        // $dataUpdate = $this->Categories_model->updateDefaultCategory($data);
        // if($dataUpdate == true){
        //         print_r(1);
        //     }else{
        //         print_r(0);
        //     }
        // }else{
        //     print_r(0);
        // }
        
        // $this->load->view('includes/assets', $title);
        // $this->load->view('includes/header', $title);
        // $this->load->view('addTaxes');
        // $this->load->view('includes/footer', $title);
    }
    public function getSingleCategory($categoryID){
        $where = array('virtual_status' => 'ACTIVE', 'id' => base64_decode(($categoryID)));
        $result = $this->db->select('*')->where($where)->get('category')->result_array(); 
        return $result;
    }
    public function updateQrcode(){
        $field=array(
            'name'=>$_POST['edit_qr_name'],
        );
        
        $dataUpdate = $this->Qr_codes_model->updateDefaultQrcode($field);
        
        if($dataUpdate == true){
            print_r(1);
        }else{
            print_r(0);
        }

    }

    function deleteQrcode() {
        $fields = array(
            "qrcodeid" =>$_POST['delete_qr_id'],
            
        );
        $dataDelete = $this->Qr_codes_model->deleteQrcode($fields);
        print_r($dataDelete);
        return $dataDelete;
        
    }

}