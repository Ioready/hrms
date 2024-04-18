<?php

class Products_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }
    public function addproduct_model($fields){
      
        $result = $this->db->insert('product', $fields);
        $insert_id =  $this->db->insert_id();

        if($insert_id > 0){
         return $insert_id;
        }else{
         return 0;
        }
    
    }


    
    public function getItems()
	{
		$this->db->select('*, itemRowId, itemName, sellingPrice as rate');
		$this->db->where('deleted', 'N');
		$this->db->order_by('itemName');
		$query = $this->db->get('items');

		return($query->result_array());
	}	
    
    public function getSingleItem($id)
	{
		$this->db->select('*, itemRowId, itemName, sellingPrice as rate');
		$this->db->where('deleted', 'N');
		$this->db->where('itemRowId', base64_decode($id));
		$this->db->order_by('itemName');
		$query = $this->db->get('items');

		return($query->result_array());
	}	

    public function updateProduct($fields,$product_id) {
      
        $this->db->where('itemRowId', base64_decode($product_id));
        $data_update=$this->db->update('items', $fields);
        return $data_update;
         
    }
    public function deleteProduct($id){

        $fields = array('deleted' => 'Y');
        $data_delete=$this->db->where('itemRowId', $id)->update('items', $fields);
        return $data_delete;
    }

}    