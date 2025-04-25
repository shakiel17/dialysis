<?php
class Pages extends CI_Controller{
		public function __construct()
		  {
		    parent::__construct();
		    $this->load->library('session');
		  }
		public function index(){
            	$page="index";
				if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
					$page="error404";
	            }
				if($this->session->user_login){
					redirect(base_url()."main");
				}
            	$this->load->view('pages/'.$page);
		}
		public function authenticate(){
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$dept=$this->input->post('dept');
			$data=$this->Dialysis_model->authenticate($username,$password,$dept);
			if($data){
				$userdata=array(
					'username' => $data['username'],
					'fullname' => $data['name'],
					'dept' => $dept,
					'user_login' => true
				);
				$this->session->set_userdata($userdata);
				redirect(base_url('main'));
			}else{
				$this->session->set_flashdata('remarks','Invalid username and password!');
				redirect(base_url());
			}
		}
		public function logout(){
			$data=array('username','fullname','dept','user_login');
			$this->session->unset_userdata($data);	
			$this->session->set_flashdata('remarks','You have successfully logged out.');
			redirect(base_url());
		}
		public function main(){
			$page="main";
			if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
				$page="error404";
			}
			if($this->session->user_login){				
			}else{
				redirect(base_url());
			}
			$data['title'] = "Active Dialysis Patient";
			$data['items'] = $this->Dialysis_model->getAllActivePatient();
			$this->load->view('includes/header');
			$this->load->view('includes/sidebar');
			$this->load->view('includes/navbar');
			$this->load->view('pages/'.$page,$data);
			$this->load->view('includes/modal');
			$this->load->view('includes/footer');
		}
		public function admission(){
			$page="admission";
			if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
				$page="error404";
			}
			if($this->session->user_login){				
			}else{
				redirect(base_url());
			}
			$data['title'] = "Patient List";
			$data['items'] = $this->Dialysis_model->getAllPatient();
			$data['nationality'] = $this->Dialysis_model->getNationality();
			$data['religion'] = $this->Dialysis_model->getReligion();
			$data['attending'] = $this->Dialysis_model->getDoctor();
			$data['company'] = $this->Dialysis_model->getCompany();
			$data['province'] = $this->Dialysis_model->getState();
			$this->load->view('includes/header');
			$this->load->view('includes/sidebar');
			$this->load->view('includes/navbar');
			$this->load->view('pages/'.$page,$data);
			$this->load->view('includes/modal',$data);
			$this->load->view('includes/footer');
		}

		public function checkPassword(){
			$id=$this->input->post('id');
			$dept=$this->session->dept;
			$data=$this->Dialysis_model->checkPassword($id,$dept);
			echo json_encode($data);
		}
		public function checkControlNo(){
			$id=$this->input->post('id');
			$dept=$this->session->dept;
			$data=$this->Dialysis_model->checkControlNo($id);
			echo json_encode($data);
		}
		public function checkHCNExist(){
			$id=$this->input->post('id');
			$data=$this->Dialysis_model->checkHCN($id);
			echo json_encode($data);
		}
		public function getCity(){
			$id=$this->input->post('id');
			$data=$this->Dialysis_model->getCity($id);
			echo json_encode($data);
		}
		public function getBarangay(){
			$id=$this->input->post('id');
			$data=$this->Dialysis_model->getBarangay($id);
			echo json_encode($data);
		}
		public function getZipCode(){
			$id=$this->input->post('id');
			$data=$this->Dialysis_model->getZipCode($id);
			echo json_encode($data);
		}
		public function submitadmission(){
			$dept="RDU";
			$password=$this->input->post('password');			
			$patientidno=$this->input->post('patientidno');
			$check=$this->Dialysis_model->checkUser($password,$dept);
			$username=$this->session->username;
			$nursename=$this->session->fullname;
			if($patientidno==""){
				$pid=$this->Dialysis_model->generatePatientID("1",$check['name']);
			}else{
				$pid=$patientidno;
			}
			$caseno=$this->Dialysis_model->generateCaseNo("R",$check['name']);
			$admit=$this->Dialysis_model->save_rdu_admission($patientidno,$pid,$caseno,$check['name'],$check['empid']);
			if($admit){				
					echo "<script>alert('Admission successfully saved!');window.location='".base_url()."main';</script>";				
			}else{
				echo "<script>alert('Unable to save details! Duplicate Entry');window.location='".base_url()."admission';</script>";
			}
		}
		public function fetch_previous_admission(){
			$id=$this->input->post('id');
			$dept="RDU";
			$data=$this->Dialysis_model->fetch_previous_admission($id,$dept);
			echo json_encode($data);
		}
    }