<?php defined('BASEPATH') or exit('No direct script access allowed');
class Export extends My_Controller
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
		$data['jury'] = $this->Common_model->getRecords('fx_admin', array('admin_role_id' => 3));

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/exportRecords/export_list', $data);
		$this->load->view('admin/includes/_footer');
	}

	public function exportRecords()
	{
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('juryID', 'Jury Name', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('errors', $data['errors']);


				redirect(base_url('admin/Export/'), 'refresh');
			}

			$juryID = $_POST['juryID'];

			$juryRecord = $this->Common_model->getRecords('fx_jury_assign_nominee', array('juryID' => $juryID));

			$html = '';

			$filename = 'Jury_Data' . date('Y-m-d') . '.xls';

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

			foreach ($juryRecord as $val) {
				$awardCategory = $this->Common_model->getRow('fx_award', array('awardID' => $val['category']));
				$html .= '<tr>
			<td>' . $val['jury_assignID'] . '</td>
			<td>' . $val['nomineeID'] . '</td>
			<td>' . $awardCategory['awardHeading'] . '</td>
			<td>' . $val['client_name'] . '</td>
			<td>' . $val['client_email'] . '</td>
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
	}
}