<?php

class Categories_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }
    public function addCategory($fields){
       
        $this->db->select("*");
        $this->db->from("category");
        $this->db->where("name", $fields['name']); 
        $this->db->where("virtual_status", 'ACTIVE'); 
        $result = $this->db->get();
        if($result->num_rows() > 0){
            return 0;
         } else {
             $this->db->insert('category', $fields);
         return 1;
         }
    }
    public function getAllCategory(){
        $where = array('virtual_status' => 'ACTIVE');
        $result = $this->db->select('*')->where($where)->order_by('id', 'DESC')->get('category')->result_array();
        return $result;
    } 
    public function updateDefaultCategory() {
       
        $fields = array('name' => $_POST['edit_category_name']);
        $this->db->select("*");
        $this->db->from("category");
        $this->db->where("name", $fields['name']); 
        $this->db->where("virtual_status", 'ACTIVE'); 
        $result = $this->db->get();
        if($result->num_rows() > 0){
            return 0;
         } else {
      
        $this->db->where('id', $_POST['edit_cat_id']);
        $this->db->where('virtual_status', 'ACTIVE');
        $data_update=$this->db->update('category', $fields);
        return $data_update;
         }
    }
    public function deleteCategory($id){

        $fields = array('virtual_status' => 'DELETED');
        $data_delete=$this->db->where('id', $id['categoryId'])->update('category', $fields);
        return $data_delete;
    }

}    