<?php
// require_once ('../vendor/autoload.php'); 
// require_once('application/libraries/S3.php');
header("Access-Control-Allow-Origin: *");

defined('BASEPATH') OR exit('No direct script access allowed');
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);
defined('FILE_READ_MODE') OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') OR define('DIR_WRITE_MODE', 0755);

defined('FOPEN_READ') OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

defined('EXIT_SUCCESS') OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

define('BASE_PATH', 'https://' . $_SERVER['HTTP_HOST'] . "/");
define('SITE_TITLE', 'IOREADY');
define('MAIN_TITLE', 'IOREADY.IO');
define('SUB_TITLE', 'IOREADY');
define('SUPPORT_MAIL', 'shobiga264@gmail.com');
define('CC_EMAIL', 'shobiga264@gmail.com');
define('ENVIRONMENT_TYPE', 'Development');

define('PASSWORD_ENCRYPTION_SECRETKEY', 'ioready');
define('PASSWORD_ENCRYPTION_SECRET_IV', '!@#$');


// Database Credentials

// define('HOST', '');
// define('DB_NAME', '');
// define('USER_NAME', '');
// define('DB_PASSWORD', '');


define('SUMMERNOTE_PATH', $_SERVER['DOCUMENT_ROOT'].'/assets/summernote/');
define('UPLOAD_BULK_UPLOAD_PATH', $_SERVER['DOCUMENT_ROOT'].'/assets/uploads/');
define('UPLOAD_QR_PIC_PATH', $_SERVER['DOCUMENT_ROOT'].'/assets/img/qrcodes/');
define('UPLOAD_SETTING_PIC_PATH', $_SERVER['DOCUMENT_ROOT'].'/assets/img/setting/');
define('EMAILIMGPATH', $_SERVER['DOCUMENT_ROOT'].'/assets/img/emailimages/');
// define('EMAILIMGPATH', BASE_PATH.'assets/img/emailimages/');
//Copy Rights
define('COPYRIGHTS', 'Ioready.io  &copy; ' . date("Y") . ' All Rights Reserved.');

//Tables
define('TBL_SUPERADMIN', 'superadmin_user');
define('TBL_ADMIN_LOGIN', 'client_admin_login');
define('TBL_CLIENTADMIN_PASSWORD', 'superadmin_masterpassword');
define('TBL_SUPERADMIN_IPADDRESS', 'superadmin_ipaddress');
define('TBL_CLIENTADMIN', '99_admin_login');
define('TBL_USERS', '99_user_registration');
define('TBL_TRADE', 'transact_buy_offering');
define('TBL_CLNT_CONFIGURE', 'transact_clientconfiguration');
define('TBL_DASHBOARD_SECTION', 'transact_dashboardmenus_section');
define('TBL_MASTER_STYLE', 'master_style');
define('TBL_HEADER_SECTION', 'transact_heading_section');

define('TBL_OFFTEMP_OFFERS', 'offerTemp_offerings');
define('TBL_OFFTEMP_OFERS_EXT', 'offerTemp_details_extn');
define('TBL_OFFTEMP_FAQ', 'offerTemp_faqs');
define('TBL_OFFTEMP_TEAM', 'offerTemp_team');
define('TBL_OFFTEMP_PHOTOS', 'offerTemp_duePhotos');
define('TBL_OFFTEMP_SECTION', 'offerTemp_Offering_section');
define('TBL_OFFTEMP_ATTESTATION', 'offerTemp_attestations');
define('TBL_OFFTEMP_DOCUMENT', 'offerTemp_offering_documents');


define('ISSUER', 'transact_issuers');
define('ISSUER_ACCOUNT', 'transact_issuer_account');
define('OFFERS', 'transact_offerings');
define('OFFERS_EXTN', '99_offer_details_extn');
define('TBL_OFFERING_DOCUMENT', 'transact_offering_documents');
define('TBL_OFFERING_TEMPLATE', 'transact_offering_template');
define('TEAM_MEMBER', '99_team');
define('TBL_OFFER_PHOTOS', 'duePhotos');
define('TBL_OFFER_FAQ', '99_offer_faqs');
define('TBL_OFFER_DOC_REQ', 'investor_documents_permission');
define('TBL_OFFERING_SECTION', 'transact_Offering_section');
define('TBL_OFFERING_ATTESTATION', 'transact_attestations');

//SMTP

define('SMTPAUTH', true);
define('SMTPSECURE', 'ssl');