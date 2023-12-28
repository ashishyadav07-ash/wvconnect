<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Activity_model', 'activity_model');
		$this->load->model('Common_model', 'Common_model');

	}

	public function index(){
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/page/page_list');
		$this->load->view('admin/includes/_footer');

	}
	public function datatable_json(){				   					   

		$records['data'] = $this->Common_model->getRecords('fx_page',array('status'=>1));
		$data = array();
		$i=0;
		foreach ($records['data']   as $row) 
		{  

			$data[]= array(
				++$i,
				$row['pageTitle'],
				$row['pageHeading'],
				date_time($row['dateAdded']),	

				'<a title="Edit" class="update btn btn-success-rgba" href="'.base_url('admin/page/edit/'.$row['id']).'"> <i class="feather icon-edit-2"></i></a>
				<a title="Delete" class="delete btn btn-danger-rgba" href='.base_url("admin/page/delete/".$row['id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="feather icon-trash"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}

	public function add(){

		if($this->input->post('submit')){
			$this->form_validation->set_rules('pageTitle', 'Page Title', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/page/add'),'refresh');
			}
			else{
				
				$data = array(
					'pageTitle' => $this->input->post('pageTitle'),
					'pageHeading' => $this->input->post('pageHeading'),
					'pageDescription' => $this->input->post('pageDescription'),
					'dateAdded' => date('Y-m-d h:i:s'),
				);

				$params = $this->security->xss_clean($data);
				$result = $this->Common_model->insertRecord('fx_page',$params);
				if($result){
					// Activity Log 
					$this->activity_model->add_log(1);
					$this->session->set_flashdata('success', 'Page has been Added Successfully!');
					redirect(base_url('admin/page'));
				}
			}
		}
		else{

			$this->load->view('admin/includes/_header');
			$this->load->view('admin/page/page_add');
			$this->load->view('admin/includes/_footer');
		}
	}
	public function edit($id = 0){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('pageTitle', 'Page Title', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/page/edit/'.$id),'refresh');
			}
			else{
				$data = array(
					'pageTitle' => $this->input->post('pageTitle'),
					'pageHeading' => $this->input->post('pageHeading'),
					'pageDescription' => $this->input->post('pageDescription'),
					'dateModified' => date('Y-m-d h:i:s'),
				);
				$params = $this->security->xss_clean($data);
				$where=['id'=> $id];
				$result = $this->Common_model->updateRecord('fx_page',$params, $where);
				if($result){
					// Activity Log 
					$this->activity_model->add_log(2);
					$this->session->set_flashdata('success', 'Page has been Updated Successfully!');
					redirect(base_url('admin/page'));
				}
			}
		}
		else{

			$data['page'] = $this->Common_model->getRow('fx_page',array('id'=>$id));
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/page/page_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}

	public function delete($id = 0)
	{
		$params = array('status' => 0);
		$where=['id'=> $id];
		$result = $this->Common_model->updateRecord('fx_page',$params, $where);
		$this->session->set_flashdata('success', 'Page has been Deleted Successfully!');
		redirect(base_url('admin/page'));
	}
	
}

?>