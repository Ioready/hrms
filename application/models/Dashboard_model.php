<?php

class Dashboard_model extends CI_Model {
    public function __construct() {
        parent::__construct();

    }
    public function dashboard_counts(){
        // $counts['clients_count'] = $this->db->select('*')->where($where)->get(TBL_ADMIN_LOGIN)->num_rows();
        $where1 = array('deleted' => 'N');
        $counts['clients_count'] = $this->db->select('*')->where($where1)->get('customers')->num_rows();
        $where2 = array('deleted' => 'N');
        $counts['product_count'] = $this->db->select('*')->where($where2)->get('items')->num_rows();
        $where3 = array('deleted' => 'N', 'type' => 'invoice');
        $counts['total_invoice'] = $this->db->select('*')->where($where3)->get('db')->num_rows();
        $where4 = array('deleted' => 'N', 'type' => 'quote');
        $counts['total_quote'] = $this->db->select('*')->where($where4)->get('db')->num_rows();
        // $where4 = array('deleted' => 'N','invoice_status' => 'paid');
        // $counts['total_paid_invoice'] = $this->db->select('*')->where($where4)->get('invoices')->num_rows();
        // $where5 = array('deleted' => 'N','invoice_status' => 'unpaid');
        // $counts['total_unpaid_invoice'] = $this->db->select('*')->where($where5)->get('invoices')->num_rows();
        return $counts;
        }

        public function  getSettings(){
            $settings = $this->db->select('*')->where('id',5)->get('setting')->result_array();
            return $settings;

        }
        public function update_settings($fields){

            $data_update=$this->db->where('id', 5)->update('setting', $fields);
            return $data_update;
        }
        

    public function addClient_ctrl($fields){
		$result = $this->db->insert(TBL_ADMIN_LOGIN, $fields);
		$rows =  $this->db->insert_id();
        if($rows > 0){
         return $rows;
        }else{
	     return FALSE;
		}
        // return $result;
	}
	public function addClientAdmin_ctrl($fields){
		$result = $this->db->insert(TBL_CLIENTADMIN, $fields);
		$rows =  $this->db->insert_id();
        if($rows > 0){
         return 1;
        }else{
	     return FALSE;
		}
        // return $result;
    }
    public function getAllClient(){
        $where = array('ca_virtualStatus' => 'ACTIVE');
        $result = $this->db->select('*')->where($where)->order_by('ca_id', 'DESC')->get(TBL_ADMIN_LOGIN)->result_array();
        return $result;
    }
    public function getSingleClient($cilentId){
        $where = array('ca_virtualStatus' => 'ACTIVE', 'ca_id' => base64_decode(($cilentId)));
        $result = $this->db->select('*')->where($where)->get(TBL_ADMIN_LOGIN)->result_array(); 
        return $result;
    }






















    public function getclientpassword(){
        $where = array('samp_virtualStatus' => 'ACTIVE', 'samp_status' => 1);
        $results = $this->db->select('*')->where($where)->get(TBL_CLIENTADMIN_PASSWORD)->result_array();
        return $results;
    }

    public function getAllSuperAdmin(){
        $where = array('sa_virtualStatus' => 'ACTIVE');
        $results = $this->db->select('*')->where($where)->get(TBL_SUPERADMIN)->result_array();
        return $results;
    }

    public function getSingleSuperAdmin($cilentId){
        $where = array('sa_virtualStatus' => 'ACTIVE', 'sa_id' => base64_decode(($cilentId)));
        $result = $this->db->select('*')->where($where)->get(TBL_SUPERADMIN)->result_array(); 
        return $result;
    }

    public function checkDomain($where){
        $result = $this->db->select('ca_domain')->where($where)->get(TBL_ADMIN_LOGIN)->result_array();
        return $result;
	}

	public function checkDomainupdate($where){
        $result = $this->db->select('*')->where($where)->get(TBL_ADMIN_LOGIN)->result_array();
        return $result;
	}

