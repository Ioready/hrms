<?php

class Payments_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }
    public function addPayment($fields){
        // print_r($fields);exit;
        $result = $this->db->insert('payments', $fields);
        $insert_id =  $this->db->insert_id();
        if($insert_id > 0){
         return $insert_id;
        }else{
         return 0;
        }
    }
    public function getAllPayments(){ 
        $this->db->select(
            'payments.id as paymentsid,
        payments.invoice,payments.payment_date,payments.amount,payments.payment_method,payments.notes,
        payments.virtual_status,
        db.dbRowId,
        db.InvoiceID as InvoiceID,
        db.dbDt,
        db.dueDate,
        db.deleted');
        $this->db->from('payments' );
        $this->db->join('db','db.dbRowId = payments.invoice');
        $this->db->where('payments.virtual_status', 'ACTIVE');
        $this->db->where('db.deleted', 'N');

        $this->db->order_by('payments.id', "desc");
        $query = $this->db->get();

        // print_r($this->db->last_query());
        $result=$query->result_array();
        
        return $result;

        // $where = array('virtual_status' => 'ACTIVE');
        // $result = $this->db->select('*')->where($where)->order_by('id', 'DESC')->get('payments')->result_array();
        // return $result;
    } 
    public function updateDefaultPayments($id) {
        
        $fields = array(
            "invoice" =>$_POST['invoice_pay_id'],
            "payment_date" =>$_POST['update_payment_date'],
            "amount" =>$_POST['payment_amount'],
            "payment_method" =>$_POST['update_payment_mode'],
            "notes" =>$_POST['update_payment_note']
        );
        $this->db->where('id', $id['payment_id']);
        $this->db->where('virtual_status', 'ACTIVE');
        $data_update=$this->db->update('payments', $fields);
        return $data_update;
         
    }
    public function deletePayment($id){

        $fields = array('virtual_status' => 'DELETED');
        $data_delete=$this->db->where('id', $id)->update('payments', $fields);
        return $data_delete;
    }

}