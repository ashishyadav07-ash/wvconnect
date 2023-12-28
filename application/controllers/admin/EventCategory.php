<?php defined('BASEPATH') OR exit('No direct script access allowed');

class EventCategory extends My_Controller {

	public function __construct() {

		parent::__construct();

		auth_check();

// 		$this->rbac->check_module_access();
	$this->load->model('Common_model', 'Common_model');

	}

	public function index(){

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/eventCategory/eventCategory_list');
		$this->load->view('admin/includes/_footer');
	}

	public function datatable_json(){				   					   

		$records['data'] = $this->Common_model->getRecords('fx_event_category',array('status'=>1));

		$data = array();

		$i=0;

		foreach ($records['data']   as $row) 

		{  

			$status = ($row['isActive'] == 1)? 'checked': '';

			$data[]= array(

				++$i,

				$row['eventCategoryName'],

				// $row['date'] = date('Y-m-d', strtotime($row['dateAdded'])),	

				'<div class="custom-control custom-switch">

        		<input type="checkbox" class="tgl_checkbox custom-control-input" id="cb_'.$row['eventCategoryID'].'" 

				data-id="'.$row['eventCategoryID'].'" 

				id="cb_'.$row['eventCategoryID'].'"

				'.$status.'><label class="custom-control-label" for="cb_'.$row['eventCategoryID'].'"></label></div>',		

				'<a title="Edit" class="update btn btn-success-rgba" href="'.base_url('admin/eventCategory/add_edit/'.$row['eventCategoryID']).'"> <i class="feather icon-edit-2"></i></a>

				<a title="Delete" class="delete btn btn-danger-rgba" href='.base_url("admin/eventCategory/delete/".$row['eventCategoryID']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="feather icon-trash"></i></a>'

			);

		}

		$records['data']=$data;

		echo json_encode($records);						   

	}

	function change_status()
	{   
		$params = array('isActive' => $this->input->post('status'));
		$where = ['eventCategoryID' => $this->input->post('id')];
		$update = $this->Common_model->updateRecord('fx_event_category', $params, $where);
	}

	function add_edit($id=0) {

		//$this->rbac->check_operation_access(); // check opration permission

		$this->load->library('form_validation');

		$page_data = array();

		if ($this->input->post('submit')) {
		    
           $this->form_validation->set_rules('eventCategoryName', 'event category', 'trim|required');

			if ($this->form_validation->run() == FALSE) {

				$data = array(

					'errors' => validation_errors(),

				);

				$this->session->set_flashdata('errors', $data['errors']);

				$eventCategoryID = $_POST['eventCategoryID'];

				if ($_POST['eventCategoryID'] > 0) {

					redirect(base_url('admin/eventCategory/add_edit/' . $eventCategoryID . ''), 'refresh');

				} else 
				{

					redirect(base_url('admin/eventCategory/add_edit'), 'refresh');

				}

			} else 
			{

				if (isset($_POST) && !empty($_POST)) {
 
					$params = array(

						'eventCategoryName' => $this->input->post('eventCategoryName'),
				
					    'dateModified' => date('Y-m-d : h:m:s'),

					);

					$eventCategoryID = $_POST['eventCategoryID'];

					$data = $this->security->xss_clean($params);

					if ($_POST['eventCategoryID'] > 0) {

						$where = ['eventCategoryID' => $eventCategoryID];

						$insert = $this->Common_model->updateRecord('fx_event_category', $data, $where);

						if ($insert) { 

							$this->session->set_flashdata('success', 'Event category updated successfully!');

							redirect(base_url('admin/eventCategory'));

						}

					} else {


						$insert = $this->Common_model->insertRecord('fx_event_category', $data);

						if ($insert) {

							$this->session->set_flashdata('success', 'Event category added successfully!');

							redirect(base_url('admin/eventCategory/index'));

						}

			        }

			    } else {

					$this->session->set_flashdata('errors', 'Something is Wrong!!');

					redirect(base_url('admin/eventCategory/add_edit'), 'refresh');

				}
			}

		} else {

			$eventCategoryID = $this->uri->segment(4);

			if ($eventCategoryID > 0) {

				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_event_category', array('eventCategoryID' => $eventCategoryID));

			} else {

				$page_data['Fetch_data'] = array();

			}

			$this->load->view('admin/includes/_header');

			$this->load->view('admin/eventCategory/add_edit', $page_data);

			$this->load->view('admin/includes/_footer');

		}

	}

	function view($eventCategoryID = '') {

		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_event_category', array('eventCategoryID' => $eventCategoryID));

		$this->load->view('admin/includes/_header');

		$this->load->view('admin/eventCategory/add_edit', $page_data);

		$this->load->view('admin/includes/_footer');

	}
	public function file_check1() {

		if (empty($_FILES['eventCategory_image']['name'][0])) {

			$this->form_validation->set_message('file_check1', "The blog category image field is required.");

			return false;

		} else {

			return true;

		}

	}

	public function delete($id = 0)
	{

		$params = array('status' => 0);
		$where = ['eventCategoryID' => $id];
		$update = $this->Common_model->updateRecord('fx_event_category', $params, $where);
		$this->session->set_flashdata('success', 'Event category has been deleted successfully!');
		redirect(base_url('admin/eventCategory'));
	}
}