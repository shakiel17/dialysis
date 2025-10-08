<?php
date_default_timezone_set('Asia/Manila');
class Dialysis_model extends CI_model
{
	public function __construct()
	{
		$this->load->database();
	}
	
	public function authenticate($username,$password){
		$check=$this->db->query("SELECT * FROM `admin` WHERE username='$username' AND `password`='$password'");
		if($check->num_rows()>0){
			return $check->row_array();
		}else{
			$result=$this->db->query("SELECT *,CONCAT(firstname,' ',lastname) as fullname FROM nsauthemployees WHERE username='$username' AND `password`='$password'");
			if($result->num_rows()>0){
				return $result->row_array();
			}else{
				return false;
			}
		}		
	}
	public function getAllActivePatient(){
		
	}
}