<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Extend exceptions to email me on exception
 *
 * @author Mike Funk
 * @email mfunk@christianpublishing.com
 *
 * @file MY_Exceptions.php
 */

/**
 * MY_Exceptions class.
 *
 * @extends CI_Exceptions
 */
class MY_Exceptions extends CI_Exceptions {

    // --------------------------------------------------------------------------

    /**
     * extend log_exception to add emailing of php errors.
     *
     * @access public
     * @param string $severity
     * @param string $message
     * @param string $filepath
     * @param int $line
     * @return void
     */


    // function __construct(){
    //     parent::__construct();
    //     $CI = & get_instance();
    // $CI->load->database();
            

    // }


    function show_error($heading, $message, $template = 'error_general', $status_code = 500)
    {
        if ($status_code == 500)
        {
            // $this->_report_error($message);
        }

        return parent::show_error($heading, $message, $template = 'error_general', $status_code = 500);
    }

    function log_exception($severity, $message, $filepath, $line)
    {

        // $CI = & get_instance();
        // $CI->load->database();
        // $CI->load->dbutil();

        parent::log_exception($severity, $message, $filepath, $line);

        // if ($severity != E_WARNING && $severity != E_NOTICE && $severity != E_STRICT)
        // {

            // set up content
			$content = config_item('php_error_email_content');

			$content = $this->_replace_short_tags($content, $severity, $message, $filepath, $line);


            $slack_content = config_item('php_error_slack_content');

            $slack_content = $this->_replace_short_tags($slack_content, $severity, $message, $filepath, $line);


            // $where = '1';
            // $dbVal = $this->db->select('*')->where('client_fk_id', $where)->get('transact_clientconfiguration')->result_array();
            // $dbs = $CI->dbutil->list_databases();

// foreach ($dbs as $db)
// {
//         // echo $db;
// }

//             if($dbs){
                $this->_report_error($content, $slack_content);

            // }


        // }
    }

    function _get_debug_backtrace($br = "<BR>") {
        $trace = array_slice(debug_backtrace(), 3);
        $msg = '<code>';
        foreach($trace as $index => $info) {
        if (isset($info['file']))
        {
            $msg .= $info['file'] . ':' . $info['line'] . " -> " . $info['function'] . '(' . $info['args'] . ')' . $br;
        }
        }
        $msg .= '</code>';
        return $msg;
    }

	
function sendGridCurl($messageBody) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => SENDGRID_API_BASEURL . 'mail/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $messageBody,
        CURLOPT_HTTPHEADER => array(
            "authorization: Bearer " . SENDGRID_API_KEY,
            "cache-control: no-cache",
            "content-type: application/json",
        ),
    ));

    $response = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);

    if ($error) {
        return $error;
    } else {
        return $response;
    }
}

    function _report_error($content, $slack_content)
    {
        // if(!empty(getSiteTitle()))
        // {
        // $site_title = getSiteTitle();
        // }else{
        $site_title = SITE_TITLE; 
        // }
		$CI =& get_instance();
		// $CI->load->helper('mass');

            // $CI->library->load('email');

			// $CI->config->load('config');
			// $this->load->library('email');

        
            // if it's enabled
            if (config_item('email_php_errors'))
            {
                $dataArray = array(
                    'personalizations' => array(0 =>
                        array('to' => array(0 =>
                                array(
                                    'email' => config_item('php_error_to'),
                                    'name' => 'MaaS'
                                ),
                                // array(
                                //     'email' => 'shobiga@captechin.com',
                                //     'name' => 'MaaS'
                                // ),
                               
                            ),
                            
                        ),
                    ),
                    'from' => array(
                        'email' => SUPPORT_MAIL,
                        'name' => $site_title
                    ),
                    'subject' => config_item('php_error_subject'),
                    'content' => array(0 =>
                        array(
                            'type' => 'text/html',
                            'value' => $content,
                        ),
                    ),
                );
    
                $dataJson = json_encode($dataArray);

                
                $sendGridApiCall = $this->sendGridCurl($dataJson);

                if (!empty($sendGridApiCall)) {
                    // $error = json_decode($sendGridApiCall);
                    // $errorMessage = $error->errors[0]->message;
                    // print_r($errorMessage);
                    // exit;
                }

                $ch = curl_init("https://slack.com/api/chat.postMessage");

                $slack_data  = "*".ucfirst(config_item('php_error_site')).' site ' ."*". " \n";

                $slack_data .= $slack_content;

                $data = http_build_query([
                    "token" => config_item('slack_bot_token'),
                    "channel" => '#'.config_item('slack_channel'), 
                    "as_user" => true,
                    "text" =>  $slack_data, 
                    "username" => "Multi-tenant Marketplace",
                ]);
                // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                // $result = curl_exec($ch);
                // curl_close($ch);
                
                     
            }
    }


     /* replace short tags with values.
     *
     * @access private
     * @param string $content
     * @param string $severity
     * @param string $message
     * @param string $filepath
     * @param int $line
     * @return string
     */

     private function _replace_short_tags($content, $severity, $message, $filepath, $line)
    {
        $sessVal = isset($_SESSION)? $_SESSION : ''; 

        $content = str_replace('{{severity}}', $severity, $content);
        $content = str_replace('{{message}}', $message, $content);
        $content = str_replace('{{filepath}}', $filepath, $content);
        $content = str_replace('{{line}}', $line, $content);

        $content = str_replace('{{ipaddress}}', $_SERVER['REMOTE_ADDR'], $content);
        $content = str_replace('{{browserdetails}}', $_SERVER['HTTP_USER_AGENT'], $content);
        $content = str_replace('{{sessiondetails}}', json_encode($sessVal), $content);

        return $content;
    }  

   
}
