<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_model extends CI_Model{

	public function get_activity_log(){
		$this->db->select('
			fx_activity_log.id,
			fx_activity_log.activity_id,
			fx_activity_log.user_id,
			fx_activity_log.admin_id,
			fx_activity_log.created_at,
			fx_activity_status.description,
			fx_users.id as uid,
			fx_users.username,
			fx_admin.admin_id,
			fx_admin.username as adminname
		');
		$this->db->join('fx_activity_status','fx_activity_status.id=fx_activity_log.activity_id');
		$this->db->join('fx_users','fx_users.id=fx_activity_log.user_id','left');
		$this->db->join('fx_admin','fx_admin.admin_id=fx_activity_log.admin_id','left');
		$this->db->order_by('fx_activity_log.id','desc');
		return $this->db->get('fx_activity_log')->result_array();
	}

	//--------------------------------------------------------------------
	public function add_log($activity){
		$data = array(
			'activity_id' => $activity,
			'user_id' => ($this->session->userdata('user_id') != '') ? $this->session->userdata('user_id') : 0,
			'admin_id' => ($this->session->userdata('admin_id') != '') ? $this->session->userdata('admin_id') : 0,
			'created_at' => date('Y-m-d H:i:s')
		);
		$this->db->insert('fx_activity_log',$data);
		return true;
	}
	

	
}

?>