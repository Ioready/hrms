<?php
defined('BASEPATH') or exit('No direct script access allowed');


include_once('class.phpmailer.php');
include_once('class.smtp.php');

function generateRandomString($length = 5) {
    $characters = '0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
function generateRandomCode($length) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
function sendGridCurl($messageBody) {
    $con = json_decode($messageBody);
    $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = SMTPAUTH;
        $mail->SMTPSecure = SMTPSECURE;
        $mail->Host = SMTPHOST;
        $mail->Port = SMTPPORT;
        $mail->Username = SMTPUSERNAME;
        $mail->Password = SMTPPASSWORD;
        $mail->SetFrom(SMTPFROMEMAIL, SMTPFROMNAME);
        $mail->AddReplyTo(SMTPFROMEMAIL, SMTPFROMNAME);
        $mail->AddAddress($con->personalizations[0]->to[0]->email, $con->personalizations[0]->to[0]->name);
        $mail->Subject = $con->subject;
        $mail->MsgHTML($con->content[0]->value);
        if (!$mail->Send()) {
        echo 'Email was not send successfully.';
        } else{
            return true;
        }

//    $curl = curl_init();
//    curl_setopt_array($curl, array(
//        CURLOPT_URL => SENDGRID_API_BASEURL.'mail/send',
//        CURLOPT_RETURNTRANSFER => true,
//        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//        CURLOPT_CUSTOMREQUEST => "POST",
//        CURLOPT_POSTFIELDS => $messageBody,
//        CURLOPT_HTTPHEADER => array(
//            "authorization: Bearer " . SENDGRID_API_KEY,
//            "cache-control: no-cache",
//            "content-type: application/json",
//        ),
//    ));

//    $response = curl_exec($curl);
//    $error = curl_error($curl);
//    curl_close($curl);

//    if ($error) {
//        return $error;
//    } else {
//        return $response;
//    }
}
function api_call($method_name, $fields, $method_type) { 
    $url = API_URL . $method_name; 
    $fields_string = '';

    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERPWD, 'nc_admin_rest_basic:nc_admin_basic_pwd');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method_type);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $result = curl_exec($ch);
    $r_str = str_replace("\'", "&#x27;", $result);
    $r = json_decode($r_str, true);
    return $r;
}

function api_result_check($result) {
    $api_result = '';
    if ($result['statusCode'] == 101) {
        $api_result .= 1;
    } elseif ($result['statusCode'] == 106) {
        $api_result .= $result['statusDesc'] . " " . $result['Error(s)'];
    } else {
        $api_result .= $result['statusDesc'];
    }
    return $api_result;
}

function passwordEncryptionMethod($string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = PASSWORD_ENCRYPTION_SECRETKEY;
    $secret_iv = PASSWORD_ENCRYPTION_SECRET_IV;
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
    return $output;
}

function passwordAPIDecryptionMethod($string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = PASSWORD_ENCRYPTION_SECRETKEY;
    $secret_iv = PASSWORD_ENCRYPTION_SECRET_IV;
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    return $output;
}

function contentEncode($array) {
    if (is_array($array)) {
        foreach ($array as $key => $value) {
            $array_result[$key] = str_replace('+', "plus", base64_encode($value));
        }
        return $array_result;
    } else {
        return str_replace('+', "plus", base64_encode($array));
    }
}

function contentDecode($array) {
    if (is_array($array)) {
        foreach ($array as $key => $value) {
            $array_result[$key] = base64_decode(str_replace('plus', "+", $value));
            ;
        }
        return $array_result;
    } else {
        return base64_decode(str_replace('plus', "+", $array));
    }
}

function addslashes_array($array) {
    if (is_array($array)) {
        foreach ($array as $key => $value) {
            $array_result[$key] = addslashes_array($value);
        }
        return $array_result;
    } else {
        return addslashes($array);
    }

    
}

function fileUpload_call($url, $fields, $method_type) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERPWD, 'nc_admin_rest_basic:nc_admin_basic_pwd');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method_type);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $result = curl_exec($ch);
    $r_str = str_replace("\'", "&#x27;", $result);
    $r = json_decode($r_str, true);
    return $r;
}
 

function getCategoryName($catID) {
        $ci = &get_instance();
        $ci->load->database();
        $category = $ci->db->select("name")->where("id", $catID)->get('category')->result_array();
        if (count($category) > 0) {
            $getKeyquery = $category;
            return $getKeyquery[0]['name'];
        }else{
            return 0;
        }
 }
 
function getClientName($clientID) {
    $ci = &get_instance();
    $ci->load->database();
    $category = $ci->db->select("name")->where("id", $clientID)->get('client')->result_array();
    if (count($category) > 0) {
        $getKeyquery = $category;
        return $getKeyquery[0]['name'];
    }else{
        return 0;
    }
}

function getQRName($qrID) {
    $ci = &get_instance();
    $ci->load->database();
    $category = $ci->db->select("name")->where("id", $qrID)->get('qr_code')->result_array();
    if (count($category) > 0) {
        $getKeyquery = $category;
        return $getKeyquery[0]['name'];
    }else{
        return 0;
    }
}

function getAllCategory() {
    $ci = &get_instance();
    $ci->load->database();
    $category = $ci->db->select("id,name")->where("virtual_status", 'ACTIVE')->get('category')->result_array();
    if (count($category) > 0) {
        $getKeyquery = $category;
        return $category;
    }else{
        return 0;
    }   
}
function getAllQRCode() {
    $ci = &get_instance();
    $ci->load->database();
    $category = $ci->db->select("id,name")->where("virtual_status", 'ACTIVE')->get('qr_code')->result_array();
    if (count($category) > 0) {
        $getKeyquery = $category;
        return $category;
    }else{
        return 0;
    }   
}
function getAllClient() {
    $ci = &get_instance();
    $ci->load->database();
    $category = $ci->db->select("id,name")->where("virtual_status", 'ACTIVE')->get('client')->result_array();
    if (count($category) > 0) {
        $getKeyquery = $category;
        return $category;
    }else{
        return 0;
    }   
}
?>
