<?php
defined('BASPATH') OR exit("No direct script access allowed");

class Logout extends CI_Controller{

    public function index(){
        //hancurkan session yang dibuat saat login
        $this->session->unset_userdata("id_admin");
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("nama");

        //redirect ke halaman login
        redirect('/', 'refresh');
    }
}
