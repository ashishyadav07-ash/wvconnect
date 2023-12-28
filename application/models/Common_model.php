<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Common_model extends CI_Model {

	public function __construct() {

		parent::__construct();

	}

	public function delete($table_name, $id) {
		$this->db->where($id, $id);
		$this->db->delete($table_name);
	}

	public function deleteRows($arr_delete_array, $table_name, $field_name) {

		if (count($arr_delete_array) > 0) {

			foreach ($arr_delete_array as $id) {

				if ($id) {

					$this->db->where($field_name, $id);

					$query = $this->db->delete($table_name);

				}

			}

		}

	}

	public function check_old_password() {
		$this->db->select('userID,password');
		$this->db->from('fx_site_user');
		$this->db->where('userID', $this->session->userdata('userID'));
		$this->db->where('password', md5($_POST['old_pass']));
		$check_pass = $this->db->get();
		if ($check_pass->num_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}

	public function db_update($tablename, $fieldarray, $columnname, $value) {

		$this->db->where($columnname, $value);

		return $this->db->update($tablename, $fieldarray);

	}

	public function check_login($table, $username, $password) {

		$this->db->select('*');

		$this->db->from($table);

		$this->db->where('userEmail', $username);

		$this->db->where('userPass', md5($password));

		$query_result = $this->db->get();

		$result = $query_result->row();

		return $result;

	}

	

	public function insertRecord($tbl_name, $data_array, $insert_id = FALSE) {

		$this->db->cache_delete_all();

		foreach (array_keys($data_array) as $a) {

			if (!$this->db->field_exists($a, $tbl_name)) {

				unset($data_array[$a]);

			}

		}

		if ($this->db->insert($tbl_name, $data_array)) {

			return $this->db->insert_id();

			/*if($insert_id==true)

				{return $this->db->insert_id();}

				else

			*/

		} else {return false;}

	}

	public function getRow($tbl_name, $condition = FALSE, $select = FALSE, $order_by = FALSE, $start = FALSE, $limit = FALSE) {

		$this->db->cache_delete_all();

		if ($select != "") {$this->db->select($select, FALSE);}

		if (count((array) $condition) > 0 && $condition != "") {$condition = $condition;} else { $condition = array();}

		if (count((array) $order_by) > 0 && $order_by != "") {

			foreach ($order_by as $key => $val) {$this->db->order_by($key, $val);}

		}

		if ($limit != "" || $start != "") {$this->db->limit($limit, $start);}

		$rst = $this->db->get_where($tbl_name, $condition);

		$result_array = array();

		if ($rst) {

			$result_array = $rst->row_array();

		}

		return $result_array;

	}

	public function getRows($tbl_name, $condition = FALSE, $select = FALSE, $order_by = FALSE, $start = FALSE, $limit = FALSE) {

		$this->db->cache_delete_all();

		if ($select != "") {$this->db->select($select, FALSE);}

		if (count((array) $condition) > 0 && $condition != "") {$condition = $condition;} else { $condition = array();}

		if (count((array) $order_by) > 0 && $order_by != "") {

			foreach ($order_by as $key => $val) {$this->db->order_by($key, $val);}

		}

		if ($limit != "" || $start != "") {$this->db->limit($limit, $start);}

		$rst = $this->db->get_where($tbl_name, $condition);

		$result_array = array();

		if ($rst) {

			$result_array = $rst->result_array();

		}

		return $result_array;

	}

	public function mobile_duplication_check($mobile_no) {

		$this->db->where('userMobile', $mobile_no);

		$result = $this->db->get('fx_site_user');

		if ($result->num_rows() > 0) {

			return 0;

		} else {

			return 1;

		}

	}

	public function email_duplication_check($email) {

		$this->db->where('userEmail', $email);

		$result = $this->db->get('fx_site_user');

		if ($result->num_rows() > 0) {

			return 0;

		} else {

			return 1;

		}

	}

	public function updateRecord($tbl_name, $data_array, $where_arr) {
		$this->db->cache_delete_all();

		foreach (array_keys($data_array) as $a) {
			if (!$this->db->field_exists($a, $tbl_name)) {

				unset($data_array[$a]);

			}

		}

		$this->db->where($where_arr, NULL, FALSE);

		if ($this->db->update($tbl_name, $data_array)) {return true;} else {return false;}

	}

	public function getRecords($tbl_name, $condition = FALSE, $select = FALSE, $order_by = FALSE, $start = FALSE, $limit = FALSE) {

		$this->db->cache_delete_all();

		if ($select != "") {$this->db->select($select, FALSE);}

		if (count($condition) > 0 && $condition != "") {$condition = $condition;} else { $condition = array();}

		if ($order_by) {

			if (count($order_by) > 0 && $order_by != "") {

				foreach ($order_by as $key => $val) {$this->db->order_by($key, $val);}

			}

		}

		if ($limit != "" || $start != "") {$this->db->limit($limit, $start);}

		$rst = $this->db->get_where($tbl_name, $condition);
		// echo $rst;die;

		return $rst->result_array();

	}



	 public function getSearchFilterRecords($fromDate,$toDate,$enquiryStatusFilter){
		$this->db->cache_delete_all();
        $this->db->select('*');
        $this->db->from('fx_enquiries');
        $this->db->where("dateAdded  BETWEEN '".$fromDate." 00:00:00' AND '".$toDate." 23:59:59' AND enquiryStatus='".$enquiryStatusFilter."' AND status= '1'");
        return $this->db->get()->result_array();
   	 }
   	 
	 public function getAllNominee()
	{
		$this->db->select("A.awardID,A.awardHeading as category,N.nomineeID,N.awardCategory,N.nomineeName,N.nomineeEmail,N.nomineeMobile,N.isApprove,N.dateAdded,N.dateModified,N.status");
		$this->db->from("fx_nominee as N");
		$this->db->join("fx_award AS A",'A.awardID=N.awardCategory','left');
		$this->db->order_by('N.nomineeID ', 'desc');
		$this->db->where('N.status',1);
		return $this->db->get()->result_array();
        
	}
	
	public function getNomineeToAssign()
	{
		
		$this->db->select("A.awardID,A.awardHeading as category,N.nomineeID,N.awardCategory,N.nomineeName,N.nomineeEmail,N.nomineeMobile,N.isApprove,N.dateAdded,N.dateModified,N.status");
		$this->db->from("fx_jury_assign_nominee as N");
		$this->db->join("fx_award AS A",'A.awardID=N.awardCategory','left');
		$this->db->where('N.juryID',$this->session->userdata('admin_id'));
		$this->db->where('N.status',1);
		$this->db->order_by('N.jury_assignID ', 'desc');
		return $this->db->get()->result_array();
        
	}
}