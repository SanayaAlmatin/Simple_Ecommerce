<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Member extends CI_Controller{

    function __construct()
    {
        parent::__construct();

        //jika session belum ada maka tidak bisa akses menu
        if(!$this->session->userdata("id_admin")){
            redirect('/','refresh');
        }
    }

    public function Index(){
        
        $this->load->model('Mmember');
        $data['member'] = $this->Mmember->tampil();
        $this->load->view('header');
        $this->load->view('member_tampil', $data);
        $this->load->view('footer');
    }
}