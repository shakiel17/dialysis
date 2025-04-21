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
    }