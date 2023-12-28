<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Banner extends My_Controller {

	public function __construct() {
		parent::__construct();
		//auth_check();
		//$this->rbac->check_module_access();
		$this->load->model('Common_model', 'Common_model');
		$this->load->model('admin/Activity_model', 'activity_model');
	}

	public function index(){
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/banner/banner_list');
		$this->load->view('admin/includes/_footer');
	}
	
	

	public function datatable_json(){				   					   
		$records['data'] = $this->Common_model->getRecords('fx_banner',array('status'=>1));
		$data = array();
		$i=0;
		foreach ($records['data']   as $row) 
		{  
			$data[]= array(
				++$i,

				'<img height="50px" width="50px" src="'.base_url('uploads/banner/'.$row['bannerImage']).'">',

				 '<img height="50px" width="50px" src="'.base_url('uploads/banner/'.$row['bannerImageMobile']).'">',

				 $row['bannerTitle'],

			   '<a title="Edit" class="update btn btn-success-rgba" href="'.base_url('admin/banner/add_edit/'.$row['bannerID']).'"> <i class="feather icon-edit-2"></i></a>

				<a title="Delete" class="delete btn btn-danger-rgba" href='.base_url("admin/banner/banner_delete/".$row['bannerID']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="feather icon-trash"></i></a>'
			);
		}
		$records['data']=$data;

		echo json_encode($records);	

	}

	public function change_status()
	{ 
		$params = array('isActive' => $this->input->post('status'));
		$where = ['bannerID' => $this->input->post('id')];
		$update = $this->Common_model->updateRecord('fx_banner', $params, $where);
	}

	public function add_edit($id = 0) {
		//$this->rbac->check_operation_access(); // check opration permission
		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {


			$this->form_validation->set_rules('bannerTitle', 'Banner Title', 'trim|required');
			
            if ($_POST['bannerID'] == 0) {
				$this->form_validation->set_rules('bannerImage', 'Banner  Image', 'callback_file_check1');
 
				$this->form_validation->set_rules('bannerImageMobile', 'Banner Mobile Image', 'callback_file_check2');
				
			}
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$bannerID = $_POST['bannerID'];
				if ($_POST['bannerID'] > 0) {
					redirect(base_url('admin/banner/add_edit/' . $id . ''), 'refresh');
				} else {
					redirect(base_url('admin/banner/add_edit'), 'refresh');
				}
			} else {
				if (isset($_POST) && !empty($_POST)) {
					$config = array(
						'upload_path' => 'uploads/banner/',
						'allowed_types' => 'jpg|jpeg|gif|png',
						'file_name' => rand(1, 9999),
						'max_size' => 0,
					);
                    $this->load->library('upload',$config);
					if ($_FILES['bannerImage']['name'] != '') {
						if ($this->upload->do_upload('bannerImage')) {
							$dt = $this->upload->data();
							$_POST['bannerImage'] = $dt['file_name'];
						} else {
							$_POST['bannerImage'] = $_POST['old_image'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['bannerImage'] = $_POST['old_image'];
						$data['error'] = $this->upload->display_errors();
					}
					if ($_FILES['bannerImageMobile']['name'] != '') {
						if ($this->upload->do_upload('bannerImageMobile')) {
							$dt = $this->upload->data();
							$_POST['bannerImageMobile'] = $dt['file_name'];
						} else {
							$_POST['bannerImageMobile'] = $_POST['old_bannerImageMobile'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['bannerImageMobile'] = $_POST['old_bannerImageMobile'];
						$data['error'] = $this->upload->display_errors();
					}

					$params = array(

						'bannerTitle' => $this->input->post('bannerTitle'),

						'bannerImage' => $_POST['bannerImage'],

						'bannerImageMobile' => $_POST['bannerImageMobile'],

						'OrderBy' => $this->input->post('OrderBy'),

						'dateAdded' => date('Y-m-d h:i:s'),

						'dateModified' => date('Y-m-d h:i:s'),
					);
					$bannerID = $_POST['bannerID'];
					$data = $this->security->xss_clean($params);
					if ($_POST['bannerID'] > 0) {
						$where = ['bannerID' => $bannerID];

						$params = $this->Common_model->updateRecord('fx_banner', $data, $where);
					
						if ($params) {
							$this->session->set_flashdata('success', 'Banner Updated Successfully!');
							redirect(base_url('admin/banner'));
						}
					} else {
						$insert = $this->Common_model->insertRecord('fx_banner', $data);
						if ($insert) {
							$this->session->set_flashdata('success', 'Banner Added Successfully!');
							redirect(base_url('admin/banner'));
						}
			        }
			    } else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/banner/add_edit'), 'refresh');
				}
			}
		} else {
			$bannerID = $this->uri->segment(4);
			if ($bannerID > 0) {
                $page_data['Fetch_data'] = $this->Common_model->getRow('fx_banner',array('bannerID'=>$id));
			} else {
				$page_data['Fetch_data'] = array();
			}
		
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/banner/add_edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}
	}

	public function banner_view($id = 0) {

		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_banner', array('bannerID' => $bannerID));
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/banner/add_edit', $page_data);
		$this->load->view('admin/includes/_footer');
	}

	public function file_check1() {

		if (empty($_FILES['bannerImage']['name'][0])) {
			$this->form_validation->set_message('file_check1', "The Banner Image field is required.");
			return false;
		} else {
			return true;
		}
	}

	public function file_check2() {

		if (empty($_FILES['bannerImageMobile']['name'][0])) {
			$this->form_validation->set_message('file_check2', "The Banner Mobile Image field is required.");
			return false;
		} else {
			return true;
		}
	}

	public function banner_delete($id = 0)
	{
		$params = array('status' => 0);
		$where = ['bannerID' => $id];
		$update = $this->Common_model->updateRecord('fx_banner', $params, $where);
		$this->session->set_flashdata('success', ' Banner has been Deleted Successfully!');
		redirect(base_url('admin/banner'));
	}
	
	
	public function edit($id = 0){
		//$this->rbac->check_operation_access(); // check opration permission
		if($this->input->post('submit')){
			$this->form_validation->set_rules('sectionHeading', ' heading', 'trim|required');
			$this->form_validation->set_rules('sectionDescription', 'description', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/banner/edit/'.$id),'refresh');
			}else{
				$data = array();
				$config['upload_path'] = "./uploads/banner/";
				$config['allowed_types'] = "gif|png|jpg|jpeg";

				$this->load->library('upload',$config);

				if (!$this->upload->do_upload('sectionImage')) 
				{
					if (empty($_FILES['sectionImage']['name'])) 
					{
						$_POST['sectionImage'] = $_POST['old_sectionImage'];
						$data['error'] = $this->upload->display_errors();
					}
				}else 
				{
					$dt = $this->upload->data();
					$_POST['sectionImage'] = $dt['file_name'];
					$params['sectionImage'] = $dt['file_name'];
				}

				
				$data = array(
				    'sectionHeading' => $this->input->post('sectionHeading'),
				    // 'sectionDescription' => str_replace(['<p>', '</p>'],'',$this->input->post('sectionDescription')),
				     'sectionDescription' => $this->input->post('sectionDescription'),
					'sectionImage' => $_POST['sectionImage'],
					'dateModified' => date('Y-m-d h:i:s'),
				);
				$params = $this->security->xss_clean($data);
				$where = ['sectionID' => $id];
				$result = $this->Common_model->updateRecord('fx_banner_section', $params, $where);
				if($result){
					// Activity Log 
					$this->activity_model->add_log(2);
					$this->session->set_flashdata('success', 'banner  has been updated successfully!');
					redirect(base_url('admin/banner/edit/1'));
				}
			}
		}else{
			$data['section'] = $this->Common_model->getRow('fx_banner_section',array('sectionID'=>$id));
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/banner/banner_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}

}