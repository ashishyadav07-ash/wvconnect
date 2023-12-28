<?php defined('BASEPATH') or exit('No direct script access allowed');
class Nominee extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		auth_check();
		// 		$this->rbac->check_module_access();
		$this->load->model('Common_model', 'Common_model');
	}
	public function index()
	{
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/nominee/nominee_list');
		$this->load->view('admin/includes/_footer');
	}

	public function datatable_json()
	{

		if ($this->session->userdata('admin_role_id') == '3') {

			$records['data'] = $this->Common_model->getNomineeToAssign();
			// echo "<pre>";print_r($this->session->userdata('admin_id'));
			// echo "<pre>";print_r($records['data']); die();
			$data = array();
		$i = 0;
		foreach ($records['data'] as $row) {
			$status = ($row['isApprove'] == 1) ? 'checked' : '';
			$data[] = array(
				++$i,
				$row['category'],
				$row['nomineeName'],
				$row['nomineeEmail'],
				$row['nomineeMobile'],
				// '<div class="custom-control custom-switch">
				// <input type="checkbox" class="tgl_checkbox custom-control-input" id="cb_' . $row['nomineeID'] . '"
				// data-id="' . $row['nomineeID'] . '"
				// id="cb_' . $row['nomineeID'] . '"
				// ' . $status . '><label class="custom-control-label" for="cb_' . $row['nomineeID'] . '"></label></div>',	   

				'<a title="Edit" class="update btn btn-success-rgba" href="' . base_url('admin/nominee/add_edit/' . $row['nomineeID']) . '"> <i class="feather icon-edit-2"></i></a>'
				// '<a title="Delete" class="delete btn btn-danger-rgba" href='.base_url("admin/nominee/nominee_delete/".$row['nomineeID']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="feather icon-trash"></i></a>'
			);
		}
		$records['data'] = $data;
		echo json_encode($records);

		}else{

		$records['data'] = $this->Common_model->getAllNominee();
		$data = array();
		$i = 0;
		foreach ($records['data'] as $row) {
			$status = ($row['isApprove'] == 1) ? 'checked' : '';
			$data[] = array(
				++$i,
				$row['category'],
				$row['nomineeName'],
				$row['nomineeEmail'],
				$row['nomineeMobile'],
				// '<div class="custom-control custom-switch">
				// <input type="checkbox" class="tgl_checkbox custom-control-input" id="cb_' . $row['nomineeID'] . '"
				// data-id="' . $row['nomineeID'] . '"
				// id="cb_' . $row['nomineeID'] . '"
				// ' . $status . '><label class="custom-control-label" for="cb_' . $row['nomineeID'] . '"></label></div>',	   

				'<a title="Edit" class="update btn btn-success-rgba" href="' . base_url('admin/nominee/add_edit/' . $row['nomineeID']) . '"> <i class="feather icon-edit-2"></i></a>'
				// '<a title="Delete" class="delete btn btn-danger-rgba" href='.base_url("admin/nominee/nominee_delete/".$row['nomineeID']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="feather icon-trash"></i></a>'
			);
		}
		$records['data'] = $data;
		echo json_encode($records);

	}
	}
	function change_status()
	{
		$params = array('isApprove' => $this->input->post('status'));
		$where = ['nomineeID' => $this->input->post('id')];
		$update = $this->Common_model->updateRecord('fx_nominee', $params, $where);
	}
	function add_edit($id = 0)
	{
		//$this->rbac->check_operation_access(); // check opration permission
		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('awardCategory', 'select award category', 'trim|required');
			$this->form_validation->set_rules('nomineeName', 'nominee name', 'trim|required');
			$this->form_validation->set_rules('nomineeEmail', 'nominee email', 'trim|required');
			$this->form_validation->set_rules('nomineeMobile', 'nominee mobile', 'trim|required');
			if ($this->session->userdata('admin_role_id') == '3') {
				$this->form_validation->set_rules('remark', 'nominee remark', 'trim|required');
			} else {
				// $this->form_validation->set_rules('juryID','Jury ID','trim|required');
			}


			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$nomineeID = $_POST['nomineeID'];
				if ($_POST['nomineeID'] > 0) {
					redirect(base_url('admin/nominee/add_edit/' . $nomineeID . ''), 'refresh');
				} else {
					redirect(base_url('admin/nominee/add_edit'), 'refresh');
				}
			} else {
				if (isset($_POST) && !empty($_POST)) {
					// $config = array(
					// 	'upload_path' => 'uploads/nominee/',
					// 	'allowed_types' => 'jpg|jpeg|gif|png',
					// 	'file_name' => rand(1, 9999),
					// 	'max_size' => 0,
					// );
					// $this->load->library('upload',$config);
					// if ($_FILES['nomineeImage']['name'] != '') {
					// 	if ($this->upload->do_upload('nomineeImage')) {
					// 		$dt = $this->upload->data();
					// 		$_POST['nomineeImage'] = $dt['file_name'];
					// 	} else {
					// 		$_POST['nomineeImage'] = $_POST['old_nomineeImage'];
					// 		$data['error'] = $this->upload->display_errors();
					// 	}
					// } else {
					// 	$_POST['nomineeImage'] = $_POST['old_nomineeImage'];
					// 	$data['error'] = $this->upload->display_errors();
					// }

					// $new_seo;
					// $seoUri = makeSeoUri($this->input->post('nomineeName'));
					// $check_seo = $this->Common_model->getRecords('fx_nominee',array('seoUri'=>$seoUri));
					// if(sizeof($check_seo) > 0){
					// $new_seo = $seoUri.rand(1,999);
					// } else {
					// $new_seo = $seoUri;
					// } 
					// $new_seo = makeSeoUri($this->input->post('nomineeName'));
					$params = array(
						// 'seoUri'=>$new_seo,
						'awardCategory' => $this->input->post('awardCategory'),
						'nomineeName' => $this->input->post('nomineeName'),
						'nomineeEmail' => $this->input->post('nomineeEmail'),
						'nomineeMobile' => $this->input->post('nomineeMobile'),
						'remark' => $this->input->post('remark'),
						'dateAdded' => date('Y-m-d h:i:s'),
						'dateModified' => date('Y-m-d h:i:s'),
					);



					$nomineeID = $_POST['nomineeID'];
					$data = $this->security->xss_clean($params);
					if ($_POST['nomineeID'] > 0) {
						$where = ['nomineeID' => $nomineeID];
						$params = $this->Common_model->updateRecord('fx_nominee', $data, $where);


						if ($this->session->userdata('admin_role_id') != '3') {
							// $page_data['jury_assignID'] = $this->Common_model->getRecords('fx_jury_assign_nominee', array('nomineeID' => $nomineeID));
							// if (!empty($page_data['jury_assignID'])) {


							// 	foreach ($page_data['jury_assignID'] as $jury) {

							// 		$juryID = $jury['juryID'];
							// 		foreach ($this->input->post('juryID') as $juryIDs) {

							// 			if ($juryID != $juryIDs) {
											// echo"<pre>";print_r($juryIDs);exit;
											$where = array('nomineeID' => $nomineeID);
											$delete = $this->db->delete('fx_jury_assign_nominee', $where);

											foreach ($this->input->post('juryID') as $juryID) {
												$params = array(
													'awardCategory' => $this->input->post('awardCategory'),
													'nomineeName' => $this->input->post('nomineeName'),
													'nomineeEmail' => $this->input->post('nomineeEmail'),
													'nomineeMobile' => $this->input->post('nomineeMobile'),
													'nomineeID' => $nomineeID,
													'juryID' => $juryID,
													'file' => $this->input->post('file'),
													'dateAdded' => date('Y-m-d h:i:s'),
													'dateModified' => date('Y-m-d h:i:s'),
												);
												$data = $this->security->xss_clean($params);
												$insert = $this->Common_model->insertRecord('fx_jury_assign_nominee', $data);

											// if ($delete) {
											// 	$this->session->set_flashdata('success', 'Data updated successfully!');
											// 	redirect(base_url('admin/nominee'));
											// } else {
											// 	// Deletion failed
											// 	$this->session->set_flashdata('error', 'Error updating data!');
											// 	redirect(base_url('admin/nominee'));
											// }
								// 		}
								// 	}
								// }

								// echo "<pre>";
								// print_r('12345');
								// exit;



							}
							}
						}




						if ($params) {
							$this->session->set_flashdata('success', ' updated successfully!');
							redirect(base_url('admin/nominee'));
						}
					} else {
						$insert = $this->Common_model->insertRecord('fx_nominee', $data);
						if ($insert) {
							$this->session->set_flashdata('success', 'Blog added successfully!');
							redirect(base_url('admin/nominee'));
						}
					}
				// } else {
				// 	$this->session->set_flashdata('errors', 'Something is Wrong!!');
				// 	redirect(base_url('admin/nominee/add_edit'), 'refresh');
				// }
			}
		} else {
			$nomineeID = $this->uri->segment(4);
			if ($nomineeID > 0) {
				$page_data['datas'] = $this->Common_model->getRecords('fx_award', array('status' => '1'));
				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_nominee', array('nomineeID' => $id));
				$page_data['juryID'] = $this->Common_model->getRecords('fx_admin', array('admin_role_id' => '3'));
				$page_data['jury_assignID'] = $this->Common_model->getRecords('fx_jury_assign_nominee', array('nomineeID' => $nomineeID));
				// echo"<pre>";print_r($page_data['juryID']);exit;
			} else {
				$page_data['datas'] = $this->Common_model->getRecords('fx_award', array('status' => '1'));
				$page_data['Fetch_data'] = array();
			}

			$this->load->view('admin/includes/_header');
			$this->load->view('admin/nominee/add_edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}
	}
	function nominee_view($id = 0)
	{
		// $page_data['nominee_tags'] = $this->Common_model->getRecords('fx_nominee_tag', array( 'nomineeID' => $id ),'tagName' );
		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_nominee', array('nomineeID' => $nomineeID));
		// print_r($page_data);die();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/nominee/add_edit', $page_data);
		$this->load->view('admin/includes/_footer');
	}
	public function file_check1()
	{
		if (empty($_FILES['nomineeImage']['name'][0])) {
			$this->form_validation->set_message('file_check1', "The nominee image field is required.");
			return false;
		} else {
			return true;
		}
	}

	public function nominee_delete($id = 0)
	{
		$params = array('status' => 0);
		$where = ['nomineeID' => $id];
		$update = $this->Common_model->updateRecord('fx_nominee', $params, $where);
		$this->session->set_flashdata('success', ' Blog has been deleted successfully!');
		redirect(base_url('admin/nominee'));
	}
}