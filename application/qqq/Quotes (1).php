<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Quotes_model');
    }

    public function index() { 
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Quotes');
        $data['getAllQuotes'] = $this->Quotes_model->getAllQuotes();
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('quotes',$data);
        $this->load->view('includes/footer', $title);
    }
    public function addQuotes() { 
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Quotes');
        // $data = $this->Clients_model->getAllClients();
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('addQuotes');
        $this->load->view('includes/footer', $title);
    }
    public function addQuotes_ctrl() {

        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Quotes');
        $fields = array(
            'client_id' => $_POST['client'],
            'name' => $_POST['quotes_name'],
            'quotes_date' => $_POST['quotes_date'],
            'due_date' => $_POST['due_date'],
            'quotes_status' => $_POST['quotes_status'],
            'template_id' => $_POST['template_id'],
            'qr_code_id' => $_POST['qr_code_id'],
            'currency_id' => $_POST['currency_id'],
            'created_ipaddress' => $_SERVER['REMOTE_ADDR'],
            'virtual_status' => 'ACTIVE'
        );
        $data = $this->Quotes_model->addQuotes_model($fields);
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
    public function editQuotes() { 
        
        
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Quotes');
        $id = $this->uri->segment(3);
        $data['getAllQuotes'] = $this->Quotes_model->getSingleProduct($id);
        // $data = $this->Clients_model->getAllClients();
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('editQuotes',$data);
        $this->load->view('includes/footer', $title);
    }
    
    public function updateQuotes(){
       
        $fields=array(
            'client_id' => $_POST['client'],
            'name'=>$_POST['quotes_name'],
            'quotes_date'=>$_POST['quotes_date'],
            'due_date'=>$_POST['due_date'],
            
        );
        $dataUpdate = $this->Quotes_model->updateDefaultQuotes($fields,$_POST['p_id']);
        print_r($dataUpdate);
        if($dataUpdate == true){
            print_r(1);
        }else{
            print_r(0);
        }

    }

    function deleteQuotes() {
        $fields = array(
            "quotes_id" =>$_POST['delete_cat_id'],
            
        );
        $dataDelete = $this->Quotes_model->deleteQuotes($fields);
        print_r($dataDelete);
        return $dataDelete;
        
    }

}