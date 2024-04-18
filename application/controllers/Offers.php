<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Client_model');
        $this->load->model('Customers_model');
        $this->load->model('Dashboard_model');

    }

    public function index() { 
        if (!isset($_SESSION['saUserEmail'])) { 
            redirect('home/logout');
        }
        $title = array('menu' => 'Offers');
        $data['getClientList'] = getClientMailList();
        $this->load->view('includes/assets', $title);
        $this->load->view('includes/header', $title);
        $this->load->view('offers',$data);
        $this->load->view('includes/footer', $title); 
    }

    
    public function updateSummerNoteImages(){
        $files = $_FILES;
        // print_r($_FILES);
        if(isset($_FILES['file']['name'])){
        $file = $_FILES['file']['name']; 
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $fileName = pathinfo($file, PATHINFO_FILENAME);
        $filename = time() . substr(str_replace(" ", "_", $fileName), 5) . "." . $ext;
        $config['upload_path'] = SUMMERNOTE_PATH;
        $config['allowed_types'] = 'jpg|jpeg|png|JPG|PNG|JPEG';
        $config['max_size'] =  1024*10;
        $config['max_width'] =  1024*10;
        $config['max_height'] =  1024*10;
        $config['remove_spaces'] = true;
        $config['file_name'] = $filename;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            $error = $this->upload->display_errors();
            echo $error;
            exit;
        }
        $url = base_url().'assets/summernote/' . $filename;

        print_r($url);
        return $url;
    }
    }

    public function updateNotify(){
        
        $where = $_POST['ca_id'];
        $fields = array(
            'notify' => isset($_POST['status'])? $_POST['status'] : 'no',
        );
        $data = $this->Customers_model->updateNotify($fields, $where);
        if($data == true){
            print_r(1);
        }else{
            print_r(0);
        }

    }
    public function SendMailsToClient() { 
        if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        } 
        $data = $this->Dashboard_model->getSettings();
        $data = reset($data);
        $fields = array(
            'mail_subject' =>  isset($_POST['mail_subject'])? contentEncode($_POST['mail_subject']) : contentEncode($data['mail_subject']),   
            'mail_content' =>  isset($_POST['mail_content'])? contentEncode($_POST['mail_content']) : contentEncode($data['mail_content']),   
        );
        $data = $this->Dashboard_model->update_settings($fields);
// -----------------------------------------------

        

        $setting = getSetting();
        $mail_content = contentDecode($setting['mail_content']);
        $subject = contentDecode($setting['mail_subject']);

        $EMAILIMGPATH = base_url($setting['email_logo']);
        $site_title = $setting['company_name'];

        $getClientNotifyList = getClientNotifyList();
  
foreach ($getClientNotifyList as $key => $value)
{

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
                                                            <td>
                                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                    <tr>
                                                                        <td style="padding-top:25px;">
                                                                           
                                                                            <div align="center" style="margin: 10px 0px;">
                                                                               '.$mail_content.'
                                                                            </div>
                                                                         
                                                                           

                                                                        </td>
                                                                    </tr>  
                                                                    <tr>
                                                                        <td style="padding-top:35px; text-align:left;">  
                                                                            <div style="padding-left:25px; padding-right:25px;">Thanks & Regards,</div>
                                                                            <div style="padding-top:25px; padding-left:25px; padding-right:25px; ">The ' . $site_title . ' Team</div>
                                                                            <div style="padding-left:25px; padding-right:25px;"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
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
                            'email' => $value['email'],
                            'name' => $value['customerName']
                        ),
                    ),
                    'cc' => array(0 =>
                        array(
                            'email' => CC_EMAIL,
                            'name' => $site_title
                        ),
                    ),
                ),
            ),
            'from' => array(
                'email' => SUPPORT_MAIL,
                'name' => $site_title
            ),
            'subject' => $subject,
            'content' => array(0 =>
                array(
                    'type' => 'text/html',
                    'value' => $body,
                ),
            ),
        );

        $dataJson = json_encode($dataArray);
        $sendGridApiCall = sendGridCurl($dataJson);
        // if ($sendGridApiCall) {
        //     print_r($sendGridApiCall);
        //     exit;
        // }
    }



        print_r(1);
    }

}
// <div style="padding-top:10px; padding-left:25px; padding-right:25px; ">Hi <span style="font-weight:bold;">' .$value['customerName']. '</span>,</div>
