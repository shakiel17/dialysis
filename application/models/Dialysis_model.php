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
		$result=$this->db->query("SELECT pp.*,a.* FROM admission a INNER JOIN patientprofile pp ON pp.patientidno=a.patientidno WHERE a.status <> 'discharged' AND a.status <> 'CANCELLED' ORDER BY a.dateadmit DESC");
		return $result->result_array();
	}
	public function getAllPatient(){
		$result=$this->db->query("SELECT pp.*,a.* FROM admission a INNER JOIN patientprofile pp ON pp.patientidno=a.patientidno GROUP BY a.patientidno ORDER BY pp.lastname ASC, pp.firstname ASC");
		return $result->result_array();
	}
	public function getAllReligion(){
		$result=$this->db->query("SELECT * FROM religion ORDER BY `description` ASC");
		return $result->result_array();
	}
	public function getAllNationality(){
		$result=$this->db->query("SELECT * FROM nationality ORDER BY `description` ASC");
		return $result->result_array();
	}
	public function getAllProvince(){
		$result=$this->db->query("SELECT * FROM province ORDER BY `description` ASC");
		return $result->result_array();
	}
	public function getCity($id){
		$state=$this->db->query("SELECT * FROM municipality where province_id='$id' ORDER by `description` ASC");
		return $state->result_array();
	}
	public function getBarangay($id){
		$state=$this->db->query("SELECT * FROM barangay WHERE municipality_id='$id' ORDER BY `description` ASC");
		return $state->result_array();
	}
	public function getZipCode($cityId){
		$state=$this->db->query("SELECT * FROM zipcode WHERE municipality_id='$cityId' LIMIT 1");
		return $state->result_array();
	}
	public function getAllDoctor(){
		$result=$this->db->query("SELECT * FROM docfile ORDER BY `lastname` ASC,`firstname` ASC");
		return $result->result_array();
	}
}