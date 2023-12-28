<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

	public function get_user_detail(){
		$id = $this->session->userdata('admin_id');
		$query = $this->db->get_where('fx_admin', array('admin_id' => $id));
		return $result = $query->row_array();
	}
	//--------------------------------------------------------------------
	public function update_user($data){
		$id = $this->session->userdata('admin_id');
		$this->db->where('admin_id', $id);
		$this->db->update('fx_admin', $data);
		return true;
	}
	//--------------------------------------------------------------------
	public function change_pwd($data, $id){
		$this->db->where('admin_id', $id);
		$this->db->update('fx_admin', $data);
		return true;
	}
	//-----------------------------------------------------
	function get_admin_roles()
	{
		$this->db->from('fx_admin_roles');
		$this->db->where('admin_role_status',1);
		$query=$this->db->get();
		return $query->result_array();
	}

	//-----------------------------------------------------
	function get_admin_by_id($id)
	{
		$this->db->from('fx_admin');
		$this->db->join('fx_admin_roles','fx_admin_roles.admin_role_id=fx_admin.admin_role_id');
		$this->db->where('admin_id',$id);
		$query=$this->db->get();
		return $query->row_array();
	}

	//-----------------------------------------------------
	function get_all()
	{

		$this->db->from('fx_admin');

		$this->db->join('fx_admin_roles','fx_admin_roles.admin_role_id=fx_admin.admin_role_id');

		if($this->session->userdata('filter_type')!='')
		{

			$this->db->where('fx_admin.admin_role_id',$this->session->userdata('filter_type'));
		}


		if($this->session->userdata('filter_status')!='')
		{

			$this->db->where('fx_admin.is_active',$this->session->userdata('filter_status'));
		}


		if( $this->session->userdata('filter_keyword') != '' )
		{
			$filterData = $this->session->userdata('filter_keyword');

			$this->db->like('fx_admin_roles.admin_role_title',$filterData);
			$this->db->or_like('fx_admin.firstname',$filterData);
			$this->db->or_like('fx_admin.lastname',$filterData);
			$this->db->or_like('fx_admin.email',$filterData);
			$this->db->or_like('fx_admin.mobile_no',$filterData);
			$this->db->or_like('fx_admin.username',$filterData);
		}
		

		$this->db->where('fx_admin.is_supper', 0);
		$this->db->where('fx_admin.is_delete', 0);	

		$this->db->order_by('fx_admin.admin_id','desc');

		$query = $this->db->get();

		$module = array();

		if ($query->num_rows() > 0) 
		{
			$module = $query->result_array();
		}

		return $module;
	}
	function get_all_restore()
	{

		$this->db->from('fx_admin');

		$this->db->join('fx_admin_roles','fx_admin_roles.admin_role_id=fx_admin.admin_role_id');

		if($this->session->userdata('filter_type')!='')
		{

			$this->db->where('fx_admin.admin_role_id',$this->session->userdata('filter_type'));
		}


		if($this->session->userdata('filter_status')!='')
		{

			$this->db->where('fx_admin.is_active',$this->session->userdata('filter_status'));
		}


		if( $this->session->userdata('filter_keyword') != '' )
		{
			$filterData = $this->session->userdata('filter_keyword');

			$this->db->like('fx_admin_roles.admin_role_title',$filterData);
			$this->db->or_like('fx_admin.firstname',$filterData);
			$this->db->or_like('fx_admin.lastname',$filterData);
			$this->db->or_like('fx_admin.email',$filterData);
			$this->db->or_like('fx_admin.mobile_no',$filterData);
			$this->db->or_like('fx_admin.username',$filterData);
		}
		

		$this->db->where('fx_admin.is_supper', 0);
		$this->db->where('fx_admin.is_delete', 1);	

		$this->db->order_by('fx_admin.admin_id','desc');

		$query = $this->db->get();

		$module = array();

		if ($query->num_rows() > 0) 
		{
			$module = $query->result_array();
		}

		return $module;
	}

	//-----------------------------------------------------
public function add_admin($data){
	$this->db->insert('fx_admin', $data);
	return true;
}

	//---------------------------------------------------
	// Edit Admin Record
public function edit_admin($data, $id){
	$this->db->where('admin_id', $id);
	$this->db->update('fx_admin', $data);
	return true;
}

	//-----------------------------------------------------
function change_status()
{		
	$this->db->set('is_active',$this->input->post('status'));
	$this->db->where('admin_id',$this->input->post('id'));
	$this->db->update('fx_admin');
} 

	//-----------------------------------------------------
function delete($id)
{		
	$this->db->where('admin_id',$id);
	$this->db->delete('fx_admin');
} 

}

?>