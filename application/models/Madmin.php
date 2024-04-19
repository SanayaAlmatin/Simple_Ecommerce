<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model{

    function login($inputan){
        $username = $inputan['username'];
        $password = $inputan['password'];
        $password = sha1($password);

        //cek database
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('admin');
        $cekadmin = $query->row_array();

        //Jika data ada
        if(!empty($cekadmin)){
            //Membuat tiket
            $this->session->set_userdata("id_admin", $cekadmin["id_admin"]);
            $this->session->set_userdata("username", $cekadmin["username"]);
            $this->session->set_userdata("nama", $cekadmin["nama"]);
            return "ada";
        }else{
            return "data kosong";
        }
    }

    function ubah($inputan, $id_admin){

        //jika password tidak kosong maka lakukan enkripsi
        if(!empty($inputan["password"])){
            $inputan['password'] = sha1($inputan['password']);
        }else {
            unset($inputan['password']);
        }

        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin', $inputan);

        //jika akun diubah maka tiket session harus buat baru
        $this->db->where('id_admin',$id_admin);
        $query = $this->db->get('admin');
        $cekadmin = $query->row_array();

        //buat tiket baru
        $this->session->set_userdata("id_admin", $cekadmin["id_admin"]);
        $this->session->set_userdata("username", $cekadmin["username"]);
        $this->session->set_userdata("nama", $cekadmin["nama"]);
    }

}

?>