<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
                
                
            
		$this->load->view('view_page');
	}
        
        public function getAllData(){
            
            $sql = " CALL getAllDataKaryawan";
            
            $result =  $this->db->query($sql)->result();
            
            var_dump($result);die();
            $content = "";
            
            
            foreach ($result as $key => $value) {
                
                
            }
            
        }
}
