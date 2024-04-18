<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taxes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Taxes_model');
    }

    public function index() { 
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Taxes');
        $data['getAllTax'] = $this->Taxes_model->getAllTax();
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('taxes',$data);
        $this->load->view('includes/footer', $title);
    }
    public function addTax() { 
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Taxes');
        $fields = array(
            'name' => $_POST['tax_name'],
            'tax' => $_POST['tax_value'],
            'isDefault' => $_POST['is_default'],
            'created_ipaddress' => $_SERVER['REMOTE_ADDR'],
            'virtual_status' => 'ACTIVE'
        );
        $data = $this->Taxes_model->addTax($fields);
        if($data == true){
        $dataUpdate = $this->Taxes_model->updateDefaultTax($data);
        if($dataUpdate == true){
                print_r(1);
            }else{
                print_r(0);
            }
        }else{
            print_r(0);
        }
        
        // $this->load->view('includes/assets', $title);
        // $this->load->view('includes/header', $title);
        // $this->load->view('addTaxes');
        // $this->load->view('includes/footer', $title);
    }
    public function getSingleTax($taxID){
        $where = array('virtual_status' => 'ACTIVE', 'id' => base64_decode(($taxID)));
        $result = $this->db->select('*')->where($where)->get('tax')->result_array(); 
        return $result;
    }
    public function updateDefaultTax(){
        $dataUpdate = $this->Taxes_model->updateDefaultTax($_POST['status']);
        if($dataUpdate == true){
            print_r(1);
        }else{
            print_r(0);
        }

    }
}