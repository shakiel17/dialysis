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
	public function getNationality(){
		$result=$this->db->query("SELECT * FROM nationality GROUP BY `description` ORDER BY id ASC");
		return $result->result_array();
	}
	public function getReligion(){
		$result=$this->db->query("SELECT * FROM religion GROUP BY `description` ORDER BY `description` ASC");
		return $result->result_array();
	}
	public function getDoctor(){
		$doctor=$this->db->query("SELECT * FROM docfile WHERE specialization NOT LIKE '%ROD%' ORDER BY lastname ASC");
		return $doctor->result_array();
	}
	public function generatePatientID($seqname,$user){
		$query=$this->db->query("SELECT * FROM seqpatientid WHERE id='$seqname'");
		if($query->num_rows()>0){
			$row=$query->row_array();
			$seq_name=$row['seq_name'];
			$seq_code=$row['seq_code'];
			$last_value=$row['last_value'];
			$date=date('Y-m-d H:i:s');
			$new_value=$last_value+1;
			if($new_value > 99){
				$new_value="00";
				$seq_code=$seq_code+1;
				if($seq_code > 99){
					$seq_name=$seq_name+1;
					$seq_code="00";
					if(strlen($seq_name) < 2){
						$seq_name="0".$seq_name;
					}
				}
				if(strlen($seq_code)<2){
					$seq_code="0".$seq_code;
				}
			}
			$count_last_value=strlen($new_value);
			$count_format=strlen('00');
			$count=$count_format - $count_last_value;
			$new_format="";
			for($i=0;$i<$count;$i++){
				$new_format="0".$new_value;
			}
			if($count<=0){
				$new_format=$new_value;
			}
			$caseno=$seq_name."-".$seq_code."-".$new_format;
			$this->db->query("UPDATE seqpatientid SET seq_name='$seq_name',seq_code='$seq_code',last_value='$new_format',last_gen_date='$date',last_gen_by='$user' WHERE id='$seqname'");
		}else{
			$new_value="01";
			$last_gen_date="00";
			$format='00';
			$date=date('Y-m-d H:i:s');
			$caseno=$format."-".$last_gen_date."-".$new_value;
			$this->db->query("INSERT INTO seqpatientid(id,seq_name,seq_code,last_value,last_gen_date,last_gen_by) VALUES('$seqname','$format','$last_gen_date','$new_value','$date,'$user')");
		}
		return $caseno;
	}

	public function generateCaseNo($seqname,$user){
		$datenow=date('Y');
		$query=$this->db->query("SELECT * FROM seqcaseno WHERE seq_name='$seqname' AND seq_code='$datenow'");
		if($query->num_rows()>0){
			$row=$query->row_array();
			$seq_name=$row['seq_name'];
			$seq_code=$row['seq_code'];
			$last_value=$row['last_value'];
			$last_gen_date=date('Y',strtotime($row['last_gen_date']));
			$date=date('Y-m-d H:i:s');
			if($last_gen_date == $seq_code){
				$new_value=$last_value+1;
			}else{
				$new_value=1;
			}
			$count_last_value=strlen($new_value);
			$count_format=strlen('0000000');
			$count=$count_format - $count_last_value;
			$new_format="";
			for($i=0;$i<$count;$i++){
				$new_format=$new_format."0";
			}

			$caseno=$seq_name."-".$seq_code."".$new_format."".$new_value;
			$updateCaseNo=$this->db->query("UPDATE seqcaseno SET `last_value`='$new_value',last_gen_date='$date',last_gen_by='$user' WHERE seq_name='$seqname'");
		}else{
			$new_value=1;
			$last_gen_date=date('Y');
			$format='000000';
			$date=date('Y-m-d H:i:s');
			$caseno=$seqname."-".$last_gen_date."".$format."".$new_value;
			$update=$this->db->query("INSERT INTO seqcaseno(seq_name,seq_code,`last_value`,last_gen_date,last_gen_by) VALUES('$seqname','$last_gen_date','$new_value','$date','$user')");
		}
		return $caseno;
	}
	public function checkPassword($password,$dept){
		$result=$this->db->query("SELECT * FROM nsauth WHERE `password`='$password' AND station='$dept'");
	return $result->result_array();
	}	
	public function checkControlNo($employerno){
		$result=$this->db->query("SELECT * FROM admission WHERE employerno='$employerno'");
		return $result->result_array();
	}
	public function checkHCN($hcn){
		$result=$this->db->query("SELECT * FROM admission WHERE employerno='$hcn'");
		return $result->result_array();
	}
	public function getState(){
		$state=$this->db->query("SELECT `id`,statename FROM `state` ORDER BY `id` ASC");
		return $state->result_array();
	}
	public function getCity($id){
		$state=$this->db->query("SELECT `id`,city FROM city where stateid='$id' ORDER by city ASC");
		return $state->result_array();
	}
	public function getBarangay($id){
		$state=$this->db->query("SELECT `id`,barangay FROM barangay WHERE cityid='$id' ORDER BY barangay ASC");
		return $state->result_array();
	}
	public function getZipCode($cityId){
		$state=$this->db->query("SELECT ZIP_CODE FROM zipcode WHERE MUN_ID='$cityId' LIMIT 1");
		return $state->result_array();
	}
	public function getCompany(){
		if($this->session->dept=="HMO"){
			$state=$this->db->query("SELECT * FROM company WHERE (`type` = 'company' OR `type` = 'hmo') GROUP BY companyname ORDER BY companyname ASC");
		}else{
			$state=$this->db->query("SELECT * FROM company WHERE acctno <> '' GROUP BY companyname ORDER BY companyname ASC");
		}
		return $state->result_array();
	}
	public function checkUser($password,$dept){
		$result=$this->db->query("SELECT * FROM nsauth WHERE `password`='$password' AND station='$dept'");
		if($result->num_rows()>0){
			return $result->row_array();
		}else{
			return false;
		}
	}

	public function save_rdu_admission($patientidno,$pid,$caseno,$admittingclerk,$empid){
		$st=$this->session->dept;
		$lastname=$this->input->post('lastname');
		$firstname=$this->input->post('firstname');
		$middlename=$this->input->post('middlename');
		$suffix=$this->input->post('suffix');
		$patientname=$lastname." ".$firstname." ".$suffix." ".$middlename;
		$dateofbirth=$this->input->post('birthdate');
		$birthdate=date('M-d-Y',strtotime($dateofbirth));
		$contactno=$this->input->post('contactno');
		$gender=$this->input->post('gender');
		$civilstatus=$this->input->post('civilstatus');
		$nationality=$this->input->post('nationality');
		$religion=$this->input->post('religion');
		$discounttype=$this->input->post('discounttype');
		$discountid=$this->input->post('discountid');
		$province=$this->input->post('province');
		$city=$this->input->post('city');
		$barangay=$this->input->post('barangay');
		$street=$this->input->post('street');
		$zipcode=$this->input->post('zipcode');
		$demographics=$barangay."_".$city."_".$province;
		$contactperson=$this->input->post('contactperson');
		$contactpersonno=$this->input->post('contactpersonno');
		$contactpersonrelation=$this->input->post('contactpersonrelation');
		$father=$this->input->post('father');
		$mother=$this->input->post('mother');
		$ap=$this->input->post('ap');
		$hmomembership=$this->input->post('hmomembership');
		$hmo=$this->input->post('hmo');
		$loalimit=$this->input->post('loalimit');
		$membership=$this->input->post('membership');
		$type=$this->input->post('type');
		$paymentmode=$this->input->post('paymentmode');
		$hcn=$this->input->post('hcn');
		$room="RDU";

		$bday = new DateTime($dateofbirth); // Your date of birth
		$today = new Datetime(date('Y-m-d'));
		$diff = $today->diff($bday);
		$age=$diff->y;
		if(($age >= 60 && $discounttype=="SENIOR") || $discounttype=="PWD" || $age >= 60){
			$senior="Y";
			$discounttype=$discounttype;
		}else{
			$senior="N";
			$discounttype="NONE";
		}
		$dateadmit=date('M-d-Y');
		$timeadmit=date('H:i:s');
		$date=date('Y-m-d');
		//Account Ledger===================================
		$this->db->query("INSERT INTO patientprofileid(caseno) VALUES('$caseno')");
		$this->db->query("INSERT INTO acctledge(patientidno,balance,`date`,admittingofficer) VALUE('$pid','0','$date','$admittingclerk')");
		//=================================================

		//Address==========================================
		$prov=$this->db->query("SELECT statename FROM `state` WHERE id='$province' OR statename = '$province'");
		$state=$prov->row_array();
		$provincecode=$state['id'];
		$provincename=$state['statename'];

		$municipality=$this->db->query("SELECT city FROM city WHERE id='$city' OR city='$city'");
		$municity=$municipality->row_array();
		$citycode=$municity['id'];
		$cityname=$municity['city'];

		$barang=$this->db->query("SELECT barangay FROM barangay WHERE id='$barangay' OR barangay='$barangay'");
		$bar=$barang->row_array();
		$barcode=$bar['id'];
		$barangayname=$bar['barangay'];
		//=================================================

		//Doctor=================================
		$doctor=$this->db->query("SELECT * FROM docfile WHERE code='$ap'");
		$doc=$doctor->row_array();
		$apname=$doc['name'];
		$arSpecialization=$doc['specialization'];
		//=================================================
		/*
		//Room Rates=======================================
		$rates=$this->db->query("SELECT * FROM room WHERE room='$room'");
		$rate=$rates->row_array();
		$roomrates=$rate['roomrates'];
		$creditlimit=$rate['pfadmit'];
		//=================================================
		*/
		if($patientidno==""){
			//Patient Profile==================================
			$this->db->query("INSERT INTO patientprofile(patientidno,lastname,firstname,middlename,suffix,birthdate,age,sex,senior,patientname,dateofbirth,`type`) VALUES('$pid','$lastname','$firstname','$middlename','$suffix','$birthdate','$age','$gender','$senior','$patientname','$dateofbirth','$date')");
			$this->db->query("INSERT INTO patientprofileaddinfo(patientidno,discounttype,discountid) VALUES('$pid','$discounttype','$discountid')");
			//=================================================
		}else{
			$this->db->query("UPDATE patientprofile SET lastname='$lastname',firstname='$firstname',middlename='$middlename',suffix='$suffix',birthdate='$birthdate',age='$age',sex='$gender',senior='$senior',patientname='$patientname',dateofbirth='$dateofbirth' WHERE patientidno='$pid'");
			$this->db->query("UPDATE patientprofileaddinfo SET discounttype='$discounttype',discountid='$discountid' WHERE patientidno='$pid'");
		}
		//Admission========================================
		$this->db->query("INSERT INTO admission(patientidno,caseno,`type`,membership,hmomembership,hmo,policyno,paymentmode,room,ward,street,barangay,municipality,province,zipcode,middlenamed,initialdiagnosis,ad,ap,`case`,dateadmitted,timeadmitted,`status`,casetype,birthplace,stat1,patientadmit,religion,occupation,job,employerno,notify,relationship,`proc`,contactno,course,patientcontactno,diet,admittingclerk,dateadmit,`count`,branch,consult_id,lastnamed,firstnamed) VALUES('$pid','$caseno','$type','$membership','$hmomembership','$hmo','$loalimit','$paymentmode','$room','out','$street','$barangayname','$cityname','$provincename','$zipcode','$contactperson','','$ap','$ap','','$dateadmit','$timeadmit','Active','A','','$civilstatus','','$religion','','restrict','$hcn','$nationality','$contactpersonrelation','$age','$contactpersonno','NEW','$contactno','','$admittingclerk','$date','1','KMSCI','$demographics','$father','$mother')");
		$this->db->query("INSERT INTO admissionaddinfo(caseno,chiefcomplaint) VALUES('$caseno','')");
		//=================================================

		return true;
	}

	public function fetch_previous_admission($patientidno){
		$state=$this->db->query("SELECT a.*,pp.*,pa.discounttype,pa.discountid,a.type FROM admission a LEFT JOIN patientprofile pp ON pp.patientidno=a.patientidno LEFT JOIN patientprofileaddinfo pa ON pa.patientidno=pp.patientidno WHERE pp.patientidno='$patientidno' ORDER BY a.dateadmit DESC LIMIT 1");
		if($state->num_rows()>0){
			return $state->result_array();
		}else{
			$state=$this->db->query("SELECT a.*,pp.*,pa.discounttype,pa.discountid,a.type FROM admission a LEFT JOIN patientprofile pp ON pp.patientidno=a.patientidno LEFT JOIN patientprofileaddinfo pa ON pa.patientidno=pp.patientidno WHERE pp.patientidno='$patientidno' ORDER BY a.dateadmit DESC LIMIT 1");
			return $state->result_array();
		}
	}
	public function stillIn($patientidno){
		$result=$this->db->query("SELECT * FROM admission WHERE patientidno='$patientidno' AND `status`='Active'");
		if($result->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}
}