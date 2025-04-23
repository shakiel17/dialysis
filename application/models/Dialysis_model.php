<?php
date_default_timezone_set('Asia/Manila');
class Dialysis_model extends CI_model
{
	public function __construct()
	{
		$this->load->database();
	}
	
	public function authenticate($username,$password,$dept){
		$result=$this->db->query("SELECT * FROM nsauth WHERE username='$username' AND `password`='$password' AND station='$dept'");
		if($result->num_rows()>0){
			return $result->row_array();
		}else{
			return false;
		}
	}
	public function getAllActivePatient(){
		$result=$this->db->query("SELECT a.*,pp.lastname,pp.firstname,pp.middlename,d.name as docname FROM admission a INNER JOIN patientprofile pp ON pp.patientidno=a.patientidno INNER JOIN docfile d ON d.code=a.ap WHERE a.caseno LIKE '%R-%' AND a.`status`='Active' ORDER BY a.dateadmit DESC");
		return $result->result_array();
	}

	public function getAllPatient(){
		$result=$this->db->query("SELECT * FROM patientprofile ORDER BY lastname ASC");
		return $result->result_array();
	}
}