    public function checkUpdateClientAdmin($fieldsClientId,$wherenot){
        $result = $this->db->select('*')->where($fieldsClientId)->where($wherenot)->get(TBL_ADMIN_LOGIN)->result_array();
        return $result;
	}

    public function checkClientAdmin($where){
        $result = $this->db->select('*')->where($where)->get(TBL_ADMIN_LOGIN)->result_array();
        return $result;
	}
    

    public function checkEmail($email){
        $where = array('ca_virtualStatus' => 'ACTIVE', 'ca_emailid' => $email );
        $result = $this->db->select('ca_emailid')->where($where)->get(TBL_ADMIN_LOGIN)->result_array();
        return $result;
	}
	public function checkClientAdminEmail($email,$client_id){
        $where = array('virtualStatus' => 'ACTIVE', 'username' => $email, 'client_id' => $client_id);
        $result = $this->db->select('username')->where($where)->get(TBL_CLIENTADMIN)->result_array();
        return $result;
    }
    public function addSuperAdmin_ctrl($fields){
            $addsuperadmin = $this->db->insert(TBL_SUPERADMIN, $fields);
            return $addsuperadmin;
    }

    public function updateSuperAdmin_ctrl($fields,$where){
         $result = $this->db->where($where)->update(TBL_SUPERADMIN, $fields);
        return $result;
    }

    public function deletesuperAdmin_ctrl(){
        $superAdminId = base64_decode(isset($_POST['superAdminId']) ? $_POST['superAdminId'] : '');
        $date = date('Y-m-d H:i:s');
        $deleteArray = array(
            'sa_virtualStatus' => 'DELETE'
        );
        $this->db->where('sa_id', $superAdminId);
        $deleteusers = $this->db->update(TBL_SUPERADMIN, $deleteArray);
        return $deleteusers;
    }

    public function editClient_ctrl($fields,$where){
        $result = $this->db->where($where)->update(TBL_ADMIN_LOGIN, $fields);
        return $result;
	} 
	
    public function editClientAdmin_ctrl($fields,$where){
		$result = $this->db->where($where)->update(TBL_CLIENTADMIN, $fields);
		// print_r($result);
		// exit;
        return $result;
	} 
	public function add_kyc_supportMail($fields){

		$result = $this->db->insert('transact_kycnotifacation', $fields);
		// print_r($result);
		// exit;
        return $result;
	} 
	public function add_styling($fields){

		$result = $this->db->insert('master_style', $fields);
        return $result;
	} 
	
	
    public function deleteClient_ctrl(){
         $clientid = base64_decode(isset($_POST['clientId']) ? $_POST['clientId'] : '');
        $date = date('Y-m-d H:i:s');
        $deleteArray = array(
            'ca_virtualStatus' => 'DELETE'
        );
        $this->db->where('ca_id', $clientid);
        $deleteusers = $this->db->update(TBL_ADMIN_LOGIN, $deleteArray);
        return $deleteusers;
	}    
	public function deleteClientAdmin_ctrl(){
		$clientid = base64_decode(isset($_POST['clientAdminId']) ? $_POST['clientAdminId'] : '');
	   $date = date('Y-m-d H:i:s');
	   $deleteArray = array(
		   'virtualStatus' => 'DELETE'
	   );
	   $this->db->where('id', $clientid);
	   $deleteusers = $this->db->update(TBL_CLIENTADMIN, $deleteArray);
	   return $deleteusers;
   }    

    public function masterPassword_ctrl() {
        $data = array('samp_status' => 0);
        $result = $this->db->update(TBL_CLIENTADMIN_PASSWORD, $data); 
        if ($result == 1) {
            $adminArray = array(
                'samp_masterPassword' => $_POST['adminPWD'],
                'samp_useremail' => $_SESSION['saUserName'],
                'samp_createdDate' => date('Y-m-d H:i:s'),
                'samp_createdIp' => $_SERVER['REMOTE_ADDR'],
                'samp_status' => 1
            );
            $adminpwd = $this->db->insert(TBL_CLIENTADMIN_PASSWORD, $adminArray);
            return $adminpwd;
        }
    }

