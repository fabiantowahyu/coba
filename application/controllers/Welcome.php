<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
                
                
            
		$this->load->view('view_page');
	}
        
        public function getAllData(){
            $content="";
            $sql = " CALL getAllDataKaryawan";
            
            $result =  $this->db->query($sql)->result();
            
            //var_dump($result);die();
            $content.= "<table class='table table-stripped table-bordered'>
                            <thead>
                                <tr>
                                    <th>Nama Depan</th>
                                    <th>Nama Belakang</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
            
            
            foreach ($result as $row ) {
               
                
                 $content.="<tr><td>$row->nama_depan</td>
                                    <td>$row->nama_belakang</td>
                                    <td>$row->alamat</td><tr>";
                
               
            }
            
            
           $content.=" </tbody></table>";
           
            echo json_encode($content);
        }
        
        
        
        
        public function saveData(){
            
          $procedure =" 
            CREATE PROCEDURE insertUser(IN firstName varchar(250), lastName varchar(250))  
                BEGIN  
                INSERT INTO data_karyawan(nama_depan, nama_belakang) VALUES (firstName, lastName);   
                END;  
            ";
          
         $this->db->query($procedure);
         
         
         $namadepan =$this->input->post('namadepan');
         $namabelakang =$this->input->post('namabelakang');
            
         $res = $this->db->query("CALL insertUser($namadepan,$namabelakang)");
//            $data = array(
//                'nama_depan'=> $this->input->post('namadepan'),
//                 'nama_belakang'=> $this->input->post('namabelakang'),
//            );
//           
//            
//            $res = $this->db->insert('data_karyawan',$data);
            
            
            
            
            
            echo json_encode($res);
        }
       
}
