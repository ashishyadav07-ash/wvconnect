<?php defined('BASEPATH') or exit('No direct script access allowed');
class Result extends My_Controller
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
		// $data['Fetch_data'] = array();


		if (!empty($_GET['awardsID'])) {

			$awardsID = $_GET['awardsID'];
			$data['awardRecord'] = $this->Common_model->getResult($awardsID);
			$data['Fetch_data'] = $this->Common_model->getRow('fx_award', array('awardID' => $awardsID));
			// echo "<pre>";print_r($data['awardRecord']);exit;
		}

		$data['awards'] = $this->Common_model->getRecords('fx_award', array('status' => 1));



		$this->load->view('admin/includes/_header');
		$this->load->view('admin/result/result_list', $data);
		$this->load->view('admin/includes/_footer');
	}

	public function exportResult()
	{
		$awardsID = $this->uri->segment(4);
		$awardRecord = $this->Common_model->getResult($awardsID);
		// echo "<pre>";print_r($awardRecord);exit;




		$html = '';

		$filename = 'Result_Export' . date('Y-m-d') . '.xls';

		$html = '<table cellspacing="1" cellpadding="7" border="1">
			<thead>
				<tr>
					<th>jury_assignID</th>
					<th>nomineeID</th>
					<th>awardCategory</th>
					<th>nomineeName</th>
					<th>nomineeEmail</th>
					<th>remark</th>
					<th>totalRemark</th>
				</tr>
			</thead>
			<tbody>';

		foreach ($awardRecord as $val) {
			$html .= '<tr>
				<td>' . $val['jury_assignID'] . '</td>
				<td>' . $val['nomineeID'] . '</td>
				<td>' . $val['awardHeading'] . '</td>
				<td>' . $val['nomineeName'] . '</td>
				<td>' . $val['nomineeEmail'] . '</td>
				<td>' . $val['remark'] . '</td>
				<td>' . $val['totalRemark'] . '</td>
			</tr>';
		}

		$html .= '</tbody></table>';

		$finalContent = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head><body>' . $html . '</body></html>';

		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=" . $filename);
		echo $finalContent;
		exit();

	}















	public function datatable_json()
	{

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
				'<a title="Edit" class="update btn btn-success-rgba" href="' . base_url('admin/jury/add_edit/' . $row['jury_assignID']) . '"> <i class="feather icon-edit-2"></i></a>'
			);
		}
		$records['data'] = $data;
		echo json_encode($records);


	}
	function change_status()
	{
		$params = array('isApprove' => $this->input->post('status'));
		$where = ['nomineeID' => $this->input->post('id')];
		$update = $this->Common_model->updateRecord('fx_nominee', $params, $where);
	}
	function add_edit($id = 0)
	{
		$this->load->library('form_validation');
		$page_data = array();
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('remark', 'nominee remark', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$nomineeID = $_POST['nomineeID'];
				if ($_POST['nomineeID'] > 0) {
					redirect(base_url('admin/jury/add_edit/' . $nomineeID . ''), 'refresh');
				} else {
					redirect(base_url('admin/jury/add_edit'), 'refresh');
				}
			} else {
				if (isset($_POST) && !empty($_POST)) {
					$params = array(
						'remark' => $this->input->post('remark'),
						'dateAdded' => date('Y-m-d h:i:s'),
						'dateModified' => date('Y-m-d h:i:s'),
					);
					$jury_assignID = $_POST['jury_assignID'];
					$data = $this->security->xss_clean($params);
					if ($_POST['jury_assignID'] > 0) {
						$where = ['jury_assignID' => $jury_assignID];
						$params = $this->Common_model->updateRecord('fx_jury_assign_nominee', $data, $where);
						$remark = $this->Common_model->sumAllRemark($_POST['nomineeID']);
						// echo'<pre>';print_r($remark);exit;
						$paramss = array(
							'totalRemark' => $remark['total_remark'],
							'dateAdded' => date('Y-m-d h:i:s'),
							'dateModified' => date('Y-m-d h:i:s'),
						);
						$where = ['nomineeID' => $_POST['nomineeID']];
						$data = $this->security->xss_clean($paramss);
						$params = $this->Common_model->updateRecord('fx_jury_assign_nominee', $data, $where);
					}
					if ($params) {
						$this->session->set_flashdata('success', ' updated successfully!');
						redirect(base_url('admin/jury'));
					}
				}
			}
		} else {
			$jury_assignID = $this->uri->segment(4);
			if ($jury_assignID > 0) {
				$page_data['datas'] = $this->Common_model->getRecords('fx_award', array('status' => '1'));
				$page_data['Fetch_data'] = $this->Common_model->getRow('fx_jury_assign_nominee', array('jury_assignID' => $id));
				$page_data['juryID'] = $this->Common_model->getRecords('fx_admin', array('admin_role_id' => '3'));
				$page_data['jury_assignID'] = $this->Common_model->getRecords('fx_jury_assign_nominee', array('jury_assignID' => $jury_assignID));
			} else {
				$page_data['datas'] = $this->Common_model->getRecords('fx_award', array('status' => '1'));
				$page_data['Fetch_data'] = array();
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/jury/add_edit', $page_data);
			$this->load->view('admin/includes/_footer');
		}
	}
	function nominee_view($id = 0)
	{
		$page_data['Fetch_data'] = $this->Common_model->getRow('fx_nominee', array('nomineeID' => $jury_assignID));
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/jury/add_edit', $page_data);
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

}