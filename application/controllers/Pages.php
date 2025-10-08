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
	}