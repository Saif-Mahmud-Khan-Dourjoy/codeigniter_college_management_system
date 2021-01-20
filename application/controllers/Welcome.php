<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{   
		$chkAdminExist=$this->Queries->chkAdminExist();
		$this->load->view('home',['chkAdminExist'=>$chkAdminExist]);
	}
	public function adminRegister()
	{

		 			
		$roles=$this->Queries->getrole();
		$this->load->view('adminRegister',['roles'=>$roles]);
	}
	

	public function adminSignup(){

		$this->form_validation->set_rules('username','User Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('gender','Gender','trim|required');
		$this->form_validation->set_rules('role_id','Role','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('confpass','Password Again','trim|required');
		//$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if($this->form_validation->run()){
			$data= $this->input->post();
		    $data['password']= md5($this->input->post('password'));
		    $data['confpass']= md5($this->input->post('confpass'));
		    // echo "<pre>";
		    // print_r($data);
		    // exit();
		   if($this->Queries->registerAdmin($data)){
            	$this->session->set_flashdata('message','Admin Registerd Successfully');
                redirect('Welcome');
             }else{
			    $this->session->set_flashdata('message','Admin Not Registerd ');
                redirect('Welcome/adminRegister');
		   }

		}else{
			$this->adminRegister();
		}
	}

	public function adminLogin(){
       
       $this->load->view('adminLogin');
		
	}

	public function adminSignIn(){
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if($this->form_validation->run()){
			$email= $this->input->post('email');
		    $password = md5($this->input->post('password'));

		    $adminExist = $this->Queries->AdminExist($email,$password);
		    if($adminExist){
              $sessionData=[
                      'user_id'=> $adminExist->user_id,
                      'username'=> $adminExist->username,
                      'email'=> $adminExist->email,
                      'role_id'=> $adminExist->role_id,

              ];

              $this->session->set_userdata($sessionData);
                return redirect ('Admin/dashboard');

             }else{
			    $this->session->set_flashdata('message','Admin Not Registerd ');
                return redirect('Welcome/adminLogin');
		   }

		}else{
			$this->adminLogin();
		}
	}
}