    public function getAllIpaddress(){ 
         $where = array('saip_virtualStatus' => 'ACTIVE');
        $result = $this->db->select('*')->where($where)->get(TBL_SUPERADMIN_IPADDRESS)->result_array();
        return $result;
        
    }
    public function ipaddress_ctrl($fields){ 
        $result = $this->db->insert(TBL_SUPERADMIN_IPADDRESS, $fields);
        return $result;
        
    }
    public function updateIpaddress_ctrl($fields,$where){
         $result = $this->db->where($where)->update(TBL_SUPERADMIN_IPADDRESS, $fields);
        return $result;
    }
     //TBL_ADMIN_LOGIN - 'client_admin_login'
    // TBL_CLIENTADMIN - '99_admin_login'
    public function getSingleClientAdmin($cilentId){
        $where = array('ca_virtualStatus' => 'ACTIVE', 'ca_id' => $cilentId);
        $result = $this->db->select('*')->where($where)->get(TBL_ADMIN_LOGIN)->result_array(); 
        return $result;
    }
    public function updateAdmin($fields,$where){
        $result = $this->db->where('ca_id',$where)->update(TBL_ADMIN_LOGIN, $fields);
        return $result;
    }
    public function singleClientAdminGet($cilentId){
        $where = array('virtualStatus' => 'ACTIVE', 'client_id' => $cilentId);
        $result = $this->db->select('*')->where($where)->get(TBL_CLIENTADMIN)->result_array(); 
        return $result;
    }
    public function updateClientAdmin($fields,$where){
        $result = $this->db->where('client_id',$where)->update(TBL_CLIENTADMIN, $fields);
    //    print_r($this->db->last_query());
    //    exit;
        return $result;
    }
    public function ClientAdminForInvitation($cilentId){
        $where = array('virtualStatus' => 'ACTIVE', 'id' => $cilentId);
        $result = $this->db->select('*')->where($where)->get(TBL_CLIENTADMIN)->result_array(); 
        return $result;
    }
    public function updateClientAdminInviteStatus($fields,$where){
        $result = $this->db->where('id',$where)->update(TBL_CLIENTADMIN, $fields);
    //    print_r($this->db->last_query());
    //    exit;
        return $result;
    }
    public function setClientAdminPassword($fields){
        $result = $this->db->insert(TBL_CLIENTADMIN, $fields);
       return $result;
   }
   public function setDomainVerified($ca_id,$fields) {

        $where = array('ca_virtualStatus' => 'ACTIVE', 'ca_id' => $ca_id);

        $result = $this->db->where($where)->update(TBL_ADMIN_LOGIN, $fields);
        return $result;
   }

