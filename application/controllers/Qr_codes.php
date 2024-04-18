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
        $isexistsname = $this->Qr_codes_model->nameExistsCheck($_POST['qr_name']);
        if(!empty($isexistsname))
        {
            print_r(3);
            exit;
        }
            $files = $_FILES;
            // print_r($_FILES);exit;
            $file = $_FILES['file']['name']; 
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            $filename = time() . substr(str_replace(" ", "_", $fileName), 5) . "." . $ext;
            $config['upload_path'] = UPLOAD_QR_PIC_PATH;
            $config['allowed_types'] = 'jpg|jpeg|png|JPG|PNG|JPEG';
            $config['max_size'] = '2048';
            $config['max_width'] = '2048';
            $config['max_height'] = '2048';
            $config['remove_spaces'] = true;
            $config['file_name'] = $filename;
    
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
    
            if (!$this->upload->do_upload('file')) {
                $error = $this->upload->display_errors();
                echo $error;
                exit;
            }
            $data = $this->upload->data();
        
        $fields = array(
            'name' => $_POST['qr_name'],
            'qr_code' => '/assets/img/qrcodes/'.$filename,
            'created_ipaddress' => $_SERVER['REMOTE_ADDR'],
            'virtual_status' => 'ACTIVE'
        );
        $data = $this->Qr_codes_model->addQrcodes($fields);
        print_r(1);
        // return $data;
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
        $isexistsname = $this->Qr_codes_model->editNameExistsCheck($_POST['edit_qr_name'],$_POST['edit_qr_id']);
        if(!empty($isexistsname))
        {
            print_r(3);exit;
        }
        $where = $_POST['edit_qr_id'];
        $field=array(
            'name'=>$_POST['edit_qr_name'],
        );
         
        $dataUpdate = $this->Qr_codes_model->updateQrcode($where, $field);
        
        if($dataUpdate == true){
            print_r(1);
        }else{
            print_r(0);
        } 


    }
    public function updateDefaultQR(){
        
        $where = $_POST['qr_id'];
        $fields = array(
            'isDefault' => isset($_POST['status'])? $_POST['status'] : '',
        );
        $data = $this->Qr_codes_model->updateDefaultQR_new($fields, $where);
        if($data == true){
            print_r(1);
        }else{
            print_r(0);
        }

    }
    function deleteQrcode() {
        $dataDelete = $this->Qr_codes_model->deleteQrcode($_POST['delete_qr_id']);
        print_r($dataDelete);
        return $dataDelete;
        
    }

}