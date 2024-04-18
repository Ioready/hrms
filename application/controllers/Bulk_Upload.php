<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bulk_Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() { 
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Bulk Upload');
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('bulk_upload');
        $this->load->view('includes/footer', $title);
    }
public function upload_data(){

    $files = $_FILES;
    // print_r($_FILES);exit;
    $file = $_FILES['file']['name']; 
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $fileName = pathinfo($file, PATHINFO_FILENAME);
    $filename = time() . substr(str_replace(" ", "_", $fileName), 5) . "." . $ext;
    $config['upload_path'] = UPLOAD_BULK_UPLOAD_PATH;
    $config['allowed_types'] = '*';
    $config['max_size'] = 1024;
    $config['max_width'] = 1024;
   $config['max_height'] = 768;
    $config['file_name'] = $filename;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('file')) {
        $error = $this->upload->display_errors();
        echo $error; 
        exit;
    }else{
        $file = $_FILES['file'];
        $file = fopen($_FILES["file"]["tmp_name"], "r");
        $check = 0;
        while (($row = fgetcsv($file, 1000, ","))  != FALSE) {
           
            if ($check != 0) {
                $item = array(
                    'itemName' => $row[0],
                    'codes' => $row[1],
                    'made_to_measure' => $row[2],
                    'paint_to_order' => $row[3],
                    'cutting_edged' => $row[4],
                    'description' => $row[5],
                    'quantity' => $row[6],
                    'width' => $row[7],
                    'depth' => $row[8],
                    'sellingPrice' => $row[9],
                    'ex_vat' => $row[10],
                );
                $response = $this->item_details($item);
            }
            $check++;
        }
        if ($response == true) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        // echo 1;
    }
    // $data = $this->upload->data();
    }

    public function item_details($data)
    {
        $item_result = array(
            'itemName' => $data['itemName'],
            'codes' => $data['codes'],
            'made_to_measure' => $data['made_to_measure'],
            'paint_to_order' => $data['paint_to_order'],
            'cutting_edged' => $data['cutting_edged'],
            'description' => $data['description'],
            'quantity' => $data['quantity'],
            'width' => $data['width'],
            'depth' => $data['depth'],
            'sellingPrice' => str_replace('£', '', $data['sellingPrice']),
            'price' => $data['sellingPrice'],
            'ex_vat' => $data['ex_vat'],
            );
        $this->db->insert('items', $item_result);
        return true;
    }
}