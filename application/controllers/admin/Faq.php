<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends My_Controller {

	public function __construct() {

		parent::__construct();

// 		auth_check();

// 		$this->rbac->check_module_access();
$this->load->model('Common_model', 'Common_model');

	}

	public function index(){

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/faq/faq_list');
		$this->load->view('admin/includes/_footer');
	}
	public function datatable_json(){				   					   

		$records['data'] = $this->Common_model->getRecords('fx_faq',array('status'=>1));

		$data = array();

		$i=0;

		foreach ($records['data']   as $row) 

		{  

			$status = ($row['isActive'] == 1)? 'checked': '';
			$ans = 	mb_strimwidth($row['faqDescription'],0,80,'...');
			$data[]= array(

				++$i,

				$row['faqHeading'],
				// $row['faqDescription'],
				$ans,


				// $row['date'] = date('Y-m-d', strtotime($row['dateAdded'])),


				'<div class="custom-control custom-switch">

        		<input type="checkbox" class="tgl_checkbox custom-control-input" id="cb_'.$row['faqId'].'" 

				data-id="'.$row['faqId'].'" 

				id="cb_'.$row['faqId'].'"

				'.$status.'><label class="custom-control-label" for="cb_'.$row['faqId'].'"></label></div>',		

				'<a title="Edit" class="update btn btn-success-rgba" href="'.base_url('admin/faq/add_edit/'.$row['faqId']).'"> <i class="feather icon-edit-2"></i></a>

				<a title="Delete" class="delete btn btn-danger-rgba" href='.base_url('admin/faq/faq_delete/'.$row['faqId']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="feather icon-trash"></i></a>'

			);

		}

		$records['data']=$data;

		echo json_encode($records);						   

	}

	
	function change_status(){ 
		$params = array('isActive' => $this->input->post('status'));
		$where = ['faqId' => $this->input->post('id')];
		$update = $this->Common_model->updateRecord('fx_faq', $params, $where);

	}


	function add_edit() {

		//$this->rbac->check_operation_access(); // check opration permission

		$this->load->library('form_validation');

		$page_data = array();

		if ($this->input->post('submit')) {
		    
           $this->form_validation->set_rules('faqHeading', 'faq question', 'trim|required');
           $this->form_validation->set_rules('faqDescription', 'faq answer ', 'trim|required');

			if ($this->form_validation->run() == FALSE) {

				$data = array(

					'errors' => validation_errors(),

				);

				$this->session->set_flashdata('errors', $data['errors']);

				$faqId = $_POST['faqId'];

				if ($_POST['faqId'] > 0) {

					redirect(base_url('admin/faq/add_edit/' . $faqId . ''), 'refresh');

				} else 
				{

					redirect(base_url('admin/faq/add_edit'), 'refresh');

				}

			} else 
			{

				if (isset($_POST) && !empty($_POST)) {
 
					$params = array(

						'faqHeading' => str_replace(['<p>', '</p>'],'',$this->input->post('faqHeading')),
						'faqDescription' => str_replace(['<p>', '</p>'],'',$this->input->post('faqDescription')),
					    'dateModified' => date('Y-m-d : h:m:s'),

					);

					$faqId = $_POST['faqId'];

					$data = $this->security->xss_clean($params);

					if ($_POST['faqId'] > 0) {

						$where = ['faqId' => $faqId];

						$insert = $this->Common_model->updateRecord('fx_faq', $data, $where);

						if ($insert) {

							$this->session->set_flashdata('success', 'faq Updated successfully!');

							redirect(base_url('admin/faq'));

						}

					} else {


						$insert = $this->Common_model->insertRecord('fx_faq', $data);

						if ($insert) {

							$this->session->set_flashdata('success', 'faq Added successfully!');

							redirect(base_url('admin/faq'));

						}

			        }

			    } else {

					$this->session->set_flashdata('errors', 'Something is Wrong!!');

					redirect(base_url('admin/faq/add_edit'), 'refresh');

				}
			}

		} else {

			$faqId = $this->uri->segment(4);

			if ($faqId > 0) {

				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_faq', array('faqId' => $faqId));

			} else {

				$page_data['Fetch_data'] = array();
				$page_data['fetchdata'] =array();
            }

			$this->load->view('admin/includes/_header');

			$this->load->view('admin/faq/add_edit', $page_data);

			$this->load->view('admin/includes/_footer');

		}

	}
	function faq_view($id = 0){

		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_faq', array('faqId' => $faqId));

		// print_r($page_data);die();

		$this->load->view('admin/includes/_header');

		$this->load->view('admin/faq/add_edit', $page_data);

		$this->load->view('admin/includes/_footer');

	}

	public function file_check1(){

		if (empty($_FILES['faqImage']['name'][0])) {

			$this->form_validation->set_message('file_check1', "The faq thumb image field is required.");

			return false;

		} else {

			return true;

		}

	}
	

	public function faq_delete($id = 0)

	{

		$params = array('status' => 0);

		$where = ['faqId' => $id];

		$update = $this->Common_model->updateRecord('fx_faq', $params, $where);

		$this->session->set_flashdata('success', ' faq has been deleted successfully!');

		redirect(base_url('admin/faq'));

	}

}