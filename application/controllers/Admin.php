<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
     
	 /**
	 * Name: Subodh Kumar
	 * Purpose : All Control of your system.
	 */
	 
	  function __construct()
    {
        parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
		$this->load->helper('url');
		$this->load->model('admin_model');
        if (!$this->session->userdata('user_info')) {
            redirect('login');
        }
		
    }
	
	public function index()
	{
		$this->data['page_title'] = "Dashboard - MTC";
		$this->load->view('admin/components/header', $this->data);
		$this->load->view('admin/index');
		$this->load->view('admin/components/footer');
	}
	
	public function roles()
	{
		$this->data['page_title'] = "User Roles - MTC";
		$this->data['all_roles'] = $this->admin_model->getRoles(); 
		$this->data['all_modules'] = $this->admin_model->getModules(); 
		$this->data['all_permission'] = $this->admin_model->getpermission(); 
		
		$this->load->view('admin/components/header', $this->data);
		$this->load->view('admin/user_roles', $this->data);
		$this->load->view('admin/components/footer');
	}
	
	public function add_role()
	{
		$role_name = $this->input->post('role_name');
		$role_desc = $this->input->post('role_desc');
		$time =  Date('y-m-d h:i:s');
		$data = array(
		'role_name' => $role_name,
		'role_description' => $role_desc,
		'created_on' => $time
		);
		$result = $this->admin_model->add_role($data);
		if($result)
		{
			
			$this->session->set_flashdata('msg', 'Role created successfully.');
			redirect('admin/roles');
		}
		else {
		     $this->session->set_flashdata('error', 'Something went wrong!');
			 redirect('/');
		}
	}
	
	public function edit_role()
	{
		$role_id = $this->input->post('role_idd');
		$role_name = $this->input->post('role_name');
		$role_desc = $this->input->post('role_desc');
		$time =  Date('y-m-d h:i:s');
		$data = array(
		'role_name' => $role_name,
		'role_description' => $role_desc,
		'updated_on' => $time
		);
		$result = $this->admin_model->update_role($data,$role_id);
		if($result)
		{
			
			$this->session->set_flashdata('msg', 'Role Updated successfully.');
			redirect('admin/roles');
		}
		else {
		     $this->session->set_flashdata('error', 'Something went wrong!');
			 redirect('/');
		}
	}
	
	public function delete_role()
	{
	   $role_id = $this->input->post('role_idd');
	   $result = $this->admin_model->delete_role($role_id);
	   if($result)
		{
			
			$this->session->set_flashdata('msg', 'Role deleted successfully.');
			redirect('admin/roles');
		}
		else {
		     $this->session->set_flashdata('error', 'Something went wrong!');
			 redirect('/');
		}
	   
	}
	
	public function activate_role()
	{
	   $role_id = $this->input->post('a_role_idd');
	   $result = $this->admin_model->active_role($role_id);
	   if($result)
		{
			
			$this->session->set_flashdata('msg', 'Role activated successfully.');
			redirect('admin/roles');
		}
		else {
		     $this->session->set_flashdata('error', 'Something went wrong!');
			 redirect('/');
		}
	   
	}
	
	public function deactivate_role()
	{
	   $role_id = $this->input->post('d_role_idd');
	   $result = $this->admin_model->deactive_role($role_id);
	   if($result)
		{
			
			$this->session->set_flashdata('msg', 'Role deactivated successfully.');
			redirect('admin/roles');
		}
		else {
		     $this->session->set_flashdata('error', 'Something went wrong!');
			 redirect('/');
		}
	   
	}
	
	public function set_permission()
	{
	   
	   $role_id = $this->input->post('setp_rid');
	   $roleM_1 = $this->input->post('roleMid_1');
	   $roleM_2 = $this->input->post('roleMid_2');
	   
	   $modules =array(
	   'Setting' =>$roleM_1,
	   'Reporting' =>$roleM_2
	   );
	   
	   $data = array(
	   'role_id' =>$role_id,
	   'moludes_id' =>json_encode($modules)
	   );
	   $result = $this->admin_model->setPermission($data,$role_id,$modules);
	   if($result)
		{
			
			$this->session->set_flashdata('msg', 'Role Set Permission successfully.');
			redirect('admin/roles');
		}
		else {
		     $this->session->set_flashdata('error', 'Something went wrong!');
			 redirect('/');
		}
	   
	}
	
	public function setpermission()
	{
		 
		$this->data['page_title'] = "User Roles - MTC";
		$this->data['all_roles'] = $this->admin_model->getRoles(); 
		$this->data['all_modules'] = $this->admin_model->getModules(); 
		$this->data['all_permission'] = $this->admin_model->getpermission(); 
		
		$this->load->view('admin/components/header', $this->data);
		$this->load->view('admin/setpermission', $this->data);
		$this->load->view('admin/components/footer');
	}
	
	
}
