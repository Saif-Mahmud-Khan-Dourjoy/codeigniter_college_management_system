<?php 
/**
 * 
 */
class Queries extends CI_Model
{

	public function getrole(){


     $roles=$this->db->get('tbl_role');
     if($roles->num_rows()>0){

     	return $roles->result();
     }
     // not necessary
     else{
       
     $this->session->set_flashdata('get_role_error','Something Went Worng');
     redirect('Welcome/adminRegister');
     }
     //------
	}

	public function registerAdmin($data){
		return $this->db->insert('tbl_users',$data); //return 1 or 0;
	}

	public function chkAdminExist(){

		$chkAdmin=$this->db->WHERE(['role_id'=>'1'])
		                   ->get('tbl_users');
		if($chkAdmin -> num_rows()>0){
			return $chkAdmin -> num_rows();
		}                  
	}   

	public function AdminExist($email,$password){
        $this->db->where('email',$email);
		$this->db->where('password',$password);
		$result = $this->db->get('tbl_users');
		if ($result->num_rows()>0) {
			 return $result->row();	
		}
        else{
        	 $this->session->set_flashdata('get_role_error','Invalid Information');
             redirect('Welcome/adminLogin');
        }                    

	}  


}




 ?>