   public function checkClientNameExists($fields) {

        $result = $this->db->select('*')->where($fields)->get(TBL_ADMIN_LOGIN)->result_array(); 
        return $result;

   }
   public function checkCa_usernameExists($fields) {

    $result = $this->db->select('*')->where($fields)->get(TBL_ADMIN_LOGIN)->result_array(); 
    return $result;

}
   public function checkSuperAdminMailExists($fields) { 

	$result = $this->db->select('*')->where($fields)->get(TBL_SUPERADMIN)->result_array(); 
	return $result;

}
public function getAllClientAdmins(){
    $where = array(TBL_CLIENTADMIN.'.virtualStatus' => 'ACTIVE',TBL_CLIENTADMIN.'.client_type' => 'NO'); 
	$result = $this->db->select('*')
    ->join(TBL_ADMIN_LOGIN, TBL_ADMIN_LOGIN . '.ca_id= ' . TBL_CLIENTADMIN . '.client_id ', 'LEFT')
    ->where(TBL_ADMIN_LOGIN . '.ca_virtualStatus=' , 'ACTIVE')
    ->where($where)
    ->get(TBL_CLIENTADMIN)->result_array(); 
// print_r($this->db->last_query());

	return $result;
}
public function getsingleClientAdminUser($cilentId){
	$where = array('virtualStatus' => 'ACTIVE', 'id' => base64_decode($cilentId));
	$result = $this->db->select('*')->where($where)->get(TBL_CLIENTADMIN)->result_array(); 
	return $result;
}
public function getClientconfig($id){
    $where = array('client_fk_id' => base64_decode($id));
    $result = $this->db->select('*')->where($where)->get(TBL_CLNT_CONFIGURE)->result_array(); 
	return $result;
}
public function editclientconfig_ctrl($field, $where){
    $result = $this->db->where($where)->update(TBL_CLNT_CONFIGURE, $field); 
    return $result;
}
public function addClientConfiguration($field){
    $result = $this->db->insert(TBL_CLNT_CONFIGURE, $field); 
    return $result;
}

public function addClientStyling($field){
    $result = $this->db->insert(TBL_MASTER_STYLE, $field); 
    return $result;
}
public function findDomainName($where){
	$result = $this->db->select('ca_domain')->where($where)->get(TBL_ADMIN_LOGIN)->result_array(); 
	return $result;
}

public function auto_masterPassword_ctrl() {
    
    $password = $this->randomPassword(8);

    $data = array('samp_status' => 0);
    $result = $this->db->update(TBL_CLIENTADMIN_PASSWORD, $data); 
    if ($result == 1) {
        $adminArray = array(
            'samp_masterPassword' => $password,
            'samp_useremail' => 'auto',
            'samp_createdDate' => date('Y-m-d H:i:s'),
            'samp_createdIp' => 'auto',
            'samp_status' => 1
        );
        $adminpwd = $this->db->insert(TBL_CLIENTADMIN_PASSWORD, $adminArray);
        return $adminpwd;
    }
}

public function randomPassword($length) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $length; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
public function createdashboardSections($clientid) {
    $client_id = $clientid;
    $offeringSectionVal = array('Your Investments', 'Investor Profile', 'Investor Suitability', 'User Settings','Payment Details', 'Documents');
    foreach ($offeringSectionVal as $key => $value) {
        $field = array('client_fk_id' => $client_id,'defaultName' => $value, 'customName' => $value,'orderingpostion' => $key + 1);
        $this->db->insert(TBL_DASHBOARD_SECTION, $field);
    }
}

public function getallWebhookLink(){
    $result =$this->db->select('*')->get('transact_webhook_table')->result_array();  return $result;
}

//DUPLICATE OFFER

public function getSampleOffer(){
    $result = $this->db->select('id,issueName')->where('virtualStatus', 'ACTIVE')->get(TBL_OFFTEMP_OFFERS)->result_array();
    return $result;
}

    public function getClientDetails($id){
        $result = $this->db->select('*')->where('ca_id', $id)->get(TBL_ADMIN_LOGIN)->result_array();
        return $result;
    }

    public function getOffersDetails($id){
        $result = $this->db->select('*')->where('id', $id)->get(TBL_OFFTEMP_OFFERS)->result_array();
        return $result;
    }

