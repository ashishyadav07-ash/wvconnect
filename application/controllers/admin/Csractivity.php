<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Csractivity extends My_Controller {

	public function __construct() {
		parent::__construct();
		//auth_check();
		//$this->rbac->check_module_access();
		$this->load->model('Common_model', 'Common_model');
	}

	public function index(){
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/csractivity/csractivity_list');
		$this->load->view('admin/includes/_footer');
	}
	public function datatable_json(){				   					   
		$records['data'] = $this->Common_model->getRecords('fx_activity',array('status'=>1));
		
		$data = array();

		$i=0;

		foreach ($records['data']  as $row){

			$status = ($row['isActive'] == 1) ? 'checked' : '';

			$data[]= array(

				++$i,  

				'<img height="50px" width="50px" src="'.base_url('uploads/csractivity/'.$row['activityThumbImage']).'">',

				'<img height="50px" width="50px" src="'.base_url('uploads/csractivity/'.$row['activityDetailImage']).'">',

				$row['activityHeading'],		


				'<div class="custom-control custom-switch">

        		<input type="checkbox" class="tgl_checkbox custom-control-input" id="cb_' . $row['activityID'] . '"

				data-id="' . $row['activityID'] . '"

				id="cb_' . $row['activityID'] . '"

				' . $status . '><label class="custom-control-label" for="cb_' . $row['activityID'] . '"></label></div>',													

			   '<a title="Edit" class="update btn btn-success-rgba" href="'.base_url('admin/csractivity/add_edit/'.$row['activityID']).'"> <i class="feather icon-edit-2"></i></a>
 
				<a title="Delete" class="delete btn btn-danger-rgba" href='.base_url("admin/csractivity/delete/".$row['activityID']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="feather icon-trash"></i></a>'

			);

		}

		$records['data']=$data;

		echo json_encode($records);						   

	}

	public function change_status(){ 
		$params = array('isActive' => $this->input->post('status'));

		$where = ['activityID' => $this->input->post('id')];

		$update = $this->Common_model->updateRecord('fx_activity', $params, $where);
	}

	public function add_edit($id=0) {
		$this->load->library('form_validation');
		$page_data = array();

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('activityHeading','activity heading','trim|required');
			$this->form_validation->set_rules('activityShortDescription','activity short description','trim|required');
			$this->form_validation->set_rules('activityLongDescription','activity long description','trim|required');
			$this->form_validation->set_rules('activityDate','activity date','trim|required');

			if ($_POST['activityID'] == 0) {
				$this->form_validation->set_rules('activityThumbImage', 'thumb image', 'callback_file_check');
			}

			if ($this->form_validation->run() == FALSE){
				$data = array(
				   'errors' => validation_errors(),
				);

				$this->session->set_flashdata('errors', $data['errors']);

				$activityID = $_POST['activityID'];
				if ($_POST['activityID'] > 0) {
					redirect(base_url('admin/csractivity/add_edit/' . $activityID . ''), 'refresh');

				} else {

				redirect(base_url('admin/csractivity/add_edit/'), 'refresh');
			    }

			} else {

				if (isset($_POST) && !empty($_POST)) {

					$config = array(
						'upload_path' => 'uploads/csractivity/',
						'allowed_types' => 'jpg|jpeg|gif|png',
						'file_name' => rand(1, 9999),
						'max_size' => 0,

					);
                    $this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($_FILES['activityThumbImage']['name'] != '') {

						if ($this->upload->do_upload('activityThumbImage')) {
							$dt = $this->upload->data();
							$_POST['activityThumbImage'] = $dt['file_name'];
						} else {

							$_POST['activityThumbImage'] = $_POST['old_activityThumbImage'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['activityThumbImage'] = $_POST['old_activityThumbImage'];
						$data['error'] = $this->upload->display_errors();
					}
					
					if ($_FILES['activityDetailImage']['name'] != '') {

						if ($this->upload->do_upload('activityDetailImage')) {
							$dt = $this->upload->data();
							$_POST['activityDetailImage'] = $dt['file_name'];
						} else {

							$_POST['activityDetailImage'] = $_POST['old_activityDetailImage'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['activityDetailImage'] = $_POST['old_activityDetailImage'];
						$data['error'] = $this->upload->display_errors();
					}
					// $new_seo;
    				// $seoUri = makeSeoUri($this->input->post('activityHeading'));
    				// $check_seo = $this->Common_model->getRecords('fx_activity',array('seoUri'=>$seoUri));
    				// if(sizeof($check_seo) > 0){
    				// 	$new_seo = $seoUri.rand(1,999);
    				// }else{
    				// 	$new_seo = $seoUri;
    				// }
					
					$params = array(
					    // 'seoUri'=>$new_seo,

						'activityHeading' => $this->input->post('activityHeading'),
						
						'activityThumbImage' => $this->input->post('activityThumbImage'),
						
						'activityDetailImage' => $this->input->post('activityDetailImage'),

						'activityShortDescription' => str_replace(['<p>', '</p>'],'',$this->input->post('activityShortDescription')),
						
						'activityLongDescription' => str_replace(['<p>', '</p>'],'',$this->input->post('activityLongDescription')),
						
						'activityDate' => $this->input->post('activityDate'),

						'dateAdded' => date('Y-m-d h:i:s'),

						'dateModified' => date('Y-m-d h:i:s'),

					);

					$activityID = $_POST['activityID'];
					
					$data = $this->security->xss_clean($params);

					if ($_POST['activityID'] > 0) {

						$where = ['activityID' => $activityID];

						$insert = $this->Common_model->updateRecord('fx_activity', $data, $where);

						if ($insert) {

							$this->session->set_flashdata('success', 'Activity updated successfully!');

							redirect(base_url('admin/csractivity'));

						}

					} else {

						$insert = $this->Common_model->insertRecord('fx_activity', $data);


						if ($insert) {

							$this->session->set_flashdata('success', 'Activity added successfully!');

							redirect(base_url('admin/csractivity'));

						}

					}

				} else {

					$this->session->set_flashdata('errors', 'Something is Wrong!!');

					redirect(base_url('admin/csractivity/add_edit'), 'refresh');

			    }
			}
	    } else {

			$activityID = $this->uri->segment(4);

			if ($activityID > 0) {

				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_activity', array('activityID' => $activityID));
				
			} else {

				$page_data['Fetch_data'] = array();

			}

			$this->load->view('admin/includes/_header');

			$this->load->view('admin/csractivity/add_edit', $page_data);

			$this->load->view('admin/includes/_footer');
		}
    }


	public function activity_view($activityID = '') {

		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_activity', array('activityID' => $activityID));

		$this->load->view('admin/includes/_header');

		$this->load->view('admin/csractivity/add_edit', $page_data);

		$this->load->view('admin/includes/_footer');

	}

	public function file_check() {
		if (empty($_FILES['activityThumbImage']['name'][0])) {
			$this->form_validation->set_message('file_check', "The thumb image field is required.");
			return false;
		} else {
			return true;
		}
	}

	public function delete($id = 0){
		$params = array('status' => 0);
		$where = ['activityID' => $id];
		$update = $this->Common_model->updateRecord('fx_activity', $params, $where);
		$this->session->set_flashdata('success', 'Activity has been deleted successfully!');
		redirect(base_url('admin/csractivity'));
	}
	
	
    
    
		
}