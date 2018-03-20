<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {



        $this->load->view('view_page');
    }

    public function getAllData() {
        $content = "";
        $sql = " CALL getAllDataKaryawan";

        $result = $this->db->query($sql)->result();

        //var_dump($result);die();
        $content .= "<table class='table table-stripped table-bordered'>
                            <thead>
                                <tr>
                                    <th>Nama Depan</th>
                                    <th>Nama Belakang</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";


        foreach ($result as $row) {


            $content .= "<tr><td id='nama_depan$row->id'>$row->nama_depan</td>
                                    <td id='nama_belakang$row->id'>$row->nama_belakang</td>
                                    <td>$row->alamat</td>
                                     <td>
                                     <button onclick='editfunction($row->id)' type='button' class='btn btn-sm btn-warning edit-btn'  >edit</button>
                                     <button onclick='deletefunction($row->id)' type='button' class='btn btn-sm btn-danger delete-btn'  >delete</button>
                                        </td>       
                                     
                         
                         <tr>";
        }


        $content .= " </tbody></table>";

        echo json_encode($content);
    }

    public function saveData() {

//        var_dump($_POST);
//        die();
        $action = $this->input->post('action');


        if ($action != 'edit') {
            $procedure = " 
            CREATE PROCEDURE insertUser(IN firstName varchar(250), lastName varchar(250))  
                BEGIN  
                INSERT INTO data_karyawan(nama_depan, nama_belakang) VALUES (firstName, lastName);   
                END;  
            ";

            $this->db->query($procedure);


            $namadepan = $this->input->post('namadepan');
            $namabelakang = $this->input->post('namabelakang');

            $res = $this->db->query("CALL insertUser($namadepan,$namabelakang)");
//            $data = array(
//                'nama_depan'=> $this->input->post('namadepan'),
//                 'nama_belakang'=> $this->input->post('namabelakang'),
//            );
//           
//            
//            $res = $this->db->insert('data_karyawan',$data);
        } else {

            $procedure = " 
            CREATE PROCEDURE updateUser(id_row int, namadepan varchar(100), namabelakang varchar (200))  
                BEGIN  
                UPDATE data_karyawan set  nama_depan=namadepan, nama_belakang=namabelakang  where id=id_row
                END;   
            ";

            $this->db->query($procedure);


            $namadepan = $this->input->post('namadepan');
            $namabelakang = $this->input->post('namabelakang');
            $id_row = $this->input->post('id_row');

            $res = $this->db->query("CALL updateUser($id_row,$namadepan,$namabelakang)");
        }


        echo json_encode($res);
    }

}
