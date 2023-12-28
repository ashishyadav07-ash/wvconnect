<?php defined('BASEPATH') OR exit('No direct script access allowed');
class homepage_settings extends My_Controller {

	public function __construct() {
		parent::__construct();
		//auth_check();
		//$this->rbac->check_module_access();
		$this->load->model('Common_model', 'Common_model');
	}

	public function index(){
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/homepage_settings/homepage_settings_list');
		$this->load->view('admin/includes/_footer');
	}
	public function datatable_json(){				   					   
		$records['data'] = $this->Common_model->getRecords('fx_homepage_settings',array('status'=>1));
		
		// echo "<pre>";
		// 	print_r($records['data']);die;
		$data = array();

		$i=0;

		foreach ($records['data']   as $row) {

			//$status = ($row['isActive'] == 1) ? 'checked' : '';

			

			$data[]= array(

				++$i,  
				$row['section2Title'],																	
				$row['section2ReadMoreLink'],																
			
				'<a title="Edit" class="update btn btn-success-rgba" href="'.base_url('admin/homepage_settings/add_edit/'.$row['homepageID']).'"> <i class="feather icon-edit-2"></i></a>
 
				<a title="Delete" class="delete btn btn-danger-rgba" href='.base_url("admin/homepage_settings/delete/".$row['homepageID']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="feather icon-trash"></i></a>'

			);

		}

		$records['data']=$data;

		echo json_encode($records);						   

	}

	// public function change_status(){ 
	// 	$params = array('isActive' => $this->input->post('status'));

	// 	$where = ['blogID' => $this->input->post('id')];

	// 	$update = $this->Common_model->updateRecord('fx_blog', $params, $where);
	// }

	public function add_edit($id=0) {
		$this->load->library('form_validation');
		$page_data = array();
		
		

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('section2Title','Section 2 Title','trim|required');
			$this->form_validation->set_rules('section5Title','Section 5 Title','trim|required');
			$this->form_validation->set_rules('section2Description','Section 2 Description','trim|required');
			$this->form_validation->set_rules('section5Description','Section 5 Description','trim|required');
			$this->form_validation->set_rules('section2ReadMoreLink','Section 2 Read More Link','trim|required');

			// $this->form_validation->set_rules('blogDescription','Blog Short Description','trim|required');
			// $this->form_validation->set_rules('blogLongDescription','Blog BlogLong Description','trim|required');
			// $this->form_validation->set_rules('blogDate','Blog Date','trim|required');

			if ($_POST['homepageID'] == 0) {
				$this->form_validation->set_rules('section5Image', 'Section 5 Image', 'callback_file_check');
			}

			if ($this->form_validation->run() == FALSE) {
				$data = array(
				   'errors' => validation_errors(),
				);

				$this->session->set_flashdata('errors', $data['errors']);

				$homepageID = $_POST['homepageID'];
				if ($_POST['homepageID'] > 0) {
					redirect(base_url('admin/homepage_settings/add_edit/' . $homepageID . ''), 'refresh');

				} else {

					redirect(base_url('admin/homepage_settings/add_edit/'), 'refresh');
			    }

			} else {

				if (isset($_POST) && !empty($_POST)) {

					$config = array(
						'upload_path' => 'uploads/homepage_settings/',
						'allowed_types' => 'jpg|jpeg|gif|png',
						'file_name' => rand(1, 9999),
						'max_size' => 0,

					);
                    $this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($_FILES['section5Image']['name'] != '') {

						if ($this->upload->do_upload('section5Image')) {
							$dt = $this->upload->data();
							$_POST['section5Image'] = $dt['file_name'];
						} else {

							$_POST['section5Image'] = $_POST['old_section5Image'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['section5Image'] = $_POST['old_section5Image'];
						$data['error'] = $this->upload->display_errors();
					}
					$params = array(
					    
						'section2Title' => $this->input->post('section2Title'),
						'section2Description' => $this->input->post('section2Description'),
						'section2ReadMoreLink' => $this->input->post('section2ReadMoreLink'),
						'section5Title' => $this->input->post('section5Title'),
						'section5Description' => $this->input->post('section5Description'),
						'section5Image' => $this->input->post('section5Image'),	
						'dateAdded' => date('Y-m-d h:i:s'),
						'dateModified' => date('Y-m-d h:i:s')

					);
					
					$homepageID = $_POST['homepageID'];
					
					$data = $this->security->xss_clean($params);

					if ($_POST['homepageID'] > 0) {

						$where = ['homepageID' => $homepageID];

						$insert = $this->Common_model->updateRecord('fx_homepage_settings', $data, $where);

						if ($insert) {

							$this->session->set_flashdata('success', 'Homepage Settings updated successfully!');

							redirect(base_url('admin/homepage_settings'));

						}

					} else {

						$insert = $this->Common_model->insertRecord('fx_homepage_settings', $data);
					

						if ($insert) {

							$this->session->set_flashdata('success', 'Homepage Settings added successfully!');

							redirect(base_url('admin/homepage_settings'));

						}

					}

				} else {

					$this->session->set_flashdata('errors', 'Something is Wrong!!');

					redirect(base_url('admin/homepage_settings/add_edit'), 'refresh');

			    }
			}
	    } else {

			$homepageID = $this->uri->segment(4);

			if ($homepageID > 0) {

				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_homepage_settings', array('homepageID' => $homepageID));
				
				
			} else {

				$page_data['Fetch_data'] = array();
				
			}
			
			$this->load->view('admin/includes/_header');

			$this->load->view('admin/homepage_settings/add_edit', $page_data);

			$this->load->view('admin/includes/_footer');
		}
    }


	public function homepage_settings_view($homepageID = '') {

		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_homepage_settings', array('homepageID' => $homepageID));

		$this->load->view('admin/includes/_header');

		$this->load->view('admin/homepage_settings/add_edit', $page_data);

		$this->load->view('admin/includes/_footer');

	}

	public function file_check() {
		if (empty($_FILES['section5Image']['name'][0])) {
			$this->form_validation->set_message('file_check', "The Section 5 Image field is required.");
			return false;
		} else {
			return true;
		}
	}

	public function delete($id = 0){
		$params = array('status' => 0);
		$where = ['homepageID' => $id];
		$update = $this->Common_model->updateRecord('fx_homepage_settings', $params, $where);
		$this->session->set_flashdata('success', 'Homepage Settings has been deleted successfully!');
		redirect(base_url('admin/homepage_settings'));
	}
	
	
    
    
		
}