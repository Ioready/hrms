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
        $title = array('menu' => 'Invoice');
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
    public function editInvoices() { 
        
        
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Invoice');
        $id = $this->uri->segment(3);
        $data['getAllInvoice'] = $this->Invoices_model->getSingleProduct($id);
        // $data = $this->Clients_model->getAllClients();
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('editInvoices',$data);
        $this->load->view('includes/footer', $title);
    }
    
    public function updateInvoices(){
       
        $fields=array(
            'client_id' => $_POST['client'],
            'name'=>$_POST['invoice_name'],
            'invoice_date'=>$_POST['invoice_date'],
            'due_date'=>$_POST['due_date'],
            
        );
        $dataUpdate = $this->Invoices_model->updateDefaultInvoices($fields,$_POST['p_id']);
        print_r($dataUpdate);
        if($dataUpdate == true){
            print_r(1);
        }else{
            print_r(0);
        }

    }

    function deleteInvoice() {
        $fields = array(
            "invoice_id" =>$_POST['delete_cat_id'],
            
        );
        $dataDelete = $this->Invoices_model->deleteInvoice($fields);
        print_r($dataDelete);
        return $dataDelete;
        
    }
    
    
    public function exportCSV()
    {
        $InvoicesExportALL= $this->Invoices_model->getAllInvoice();
            foreach ($InvoicesExportALL as $key => $value) {
                $invoices[] = array(
                    "Invoice ID" => $value['name'],
                    "Due Date" => $value['due_date'],
                    // "Amount" => $value['due_date'],
                    "Status" => $value['invoice_status']
                );
            }
            $filename = 'invoices' . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: text/csv;");
            $file = fopen('php://output', 'w');
            $header = array("Invoice ID", "Due Date", "Status");
            fputcsv($file, $header);
            foreach ($invoices as $key => $val) {
                fputcsv($file, $val);
            }

            fclose($file);

            exit;
        }
        public function getInvoice() { 
            $data= $this->Invoices_model->getSingleInvoice($_POST['id']);
            echo json_encode($data);
        }

}