    public function createIssuer($fieldsLocal) {
        $this->db->insert(ISSUER, $fieldsLocal);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return "Error in inserting issuer data";
        }
    }


    public function createIssuerAccount($fieldsLocal) {
        $this->db->insert(ISSUER_ACCOUNT, $fieldsLocal);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return "Error in inserting issuer account data";
        }
    }

    public function updateIssuer($fields, $where) {
        $this->db->where($where)->update(ISSUER, $fields);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return "Error in updating issuer data";
        }
    }

    public function createDupOffer($fieldsLocalOffer) {
        $this->db->insert(OFFERS, $fieldsLocalOffer);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return "Error in inserting data";
        }
    }

    public function getOffersSection($offeringID){
        $where = array("offeringId" => $offeringID);
        $offer = $this->db->where($where)->get(TBL_OFFTEMP_SECTION);
        return $offer->result_array();
    }

    public function createDupSection($fieldsArray){
        $this->db->insert(TBL_OFFERING_SECTION, $fieldsArray);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return "Error in inserting data";
        }
    }

    public function getOffersAttestation($offeringId) {
		
        $where = array("offeringId" => $offeringId);
        $result = $this->db->select('*')->where($where)->where(TBL_OFFTEMP_ATTESTATION . ".status", 'Active')->order_by('orderingpostion', 'ASC')->get(TBL_OFFTEMP_ATTESTATION)->result_array();
        return $result;
    }

    public function createDupAttestation($field) {
        $result = $this->db->insert(TBL_OFFERING_ATTESTATION, $field);
        return $result;
    }


    public function getOffersExtnDetails($offeringID) {
        $where = array( "offering_id" => $offeringID);
        $offer = $this->db->where($where)->get(TBL_OFFTEMP_OFERS_EXT);
        return $offer->result_array();
    }

    

    public function getOffersTeamDetails($offeringId) {
        $where = array("offeringId" => $offeringId);
        $result = $this->db->select('*')->where($where)->where(TBL_OFFTEMP_TEAM . ".status", 'Active')->get(TBL_OFFTEMP_TEAM)->result_array();
        return $result;
    }

    public function createDupTeamMember($fieldsArray) {
        $this->db->insert(TBL_OFFTEMP_TEAM, $fieldsArray);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return "Error in inserting data";
        }
    }

    public function getOffersFaqDetails($offeringId) {
        $where = array("offeringId" => $offeringId);
        $result = $this->db->select('*')->where($where)->where(TBL_OFFTEMP_FAQ . ".status", 'Active')->get(TBL_OFFTEMP_FAQ)->result_array();
        return $result;
    }

    public function createDupFAQ($fieldsArray) {
        $this->db->insert(TBL_OFFER_FAQ, $fieldsArray);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return "Error in inserting data";
        }
    }

    public function getOffersPhotosDetails($offeringId) {
        $where = array("offeringId" => $offeringId);
        $result = $this->db->select('*')->where($where)->where(TBL_OFFTEMP_PHOTOS . ".status", 'Active')->get(TBL_OFFTEMP_PHOTOS)->result_array();
        return $result;
    }

    public function createDupPhotos($fieldsArray) {
        $this->db->insert(TBL_OFFER_PHOTOS, $fieldsArray);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return "Error in inserting data";
        }
    }

    public function dupOfferingImageExtn($fields, $where) {
        if ($getOfferingData = $this->db->select('offering_id')->where($where)->get(OFFERS_EXTN)) {
            if ($getOfferingData->num_rows() > 0) {
                if ($this->db->where($where)->update(OFFERS_EXTN, $fields)) {
                    return 1;
                }
			} 
			else {
                if ($this->db->insert(OFFERS_EXTN, $fields)) {
                    return 1;
                }
            }
        }
        $error = $this->db->error();
        if (isset($error)) {
            print_r($error['message']);
            exit;
        }
    }

    public function getOfferingDoc($offeringId) {
        $where = array( "offeringId" => $offeringId);
        $result = $this->db->select('*')->where($where)->where(TBL_OFFTEMP_DOCUMENT . ".virtualStatus", 'Active')->get(TBL_OFFTEMP_DOCUMENT)->result_array();
        return $result;
    }

    public function addDupOfferingDoc($fieldsLocalOfferDoc) {
        $this->db->insert(TBL_OFFERING_DOCUMENT, $fieldsLocalOfferDoc);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return "Error in inserting data";
        }
    }
    //DUPLICATE OFFER
}
?>
