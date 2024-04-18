<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

   
    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->library('user_agent');
    }

    
    public function settings() {
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Settings');
        
        $data['getAllSetting'] = $this->Dashboard_model->getSettings();

        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('edit_settings', $data);
        $this->load->view('includes/footer', $title);
    }
    public function updateSetting() {
        $files = $_FILES;
        // print_r($_FILES);exit;
        if(isset($_FILES['file']['name'])){
        $file = $_FILES['file']['name']; 
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $fileName = pathinfo($file, PATHINFO_FILENAME);
        $filename = time() . "." . $ext;
        $config['upload_path'] = UPLOAD_SETTING_PIC_PATH;
        $config['allowed_types'] = 'jpg|jpeg|png|JPG|PNG|JPEG';
        $config['max_size'] = 1024 * 10;
        $config['max_width'] = 1024 * 10;
        $config['max_height'] = 1024 * 10;
        $config['remove_spaces'] = true;
        $config['file_name'] = $filename;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            $error = $this->upload->display_errors();
            echo $error;
            exit;
        }
    }

    if(isset($_FILES['file2']['name'])){
        $file = $_FILES['file2']['name']; 
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $fileName1 = pathinfo($file, PATHINFO_FILENAME);
        $filename1 = time() . "." . $ext;
        $config['upload_path'] = UPLOAD_SETTING_PIC_PATH;
        $config['allowed_types'] = 'jpg|jpeg|png|JPG|PNG|JPEG';
        $config['max_size'] = 1024 * 10;
        $config['max_width'] = 1024 * 10;
        $config['max_height'] = 1024 * 10;
        $config['remove_spaces'] = true;
        $config['file_name'] = $filename1;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file2')) {
            $error = $this->upload->display_errors();
            echo $error;
            exit;
        }
    }

    $data = $this->Dashboard_model->getSettings();
    $data = reset($data);
    $fields = array(
        'app_name' =>isset($_POST['app_name'])? $_POST['app_name'] : $data['app_name'], 
        'company_name' => isset($_POST['company_name'])? $_POST['company_name'] : $data['company_name'],
        'address' => isset($_POST['address'])? $_POST['address'] : $data['address'],
        'phone' => isset($_POST['phone'])? $_POST['phone'] : $data['phone'],
        'app_logo' =>  isset($_FILES['file']['name'])? '/assets/img/setting/'.$filename : $data['app_logo'],
        // 'email_logo' =>  isset($_FILES['file1']['name'])? '/assets/img/setting/'.$filename1 : $data['email_logo'],
        'invoice_logo' =>  isset($_FILES['file2']['name'])? '/assets/img/setting/'.$filename1 : $data['invoice_logo'],
        'updated_ipaddress' => $_SERVER['REMOTE_ADDR'],
        'SMTPHOST' =>      isset($_POST['SMTPHOST'])? $_POST['SMTPHOST'] : $data['SMTPHOST'],
        'SMTPPORT' =>      isset($_POST['SMTPPORT'])? $_POST['SMTPPORT'] : $data['SMTPPORT'],
        'SMTPUSERNAME' =>  isset($_POST['SMTPUSERNAME'])? $_POST['SMTPUSERNAME'] : $data['SMTPUSERNAME'],
        'SMTPPASSWORD' =>  isset($_POST['SMTPPASSWORD'])? $_POST['SMTPPASSWORD'] : $data['SMTPPASSWORD'],
        'SMTPFROMEMAIL' => isset($_POST['SMTPFROMEMAIL'])? $_POST['SMTPFROMEMAIL'] : $data['SMTPFROMEMAIL'],
        'SMTPFROMNAME' =>  isset($_POST['SMTPFROMNAME'])? $_POST['SMTPFROMNAME'] : $data['SMTPFROMNAME'],   
        'RepName' =>  isset($_POST['RepName'])? $_POST['RepName'] : $data['RepName'],   
        'Direct_Line' =>  isset($_POST['Direct_Line'])? $_POST['Direct_Line'] : $data['Direct_Line'],   
        'Email' =>  isset($_POST['Email'])? $_POST['Email'] : $data['Email'],   
        'fsc_certificate' =>  isset($_POST['fsc_certificate'])? $_POST['fsc_certificate'] : $data['fsc_certificate'],
        'invoice_no'   => isset($_POST['invoice_no'])? $_POST['invoice_no'] : $data['invoice_no'],
        'terms_condition' =>  isset($_POST['terms_condition'])? $_POST['terms_condition'] : $data['terms_condition'],   



    );
    $data = $this->Dashboard_model->update_settings($fields);
    print_r(1);
    }


    public function index() {
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Dashboard');

        $data = $this->Dashboard_model->dashboard_counts();
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('dashboard', $data);
        $this->load->view('includes/footer', $title);
    }

    public function clients() {
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Clients');

        $getAllClient['getClient'] = $this->Dashboard_model->getAllClient();

        $data = array_merge($getAllClient);

        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('clients', $data);
        $this->load->view('includes/footer', $title);
    }

    public function Admin() {
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Admin');

        $getAllSuperAdmin['getSuperAdmin'] = $this->Dashboard_model->getAllSuperAdmin();

        $data = array_merge($getAllSuperAdmin);

        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('superAdmin', $data);
        $this->load->view('includes/footer', $title);
    }

    public function addSuperAdmin() {
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Super Admin');

        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('addSuperAdmin');
        $this->load->view('includes/footer', $title);
    }

    public function editSuperAdmin() {
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Super Admin');

        $cilentId = $this->uri->segment(3);
        $getSingleSuperAdmin['getSuperAdmin'] = $this->Dashboard_model->getSingleSuperAdmin($cilentId);

        $data = array_merge($getSingleSuperAdmin);

        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('editSuperAdmin', $data);
        $this->load->view('includes/footer', $title);
    }

    public function addClient() {
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Clients');
        // $title = array('menu' => 'Add Clients');
        $getSampleOffer['getSampleOffer'] = $this->Dashboard_model->getSampleOffer();
        $data = array_merge($getSampleOffer);

        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('addClient', $data);
        $this->load->view('includes/footer', $title);
    }

    public function getClients() {
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Clients');

        $cilentId = $this->uri->segment(3);
        $getSingleClient['getClient'] = $this->Dashboard_model->getSingleClient($cilentId);

        $fields = array('clientID' => $getSingleClient['getClient'][0]['ca_clinetId'], 'developerAPIKey' => $getSingleClient['getClient'][0]['ca_developerKey']);
        $getclientinfo = api_call("getWebhookUrl", $fields, "POST"); 

        $data = array_merge($getSingleClient, $getclientinfo);

        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('getClients', $data);
        $this->load->view('includes/footer', $title);
    }

    public function editClient() {
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Clients');
        $cilentId = $this->uri->segment(3);
        $getSingleClient['getClient'] = $this->Dashboard_model->getSingleClient($cilentId);

        $data = array_merge($getSingleClient);

        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('editClients', $data);
        $this->load->view('includes/footer', $title);
    }

    public function addClientAdmin() {
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Client User');
        // $title = array('menu' => 'Add Clients');
        $getAllClient['getClient'] = $this->Dashboard_model->getAllClient();
        $data =array_merge($getAllClient);
        // print_r($data);

        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('addClientAdmin' , $data);
        $this->load->view('includes/footer', $title);
    }
    public function getClientAdmin() {
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Client User');

        $cilentId = $this->uri->segment(3);
        
        $getSingleClient['getClientAdmin'] = $this->Dashboard_model->getsingleClientAdminUser($cilentId);
        $DomainName['domain_name'] = $this->findDomainName($getSingleClient['getClientAdmin'][0]['client_id']);
        

        $data = array_merge($getSingleClient, $DomainName);
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('getClientAdmin', $data);
        $this->load->view('includes/footer', $title);
    }
    public function editClientAdmin() {
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Client User');
        $cilentId = $this->uri->segment(3);
        $getSingleClient['getClientAdmin'] = $this->Dashboard_model->getsingleClientAdminUser($cilentId);
        $getAllClient['getClient'] = $this->Dashboard_model->getAllClient();
        $data = array_merge($getSingleClient,$getAllClient);
    
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('editClientAdmin', $data);
        $this->load->view('includes/footer', $title);
    }
    public function activityLog() {
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Activity Logs');

        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('activityLog');
        $this->load->view('includes/footer', $title);
    }

    public function masterPassword() {
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $result = $this->Dashboard_model->auto_masterPassword_ctrl();
        if($result == true){
            $title = array('menu' => 'Master Password');
            $clientpassword['clientPass'] = $this->Dashboard_model->getclientpassword();
            $data = array_merge($clientpassword);    
        }
      
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('masterPassword', $data);
        $this->load->view('includes/footer', $title);
    }

    public function clientUser() { 
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Client User');
        $getAllClient['getClient'] = $this->Dashboard_model->getAllClientAdmins(); 
        $data = array_merge($getAllClient);
        // print_r($data);
        // exit;
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('clientUser', $data);
        $this->load->view('includes/footer', $title);
    }

    public function ipAddress() {
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'IP Address');
        $getAllIpaddress['getIpaddress'] = $this->Dashboard_model->getAllIpaddress();
        $data = array_merge($getAllIpaddress);

        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('ipAddress', $data);
        $this->load->view('includes/footer', $title);
    }

    public function clientconfiguration(){ 
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Client Configurations');
        $getAllClient['getClient'] = $this->Dashboard_model->getAllClient();
        $data = array_merge($getAllClient);

        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('clientconfiguration', $data);
        $this->load->view('includes/footer', $title);
    }

    public function editclientconfig(){
        if (!isset($_SESSION['saUserName'])) {
            redirect('home/logout');
        }
        $title = array('menu' => 'Client Configurations');
        $id = $this->uri->segment(3); 
        $getClientconfig['getClientconfig'] = $this->Dashboard_model->getClientconfig($id);
        $data = array_merge($getClientconfig);

        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('editclientconfig', $data);
        $this->load->view('includes/footer', $title);
    }

    public function addClient_ctrl() {


        $checkEmail = $this->Dashboard_model->checkEmail($_POST['ca_emailid']);
        if (!empty($checkEmail)) {
            print_r('Email Address already exists.');
            exit;
        }
        $fields = array('ca_domain' => trim($_POST['ca_domain']),'ca_virtualStatus' => 'ACTIVE');
        $check_domain = $this->Dashboard_model->checkClientAdmin($fields);
        if (!empty($check_domain)) {
            print_r('Domain already exists.');
            exit;
        }
        //
        $fieldsClientId = array('ca_clinetId' => $_POST['ca_clinetId'],'ca_virtualStatus' => 'ACTIVE');
        $checkClientId = $this->Dashboard_model->checkClientAdmin($fieldsClientId);
         if (!empty($checkClientId)) {
            print_r('Client Id already exists.');
            exit;
        }

        $fieldsdeveloperKey = array('ca_developerKey' => $_POST['ca_developerKey'],'ca_virtualStatus' => 'ACTIVE');
        $checkdeveloperKey = $this->Dashboard_model->checkClientAdmin($fieldsdeveloperKey);
         if (!empty($checkdeveloperKey)) {
            print_r('Developer Key already exists.');
            exit;
        }

        //
        
        do {
            $instanseId = "C" . generateRandomString(5);
            $this->db->select("ca_instanseId");
            $this->db->where("ca_instanseId", $instanseId);
            $query = $this->db->get(TBL_ADMIN_LOGIN)->result_array();
            $clientCount = count($query);
        } while ($clientCount > 0);

        if (isset($_POST['ca_domain']) && $_POST['ca_domain'] != "") {
            $ca_domain = trim($_POST['ca_domain']);
        } else {
            $ca_domain = NULL;
        }

        if (isset($_POST['ca_user_unique_name']) && $_POST['ca_user_unique_name'] != "") {
            $ca_alternative_domain = trim($_POST['ca_user_unique_name']);
        } else {
            $ca_alternative_domain = NULL;
        }

        $fields = array(
            'ca_username' => isset($_POST['ca_username']) ? $_POST['ca_username'] : '',
            'ca_name' => isset($_POST['ca_name']) ? $_POST['ca_name'] : '',
            'ca_user_unique_name' => isset($_POST['ca_user_unique_name']) ? $_POST['ca_user_unique_name'] : '',
            'ca_instanseId' => isset($instanseId) ? $instanseId : '',
            'ca_emailid' => isset($_POST['ca_emailid']) ? $_POST['ca_emailid'] : '',
            'ca_clinetId' => isset($_POST['ca_clinetId']) ? $_POST['ca_clinetId'] : '',
            'ca_phoneNumber' => isset($_POST['ca_phoneNumber']) ? $_POST['ca_phoneNumber'] : '',
            'ca_developerKey' => isset($_POST['ca_developerKey']) ? $_POST['ca_developerKey'] : '',
            'ca_createdDate' => date('Y-m-d H:i:s'),
            'ca_createdIpaddress' => $_SERVER['REMOTE_ADDR'],
            'ca_domain' => $ca_domain,
            'ca_alternative_domain' => $ca_alternative_domain,
            'ca_offerSamID' => isset($_POST['sampleOffer']) ? $_POST['sampleOffer'] : '',
        );

        $result = $this->Dashboard_model->addClient_ctrl($fields);

        if(isset($_POST['sampleOffer']) && !empty($_POST['sampleOffer'])){
            $offer = $this->createSampleOffer($result);
        }




       if($result != 0){
        
        // shell_exec("/usr/bin/php /home/devmaasv3/marketplace/SuperAdmin/index.php Dashboard/addWebhook ".base64_encode($result)." > /dev/null 2>/dev/null &");
        
       $this->Lambda('ADD',$result);


        $DashboardMenus = $this->Dashboard_model->createdashboardSections($result);

        $fields2 = array(
            'client_fk_id' => $result,
            'suitability_status' => 1,
            'creditCard_status' => 1,
            'acc_income_status ' => 1,
            'acc_employment_status' => 1,
            'kyc_enhanced' => 0,
            'idb_suitability_status' => 1,
            'idb_income_status ' => 1,
            'idb_employment_status' => 1,
            'sa_docusign_status' => 2,
            'created_at' =>  date('Y-m-d H:i:s'),
            'browser_details' => $_SERVER['HTTP_USER_AGENT'],
        );
        $result2 = $this->Dashboard_model->addClientConfiguration($fields2);
	   
		$field3 = array(
            'client_fk_id' => $result,
            'created_date' => date('Y-m-d H:i:s'),
            'created_ip' => $_SERVER['REMOTE_ADDR'],
            'text_color' => '000000',
            'heading_text_color' => '000000',
            'button_text_color' => '000000',
            'button_border_color' => '000000',
            'header_text_color' => '000000',
            'footer_text_color' => '000000',
            'disclaimer_color' => '000000',
            'button_color' => 'FFFFFF',
            'footer_bckg_color' => 'FFFFFF',
            'disclaimer_background' => 'FFFFFF',
    );
    $result3 = $this->Dashboard_model->addClientStyling($field3);

    $headerSectionVal = array('Login', 'Sign Up', 'Offerings', 'Dashboard');
    foreach ($headerSectionVal as $key => $value) {
        $status = 1;
        $field = array('client_fk_id' => $result,'status' => $status,'defaultName' => $value, 'customName' => $value, 'orderingpostion' => $key + 1);
        $this->db->insert(TBL_HEADER_SECTION, $field);
    }

        if($result2 == 1)
        {
            print_r($result2);
        }else{
            print_r(0);
        }   
        }else{
        print_r(0);
        }
    }

    public function editClient_ctrl() { 
        
        $client_id = base64_decode($_POST['ca_id']);
        $fields = array('ca_domain' => trim($_POST['ca_domain']),'ca_virtualStatus' => 'ACTIVE');

        $check_domain = array();
        $check_domain = $this->Dashboard_model->checkDomainupdate($fields);
        // print_r( $check_domain);
        // exit;

        if (count($check_domain) > 0  && $client_id != $check_domain[0]['ca_id']) {
            print_r('Domain already exists.');
            exit;
        } 
        
        if (isset($_POST['ca_domain']) && $_POST['ca_domain'] != "") {
            $ca_domain = trim($_POST['ca_domain']);
        } else {
            $ca_domain = NULL;
        }


         //
         $wherenot = array('ca_id !='=> base64_decode($_POST['ca_id']));
        $fieldsClientId = array('ca_clinetId' => $_POST['ca_clinetId'],'ca_virtualStatus' => 'ACTIVE');
        $checkClientId = $this->Dashboard_model->checkUpdateClientAdmin($fieldsClientId,$wherenot);
        //echo '<pre>'; print_r($this->db->last_query()); exit;
         if (!empty($checkClientId)) {
            print_r('Client Id already exists.');
            exit;
        }

        $fieldsdeveloperKey = array('ca_developerKey' => $_POST['ca_developerKey'],'ca_virtualStatus' => 'ACTIVE');
        $checkdeveloperKey = $this->Dashboard_model->checkUpdateClientAdmin($fieldsdeveloperKey,$wherenot);
         if (!empty($checkdeveloperKey)) {
            print_r('Developer Key already exists.');
            exit;
        }

        //
        
         $this->DeleteLambda('DELETE',base64_decode($_POST['ca_id']));
        $fields = array(
            'ca_username' => isset($_POST['ca_username']) ? $_POST['ca_username'] : '',
            'ca_name' => isset($_POST['ca_name']) ? $_POST['ca_name'] : '',
            'ca_user_unique_name' => isset($_POST['ca_user_unique_name']) ? $_POST['ca_user_unique_name'] : '',
            'ca_clinetId' => isset($_POST['ca_clinetId']) ? $_POST['ca_clinetId'] : '',
            'ca_phoneNumber' => isset($_POST['ca_phoneNumber']) ? $_POST['ca_phoneNumber'] : '',
            'ca_developerKey' => isset($_POST['ca_developerKey']) ? $_POST['ca_developerKey'] : '',
            'ca_updatedDate' => date('Y-m-d H:i:s'),
            'ca_updatedIpaddress' => $_SERVER['REMOTE_ADDR'],
            'ca_domain' => trim($ca_domain),
        );
        $where = array('ca_id' => base64_decode($_POST['ca_id']));
        $result = $this->Dashboard_model->editClient_ctrl($fields, $where);
        if($result != 0){
            $this->Lambda('UPDATE',base64_decode($_POST['ca_id']));
            
            $fields1 = array(
                'phone_number' => isset($_POST['ca_phoneNumber']) ? $_POST['ca_phoneNumber'] : '',
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_ipaddress' => $_SERVER['REMOTE_ADDR'],
                'domain_name' =>  trim($ca_domain),
                'alternative_domain_name ' =>  isset($_POST['ca_user_unique_name']) ? $_POST['ca_user_unique_name'] : '',
            );
    
            $where = array('client_id' => base64_decode($_POST['ca_id']));
    
            $result1 = $this->Dashboard_model->editClientAdmin_ctrl($fields1, $where);
            if($result1){
                print_r($result1);
            }else{
                print_r(0);
            }
        }else{
            print_r(0);
        }
        
       
    }

    public function findDomainName($client_id)
    {
     $D_name = $this->Dashboard_model->findDomainName(array('ca_virtualStatus'=> 'ACTIVE', 'ca_id' => $client_id));

    //  print_r($D_name);
    //  exit;
     return $D_name[0]['ca_domain'];
    }
    public function addClientAdmin_ctrl() {
        $DomainName = $this->findDomainName($_POST['clientname']);

        $checkEmail = $this->Dashboard_model->checkClientAdminEmail($_POST['emailid'],$_POST['clientname']);
        if (!empty($checkEmail)) {
            print_r('Email Address already exists.');
            exit;
        }
        $fields = array(
            'client_id'=> isset($_POST['clientname']) ? $_POST['clientname'] : '',
            'username' => isset($_POST['emailid']) ? $_POST['emailid'] : '',
            'first_name' => isset($_POST['first_name']) ? $_POST['first_name'] : '',
            'last_name' => isset($_POST['last_name']) ? $_POST['last_name'] : '',
            'phone_number' => isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '',
            'created_at' => date('Y-m-d H:i:s'),
            'created_ipaddress' => $_SERVER['REMOTE_ADDR'],
            'domain_name' => $DomainName,
            'browser_details' => $_SERVER['HTTP_USER_AGENT'],

        );

        $result = $this->Dashboard_model->addClientAdmin_ctrl($fields);
        if($result != 0){
            print_r($result);
        }else{
            print_r(0);
        }   
    }

    public function editClientAdmin_ctrl() {

        // $DomainName = $this->findDomainName($_POST['clientname']);

        // $DomainName = $this->findDomainName($_POST['clientname']);

        // $checkEmail = $this->Dashboard_model->checkClientAdminEmail($_POST['emailid'],$_POST['clientname']);
        // if (!empty($checkEmail)) {
        //     print_r('Email Address already exists.');
        //     exit;
        // }
        $fields = array(
            // 'client_id'=> isset($_POST['clientname']) ? $_POST['clientname'] : '',
            'username' => isset($_POST['emailid']) ? $_POST['emailid'] : '',
            'first_name' => isset($_POST['first_name']) ? $_POST['first_name'] : '',
            'last_name' => isset($_POST['last_name']) ? $_POST['last_name'] : '',
            'phone_number' => isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '',
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_ipaddress' => $_SERVER['REMOTE_ADDR'],
            // 'domain_name' => $DomainName,
            //'domain_name' =>  isset($_POST['domain']) ? $_POST['domain'] : '',
        );

        $where = array('id' => base64_decode($_POST['id']));

        $result = $this->Dashboard_model->editClientAdmin_ctrl($fields, $where);
        
        print_r($result);
        
    }

    public function addSuperAdmin_ctrl() {
        $fields = array('sa_emailid' => $_POST['sa_emailid'],'sa_virtualStatus' => 'ACTIVE');

        $checkSuperAdminMailExists = array();
        $checkSuperAdminMailExists = $this->Dashboard_model->checkSuperAdminMailExists($fields);

        if (count($checkSuperAdminMailExists) > 0) {
            echo '2';
            exit;
        } 
        $fields = array(
            'sa_username' => $_POST['sa_username'],
            'sa_emailid' => $_POST['sa_emailid'],
            'sa_phonenumber' => $_POST['sa_phonenumber'],
            // 'sa_password' => sha1($_POST['sa_password']), 'sa_dcd_password' => $_POST['sa_password'],
            'sa_createdDate' => date('Y-m-d H:i:s'),
            'sa_createdIpAddress' => $_SERVER['REMOTE_ADDR'],
        );

        $result = $this->Dashboard_model->addSuperAdmin_ctrl($fields);
        print_r($result);
    }

    public function deletesuperAdmin_ctrl() {
        $result = $this->Dashboard_model->deletesuperAdmin_ctrl();

        print_r($result);
    }

    public function editSuperAdmin_ctrl() {
        $sa_id = base64_decode($_POST['sa_id']);

        $fields = array('sa_virtualStatus' => 'ACTIVE','sa_emailid' => $_POST['sa_emailid']);

        $checkSuperAdminMailUpdateExists = array();
        $checkSuperAdminMailUpdateExists = $this->Dashboard_model->checkSuperAdminMailExists($fields);
        if (count($checkSuperAdminMailUpdateExists) > 0 && $sa_id != $checkSuperAdminMailUpdateExists[0]['sa_id']) {
            echo '2';
            exit;
        }
                
        $fields = array(
            'sa_username' => $_POST['sa_username'],
            'sa_emailid' => $_POST['sa_emailid'],
            'sa_phonenumber' => $_POST['sa_phonenumber'],
            'sa_createdDate' => date('Y-m-d H:i:s'),
            'sa_createdIpAddress' => $_SERVER['REMOTE_ADDR'],
        );
        $where = array('sa_id' => base64_decode($_POST['sa_id']));

        $result = $this->Dashboard_model->updateSuperAdmin_ctrl($fields, $where);
        print_r($result);
    }

    public function deleteClient_ctrl() {

        $result = $this->Dashboard_model->deleteClient_ctrl();
        $this->Lambda('DELETE',base64_decode($_POST['clientId']));

        print_r($result);
    }
    public function deleteClientAdmin_ctrl() {

        $result = $this->Dashboard_model->deleteClientAdmin_ctrl();

        print_r($result);
    }

    public function masterPassword_ctrl() {
        $result = $this->Dashboard_model->masterPassword_ctrl();
        echo $result;
    }

    public function auto_masterPassword_ctrl() {
        $result = $this->Dashboard_model->auto_masterPassword_ctrl();
        echo $result;
    }

    public function ipaddress_ctrl() {
        $fields = array(
            'saip_ipaddress' => $_POST['saip_ipaddress'],
            'saip_adminid' => $_SESSION['saId'],
            'saip_createdDate' => date('Y-m-d H:i:s'),
            'saip_createdIpaddress' => $_SERVER['REMOTE_ADDR']
        );
        $result = $this->Dashboard_model->ipaddress_ctrl($fields);
        echo $result;
    }

    public function updateIpaddress_ctrl() {
        $where = array('saip_id' => base64_decode($_POST['updateIpaddressId']));
        $fields = array(
            'saip_ipaddress' => $_POST['Ipaddress'],
            'saip_adminid' => $_SESSION['saId'],
            'saip_updatedDate' => date('Y-m-d H:i:s'),
            'saip_updatedIpaddress' => $_SERVER['REMOTE_ADDR']
        );
        $result = $this->Dashboard_model->updateIpaddress_ctrl($fields, $where);
        echo $result;
    }

    public function deleteIpaddress_ctrl() {
        $where = array('saip_id' => base64_decode($_POST['IpaddressId']));
        $fields = array(
            'saip_virtualStatus' => 'DELETE'
        );
        $result = $this->Dashboard_model->updateIpaddress_ctrl($fields, $where);
        echo $result;
    }

    public function sendPasswordSetup() {
        $getClientUserDetails = $this->Dashboard_model->getSingleSuperAdmin($_POST['superadminId']);
        $clientUser = reset($getClientUserDetails);
        $setting = getSetting();
        $EMAILIMGPATH = base_url($setting['email_logo']);
  

        $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>TransactAPI</title>
                                <style>
                                    @media only screen and (min-device-width: 641px) {
                                        .content {
                                            width: 640px !important;
                                        }
                                    }
                                </style>
                        </head>

                        <body style="width:100%; font-family: Arial, Helvetica, sans-serif; font-size:16px; margin:0 0 0 0; color:#2d2d2f; padding-top:0px; padding-bottom:0px; padding-left:0px; padding-right:0px;">
                            <table bgcolor="#f2f2f2" width="100%" cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                                <tr><td height="30" style="height:30px;"></td></tr>
                                <tr> 
                                    <td>

                                        <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF" style="width: 100%; max-width: 640px; color:#2d2d2f; font-family: Arial, Helvetica, sans-serif; font-weight:300;">
                                            <tr>
                                                <td>
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td align="center" style="padding-top:30px; padding-bottom:30px;">
                                                                <img src="'.$EMAILIMGPATH.'" border="0" alt="IOREADY" width="300" style="max-width:300px; display:block;"/>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <img src="'.$EMAILIMGPATH.'" border="0" style="max-width:640px; height:13px; width:100%; display:block;"/>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-top:25px;">
                                                                            <div style="padding-top:10px; padding-left:25px; padding-right:25px; ">Hi <span style="font-weight:bold;">' . $clientUser['sa_username'] . '</span>,</div>
                                                                            <div style=" text-align:left; padding-top:20px; padding-left:25px; padding-right:25px; color:#000000; font-size:14px; text-align:justify;">
                                                                                <span style="padding-left:25px;">This email </span>is to set up your super admin password for ' . SITE_TITLE . ' Please click the link below and set up your admin password.
                                                                            </div>
                                                                            <div align="center" style="margin: 10px 0px;">
                                                                                <a href="' . BASE_PATH . "home/resetAdminUserpassword/" . sha1($clientUser['sa_id']) . '" target="_blank">
                                                                                    <img src="' . EMAILIMGPATH . 'setupPassword.png" border="0" alt="Set Up Password" style="max-width:230px; display:block;" />
                                                                                </a>
                                                                            </div>
                                                                            <div style="text-align:center; padding-top:10px; padding-left:25px; padding-right:25px; font-weight:bold; font-size:16px; color:#005594;">
                                                                                If you are having trouble, you can copy and paste the following URL to your browser window
                                                                            </div> 
                                                                            <div style="max-width:585px; margin:0 auto;">
                                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div style="padding-top:20px;font-size:14px;"  align="center">
                                                                                                <span><a style="color: #005594;" href="' . BASE_PATH . "home/resetAdminUserpassword/" . sha1($clientUser['sa_id']) . '" target="_blank">' . BASE_PATH . "home/resetAdminUserpassword/" . sha1($clientUser['sa_id']) . '</a></span>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>  
                                                                    <tr>
                                                                        <td style="padding-top:35px; text-align:left;">  
                                                                            <div style="padding-left:25px; padding-right:25px;">Thanks & Regards,</div>
                                                                            <div style="padding-top:25px; padding-left:25px; padding-right:25px; ">The ' . SITE_TITLE . ' Team</div>
                                                                            <div style="padding-left:25px; padding-right:25px;"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top:25px;">
                                                                <img src="' . EMAILIMGPATH . 'shadow.png" border="0" style="max-width:640px; height:13px; width:100%; display:block;"/>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-top:25px; padding-right:25px; padding-left:25px; font-size:9px; color:#999999; font-family:Arial; text-align:justify; line-height:15px;">
                                                                            <p>

                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding-top:20px; padding-right:25px; padding-bottom:25px; padding-left:25px; font-size:9px; color:#999999; font-family:Arial; text-align:justify; line-height:15px;">
                                                                            <p>
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr><td height="30" style="height:30px;"></td></tr>
                            </table> 
                        </body>
                    </html>';
        $dataArray = array(
            'personalizations' => array(0 =>
                array('to' => array(0 =>
                        array(
                            'email' => $clientUser['sa_emailid'],
                            'name' => $clientUser['sa_name']
                        ),
                    ),
                    'cc' => array(0 =>
                        array(
                            'email' => CC_EMAIL,
                            'name' => SITE_TITLE
                        ),
                    ),
                ),
            ),
            'from' => array(
                'email' => SUPPORT_MAIL,
                'name' => SITE_TITLE
            ),
            'subject' => SITE_TITLE . ' Admin User Set Up',
            'content' => array(0 =>
                array(
                    'type' => 'text/html',
                    'value' => $body,
                ),
            ),
        );

        $dataJson = json_encode($dataArray);
        $sendGridApiCall = sendGridCurl($dataJson);
        if (!empty($sendGridApiCall)) {
            print_r($sendGridApiCall);
            exit;
        }
        print_r(1);
    }

    public function checkClientInfo() {
        $fields = array('clientID' => $_POST['clientId'], 'developerAPIKey' => $_POST['developerkey']);
        $getclientinfo = api_call("getClient", $fields, "POST");
        $chechclientinfo = api_result_check($getclientinfo);
        if ($chechclientinfo == 1) {
            print_r(1);
            exit;
        } else {
            print_r($getclientinfo['statusDesc']);
            exit;
        }
    }

    public function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function checkClientPasswordStatus(){
        $where = $_POST['ca_id'];
        $cilentId = $where;
        $getSingleClient = array();
        $getSingleClient = $this->Dashboard_model->getSingleClientAdmin($cilentId);
        // print_r($getSingleClient);
        // exit;

        if($getSingleClient[0]['ca_password'] == 'created'){
            $res= $this->resetClientAdminPassword($cilentId);
            if($res == 1){
                echo 1;
                exit;
            }else{
                echo 0;
                exit;
            }
        
        }else{
            $res1 = $this->setClientAdminPassword($cilentId);
            if($res1 == 1){

                echo 1;
                exit;
            }else{
                echo 0;
                exit;
            }
        }

        // 'ca_password' => 'created',
        
        // $result =

    }

    public function setClientAdminPassword($where) {
        // $where = $_POST['id'];
        $cilentId = $where;
        $getSingleClient = array();
        $getSingleClient = $this->Dashboard_model->getSingleClientAdmin($cilentId);
        if ($getSingleClient[0]['ca_id'] != '') {
            $generate_password = $this->generateRandomString();
            $fields = array(
                'client_id' => $getSingleClient[0]['ca_id'],
                'domain_name' => $getSingleClient[0]['ca_domain'],
                'alternative_domain_name' => $getSingleClient[0]['ca_user_unique_name'],
                'username' => $getSingleClient[0]['ca_emailid'],
                'password' => sha1($generate_password),
                'dcd_password' => $generate_password,
                'created_at' => date('Y-m-d H:i:s'),
                'created_ipaddress' => $_SERVER['REMOTE_ADDR'],
                'browser_details' => $_SERVER['HTTP_USER_AGENT'],
                'owner_type ' => 1,
                'admin_types' => 1,
                'client_type' => 'YES',
            );
            $result = $this->Dashboard_model->setClientAdminPassword($fields);
            if ($result) {
                $fields1 = array(
                    'client_fk_id' => $getSingleClient[0]['ca_id'],
                    'supportemailstatus' => 1,
                );
                $result1 = $this->Dashboard_model->add_kyc_supportMail($fields1);

                $fields2 = array(
                    'client_fk_id' => $getSingleClient[0]['ca_id'],
                );
                $result2 = $this->Dashboard_model->add_styling($fields2);

                $fields = array(
                    'ca_password' => 'created',
                    'ca_updatedDate' => date('Y-m-d H:i:s'),
                    'ca_updatedIpaddress' => $_SERVER['REMOTE_ADDR'],
                    'ca_browserDetails' => $_SERVER['HTTP_USER_AGENT'],
                    'ca_invitation_status' => 1,
                );
                $result3 = $this->Dashboard_model->updateAdmin($fields, $where);
                return 1;
                }
                } else {
                    return 0;
                }
    }

    public function resetClientAdminPassword($where) {
        // $where = $_POST['id'];
        $cilentId = $where;
        $getSingleClient = array();
        $getSingleClient = $this->Dashboard_model->singleClientAdminGet($cilentId);
        $getAdminClient = $this->Dashboard_model->getSingleClientAdmin($cilentId);
        if ($getSingleClient[0]['client_id'] != '') {
            if ($getSingleClient[0]['client_id'] == $cilentId && $getAdminClient[0]['ca_id']) {
                $where = $getSingleClient[0]['id'];
                $generate_password = $this->generateRandomString();
                $fields = array(
                    'alternative_domain_name' => $getAdminClient[0]['ca_user_unique_name'],
                    'domain_name' => $getAdminClient[0]['ca_domain'],
                    'password' => sha1($generate_password),
                    'dcd_password' => $generate_password,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_ipaddress' => $_SERVER['REMOTE_ADDR'],
                    'browser_details' => $_SERVER['HTTP_USER_AGENT'],
                );
                $result = $this->Dashboard_model->updateClientAdmin($fields, $where);
                if ($result) {
                    $fields = array(
                        'ca_password' => 'created',
                        'ca_updatedDate' => date('Y-m-d H:i:s'),
                        'ca_updatedIpaddress' => $_SERVER['REMOTE_ADDR'],
                        'ca_browserDetails' => $_SERVER['HTTP_USER_AGENT'],
                        'ca_invitation_status' => 1,
                        
                    );
                    $result = $this->Dashboard_model->updateAdmin($fields, $cilentId);
                    return 1;
                }
            }
        } else {
            return 0;
        }
    }
    

    public function domainVerificationProcess() {

        $ca_id = $_POST['ca_id'];
        $cilentId = $ca_id;
        $getSingleClient = array();
        $getSingleClient = $this->Dashboard_model->getSingleClientAdmin($cilentId);
        $domain_string = "";

        if ($getSingleClient[0]['ca_id'] != '') {


            if ($getSingleClient[0]['ca_domain'] != '') {

                $domain_string = trim($getSingleClient[0]['ca_domain']);
                // $domain_string = $getSingleClient[0]['ca_domain'];
            } else {
                $domain_string = $getSingleClient[0]['ca_user_unique_name'];
            }

            if ($getSingleClient[0]['ca_id'] == $cilentId) {


                // if(!filter_var($domain_string, FILTER_VALIDATE_URL)){
                //     echo 'validation url';
                //     return false;
                // }
                // $domain_string = 'www.getredtie.com';

                $timeout = 10;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $domain_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
                $http_respond = curl_exec($ch);
                $http_respond = trim(strip_tags($http_respond));
                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($http_code == "200" || $http_code == "301" || $http_code == "302" || $http_code == "307") {

                    $setDomainVerified = array();
                    $fields = array(
                        'ca_domain_verification' => '1',
                    );
                    $setDomainVerified = $this->Dashboard_model->setDomainVerified($ca_id, $fields);

                    echo 'site_found';
                    exit;
                } else {
                    echo 'site_not_found';
                    exit;
                }

                curl_close($ch);
            }
        }
    }

    public function checkClientNameExists() { 
        // echo '<pre>'; print_r($_POST); exit;

        $fields = array('ca_user_unique_name' => $_POST['ca_user_unique_name']);

        $checkClientNameExists = array();
        $checkClientNameExists = $this->Dashboard_model->checkClientNameExists($fields);

        if (count($checkClientNameExists) > 0) {

            echo '1';
            exit;
        } else {
            echo '0';
            exit;
        }
    }

    public function checkClientNameUpdateExists() {

        $ca_id = base64_decode($_POST['ca_id']);

        $fields = array('ca_user_unique_name' => $_POST['ca_user_unique_name']);

        $checkClientNameUpdateExists = array();
        $checkClientNameUpdateExists = $this->Dashboard_model->checkClientNameExists($fields);

        // echo '<pre>';
        // print_r(get_defined_vars());


        if (count($checkClientNameUpdateExists) > 0 && $ca_id != $checkClientNameUpdateExists[0]['ca_id']) {

            echo 1;
            exit;
        } else {

            echo 0;
            exit;
        }
    }

    

    public function checkCa_usernameExists() { 
        //echo '<pre>'; print_r($_POST); exit;
  
          $fields = array('ca_username' => $_POST['ca_username']);
  
          $checkCa_usernameExists = array();
          $checkCa_usernameExists = $this->Dashboard_model->checkCa_usernameExists($fields);
  
          if (count($checkCa_usernameExists) > 0) {
  
              echo '1';
              exit;
          } else {
              echo '0';
              exit;
          }
      }
  
      public function checkCa_usernameUpdateExists() {
  
          $ca_id = base64_decode($_POST['ca_id']);
  
          $fields = array('ca_username' => $_POST['ca_username']);
  
          $checkCa_usernameUpdateExists = array();
          $checkCa_usernameUpdateExists = $this->Dashboard_model->checkCa_usernameExists($fields);
  
          // echo '<pre>';
          // print_r(get_defined_vars());
  
  
          if (count($checkCa_usernameUpdateExists) > 0 && $ca_id != $checkCa_usernameUpdateExists[0]['ca_id']) {
			print_r(1);
			exit;
		} else {
			print_r(0);
			exit;
		}
	}

    public function sendInvitationProcess() {

        $ca_id = $_POST['ca_id'];
        $ca_name = $_POST['ca_name'];
        $clientUser = array();
        $clientUser = $this->Dashboard_model->singleClientAdminGet($ca_id);

        $domain_url = "https://" . $clientUser[0]['domain_name'] . "/admin/home/resetAdminUserpassword/" . sha1($clientUser[0]['id']);

        // $clientUser = reset($getClientUserDetails); 

        //removed password in sendInvitation:
        // <div style="padding-top:20px;padding-left:25px;padding-right:25px;font-size:14px">
        // <span style="font-weight:bold">Password :</span> ' . $clientUser[0]['dcd_password'] . '
        // </div>

        $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>TransactAPI</title>
                    <style>
                        @media only screen and (min-device-width: 641px) {
                            .content {
                                width: 640px !important;
                            }
                        }
                    </style>
            </head>

            <body style="width:100%; font-family: Arial, Helvetica, sans-serif; font-size:16px; margin:0 0 0 0; color:#2d2d2f; padding-top:0px; padding-bottom:0px; padding-left:0px; padding-right:0px;">
                <table bgcolor="#f2f2f2" width="100%" cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                    <tr><td height="30" style="height:30px;"></td></tr>
                    <tr> 
                        <td>

                            <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF" style="width: 100%; max-width: 640px; color:#2d2d2f; font-family: Arial, Helvetica, sans-serif; font-weight:300;">
                                <tr>
                                    <td>
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td align="center" style="padding-top:30px; padding-bottom:30px;">
                                                    <img src="'.$EMAILIMGPATH.'" border="0" alt="IOREADY" width="300" style="max-width:300px; display:block;"/>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <img src="' . EMAILIMGPATH . 'shadow.png" border="0" style="max-width:640px; height:13px; width:100%; display:block;"/>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td style="padding-top:25px;">
                                                                <div style="padding-top:10px; padding-left:25px; padding-right:25px; ">Dear <span style="font-weight:bold;">' . ucfirst($ca_name) . '</span>,</div>
                                                                <div style=" text-align:left; padding-top:20px; padding-left:25px; padding-right:25px; color:#000000; font-size:14px; text-align:justify;">

                                                                    <span style="padding-left:25px;">This email </span>is being sent to you by ' . SITE_TITLE . ' to welcome you to our ' . SITE_TITLE . ' Client Portal. The Client Portal is where you may view your monthly portfolio reports and quarterly billing statements. Using the username and password below, please login to the portal where you will be prompted to update your password. Please contact us if you have any questions. Please note that you will get an email advising you when your first report is ready to view.
                                                                </div>

                                                                <div style="text-align:center;padding-top:20px;padding-left:25px;padding-right:25px;font-weight:bold;font-size:18px;color:#005594">Login Account Details</div>


                                                                <div style="max-width:380px;margin:0 auto">
                                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                      <tbody>
                                                                        <tr>
                                                                        <td>
                                                                        <div style="padding-top:20px;padding-left:25px;padding-right:25px;font-size:14px">
                                                                        <span style="font-weight:bold">Username :</span> <a href="mailto:' . $clientUser[0]['username'] . '" target="_blank">' . $clientUser[0]['username'] . '</a>
                                                                        </div>

                                                                      

                                                                        <div style="padding-top:20px;padding-left:25px;padding-right:25px;font-size:14px">
                                                                       
                                                                        <span style="font-weight:bold">URL :</span> <a href="' . $domain_url . '"  target="_blank" >' . $domain_url . '</a>
                                                                        </div>
                                                                        </td>
                                                                        </tr>
                                                                      </tbody>
                                                                    </table>
                                                                </div>
                                                               
                                                            
                                                            </td>
                                                        </tr>  
                                                        <tr>
                                                            <td style="padding-top:35px; text-align:left;">  
                                                                          <div style="padding-left:25px; padding-right:25px;">Thanks & Regards,</div>
                                                                            <div style="padding-top:25px; padding-left:25px; padding-right:25px; ">The ' . SITE_TITLE . ' Team</div>
                                                                            <div style="padding-left:25px; padding-right:25px;"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:25px;">
                                                    <img src="' . EMAILIMGPATH . 'shadow.png" border="0" style="max-width:640px; height:13px; width:100%; display:block;"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td style="padding-top:25px; padding-right:25px; padding-left:25px; font-size:9px; color:#999999; font-family:Arial; text-align:justify; line-height:15px;">
                                                                <p>
                                                                    This communication should not be regarded as a recommendation, an offer to sell, or a solicitation of an offer to buy any financial product. Information about any securities offering should not be considered complete and is qualified by the full offering documents corresponding to a particular financing.  North Capital refers to <a href="https://www.northcapital.com/" style="color: #1155CC;" target="_blank">North Capital Inc.</a> and its affiliates.  North Capital Inc. is a registered investment advisor offering fee-only financial planning and investment advisory services.  <a href="https://www.norcapsecurities.com/" style="color: #1155CC;" target="_blank"> Corp. (NCPS)</a> is a registered broker-dealer, member <a href="http://www.finra.org/" style="color: #1155CC;" target="_blank">FINRA</a> and <a href="https://www.sipc.org/" style="color: #1155CC;" target="_blank">SIPC</a>, involved in the origination and distribution of private securities and registered funds.  North Capital Investment Technology (NCIT) offers financial technology software-as-a-service (SAAS) solutions to broker-dealers, funding platforms, and investment advisory firms.  North Capital is headquartered in Salt Lake City, with offices in San Francisco, Benicia, and New York City.  Copyright 2015.  All rights reserved.
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top:20px; padding-right:25px; padding-bottom:25px; padding-left:25px; font-size:9px; color:#999999; font-family:Arial; text-align:justify; line-height:15px;">
                                                                <p>
                                                                    CONFIDENTIALITY NOTICE: <i>The information contained in this e-mail communication and any attachments are confidential, intended only for the individual(s) for whom it was intended and may contain information that is proprietary, privileged, confidential, non-public or otherwise exempt from disclosure. If you receive this message in error please notify the sender and immediately delete this message, its attachments and any copies of it from your system. Any review, dissemination, distribution or copying of this message is strictly prohibited.</i> 
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr><td height="30" style="height:30px;"></td></tr>
                </table> 
            </body>
        </html>';


        $to_cc_arr['to'] = array(0 =>
                        array(
                            'email' => trim($clientUser[0]['username']),
                            'name' => $ca_name,
                        ),
                    );

        if(trim(CC_EMAIL) != trim($clientUser[0]['username'])){
            $to_cc_arr['cc'] = array(0 =>
                            array(
                                'email' => CC_EMAIL,
                                'name' => SITE_TITLE
                            ),
                        );
        }


        $dataArray = array(
            'personalizations' => array(0 =>
                $to_cc_arr,
            ),
            'from' => array(
                'email' => SUPPORT_MAIL,
                'name' => SITE_TITLE
            ),
            'subject' => SITE_TITLE . ' Client Admin User Set Up',
            'content' => array(0 =>
                array(
                    'type' => 'text/html',
                    'value' => $body,
                ),
            ),
        );


        $dataJson = json_encode($dataArray);
        $sendGridApiCall = sendGridCurl($dataJson);
        if (!empty($sendGridApiCall)) {
            $error = json_decode($sendGridApiCall);
            $errorMessage = $error->errors[0]->message;
            print_r($errorMessage);
            exit;
        }
        print_r(1);
    }

    
    
    public function sendInvitationProcessAdmin() {

        $ca_id = $_POST['ca_id'];
        $ca_name = $_POST['ca_name'];
        $clientUser = array();
        $clientUser = $this->Dashboard_model->ClientAdminForInvitation($ca_id);
// reset($clientUser);


        $domain_url = "https://" . $clientUser[0]['domain_name'] . "/admin/home/resetAdminUserpassword/" . sha1($clientUser[0]['id']);

        // $clientUser = reset($getClientUserDetails); 

        //removed password in sendInvitation:
        // <div style="padding-top:20px;padding-left:25px;padding-right:25px;font-size:14px">
        // <span style="font-weight:bold">Password :</span> ' . $clientUser[0]['dcd_password'] . '
        // </div>

        $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>TransactAPI</title>
                    <style>
                        @media only screen and (min-device-width: 641px) {
                            .content {
                                width: 640px !important;
                            }
                        }
                    </style>
            </head>

            <body style="width:100%; font-family: Arial, Helvetica, sans-serif; font-size:16px; margin:0 0 0 0; color:#2d2d2f; padding-top:0px; padding-bottom:0px; padding-left:0px; padding-right:0px;">
                <table bgcolor="#f2f2f2" width="100%" cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                    <tr><td height="30" style="height:30px;"></td></tr>
                    <tr> 
                        <td>

                            <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF" style="width: 100%; max-width: 640px; color:#2d2d2f; font-family: Arial, Helvetica, sans-serif; font-weight:300;">
                                <tr>
                                    <td>
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td align="center" style="padding-top:30px; padding-bottom:30px;">
                                                    <img src="'.$EMAILIMGPATH.'" border="0" alt="IOREADY" width="300" style="max-width:300px; display:block;"/>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <img src="' . EMAILIMGPATH . 'shadow.png" border="0" style="max-width:640px; height:13px; width:100%; display:block;"/>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td style="padding-top:25px;">
                                                                <div style="padding-top:10px; padding-left:25px; padding-right:25px; ">Dear <span style="font-weight:bold;">' . ucfirst($ca_name) . '</span>,</div>
                                                                <div style=" text-align:left; padding-top:20px; padding-left:25px; padding-right:25px; color:#000000; font-size:14px; text-align:justify;">

                                                                    <span style="padding-left:25px;">This email </span>is being sent to you by ' . SITE_TITLE . ' to welcome you to our ' . SITE_TITLE . ' Client Portal. The Client Portal is where you may view your monthly portfolio reports and quarterly billing statements. Using the username and password below, please login to the portal where you will be prompted to update your password. Please contact us if you have any questions. Please note that you will get an email advising you when your first report is ready to view.
                                                                </div>

                                                                <div style="text-align:center;padding-top:20px;padding-left:25px;padding-right:25px;font-weight:bold;font-size:18px;color:#005594">Login Account Details</div>


                                                                <div style="max-width:380px;margin:0 auto">
                                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                      <tbody>
                                                                        <tr>
                                                                        <td>
                                                                        <div style="padding-top:20px;padding-left:25px;padding-right:25px;font-size:14px">
                                                                        <span style="font-weight:bold">Username :</span> <a href="mailto:' . $clientUser[0]['username'] . '" target="_blank">' . $clientUser[0]['username'] . '</a>
                                                                        </div>

                                                                      

                                                                        <div style="padding-top:20px;padding-left:25px;padding-right:25px;font-size:14px">
                                                                       
                                                                        <span style="font-weight:bold">URL :</span> <a href="' . $domain_url . '"  target="_blank" >' . $domain_url . '</a>
                                                                        </div>
                                                                        </td>
                                                                        </tr>
                                                                      </tbody>
                                                                    </table>
                                                                </div>
                                                               
                                                            
                                                            </td>
                                                        </tr>  
                                                        <tr>
                                                            <td style="padding-top:35px; text-align:left;">  
                                                                          <div style="padding-left:25px; padding-right:25px;">Thanks & Regards,</div>
                                                                            <div style="padding-top:25px; padding-left:25px; padding-right:25px; ">The ' . SITE_TITLE . ' Team</div>
                                                                            <div style="padding-left:25px; padding-right:25px;"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:25px;">
                                                    <img src="' . EMAILIMGPATH . 'shadow.png" border="0" style="max-width:640px; height:13px; width:100%; display:block;"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td style="padding-top:25px; padding-right:25px; padding-left:25px; font-size:9px; color:#999999; font-family:Arial; text-align:justify; line-height:15px;">
                                                                <p>
                                                                    This communication should not be regarded as a recommendation, an offer to sell, or a solicitation of an offer to buy any financial product. Information about any securities offering should not be considered complete and is qualified by the full offering documents corresponding to a particular financing.  North Capital refers to <a href="https://www.northcapital.com/" style="color: #1155CC;" target="_blank">North Capital Inc.</a> and its affiliates.  North Capital Inc. is a registered investment advisor offering fee-only financial planning and investment advisory services.  <a href="https://www.norcapsecurities.com/" style="color: #1155CC;" target="_blank"> Corp. (NCPS)</a> is a registered broker-dealer, member <a href="http://www.finra.org/" style="color: #1155CC;" target="_blank">FINRA</a> and <a href="https://www.sipc.org/" style="color: #1155CC;" target="_blank">SIPC</a>, involved in the origination and distribution of private securities and registered funds.  North Capital Investment Technology (NCIT) offers financial technology software-as-a-service (SAAS) solutions to broker-dealers, funding platforms, and investment advisory firms.  North Capital is headquartered in Salt Lake City, with offices in San Francisco, Benicia, and New York City.  Copyright 2015.  All rights reserved.
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top:20px; padding-right:25px; padding-bottom:25px; padding-left:25px; font-size:9px; color:#999999; font-family:Arial; text-align:justify; line-height:15px;">
                                                                <p>
                                                                    CONFIDENTIALITY NOTICE: <i>The information contained in this e-mail communication and any attachments are confidential, intended only for the individual(s) for whom it was intended and may contain information that is proprietary, privileged, confidential, non-public or otherwise exempt from disclosure. If you receive this message in error please notify the sender and immediately delete this message, its attachments and any copies of it from your system. Any review, dissemination, distribution or copying of this message is strictly prohibited.</i> 
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr><td height="30" style="height:30px;"></td></tr>
                </table> 
            </body>
        </html>';


        $dataArray = array(
            'personalizations' => array(0 =>
                array('to' => array(0 =>
                        array(
                            'email' => $clientUser[0]['username'],
                            'name' => $ca_name,
                        ),
                    ),
                    'cc' => array(0 =>
                        array(
                            'email' => CC_EMAIL,
                            'name' => SITE_TITLE
                        ),
                    ),
                ),
            ),
            'from' => array(
                'email' => SUPPORT_MAIL,
                'name' => SITE_TITLE
            ),
            'subject' => SITE_TITLE . ' Client Admin User Set Up',
            'content' => array(0 =>
                array(
                    'type' => 'text/html',
                    'value' => $body,
                ),
            ),
        );


        $dataJson = json_encode($dataArray);
        $sendGridApiCall = sendGridCurl($dataJson);
        if (!empty($sendGridApiCall)) {
            $error = json_decode($sendGridApiCall);
            $errorMessage = $error->errors[0]->message;
            print_r($errorMessage);
            exit;
        }

        $where = $ca_id;
        $fields = array(
            'invitation_status' => 1
        );
        $clientInviteUpdate = $this->Dashboard_model->updateClientAdminInviteStatus($fields,$where);
        if($clientInviteUpdate == true){
            print_r(1);
        }else {
            print_r(0);
        }

    }

    public function editclientconfig_ctrl(){
        //echo '<pre>'; print_r(isset($_POST['acc_type_individual'])? $_POST['acc_type_individual'] : '0'); exit;
        $field = array(
            // 'suitability_status' => $_POST['suitability_status'],
            // 'acc_income_status' => $_POST['acc_income_status'],
            // 'acc_employment_status' => $_POST['acc_employment_status'],                                    
            // 'acc_type_individual' => isset($_POST['acc_type_individual'])? $_POST['acc_type_individual'] : '0',
            // 'acc_type_joint' => isset($_POST['acc_type_joint'])? $_POST['acc_type_joint'] : '0',
            // 'acc_type_entity' => isset($_POST['acc_type_entity'])? $_POST['acc_type_entity'] : '0',
            // 'international_investors_status' => $_POST['inter_investors'],
            
            'kyc_enhanced' => $_POST['kyc_enhanced'],
            'creditCard_status' => $_POST['creditCard_status'],
            'hubspot_status' => $_POST['hubspot_status'],
            // 'sa_docusign_status' => $_POST['sa_docusign_status'],
            // 'idb_income_status' => $_POST['idb_income_status'], 
            // 'idb_employment_status' => $_POST['idb_employment_status'],
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_ipaddress' => $_SERVER['REMOTE_ADDR']
        );
        //echo '<pre>'; print_r($field); exit;
        $where = array('client_fk_id' => base64_decode($_POST['ca_id']));
        $result = $this->Dashboard_model->editclientconfig_ctrl($field, $where);
        if($result == 0)
        {
            print_r(0);
        }else{
            print_r(1);
        }
    }

    public function addWebhookSYnc(){
        $this->addWebhook($_POST['ca_id']);
        print_r(1);

    }
    public function addWebhook($cilentId){
        
        // $cilentId = 'Mg==';
        $getSingleClient['getClient'] = $this->Dashboard_model->getSingleClient($cilentId);
        $getWebhhok = $this->Dashboard_model->getallWebhookLink();

        foreach($getWebhhok as $key=>$val){
            $url = 'https://'.$getSingleClient['getClient'][0]['ca_domain'].'/admin/Webhook/'.$val['methoad'];

            $fields_array = array(
                'developerAPIKey' => $getSingleClient['getClient'][0]['ca_developerKey'],
                'clientID' => $getSingleClient['getClient'][0]['ca_clinetId'],
                'methodName' => $val['methoad'],
                'webhookUrl' =>  $url,
                'emailNotify' => 'No',
                'smsNotify' => 'No',
            ); 
            $fields = addslashes_array($fields_array);
            $addWebhookUrl = api_call("addWebhookUrl", $fields, "POST"); 
            
        }

    }

    public function webhooklink(){
        $cilentId = $this->uri->segment(3);
        // $getSingleClient['getClient'] = $this->Dashboard_model->getSingleClient($cilentId);
        $getSingleClient['getClient'] = $this->Dashboard_model->getsingleClientAdminUser($cilentId);
        $getWebhhok = $this->Dashboard_model->getallWebhookLink();
// print_r($getSingleClient);exit;
        

        $fileName = 'Webhook.csv';
		// $csvFile = FCPATH . 'assets/csv/' . $fileName;
		
        // $handle = fopen($csvFile, 'w');
        $handle = fopen('php://output', 'w');

        $url = 'https://'.$getSingleClient['getClient'][0]['domain_name'].'/admin/Webhook/';

        fputcsv($handle, array(
            'S.No',
            'Methoad Name',
            'URL',
        ));

        foreach($getWebhhok as $key=>$val){
            fputcsv($handle, array(
                $key+1,
                $val['methoad'],
                $url."".$val['methoad'],
            ));
        }
       

        fclose($handle);
        header("Content-type: text/csv");
        header("Content-disposition: attachment; filename = " . $fileName);

        // echo readfile($csvFile);
    }


    //DUPLICATE OFFER
    public function createSampleOffer($id){ //$id
        

        //$id = '2';
        $getClientDetails = $this->Dashboard_model->getClientDetails($id);

        

        $offerID = $getClientDetails[0]['ca_offerSamID'];
        $clientID = $getClientDetails[0]['ca_clinetId'];
        $devKey = $getClientDetails[0]['ca_developerKey'];

        
        
        $getDupOffers = $this->Dashboard_model->getOffersDetails($offerID);
         $offerDetails = reset($getDupOffers);
        
        
        //createIssuer

            $fields_array = array(
                'developerAPIKey' => $devKey,
                'clientID' => $clientID,
                'issuerName' => $getClientDetails[0]['ca_username'],
                'firstName' => $getClientDetails[0]['ca_username'],
                'lastName' => $getClientDetails[0]['ca_name'],
                'phoneNumber' => $getClientDetails[0]['ca_phoneNumber'],
                'email' => $getClientDetails[0]['ca_emailid'],
                'createdDate' => date('Y-m-d H:i:s'),
                'createdIpAddress' => $_SERVER['REMOTE_ADDR']
            );
            $fields = addslashes_array($fields_array);
            $createIssuer = api_call("createIssuer", $fields, "PUT");
            $resultIssuer = api_result_check($createIssuer);

            if ($resultIssuer != 1) {
                print_r($resultIssuer);
                exit;
}

            $fieldsLocalarray = array(
                'client_fk_id' => $getClientDetails[0]['ca_id'],
                'issuerName' => $getClientDetails[0]['ca_username'],
                'firstName' => $getClientDetails[0]['ca_username'],
                'lastName' => $getClientDetails[0]['ca_name'],
                'phoneNumber' => $getClientDetails[0]['ca_phoneNumber'],
                'email' => $getClientDetails[0]['ca_emailid'],
                'issuerId' => $createIssuer['issuerDetails'][1][0]['issuerId'],
                'issuerStatus' => $createIssuer['issuerDetails'][1][0]['issuerStatus'],
                'virtualStatus' => 'ACTIVE',
                'createdDate' => date('Y-m-d H:i:s'),
                'createdIpAddress' => $_SERVER['REMOTE_ADDR'],
                'updatedDate' => date('Y-m-d H:i:s'),
                'updatedIpAddress' => $_SERVER['REMOTE_ADDR'],
            );
            $fieldsLocal = addslashes_array($fieldsLocalarray);
            $result = $this->Dashboard_model->createIssuer($fieldsLocal);
           
                $issuerId = $createIssuer['issuerDetails'][1][0]['issuerId'];
           
            
        //createIssuer

        

        //Update Issuer
        

        $fields_array = array(
            'developerAPIKey' => $devKey,
            'clientID' => $clientID,
            'issuerId' => $issuerId,
            'issuerName' => $getClientDetails[0]['ca_username'],
            'firstName' => $getClientDetails[0]['ca_username'],
            'lastName' => $getClientDetails[0]['ca_name'],
            'phoneNumber' => $getClientDetails[0]['ca_phoneNumber'],
            'email' => $getClientDetails[0]['ca_emailid'],
            'issuerStatus' => 'Approved',
            'createdDate' => date('Y-m-d H:i:s'),
            'createdIpAddress' => $_SERVER['REMOTE_ADDR']
        );
        $fields = addslashes_array($fields_array);
        $updateIssuer = api_call("updateIssuer", $fields, "POST");
        $resultIssuer = api_result_check($updateIssuer);
        if ($resultIssuer != 1) {
            print_r($resultIssuer);
            exit;
        }

        $fieldsLocalArray = array(
            'client_fk_id' => $getClientDetails[0]['ca_id'],
            'issuerName' => $getClientDetails[0]['ca_username'],
            'firstName' => $getClientDetails[0]['ca_username'],
            'lastName' => $getClientDetails[0]['ca_name'],
            'phoneNumber' => $getClientDetails[0]['ca_phoneNumber'],
            'email' => $getClientDetails[0]['ca_emailid'],
            'issuerStatus' => 'Approved',
            'updatedDate' => date('Y-m-d H:i:s'),
            'updatedIpAddress' => $_SERVER['REMOTE_ADDR']
        );

        $whereIssuer = array("issuerId" => $issuerId);

        $result = $this->Dashboard_model->updateIssuer($fieldsLocalArray, $whereIssuer);
        

        //Update Issuer

        //Create Issuer Account
            $fieldsArray = array(
                'developerAPIKey' => $devKey,
                'clientID' => $clientID,
                'issuerId' => $issuerId,
                'companyName' => $getClientDetails[0]['ca_username'],
                'companyState' => 'GA',
                'issuingCountry' => 'USA',
                'createdIpAddress' => $_SERVER['REMOTE_ADDR'],
            );
            $fields = addslashes_array($fieldsArray);
            $createIssuerAccount = api_call("createIssuerAccount", $fields, "PUT");
            $resultIssuerAccount = api_result_check($createIssuerAccount);
            if ($resultIssuerAccount != 1) {
                print_r($resultIssuerAccount);
                exit;
            }

            $fieldsLocalArray = array(
                'client_fk_id' => $id,
                'issuerId' => $issuerId,
                'companyName' => $getClientDetails[0]['ca_username'],
                'companyState' =>  'GA',
                'country' => 'USA',
                'createdDate' => date('Y-m-d H:i:s'),
                'createdIpAddress' => $_SERVER['REMOTE_ADDR'],
            );

            $fieldsLocal = addslashes_array($fieldsLocalArray);
            $result = $this->Dashboard_model->createIssuerAccount($fieldsLocal);
            
        //Create Issuer Account

       
      //$issuerId = '49236';

        $fields = array(
            'developerAPIKey' => $devKey,
            'clientID' => $clientID,
            'issuerId' => $issuerId,
        ); 
        $getIssuerAccount = api_call("getIssuerAccount", $fields, "POST");
        $resultIssuerAccount = api_result_check($getIssuerAccount);

       

        // if ($resultIssuerAccount != 1) {
        //     print_r($resultIssuerAccount);
        //     exit;
        // }

        
        
        $locpreviewText = isset($offerDetails['previewText']) ? $offerDetails['previewText'] : '';
        $locstampingText = isset($offerDetails['stampingText']) ? $offerDetails['stampingText'] : '';

        $fieldsArrayOffer = array(
            'developerAPIKey' => $devKey,
            'clientID' => $clientID, 
            'issuerId' =>  $issuerId,
            'issueName' => isset($offerDetails['issueName']) ? $offerDetails['issueName'] : '',
            'issueType' => isset($offerDetails['issueType']) ? $offerDetails['issueType'] : '',
            'targetAmount' => isset($offerDetails['targetAmount']) ? $offerDetails['targetAmount'] : '',
            'minAmount' => isset($offerDetails['minAmount']) ? $offerDetails['minAmount'] : '',
            'maxAmount' => isset($offerDetails['maxAmount']) ? $offerDetails['maxAmount'] : '',
            'unitPrice' => isset($offerDetails['unitPrice']) ? $offerDetails['unitPrice'] : '',
            'startDate' => isset($offerDetails['startDate']) ? $offerDetails['startDate'] : '',
            'endDate' => isset($offerDetails['endDate']) ? $offerDetails['endDate'] : '',
            'offeringText' => isset($offerDetails['previewText']) ? $offerDetails['previewText'] : '',
            // 'offeringText' => empty($offerDetails['offeringText']) ? base64_decode($offerDetails['offeringText']) : $locpreviewText,
            'stampingText' =>  isset($offerDetails['stampingText']) ? $offerDetails['stampingText'] : '',
            'createdIPAddress' => $_SERVER['REMOTE_ADDR'],
        );
		
        $fieldsOffer = addslashes_array($fieldsArrayOffer);
        $createOffer = api_call("createOffering", $fieldsOffer, "PUT");
        $resultOffer = api_result_check($createOffer);
        //echo'<pre>'; print_r($fieldsArrayOffer); exit;

        if ($resultOffer != 1) {
            print_r($resultOffer);
            exit;
        }

        if ($offerDetails['usergroups'] == '') {
            $userGroups = 'public';
        } else {
            $userGroups = $offerDetails['usergroups'];
        }

        $remainingShares = $offerDetails['maxAmount'] / $offerDetails['unitPrice'];

        if (!isset($offerDetails['progressonOff']) || $offerDetails['progressonOff'] == '') {
            $progressvalues = '0';
            $progressvaluesradio = '';
        } else {
            $progressvalues = '1';
            $progressvaluesradio = $offerDetails['progressonOff'];
        }

        $fieldsArrayLocalOffer = array(
            'client_fk_id' => $getClientDetails[0]['ca_id'],
            'issuerId' => $issuerId,
            'offeringId' => $createOffer['offeringDetails'][1][0]['offeringId'],
            'issueName' => isset($offerDetails['issueName']) ? stripslashes($offerDetails['issueName']) : '',
            'issueType' => isset($offerDetails['issueType']) ? $offerDetails['issueType'] : '',
            'dealType' => isset($offerDetails['dealType']) ? $offerDetails['dealType'] : '',
            'targetAmount' => isset($offerDetails['targetAmount']) ? $offerDetails['targetAmount'] : '',
            'minAmount' => isset($offerDetails['minAmount']) ? $offerDetails['minAmount'] : '',
            'maxAmount' => isset($offerDetails['maxAmount']) ? $offerDetails['maxAmount'] : '',
            'unitPrice' => isset($offerDetails['unitPrice']) ? $offerDetails['unitPrice'] : '',
            'totalShares' => isset($offerDetails['totalShares']) ? $offerDetails['totalShares'] : '',
            'remainingShares' => isset($remainingShares) ? $remainingShares : '',
            'startDate' => isset($offerDetails['startDate']) ? $offerDetails['startDate'] : '',
            'endDate' => isset($offerDetails['endDate']) ? $offerDetails['endDate'] : '',
            'linkedinurl' => isset($offerDetails['linkedinurl']) ? $offerDetails['linkedinurl'] : '',
            'fburl' => isset($offerDetails['fburl']) ? $offerDetails['fburl'] : '',
            'instaurl' => isset($offerDetails['instaurl']) ? $offerDetails['instaurl'] : '',
            'tweeturl' => isset($offerDetails['tweeturl']) ? $offerDetails['tweeturl'] : '',
//            'offeringStatus' => 'Active-Not Approved',
            'virtualStatus' => 'ACTIVE',
            // 'offeringText' => isset($offerDetails['offerText']) ? $offerDetails['offerText'] : '',
            'previewText' => isset($offerDetails['previewText']) ? $offerDetails['previewText'] : '',
            'createdDate' => date('Y-m-d H:i:s'),
            'createdIPAddress' => $_SERVER['REMOTE_ADDR'],
            'updatedDate' => date('Y-m-d H:i:s'),
            'updatedIPaddress' => $_SERVER['REMOTE_ADDR'],
            'home' => isset($offerDetails['home']) ? $offerDetails['home'] : 'Yes',
            'marketplace' => isset($offerDetails['marketplace']) ? $offerDetails['marketplace'] : 'Yes',
            'aiStatus' => isset($offerDetails['aiStatus']) ? $offerDetails['aiStatus'] : '1',
            'sharetype' => isset($offerDetails['sharetype']) ? $offerDetails['sharetype'] : '',
            'percentage' => isset($offerDetails['percentage']) ? $offerDetails['percentage'] : '',
            'progressonOff' => isset($offerDetails['progressonOff']) ? $offerDetails['progressonOff'] : '',
            'progressbar_values' => isset($offerDetails['progressbar_values']) ? $offerDetails['progressbar_values'] : '',
            'offering_types' => isset($offerDetails['offering_types']) ? $offerDetails['offering_types'] : '',
            'mininv' => isset($offerDetails['mininv']) ? $offerDetails['mininv'] : '',
            'number_units' => isset($offerDetails['number_units']) ? $offerDetails['number_units'] : '',
            'payment_type' => isset($offerDetails['payment_type']) ? $offerDetails['payment_type'] : '',
            "offering_glance" => isset($offerDetails['offering_glance']) ? $offerDetails['offering_glance'] : '',
            "offering_glance_status" => isset($offerDetails['offering_glance_status']) ? $offerDetails['offering_glance_status'] : '',
            "offeringText" => isset($offerDetails['offeringText']) ? $offerDetails['offeringText'] : '',
            "cover" => isset($offerDetails['cover']) ? $offerDetails['cover'] : '',
            'fractionaltypes' => isset($offerDetails['fractionaltypes']) ? $offerDetails['fractionaltypes'] : '',
            'offeringtags' => isset($offerDetails['offeringtags']) ? $offerDetails['offeringtags'] : '',
            'step_one' => '1',
            'usergroups' => $userGroups, 
            'AchWireInstruction' => isset($offerDetails['AchWireInstruction']) ? $offerDetails['AchWireInstruction'] : '',
			 'investpageDisclimaer' => isset($offerDetails['investpageDisclimaer']) ? $offerDetails['investpageDisclimaer'] : '',
        );
        $fieldsLocalOffer = $fieldsArrayLocalOffer;
        $result = $this->Dashboard_model->createDupOffer($fieldsLocalOffer);

        if ($result != 1) {
            print_r($result);
            exit;
        }

        $offeringId = $createOffer['offeringDetails'][1][0]['offeringId'];
        
        $fieldsArrayOffer = array(
            'developerAPIKey' => $devKey,
            'clientID' => $clientID,
            'offeringId' => $createOffer['offeringDetails'][1][0]['offeringId'],
            'stampingText' =>  $locstampingText,
            'offeringStatus' => 'Approved',
            'updatedIPaddress' => $_SERVER['REMOTE_ADDR'],
        ); 
        $fieldsOffer = addslashes_array($fieldsArrayOffer);
        $updateOffer = api_call("updateOffering", $fieldsOffer, "POST");
        $resultOffer = api_result_check($updateOffer);  

        if ($resultOffer != 1) {
            print_r($resultOffer);
            exit;
        } 
        //$createOffer['offeringDetails'][1][0]['offeringId'] = '419270';
        $_SESSION['ClientAdminId'] = $getClientDetails[0]['ca_id'];
        $_POST['offeringID'] = $offerID;
        $this->createDuplicateOfferSection($createOffer['offeringDetails'][1][0]['offeringId']); 
        $this->createDuplicateOfferAttestation($createOffer['offeringDetails'][1][0]['offeringId']); 
        //print_r($createOffer['offeringDetails'][1][0]['offeringId']);

        $this->createDuplicateOfferContent($createOffer['offeringDetails'][1][0]['offeringId']); 
        $this->createDuplicateOfferTeamMeber($createOffer['offeringDetails'][1][0]['offeringId']); 
        $this->uploadDupliOfferingDoc($createOffer['offeringDetails'][1][0]['offeringId'], $_SESSION['ClientAdminId']);  
        // $this->uploadDupliSubDoc($createOffer['offeringDetails'][1][0]['offeringId']);  
        

        // print_r('1');
    }

    public function createDuplicateOfferSection($offeringId){
        $getDupOffersSection = $this->Dashboard_model->getOffersSection($_POST['offeringID']);
        

         foreach ($getDupOffersSection as $key => $value) {


                $fieldsArray = array(
                                    'client_fk_id' => $_SESSION['ClientAdminId'],
                                    "offeringId" => isset($offeringId) ? $offeringId : '',
                                    "defaultName" => isset($value['defaultName']) ? $value['defaultName'] : '',
                                    "customName" => isset($value['customName']) ? $value['customName'] : '',
                                    "status" => isset($value['status']) ? $value['status'] : '',
                                    "orderingpostion" => isset($value['orderingpostion']) ? $value['orderingpostion'] : '',
                                );

                $createDupSection = $this->Dashboard_model->createDupSection($fieldsArray);

            }

    }

    public function createDuplicateOfferAttestation($offeringId){
        $getDupOffersAttestation = $this->Dashboard_model->getOffersAttestation($_POST['offeringID']);

         foreach ($getDupOffersAttestation as $key => $value) {


                $fieldsArray = array(
                                    'client_fk_id' => $_SESSION['ClientAdminId'],
                                    "offeringId" => isset($offeringId) ? $offeringId : '',
                                    "attestationsText" => isset($value['attestationsText']) ? $value['attestationsText'] : '',
                                    "status" => isset($value['status']) ? $value['status'] : '',
                                    "orderingpostion" => isset($value['orderingpostion']) ? $value['orderingpostion'] : '',
                                );

                $createDupAttestation = $this->Dashboard_model->createDupAttestation($fieldsArray);

            }

    }

    public function createDuplicateOfferContent($offeringId){
         $getDupOffersExtn = $this->Dashboard_model->getOffersExtnDetails($_POST['offeringID']);
            $offerExtnDetails = reset($getDupOffersExtn); //echo '<pre>'; print_r($offerExtnDetails);

            $whereExt = array("offering_id" => $offeringId);
        $fieldsArrayExtn = array(
            'client_fk_id' => $_SESSION['ClientAdminId'],
            "about_company" => isset($offerExtnDetails['about_company']) ? $offerExtnDetails['about_company'] : '',
             "offering_id" => $offeringId,
            "offeringContent" => isset($offerExtnDetails['offeringContent']) ? $offerExtnDetails['offeringContent'] : '',
            "investmentsummary" => isset($offerExtnDetails['investmentsummary']) ? $offerExtnDetails['investmentsummary'] : '',
            "highlights" => isset($offerExtnDetails['highlights']) ? $offerExtnDetails['highlights'] : '',
            "companyoverview" => isset($offerExtnDetails['companyoverview']) ? $offerExtnDetails['companyoverview'] : '',
            "meettheceo" => isset($offerExtnDetails['meettheceo']) ? $offerExtnDetails['meettheceo'] : '',
            "news" => isset($offerExtnDetails['news']) ? $offerExtnDetails['news'] : '',
            "termsheet" => isset($offerExtnDetails['termsheet']) ? $offerExtnDetails['termsheet'] : '',
            "financialdiscussion" => isset($offerExtnDetails['financialdiscussion']) ? $offerExtnDetails['financialdiscussion'] : '',
            "priorrounds" => isset($offerExtnDetails['priorrounds']) ? $offerExtnDetails['priorrounds'] : '',
            "market" => isset($offerExtnDetails['market']) ? $offerExtnDetails['market'] : '',
            "risksdisclosures" => isset($offerExtnDetails['risksdisclosures']) ? $offerExtnDetails['risksdisclosures'] : '',
            "about" => isset($offerExtnDetails['about']) ? $offerExtnDetails['about'] : '',
            "preview" => isset($offerExtnDetails['preview']) ? $offerExtnDetails['preview'] : '' ,
            "deal_logo" => isset($offerExtnDetails['deal_logo']) ? $offerExtnDetails['deal_logo'] : '' ,
            "video_embed" => isset($offerExtnDetails['video_embed']) ? $offerExtnDetails['video_embed'] : '' ,
            "videourl" => isset($offerExtnDetails['videourl']) ? $offerExtnDetails['videourl'] : '' ,
            "mapEmbed" => isset($offerExtnDetails['mapEmbed']) ? $offerExtnDetails['mapEmbed'] : '' ,
            "mapEmbedUrl" => isset($offerExtnDetails['mapEmbedUrl']) ? $offerExtnDetails['mapEmbedUrl'] : '' ,
            "due_dilligence" => isset($offerExtnDetails['due_dilligence']) ? $offerExtnDetails['due_dilligence'] : '' ,
            "crowdcheckLogo" => isset($offerExtnDetails['crowdcheckLogo']) ? $offerExtnDetails['crowdcheckLogo'] : '' ,
            "crowdcheckURL" => isset($offerExtnDetails['crowdcheckURL']) ? $offerExtnDetails['crowdcheckURL'] : '' ,
        );  //echo '<pre>'; print_r($fieldsArrayExtn); exit;
        $offeringImagesExtn = $this->Dashboard_model->dupOfferingImageExtn($fieldsArrayExtn, $whereExt);

       

    }     
    public function createDuplicateOfferTeamMeber($offeringId){
            $getDupOffersTeam = $this->Dashboard_model->getOffersTeamDetails($_POST['offeringID']);

            foreach ($getDupOffersTeam as $key => $value) {


                $fieldsArray = array(
                                    'client_fk_id' => $_SESSION['ClientAdminId'],
                                    "offeringId" => isset($offeringId) ? $offeringId : '',
                                    "memberName" => isset($value['memberName']) ? $value['memberName'] : '',
                                    "memberPosition" => isset($value['memberPosition']) ? $value['memberPosition'] : '',
                                    "memberImage" => isset($value['memberImage']) ? $value['memberImage'] : '',
                                    "orderingpostion" => isset($value['orderingpostion']) ? $value['orderingpostion'] : '',
                                    "aboutMember" => isset($value['aboutMember']) ? $value['aboutMember'] : '',
                                    "createDate" => isset($value['createDate']) ? $value['createDate'] : '',
                                );

                $createDupTeam = $this->Dashboard_model->createDupTeamMember($fieldsArray);

            }

            $getDupOffersFaq = $this->Dashboard_model->getOffersFaqDetails($_POST['offeringID']);

            foreach ($getDupOffersFaq as $key => $value) {


               $fieldsArray = array(
                                    'client_fk_id' => $_SESSION['ClientAdminId'],
                                    "offeringId" => isset($offeringId) ? $offeringId : '',
                                    "faqQuestion" => isset($value['faqQuestion']) ? $value['faqQuestion'] : '',
                                    "faqAnswer" => isset($value['faqAnswer']) ? $value['faqAnswer'] : '',
                                    "createdDate" => date("Y-m-d H:i:s"),
                                    "ipAddress" => $_SERVER['REMOTE_ADDR'],
                                );

                $createDupTeam = $this->Dashboard_model->createDupFAQ($fieldsArray);

            }

             $getDupOffersPhotos = $this->Dashboard_model->getOffersPhotosDetails($_POST['offeringID']);

             foreach ($getDupOffersPhotos as $key => $value) {


               $fieldsArray = array(
                                    'client_fk_id' => $_SESSION['ClientAdminId'],
                                    "offeringId" => isset($offeringId) ? $offeringId : '',
                                    "fileName" => isset($value['fileName']) ? $value['fileName'] : '',
                                    "oldFileName" => isset($value['oldFileName']) ? $value['oldFileName'] : '',
                                    "createdDate" => date("Y-m-d H:i:s"),
                                );

                $createDupTeam = $this->Dashboard_model->createDupPhotos($fieldsArray);

            }
    }

        

        public function uploadDupliOfferingDoc($offeringId,$id){  //$offeringId 
             
            // $_POST['offeringID'] = 9; $offeringId = '40976'; 
            $getDoc = $this->Dashboard_model->getOfferingDoc($_POST['offeringID']);

            // $id = '55';
            $getClientDetails = $this->Dashboard_model->getClientDetails($id);   
    
              
    
            $offerID = $getClientDetails[0]['ca_offerSamID'];
            $clientID = $getClientDetails[0]['ca_clinetId'];
            $devKey = $getClientDetails[0]['ca_developerKey'];

            // echo '<pre>'; print_r($getDoc); exit;

             $fileName = array();
             $documentTitle = array();

            if(isset($getDoc)){
                foreach($getDoc as $key => $value){

                    //local upload
                    $localPath = '/home/stagmtp/marketplace/SuperAdmin/assets/csv/';
                    $documntName = $value['documentFileName'];
                    $file =  $value['documentURL'] ."". $documntName;
                    
                   file_put_contents($localPath . $documntName, fopen($file, 'r')); 
                    // print_r($file);

                    // exit;
                
                    $fields['clientID'] = $clientID;
                    $fields['developerAPIKey'] = $devKey;
                    $fields['offeringId'] = $offeringId;
                    $fields['templatename'] = $value['templateName'];
                    $fields['documentFileReferenceCode'] = date('dmyhis');
                    $fields['createdIpAddress'] = $_SERVER['REMOTE_ADDR'];
                    $fields['approval'] = 'yes';
                    $fields['supervisorname'] = 'admin';
                    $fields['date'] = date("Y-m-d H:i:s");

                    if($value['documentFileName'] != ""){
                        $fileName[$key] = "filename" . $key . "= " . $value['documentFileName'];
                    }

                    if ($value['documentTitle'] != "") {
                        $documentTitle[$key] = "documentTitle" . $key . "= " . $value['documentTitle'];
                    }
                    $ctype = "application/pdf";

                    $fields['userfile' . $key] = new CurlFile($localPath.''.$documntName, $ctype, basename($value['documentFileName']));
                                
                }
            

                
            $fields['file_name'] = implode("&", $fileName);
            $fields['documentTitle'] = implode("&", $documentTitle); 

            $url = API_URL . "addDocumentsforOffering";
            $offeringDoc = fileUpload_call($url, $fields, 'POST');
            $resultOfferDoc = api_result_check($offeringDoc);   

            if(isset($offeringDoc['document_details'])){

                foreach ($offeringDoc['document_details'] as $key => $value) {
                    $fileName = explode("/", $value['documentURL']);
                    $addDocsFields = array(
                        'client_fk_id' => $_SESSION['ClientAdminId'],
                        'developerAPIKey' => $devKey,
                        'offeringId' => $offeringId,
                        'documentId' => $value['documentId'],
                        'documentTitle' => $getDoc[$key]['documentTitle'],
                        'documentURL' => $value['documentURL'],
                        'documentFileName' => end($fileName),
                        'templateName' => $getDoc[$key]['templateName'],
                        'documentFileReferenceCode' => $value['documentReferenceCode'],
                        'createdDate' => date('Y-m-d H:i:s'),
                        'accessPublic' => $getDoc[$key]["accessPublic"],
                        'usersAccess' => $getDoc[$key]["usersAccess"],
                        'createdIpAddress' => $_SERVER['REMOTE_ADDR']
                    );
                    $offeringDocument = $this->Dashboard_model->addDupOfferingDoc($addDocsFields); 

                    if ($offeringDocument != 1) {
                        $errorLocal .= $offeringDocument;
                    }
                }
            }
            }

        }

       

         // Duplicate Offering
    //DUPLICATE OFFER

    public function Lambda($action,$ca_id){
        /* LAMDA CONNECTION - INIT */
        $client = LambdaClient::factory([
            'version' => 'latest',
            'region' => 'us-east-2',
            'credentials' => [
                'key' => AWS_SDK_KEY,
                'secret' => AWS_SDK_SECERT,
            ]
            ]);
        $payload = array(
            "ca_id" => $ca_id,
            "action" => $action,
        );
        $result = $client->invoke([
            // The name your created Lamda function
            'FunctionName' => 'addWebhookStag',
            'InvocationType' => 'Event',
            'action' => $action,
            'Payload' => json_encode($payload)
        ]);                         
        /* LAMDA CONNECTION - DONE */
    }

    public function DeleteLambda($action,$ca_id){
        /* LAMDA CONNECTION - INIT */
        $client = LambdaClient::factory([
            'version' => 'latest',
            'region' => 'us-east-2',
            'credentials' => [
                'key' => AWS_SDK_KEY,
                'secret' => AWS_SDK_SECERT,
            ]
            ]);
        $payload = array(
            "ca_id" => $ca_id,
            "action" => $action,
        );
        $result = $client->invoke([
            // The name your created Lamda function
            'FunctionName' => 'addWebhookStag',
            'action' => $action,
            'Payload' => json_encode($payload)
        ]);                         
        /* LAMDA CONNECTION - DONE */
    }

}
