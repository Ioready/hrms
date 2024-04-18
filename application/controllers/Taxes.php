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
        $isexistsname = $this->Taxes_model->nameExistsCheck($_POST['tax_name']);
        if(!empty($isexistsname))
        {
            print_r(3);exit;
        }
        $fields = array(
            'name' => $_POST['tax_name'],
            'tax' => $_POST['tax_value'],
            // 'isDefault' => $_POST['is_default'],
            'created_ipaddress' => $_SERVER['REMOTE_ADDR'],
            'virtual_status' => 'ACTIVE'
        );
        $data = $this->Taxes_model->addTax($fields);
        print_r(1);

        // if($data == true){
        // if($_POST['is_default'] == '1'){
        // $dataUpdate = $this->Taxes_model->updateDefaultTax($data);
        // }
        // print_r(1);
        // }else{
        //     print_r(0);
        // }
        
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
        $where = $_POST['taxId'];
        $fields = array(
            'isDefault' => isset($_POST['status'])? $_POST['status'] : '',
        );
        $data = $this->Taxes_model->updateDefaultTax_new($fields, $where);
        if($data == true){
            print_r(1);
        }else{
            print_r(0);
        }

    }
    public function updateTax(){
        $where = $_POST['edit_taxId'];
        $isexistsname = $this->Taxes_model->editNameExistsCheck($_POST['edit_tax_name'], $where);
        if($isexistsname == true)
        {
            print_r(3);
            exit;
        }
        $fields = array(
            'name' => isset($_POST['edit_tax_name'])? $_POST['edit_tax_name'] : '',
            'tax' => isset($_POST['edit_tax_value'])? $_POST['edit_tax_value'] : '',
            // 'isDefault' => isset($_POST['edit_is_default'])? $_POST['edit_is_default'] : '0',
            'updated_ipaddress' => $_SERVER['REMOTE_ADDR'],
        );
        $data = $this->Taxes_model->updateTax($fields, $where);
                print_r(1);

        // if($data == true){
        //     if($_POST['edit_is_default'] == '1'){
        //         $dataUpdate = $this->Taxes_model->updateDefaultTax(base64_decode($where));
        //     }
        //         print_r(1);
        //     }else{
        //         print_r(0);
        //     }

    }
public function deletetax() {
        $result = $this->Taxes_model->deleteTax($_POST['delete_taxId']);
        if($result == true){
            print_r(1);
        }else{
            print_r(0);
        }    }
}