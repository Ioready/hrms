<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
    }


    public function index() { 

        if (isset($_SESSION['saUserEmail'])) {
            redirect('dashboard');
        }
        $title = array('menu' => 'Login');

        $this->load->view('includes/assets', $title);
        $this->load->view('home');
        $this->load->view('includes/footer', $title);
    }

	public function login(){
		$result = $this->Home_model->login_check();
        if ($result == 0) {
            echo 0;
        } 
		else if ($result == 2) {
            echo 2;
        }
		else {
            foreach ($result as $key => $value) {
                $data = $this->session->set_userdata(
                        array('saId' => $value['sa_id'],
                            'saUserEmail' => $value['sa_emailid'],
                            'saUserName' => $value['sa_username'],
                ));
                $lastlogin = $this->Home_model->updatelastlogin($value['sa_id']);

            }
            echo 1;
        }
	}
    public function resetAdminUserpassword(){
        if (!empty($_SESSION['saUserEmail'])) {
           redirect('dashboard');
        }
        $userId = $this->uri->segment(3);
		
        if (isset($userId)) {
            $user['userId'] = $userId;
        }
        $title = array('menu' => 'Reset Password');
        $this->load->view('includes/assets', $title);     
        $this->load->view('resetpassword', $user);
        $this->load->view('includes/footer', $title);
    }

    public function updatePasswordAdmin() {
		  
        $passwordReset = $this->Home_model->AdminUserresetPassword();
        echo $passwordReset;
    }

    public function forgotPwd_ctrl(){ 
        $getClientUserDetails = $this->Home_model->getSingleSuperAdmin($_POST['email']);
        

        if ($getClientUserDetails == 0) {
            echo 'Invalid Email Address';
        }else{
                $clientUser = reset($getClientUserDetails); 
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
                                                                <img src="' . EMAILIMGPATH . 'logo.png" border="0" alt="IOREADY" width="300" style="max-width:300px; display:block;"/>
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
                                                                            <div style="padding-top:10px; padding-left:25px; padding-right:25px; ">Hi <span style="font-weight:bold;">' . $clientUser['sa_username'] . '</span>,</div>
                                                                            <div style=" text-align:left; padding-top:20px; padding-left:25px; padding-right:25px; color:#000000; font-size:14px; text-align:justify;">
                                                                                <span style="padding-left:25px;">This email </span>is to set up your client admin password for '.SITE_TITLE.' Please click the link below and set up your admin password.
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
            // if (!empty($sendGridApiCall)) {
            //     $error = json_decode($sendGridApiCall);
            //     $errorMessage = $error->errors[0]->message;
            //     print_r($errorMessage);
            //     exit;
            // }
			print_r(1);
        }
    }

    public function logout() {
        $this->session->unset_userdata('saId');
        $this->session->unset_userdata('saUserEmail');
        $this->session->unset_userdata('saUserName');
        redirect('Home');
    }
}
