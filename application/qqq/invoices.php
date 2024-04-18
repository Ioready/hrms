<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Invoices_model');
    }

    public function index() { 
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Invoice');
        $data['getAllInvoice'] = $this->Invoices_model->getAllInvoice();
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('invoices',$data);
        $this->load->view('includes/footer', $title);
    }
    public function addInvoices() { 
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Invoice');
        // $data = $this->Clients_model->getAllClients();
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('addInvoices');
        $this->load->view('includes/footer', $title);
    }
    public function addInvoices_ctrl() {

        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Product');
        $fields = array(
            'client_id' => $_POST['client'],
            'name' => $_POST['invoice_name'],
            'invoice_date' => $_POST['invoice_date'],
            'due_date' => $_POST['due_date'],
            'invoice_status' => $_POST['invoice_status'],
            'template_id' => $_POST['template_id'],
            'qr_code_id' => $_POST['qr_code_id'],
            'currency_id' => $_POST['currency_id'],
            'created_ipaddress' => $_SERVER['REMOTE_ADDR'],
            'virtual_status' => 'ACTIVE'
        );
        $data = $this->Invoices_model->addInvoices_model($fields);
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
    public function editProducts() { 
        
        
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Products');
        $id = $this->uri->segment(3);
        $data['getAllproduct'] = $this->Products_model->getSingleProduct($id);
        // $data = $this->Clients_model->getAllClients();
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('editProducts',$data);
        $this->load->view('includes/footer', $title);
    }
    
    public function updateProduct(){
       
        $fields=array(
            'name'=>$_POST['p_name'],
            'product_code'=>$_POST['p_code'],
            'category_id'=>$_POST['category_name'],
            'unit_price'=>$_POST['u_price'],
            'description'=>$_POST['u_notes']
        );
        $dataUpdate = $this->Products_model->updateDefaultProduct($fields,$_POST['p_id']);
        print_r($dataUpdate);exit;
        if($dataUpdate == true){
            print_r(1);
        }else{
            print_r(0);
        }

    }

    function deleteProduct() {
        $fields = array(
            "product_id" =>$_POST['delete_cat_id'],
            
        );
        $dataDelete = $this->Products_model->deleteProduct($fields);
        print_r($dataDelete);
        return $dataDelete;
        
    }

}