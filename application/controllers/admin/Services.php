<?php defined('BASEPATH') OR exit('No direct script access allowed');
class services extends My_Controller {

	public function __construct() {
		parent::__construct();
		//auth_check();
		//$this->rbac->check_module_access();
		$this->load->model('Common_model', 'Common_model');
	}

	public function index(){
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/services/services_list');
		$this->load->view('admin/includes/_footer');
	}
	public function datatable_json(){				   					   
		$records['data'] = $this->Common_model->getRecords('fx_services',array('status'=>1));
		
		// echo "<pre>";
		// 	print_r($records['data']);die;
		$data = array();

		$i=0;

		foreach ($records['data']   as $row) {

			//$status = ($row['isActive'] == 1) ? 'checked' : '';

			

			$data[]= array(

				++$i,  

				// '<img height="50px" width="50px" src="'.base_url('uploads/services/'.$row['serviceImage']).'">',

				$row['serviceTitle'],																	

			   '<a title="Edit" class="update btn btn-success-rgba" href="'.base_url('admin/services/add_edit/'.$row['serviceID']).'"> <i class="feather icon-edit-2"></i></a>
 
				<a title="Delete" class="delete btn btn-danger-rgba" href='.base_url("admin/services/delete/".$row['serviceID']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="feather icon-trash"></i></a>'

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
			$this->form_validation->set_rules('serviceTitle','Service Title','trim|required');
			//$this->form_validation->set_rules('readMoreLink','Read More Link','trim|required');

			// $this->form_validation->set_rules('blogDescription','Blog Short Description','trim|required');
			// $this->form_validation->set_rules('blogLongDescription','Blog BlogLong Description','trim|required');
			// $this->form_validation->set_rules('blogDate','Blog Date','trim|required');

			if ($_POST['serviceID'] == 0) {
				$this->form_validation->set_rules('serviceImage', 'Service Image', 'callback_file_check');
			}

			if ($this->form_validation->run() == FALSE) {
				$data = array(
				   'errors' => validation_errors(),
				);

				$this->session->set_flashdata('errors', $data['errors']);

				$serviceID = $_POST['serviceID'];
				if ($_POST['serviceID'] > 0) {
					redirect(base_url('admin/services/add_edit/' . $serviceID . ''), 'refresh');

				} else {

					redirect(base_url('admin/services/add_edit/'), 'refresh');
			    }

			} else {

				if (isset($_POST) && !empty($_POST)) {

					$config = array(
						'upload_path' => 'uploads/services/',
						'allowed_types' => 'jpg|jpeg|gif|png',
						'file_name' => rand(1, 9999),
						'max_size' => 0,

					);
                    $this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($_FILES['serviceImage']['name'] != '') {

						if ($this->upload->do_upload('serviceImage')) {
							$dt = $this->upload->data();
							$_POST['serviceImage'] = $dt['file_name'];
						} else {

							$_POST['serviceImage'] = $_POST['old_serviceImage'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['serviceImage'] = $_POST['old_serviceImage'];
						$data['error'] = $this->upload->display_errors();
					}
									
					$seoUri = makeSeoUri($this->input->post('serviceTitle'));
		    		$check_seo = $this->Common_model->getRecords('fx_services',array('seoUri'=>$seoUri));
		    		if(sizeof($check_seo) > 0){
		    		$new_seo = $seoUri.rand(1,999);
		    		} else {
		    		$new_seo = $seoUri;
		    		} 
		    		$new_seo = makeSeoUri($this->input->post('serviceTitle'));


					$params = array(
					    
						'serviceTitle' => $this->input->post('serviceTitle'),
						
						//'serviceImage' => $this->input->post('serviceImage'),

						'description'=>$this->input->post('description'),
						
						'dateAdded' => date('Y-m-d h:i:s'),

						'dateModified' => date('Y-m-d h:i:s'),
						
						'seoUri'=>$new_seo,

					);
					
					$serviceID = $_POST['serviceID'];
					
					$data = $this->security->xss_clean($params);

					if ($_POST['serviceID'] > 0) {

						$where = ['serviceID' => $serviceID];

						$insert = $this->Common_model->updateRecord('fx_services', $data, $where);

						if ($insert) {

							$this->session->set_flashdata('success', 'Services updated successfully!');

							redirect(base_url('admin/services'));

						}

					} else {

						$insert = $this->Common_model->insertRecord('fx_services', $data);
					

						if ($insert) {

							$this->session->set_flashdata('success', 'Services added successfully!');

							redirect(base_url('admin/services'));

						}

					}

				} else {

					$this->session->set_flashdata('errors', 'Something is Wrong!!');

					redirect(base_url('admin/services/add_edit'), 'refresh');

			    }
			}
	    } else {

			$serviceID = $this->uri->segment(4);

			if ($serviceID > 0) {

				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_services', array('serviceID' => $serviceID));
				
				
			} else {

				$page_data['Fetch_data'] = array();
				
			}
			
			$this->load->view('admin/includes/_header');

			$this->load->view('admin/services/add_edit', $page_data);

			$this->load->view('admin/includes/_footer');
		}
    }


	public function services_view($serviceID = '') {

		$page_data['Fetch_data'] = $this->Common_model->getRow('services', array('serviceID' => $serviceID));

		$this->load->view('admin/includes/_header');

		$this->load->view('admin/services/add_edit', $page_data);

		$this->load->view('admin/includes/_footer');

	}

	public function file_check() {
		if (empty($_FILES['serviceImage']['name'][0])) {
			$this->form_validation->set_message('file_check', "The Service Image field is required.");
			return false;
		} else {
			return true;
		}
	}

	public function delete($id = 0){
		$params = array('status' => 0);
		$where = ['serviceID' => $id];
		$update = $this->Common_model->updateRecord('fx_services', $params, $where);
		$this->session->set_flashdata('success', 'Service has been deleted successfully!');
		redirect(base_url('admin/services'));
	}
	
	
    
    
		
}