<?php defined('BASEPATH') OR exit('No direct script access allowed');
class blog extends My_Controller {

	public function __construct() {
		parent::__construct();
		//auth_check();
		//$this->rbac->check_module_access();
		$this->load->model('Common_model', 'Common_model');
	}

	public function index(){
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/blog/blog_list');
		$this->load->view('admin/includes/_footer');
	}
	public function datatable_json(){				   					   
		$records['data'] = $this->Common_model->getRecords('fx_blog',array('status'=>1));
		
		$data = array();

		$i=0;

		foreach ($records['data']  as $row){

			$status = ($row['isActive'] == 1) ? 'checked' : '';

			$data[]= array(

				++$i,  

				'<img height="50px" width="50px" src="'.base_url('uploads/blog/'.$row['blogThumbImage']).'">',

				'<img height="50px" width="50px" src="'.base_url('uploads/blog/'.$row['blogDetailImage']).'">',

				$row['blogHeading'],		


				'<div class="custom-control custom-switch">

        		<input type="checkbox" class="tgl_checkbox custom-control-input" id="cb_' . $row['blogID'] . '"

				data-id="' . $row['blogID'] . '"

				id="cb_' . $row['blogID'] . '"

				' . $status . '><label class="custom-control-label" for="cb_' . $row['blogID'] . '"></label></div>',													

			   '<a title="Edit" class="update btn btn-success-rgba" href="'.base_url('admin/blog/add_edit/'.$row['blogID']).'"> <i class="feather icon-edit-2"></i></a>
 
				<a title="Delete" class="delete btn btn-danger-rgba" href='.base_url("admin/blog/delete/".$row['blogID']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="feather icon-trash"></i></a>'

			);

		}

		$records['data']=$data;

		echo json_encode($records);						   

	}

	public function change_status(){ 
		$params = array('isActive' => $this->input->post('status'));

		$where = ['blogID' => $this->input->post('id')];

		$update = $this->Common_model->updateRecord('fx_blog', $params, $where);
	}

	public function add_edit($id=0) {
		$this->load->library('form_validation');
		$page_data = array();

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('blogHeading','blog heading','trim|required');
			$this->form_validation->set_rules('blogShortDescription','blog short description','trim|required');
			$this->form_validation->set_rules('blogLongDescription','blog long description','trim|required');
			$this->form_validation->set_rules('blogDate','blog date','trim|required');

			if ($_POST['blogID'] == 0) {
				$this->form_validation->set_rules('blogThumbImage', 'thumb image', 'callback_file_check');
			}

			if ($this->form_validation->run() == FALSE){
				$data = array(
				   'errors' => validation_errors(),
				);

				$this->session->set_flashdata('errors', $data['errors']);

				$blogID = $_POST['blogID'];
				if ($_POST['blogID'] > 0) {
					redirect(base_url('admin/blog/add_edit/' . $blogID . ''), 'refresh');

				} else {

				redirect(base_url('admin/blog/add_edit/'), 'refresh');
			    }

			} else {

				if (isset($_POST) && !empty($_POST)) {

					$config = array(
						'upload_path' => 'uploads/blog/',
						'allowed_types' => 'jpg|jpeg|gif|png',
						'file_name' => rand(1, 9999),
						'max_size' => 0,

					);
                    $this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($_FILES['blogThumbImage']['name'] != '') {

						if ($this->upload->do_upload('blogThumbImage')) {
							$dt = $this->upload->data();
							$_POST['blogThumbImage'] = $dt['file_name'];
						} else {

							$_POST['blogThumbImage'] = $_POST['old_blogThumbImage'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['blogThumbImage'] = $_POST['old_blogThumbImage'];
						$data['error'] = $this->upload->display_errors();
					}
					
					if ($_FILES['blogDetailImage']['name'] != '') {

						if ($this->upload->do_upload('blogDetailImage')) {
							$dt = $this->upload->data();
							$_POST['blogDetailImage'] = $dt['file_name'];
						} else {

							$_POST['blogDetailImage'] = $_POST['old_blogDetailImage'];
							$data['error'] = $this->upload->display_errors();
						}
					} else {
						$_POST['blogDetailImage'] = $_POST['old_blogDetailImage'];
						$data['error'] = $this->upload->display_errors();
					}
					$new_seo;
    				$seoUri = makeSeoUri($this->input->post('blogHeading'));
    				$check_seo = $this->Common_model->getRecords('fx_blog',array('seoUri'=>$seoUri));
    				if(sizeof($check_seo) > 0){
    					$new_seo = $seoUri.rand(1,999);
    				}else{
    					$new_seo = $seoUri;
    				}
					
					$params = array(
					    'seoUri'=>$new_seo,

						'blogHeading' => $this->input->post('blogHeading'),
						
						'blogThumbImage' => $this->input->post('blogThumbImage'),
						
						'blogDetailImage' => $this->input->post('blogDetailImage'),

						'blogAuthor' => $this->input->post('blogAuthor'),

						'blogShortDescription' => str_replace(['<p>', '</p>'],'',$this->input->post('blogShortDescription')),
						
						'blogLongDescription' => str_replace(['<p>', '</p>'],'',$this->input->post('blogLongDescription')),
						
						'blogDate' => $this->input->post('blogDate'),
						
						'metaTitle' => $this->input->post('metaTitle'),
						
						'metaKeyword' => $this->input->post('metaKeyword'),
						
						'metaDescription' => str_replace(['<p>', '</p>'],'',$this->input->post('metaDescription')),
						
						'dateAdded' => date('Y-m-d h:i:s'),

						'dateModified' => date('Y-m-d h:i:s'),

					);

					$blogID = $_POST['blogID'];
					
					$data = $this->security->xss_clean($params);

					if ($_POST['blogID'] > 0) {

						$where = ['blogID' => $blogID];

						$insert = $this->Common_model->updateRecord('fx_blog', $data, $where);

						if ($insert) {

							$this->session->set_flashdata('success', 'Blog updated successfully!');

							redirect(base_url('admin/blog'));

						}

					} else {

						$insert = $this->Common_model->insertRecord('fx_blog', $data);


						if ($insert) {

							$this->session->set_flashdata('success', 'Blog added successfully!');

							redirect(base_url('admin/blog'));

						}

					}

				} else {

					$this->session->set_flashdata('errors', 'Something is Wrong!!');

					redirect(base_url('admin/blog/add_edit'), 'refresh');

			    }
			}
	    } else {

			$blogID = $this->uri->segment(4);

			if ($blogID > 0) {

				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_blog', array('blogID' => $blogID));
				
			} else {

				$page_data['Fetch_data'] = array();

			}

			$this->load->view('admin/includes/_header');

			$this->load->view('admin/blog/add_edit', $page_data);

			$this->load->view('admin/includes/_footer');
		}
    }


	public function blog_view($blogID = '') {

		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_blog', array('blogID' => $blogID));

		$this->load->view('admin/includes/_header');

		$this->load->view('admin/blog/add_edit', $page_data);

		$this->load->view('admin/includes/_footer');

	}

	public function file_check() {
		if (empty($_FILES['blogThumbImage']['name'][0])) {
			$this->form_validation->set_message('file_check', "The thumb image field is required.");
			return false;
		} else {
			return true;
		}
	}

	public function delete($id = 0){
		$params = array('status' => 0);
		$where = ['blogID' => $id];
		$update = $this->Common_model->updateRecord('fx_blog', $params, $where);
		$this->session->set_flashdata('success', 'Blog has been deleted successfully!');
		redirect(base_url('admin/blog'));
	}
	
	
    
    
		
}