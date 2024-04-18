<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Products_model');
    }

    public function index() { 
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Product');
        $data['getAllProduct'] = $this->Products_model->getAllProduct();
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('products',$data);
        $this->load->view('includes/footer', $title);
    }
    public function addProducts() { 
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Products');
        // $data = $this->Clients_model->getAllClients();
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('addProducts');
        $this->load->view('includes/footer', $title);
    }
    public function addproduct_ctrl() { 
       
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Product');
        $fields = array(
            'name' => $_POST['p_name'],
            'product_code' => $_POST['p_code'],
            'category_id' => $_POST['category_name'],
            'unit_price' => $_POST['u_price'],
            'description' => $_POST['u_notes'],
            'created_ipaddress' => $_SERVER['REMOTE_ADDR'],
            'virtual_status' => 'ACTIVE'
        );
        $data = $this->Products_model->addproduct_model($fields);
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