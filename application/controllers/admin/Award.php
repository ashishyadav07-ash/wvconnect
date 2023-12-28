<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Award extends My_Controller {
	public function __construct() {
		parent::__construct();
		auth_check();
// 		$this->rbac->check_module_access();
$this->load->model('Common_model', 'Common_model');
	}
	public function index(){
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/award/award_list');
		$this->load->view('admin/includes/_footer');
	}
	
		public function datatable_json(){				   					   
		 $records['data'] = $this->Common_model->getRecords('fx_award',array('status'=>1));

		$data = array();
		$i=0;
		foreach ($records['data']   as $row) 
		{  
			$data[]= array(
				++$i,
				'<img height="50px" width="50px" src="'.base_url('uploads/award/'.$row['awardImage']).'">',
				$row['awardHeading'],
			   '<a title="Edit" class="update btn btn-success-rgba" href="'.base_url('admin/award/add_edit/'.$row['awardID']).'"> <i class="feather icon-edit-2"></i></a>
				<a title="Delete" class="delete btn btn-danger-rgba" href='.base_url("admin/award/award_delete/".$row['awardID']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="feather icon-trash"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);	
	}
	function change_status()
	{ 
		$params = array('is_active' => $this->input->post('status'));
		$where = ['awardID' => $this->input->post('id')];
		$update = $this->Common_model->updateRecord('fx_award', $params, $where);
	}
	function add_edit($id = 0) {
		//$this->rbac->check_operation_access(); // check opration permission
		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')){
			$this->form_validation->set_rules('eventCategory', 'select event category', 'trim|required');
			$this->form_validation->set_rules('awardHeading', 'award heading', 'trim|required');
			if ($_POST['awardID'] == 0) {
				$this->form_validation->set_rules('awardImage', 'award thumb image', 'callback_file_check1');
			}
			$this->form_validation->set_rules('awardDescription','award description','trim|required');
           
			if ($this->form_validation->run() == FALSE){
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$awardID = $_POST['awardID'];
				if ($_POST['awardID'] > 0) {
					redirect(base_url('admin/award/add_edit/' . $awardID . ''), 'refresh');
				} else {
					redirect(base_url('admin/award/add_edit'), 'refresh');
				}
			} else {
				if (isset($_POST) && !empty($_POST)) {
					$config = array(
						'upload_path' => 'uploads/award/',
						'allowed_types' => 'jpg|jpeg|gif|png',
						'file_name' => rand(1, 9999),
						'max_size' => 0,
					);
                    $this->load->library('upload',$config);
					if ($_FILES['awardImage']['name'] != '') {
						if ($this->upload->do_upload('awardImage')) {
							$dt = $this->upload->data();
							$_POST['awardImage'] = $dt['file_name'];
						} else {
							$_POST['awardImage'] = $_POST['old_awardImage'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['awardImage'] = $_POST['old_awardImage'];
						$data['error'] = $this->upload->display_errors();
					}
				
					// $new_seo;
		    		// $seoUri = makeSeoUri($this->input->post('awardHeading'));
		    		// $check_seo = $this->Common_model->getRecords('fx_award',array('seoUri'=>$seoUri));
		    		// if(sizeof($check_seo) > 0){
		    		// $new_seo = $seoUri.rand(1,999);
		    		// } else {
		    		// $new_seo = $seoUri;
		    		// } 
		    		// $new_seo = makeSeoUri($this->input->post('awardHeading'));
					$params = array(
                        // 'seoUri'=>$new_seo,
                        'eventCategory' =>  $this->input->post('eventCategory'),
						'awardHeading' => $this->input->post('awardHeading'),
						'awardImage' => $_POST['awardImage'],
						'awardDescription' => str_replace(['<p>', '</p>'],'',$this->input->post('awardDescription')),
						'dateAdded' => date('Y-m-d h:i:s'),
						'dateModified' => date('Y-m-d h:i:s'),
					);
				
					$awardID = $_POST['awardID'];
					$data = $this->security->xss_clean($params);
					if ($_POST['awardID'] > 0){
						$where = ['awardID' => $awardID];
						$params = $this->Common_model->updateRecord('fx_award', $data, $where);
						if ($params) {
							$this->session->set_flashdata('success', 'Blog updated successfully!');
							redirect(base_url('admin/award'));
						}
					} else {
						$insert = $this->Common_model->insertRecord('fx_award', $data);
						if ($insert) {
							$this->session->set_flashdata('success', 'Blog added successfully!');
							redirect(base_url('admin/award'));
						}
			        }
			    } else {
					$this->session->set_flashdata('errors', 'Something is Wrong!!');
					redirect(base_url('admin/award/add_edit'), 'refresh');
				}
			}
		} else {
			$awardID = $this->uri->segment(4);
			if ($awardID > 0) {
			     $page_data['datas'] = $this->Common_model->getRecords('fx_event_category', array('status' => '1','isActive' => '1'));
                $page_data['Fetch_data'] = $this->Common_model->getRow('fx_award',array('awardID'=>$id));
			} else {
			    $page_data['datas'] = $this->Common_model->getRecords('fx_event_category', array('status' => '1','isActive' => '1'));
				$page_data['Fetch_data'] = array();
			}
			
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/award/add_edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}
	}
	function award_view($id = 0) {
		// $page_data['award_tags'] = $this->Common_model->getRecords('fx_award_tag', array( 'awardID' => $id ),'tagName' );
		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_award', array('awardID' => $awardID));
		// print_r($page_data);die();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/award/add_edit', $page_data);
		$this->load->view('admin/includes/_footer');
	}
	public function file_check1() {
		if (empty($_FILES['awardImage']['name'][0])) {
			$this->form_validation->set_message('file_check1', "The award image field is required.");
			return false;
		} else {
			return true;
		}
	}
	
	public function award_delete($id = 0)
	{
		$params = array('status' => 0);
		$where = ['awardID' => $id];
		$update = $this->Common_model->updateRecord('fx_award', $params, $where);
		$this->session->set_flashdata('success', ' Blog has been deleted successfully!');
		redirect(base_url('admin/award'));
	}
}