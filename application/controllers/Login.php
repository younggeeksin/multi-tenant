<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
     
	 /**
	 * Name: Subodh Kumar
	 * Purpose : All Control of Authentication.
	 */
	 
	  function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('auth_model');
        // if (!empty($loggedIn)) {
            // redirect('admin');
        // }
    }
	
	public function index()
	{
		
		$this->load->view('login');
		
	}
	
	public function auth()
	{
		
		$username = $this->input->post('email'); 
		$pass = $this->input->post('pass'); 
		$password = SHA1($pass); 
		$data = array(
		'email' => $username,
		'password' => $password
		);
		$check = $this->auth_model->login_check($data);
		
		if($check)
		{
			$loggedIn = $this->session->set_userdata('user_info', $check);
			$this->session->set_flashdata('msg', 'Logged in successfully.');
			redirect('admin/index');
		}
		else {
		     $this->session->set_flashdata('error', 'Invalid Email or Password!');
			 redirect('/');
		}
		$this->load->view('login');
		
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	
	
	
}
