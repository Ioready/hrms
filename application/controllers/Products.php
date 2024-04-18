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
			$data['getAllProduct'] = $this->Products_model->getItems();

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

        // $data = $this->Products_model->getSingleItem();
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('addProducts');
        $this->load->view('includes/footer', $title);
    }
    public function addproduct_ctrl()
    {
        $data = array(
            'itemName' => isset($_POST['itemName'])?  $_POST['itemName'] : '',
            'codes' => isset($_POST['codes'])?  $_POST['codes'] : '',
            'made_to_measure' => isset($_POST['made_to_measure'])?  $_POST['made_to_measure'] : '',
            'paint_to_order' => isset($_POST['paint_to_order'])?  $_POST['paint_to_order'] : '',
            'cutting_edged' => isset($_POST['cutting_edged'])?  $_POST['cutting_edged'] : '',
            'description' => isset($_POST['description'])?  $_POST['description'] : '',
            'sellingPrice' => isset($_POST['sellingPrice'])?  str_replace('£', '',$_POST['sellingPrice']) : '',
            'price' => isset($_POST['sellingPrice'])?  $_POST['sellingPrice'] : '',
            );
        
        
        $res = $this->db->insert('items', $data);
        echo 1;
    }
    public function editProducts() { 
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Products');
        $id = $this->uri->segment(3);

        $data['getAllproduct'] = $this->Products_model->getSingleItem($id);
        // $data = $this->Clients_model->getAllClients();
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('editProducts',$data);
        $this->load->view('includes/footer', $title);
    }
    public function updateProduct(){
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $id = $_POST['itemID'];
        $getAllproduct = $this->Products_model->getSingleItem($id);
        $items = reset($getAllproduct);
        $data = array(
            'itemName' => isset($_POST['itemName']) ? $_POST['itemName']:  $items['itemName'] ,
            'codes' => isset($_POST['codes']) ? $_POST['codes']:  $items['codes'] ,
            'made_to_measure' => isset($_POST['made_to_measure']) ? $_POST['made_to_measure']:  $items['made_to_measure'] ,
            'paint_to_order' => isset($_POST['paint_to_order']) ? $_POST['paint_to_order']:  $items['paint_to_order'] ,
            'cutting_edged' => isset($_POST['cutting_edged']) ? $_POST['cutting_edged']:  $items['cutting_edged'] ,
            'description' => isset($_POST['description']) ? $_POST['description']:  $items['description'] ,
                        'sellingPrice' => isset($_POST['sellingPrice']) ? $_POST['sellingPrice']:  $items['sellingPrice'] ,
            'price' => isset($_POST['sellingPrice']) ? $_POST['sellingPrice']:  $items['sellingPrice'] ,
                    );
       
        $dataUpdate = $this->Products_model->updateProduct($data,$id);
        if($dataUpdate == true){
            print_r(1);
        }else{
            print_r(0);
        }

    }

    function deleteProduct() {
        $dataDelete = $this->Products_model->deleteProduct($_POST['delete_cat_id']);
        print_r($dataDelete);
        return $dataDelete;
        
    }



}