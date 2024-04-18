<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Payments_model');
    }

    public function index() { 
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Payments');
        $data['getAllPayment'] = $this->Payments_model->getAllPayments();
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('payments',$data);
        $this->load->view('includes/footer', $title);
    }
    public function addPayment() { 
       
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Payment');
        $fields = array(
            'invoice'=>$_POST['invoice_id'],
            'payment date' => $_POST['payment_date'],
            'amount' => $_POST['amount'],
            'payment method' => $_POST['payment_mode'],
            'notes' => $_POST['notes'],
            'created_ipaddress' => $_SERVER['REMOTE_ADDR'],
            'virtual_status' => 'ACTIVE'
        );
        $dataUpdate = $this->Payments_model->addPayment($fields);
        return $dataUpdate;
        
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
    public function updateCategory(){
        
        
        $dataUpdate = $this->Categories_model->updateDefaultCategory();
        print_r($dataUpdate);exit;
        if($dataUpdate == true){
            print_r(1);
        }else{
            print_r(0);
        }

    }

    function deleteCategory() {
        $fields = array(
            "categoryId" =>$_POST['delete_cat_id'],
            
        );
        $dataDelete = $this->Categories_model->deleteCategory($fields);
        print_r($dataDelete);
        return $dataDelete;
        
    }

}