<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends My_Controller {

	public function __construct() {

		parent::__construct();

		auth_check();

		$this->rbac->check_module_access();
		$this->load->model('admin/Activity_model', 'activity_model');
		$this->load->model('Common_model','Common_model');
		
		

	}

	public function index() {

	 	$register_data['title'] = 'Register List';

	 	$this->load->view('admin/includes/_header');

		$this->load->view('admin/register/register_list', $register_data);
        
		$this->load->view('admin/includes/_footer');

	 }



	public function register_json() {

		$records['data'] = $this->Common_model->getRecords('fx_register',array('status'=>1));
		$data = array();

		$i = 0;

		foreach ($records['data'] as $row) {

			$data[] = array(

				++$i,

				// $row['fullname'] = $row['register_formFname'] . ' ' . $row['register_formLname'],

				$row['regName'],
				$row['companyName'],
				$row['regEmail'],
				$row['regMobile'],
				// $row['regArea'],
				// $row['regCity'],
				// $row['regPincode'],
				date('Y-m-d', strtotime($row['dateAdded'])),
				// '<a title="Delete" class="delete btn btn-danger-rgba" href='.base_url("admin/register/register_delete/".$row['regID']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="feather icon-trash"></i></a>'

			);

		}

		$records['data'] = $data;

		echo json_encode($records);

	}
	

	public function add(){

		if($this->input->post('submit')){
			$this->form_validation->set_rules('regName', 'name', 'trim|required');
			$this->form_validation->set_rules('regEmail', 'email', 'trim|required');
			$this->form_validation->set_rules('regMobile', 'mobile number', 'trim|required');
			$this->form_validation->set_rules('companyName', 'company name', 'trim|required');
			// $this->form_validation->set_rules('regArea', 'area', 'trim|required');
			// $this->form_validation->set_rules('regCity', 'city', 'trim|required');
			// $this->form_validation->set_rules('regPincode', 'pincode', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/register/add'),'refresh');
			}
			else{
				
				$data = array(
					'regName' => $this->input->post('regName'),
					'regEmail' => $this->input->post('regEmail'),
					'regMobile' => $this->input->post('regMobile'),
					'companyName' => $this->input->post('companyName'),
					// 'regArea' => $this->input->post('regArea'),
					// 'regCity' => $this->input->post('regCity'),
					// 'regPincode' => $this->input->post('regPincode'),
					'dateAdded' => date('Y-m-d h:i:s'),
					'dateModified' => date('Y-m-d h:i:s'),
				);

				$params = $this->security->xss_clean($data);
				$result = $this->Common_model->insertRecord('fx_register',$params);
				if($result){
					// Activity Log 
					$this->activity_model->add_log(1);
					$this->session->set_flashdata('success', 'register has been Added Successfully!');
					redirect(base_url('admin/register'));
				}
			}
		}
		else{

			$this->load->view('admin/includes/_header');
			$this->load->view('admin/register/register_add');
			$this->load->view('admin/includes/_footer');
		}
	}
	
	function register_view($id = 0) {
		$register_data['Fetch_data'] = $this->Common_model->registerEdit($regID);
		// print_r($register_data);die();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/register/add_edit', $register_data);
		$this->load->view('admin/includes/_footer');
	}

	public function register_delete($id = 0){
		$params = array('status' => 0);
		$where = ['regID' => $id];
		$update = $this->Common_model->updateRecord('fx_register', $params, $where);
		$this->session->set_flashdata('success', 'Register user has been deleted successfully!');
		redirect(base_url('admin/register'));
	}


	public function export_Contact(){

		$str = '';

		$html = '';

		$this->load->library('form_validation');



			$FromDate = $this->input->post('fromDate');

			$ToDate = $this->input->post('toDate');

			$new_FromDate = date('Y-m-d', strtotime($FromDate));

			$new_ToDate = date('Y-m-d', strtotime($ToDate));
			
			$this->db->select("regID,regName,companyName,regEmail,regMobile,regArea,regCity,regPincode,dateAdded");

			$this->db->from("fx_register");

			$this->db->where('DATE(dateAdded) >=', $new_FromDate);

			$this->db->where('DATE(dateAdded)  <=', $new_ToDate);

			$query = $this->db->get();

			$result = $query->result_array();

		
			$alldata = $this->Common_model->getRecords('fx_register', array('status'=>1));
			if($FromDate == '' && $ToDate == '' ){
			    	$filename = 'contact_us_list_' . date('Y-m-d') . '.xls';

			$str .= ' <table cellspacing="1" cellpadding="7" border="1">

			<thead>
                        <tr>
							<th>Id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Date</th>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach ($alldata as $key => $value) {
				$value['fullname'] = $value['regName'] . ' ' . $value['regEmail'];
				$html .= '<tr>
				        <td>' . $value['regID'] . '</td>
        				<td>' . $value['regName'] . '</td>
        				<td>' . $value['regEmail'] . '</td>
        				<td>' . $value['regMobile'] . '</td>
        				<td>' . $value['dateAdded'] . '</td>

                       </tr>
        	';
			}
			$finalContent = $str . $html . '</tbody></table>';
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename = " . $filename . "");
			header("Pragma: ");
			header("Cache-Control: ");
			echo $finalContent;
			    
			}
			
			if (empty($result))
			{
			   $this->session->set_flashdata('errors', 'There is no data between these two dates..!!');
			    redirect(base_url('admin/register'), 'refresh');

			}
			else
			{

			$filename = 'registration_list_' . date('Y-m-d') . '.xls';

			$str .= ' <table cellspacing="1" cellpadding="7" border="1">

			<thead>
                        <tr>
							<th>Id</th>
							<th>Name</th>
							<th>Company Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Date</th>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach ($result as $key => $value) {
				$value['fullname'] = $value['regName'] . ' ' . $value['regEmail'];
				$html .= '<tr>
				        <td>' . $value['regID'] . '</td>
        				<td>' . $value['regName'] . '</td>
						<td>' . $value['companyName'] . '</td>
        				<td>' . $value['regEmail'] . '</td>
        				<td>' . $value['regMobile'] . '</td>
        				<td>' . $value['dateAdded'] . '</td>

                       </tr>
        	';
			}
			$finalContent = $str . $html . '</tbody></table>';
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename = " . $filename . "");
			header("Pragma: ");
			header("Cache-Control: ");
			echo $finalContent;
		} 
		    


	}
}
