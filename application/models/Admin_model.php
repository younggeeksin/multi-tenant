<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	/**
	 * Name: Subodh Kumar
	 * Purpose : All admin database queries.
	 */
	
    public function __construct() {
        parent::__construct();
		error_reporting(0);
    }

    public function add_role($data) 
	{
		$query = $this->db->insert('roles',$data);
		if($query)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
       
    }
	
	public function update_role($data,$role_id) 
	{
		$this->db->where('id', $role_id);
        $this->db->update('roles', $data);
		return true;
			
       
    }
	
	public function getRoles() 
	{
		
		$q = $this->db->get_where('roles');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
       
    }
	
	public function getModules() 
	{
		
		$q = $this->db->get_where('modules');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
       
    }
	
	public function getpermission() 
	{
		
		$q = $this->db->get_where('moludes_permissions');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
       
    }
	
	public function delete_role($role_id) 
	{
		$query = $this->db->delete('roles', array('id' => $role_id));
		if($query)
		{
			return true;
		}
		else {
			return false;
		}
	}
	
	public function active_role($role_id) 
	{
		$this->db->where('id', $role_id);
        $this->db->update('roles', array('status'=>1));
		return true;
		
	}
	
	public function deactive_role($role_id) 
	{
		$this->db->where('id', $role_id);
        $this->db->update('roles', array('status'=>0));
		return true;
		
	}
	
	public function setPermission($data,$role_id,$modules) 
	{
		$q = $this->db->get_where('moludes_permissions', array('id' => $role_id));
		if($q->num_rows() > 0)
		{
			$this->db->where('id', $role_id);
			$this->db->update('moludes_permissions', array('moludes_id' => json_encode($modules)));
			return true;
		} else {
			$query = $this->db->insert('moludes_permissions', $data);
			return true;
		}
		
	}

    
}
