<?php 
    defined('BASEPATH') OR exit('No direct script access allowed'); 
    
    class Akun extends CI_Controller{

        function __construct()
        {
            parent::__construct();
    
            //jika session belum ada maka tidak bisa akses menu
            if(!$this->session->userdata("id_admin")) {
                redirect('/','refresh');
            }
        }
        
        public function index(){

            $inputan = $this->input->post();
            if($inputan){
                $this->load->model('Madmin');
                $id_admin = $this->session->userdata("id_admin");
                $this->Madmin->ubah($inputan,$id_admin);

                $this->session->set_flashdata('pesan sukses', 'akun telah diubah');
                redirect('home','refresh');
            }
            $this->load->view('header');
            $this->load->view('akun');
            $this->load->view('footer');
        }
    }
?>