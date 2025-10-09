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
				if($this->session->user_login || $this->session->admin_login){
					redirect(base_url()."main");
				}
            	$this->load->view('pages/'.$page);
		}
		public function authenticate(){
			$username=$this->input->post('username');
			$password=$this->input->post('password');			
			$data=$this->Dialysis_model->authenticate($username,$password);
			if($data){
				if($data['designation']=="admin"){
					$logintype="admin_login";
				}else{
					$logintype="user_login";
				}
				$userdata=array(
					'username' => $data['username'],
					'fullname' => $data['fullname'],
					'dept' => $dept,
					$logintype => true
				);
				$this->session->set_userdata($userdata);
				redirect(base_url('main'));
			}else{
				$this->session->set_flashdata('remarks','Invalid username and password!');
				redirect(base_url());
			}
		}
		public function logout(){
			$data=array('username','fullname','user_login','admin_login');
			$this->session->unset_userdata($data);	
			$this->session->set_flashdata('remarks','You have successfully logged out.');
			redirect(base_url());
		}
		public function main(){
			$page="main";
			if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
				$page="error404";
			}
			if($this->session->user_login || $this->session->admin_login){				
			}else{
				redirect(base_url());
			}
			$data['title'] = "Active Dialysis Patient";
			$data['items'] = $this->Dialysis_model->getAllActivePatient();
			$this->load->view('includes/header');
			$this->load->view('includes/navbar');
			$this->load->view('includes/topbar');			
			$this->load->view('pages/'.$page,$data);
			$this->load->view('includes/modal');
			$this->load->view('includes/footer');
		}
		public function patient_list(){
			$page="patient_list";
			if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
				$page="error404";
			}
			if($this->session->user_login || $this->session->admin_login){				
			}else{
				redirect(base_url());
			}
			$data['title'] = "Patient Masterfile";
			$data['items'] = $this->Dialysis_model->getAllPatient();
			$this->load->view('includes/header');
			$this->load->view('includes/navbar');
			$this->load->view('includes/topbar');			
			$this->load->view('pages/'.$page,$data);
			$this->load->view('includes/modal');
			$this->load->view('includes/footer');
		}
		public function new_admission(){
			$patientidno=$this->input->post('patientidno');
			if($patientidno == ""){
				$data['title'] = "New Admission";			
				$page="newadmission";
			}else{
				$data['title'] = "Re-Admission";
				$data['item'] = $this->Dialysis_model->getPatientAdmission($patientidno);
				$page="readmission";
			}
			if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
				$page="error404";
			}
			if($this->session->user_login || $this->session->admin_login){				
			}else{
				redirect(base_url());
			}			
			$data['religion'] = $this->Dialysis_model->getAllReligion();
			$data['nationality'] = $this->Dialysis_model->getAllNationality();
			$data['province'] = $this->Dialysis_model->getAllProvince();
			$data['doctors'] = $this->Dialysis_model->getAllDoctor();
			$this->load->view('includes/header');
			$this->load->view('includes/navbar');
			$this->load->view('includes/topbar');			
			$this->load->view('pages/'.$page,$data);
			$this->load->view('includes/modal');
			$this->load->view('includes/footer');
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
	}