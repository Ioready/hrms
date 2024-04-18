<?php

class Home_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login_check(){
        $where = array('sa_emailid' => trim($_POST["useremail"]),
		'sa_virtualStatus' => 'ACTIVE');
        $having = array('encryptedPassword' => sha1($_POST["password"]));
        $result = $this->db->select('*')->where($where)->get(TBL_SUPERADMIN); 
        if ($result->num_rows() == 0) {
            return 2;
        }
		$result = $this->db->select('sa_id,sa_emailid,sa_username,sa_password as encryptedPassword')->having($having)->where($where)->order_by("sa_id", "DESC")->limit(1)->get(TBL_SUPERADMIN);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return 0;
        }
    }

    public function AdminUserresetPassword() {
        $verifyId = $_POST['userId'];

        $result = $this->db->select('*')->get(TBL_SUPERADMIN)->result_array();

        foreach ($result as $value) {
            if ($verifyId == sha1($value['sa_id'])) {

				$data = array('sa_password' => sha1($_POST['confirmPassword']),'sa_dcd_password' => $_POST['confirmPassword']);
                $where = array('sa_id' => $value['sa_id']);

                $result = $this->db->where($where)->update(TBL_SUPERADMIN, $data);
                return $result;
            }
        }
    }

    public function getSingleSuperAdmin($email){
        $where = array('sa_virtualStatus' => 'ACTIVE', 'sa_emailid' => $email);
        $result = $this->db->select('*')->where($where)->get(TBL_SUPERADMIN)->result_array(); 
        return $result;

        $emailid = $_POST["email"];
        $where = array('sa_emailid' => $emailid);
        $result = $this->db->select('*')->where($where)->order_by("sa_id", "DESC")->get(TBL_SUPERADMIN);
        if ($result->num_rows() == 0) {
            return 0;
        }		
        
        $where = array('sa_emailid' => $emailid, 'sa_virtualStatus' => 'ACTIVE');
        $result = $this->db->select('sa_id,sa_emailid')->where($where)->order_by("sa_id", "DESC")->limit(1)->get(TBL_SUPERADMIN);
        return $result->result_array();
    }

    public function updatelastlogin($userId) {
        $data = array('sa_last_login' => date("Y-m-d H:i:s"));
        $where = array('sa_id' => $userId);
        $result = $this->db->where($where)->update(TBL_SUPERADMIN, $data);
        return $result;
    }



}
?>
