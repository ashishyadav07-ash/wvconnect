<?php
	class Join_model extends CI_Model{
	
		public function get_all_serverside_payments()
	    {
	    	$this->db->select('
	    		fx_payments.id,
				fx_payments.invoice_no,
				fx_payments.grand_total,
				fx_payments.currency,
				fx_payments.created_date,
				fx_users.username as client_name,
				fx_users.email as client_email,
				fx_users.mobile_no as client_mobile_no
	    	');
	    	$this->db->join('fx_users','fx_users.id = fx_payments.user_id','left');
	    	return $this->db->get('fx_payments')->result_array();
	    }


	    public function get_user_payment_details(){
	    	$this->db->select('
	    			fx_payments.id,
	    			fx_payments.invoice_no,
	    			fx_payments.payment_status,
					fx_payments.grand_total,
					fx_payments.currency,
					fx_payments.due_date,
					fx_payments.created_date,
					fx_users.username as client_name,
					fx_users.firstname,
					fx_users.lastname,
					fx_users.email as client_email,
					fx_users.mobile_no as client_mobile_no,
					fx_users.address as client_address,'
	    	);
	    	$this->db->from('fx_payments');
	    	$this->db->join('fx_users', 'fx_users.id = fx_payments.user_id ', 'left');
	    	$query = $this->db->get();					 
			return $query->result_array();
	    }

	}

?>

