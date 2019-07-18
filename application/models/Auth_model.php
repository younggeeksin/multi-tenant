<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	/**
	 * Name: Subodh Kumar
	 * Purpose : Authentication Model database queries.
	 */
	
    public function __construct() {
        parent::__construct();
		error_reporting(0);
    }

    public function login_check($data) {
		
		
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$data['email']);
		$this->db->where('password',$data['password']);
		$query = $this->db->get();
		
		if( $query->num_rows() > 0 )
		{
			$row = $query->result_array();
			return $row;
		}
		else {
			return false;
		}
       
    }

    
}
