<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->helper('common');
		$this->load->model('Common_model');
		$this->load->library('user_agent');
		date_default_timezone_set("Asia/Calcutta");
	  }

	
	public function index()
	{
	
// 		$this->load->view('common/header.php');
// 		$this->load->view('index.php');
// 		$this->load->view('common/footer.php');
redirect('admin');

	}
	

 

	public function site_lang($site_lang) {
		echo $site_lang;
		echo '<br>';
		echo 'you will be redirected to :'.$_SERVER['HTTP_REFERER'];
		$language_data = array(
			'site_lang' => $site_lang
		);

		$this->session->set_userdata($language_data);
		if ($this->session->userdata('site_lang')) {
			echo 'user session language is = '.$this->session->userdata('site_lang');
		}
		redirect($_SERVER['HTTP_REFERER']);

		exit;
	}
}
