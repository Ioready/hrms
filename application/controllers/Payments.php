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
            'payment_date' => $_POST['payment_date'],
            'amount' => $_POST['amount'],
            'payment_method' => $_POST['payment_mode'],
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
    public function updatepayment(){
        $id = array(
            "payment_id" =>$_POST['edit_pay_id']
            
        );
        $dataUpdate = $this->Payments_model->updateDefaultPayments($id);
        print_r($dataUpdate);
        return $dataUpdate;
        

    }

    function deletePayment() {
        
       
        $dataDelete = $this->Payments_model->deletePayment($_POST['delete_cat_id']);
        print_r($dataDelete);
        return $dataDelete;
        
    }
    public function exportCSV()
    {

        $payment_export = $this->Payments_model->getAllPayments();
            foreach ($payment_export as $key => $value) {

            
                $payment[] = array(
                    "Payment Date" => $value['payment_date'],
                    "Invoice ID" => $value['invoice'],
                    "Payment Amount" => $value['amount'],
                    "Payment Method" => $value['payment_method']

                );

            }
            $filename = 'payment' . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: text/csv;");
            $file = fopen('php://output', 'w');
            $header = array("Payment Date", "Invoice ID", "Payment Amount", "Payment Method");
            fputcsv($file, $header);
            foreach ($payment as $key => $val) {
                fputcsv($file, $val);
            }

            fclose($file);

            exit;
        }
    }


