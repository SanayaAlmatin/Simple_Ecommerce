<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller{

    function __construct()
    {
        parent::__construct();

        //jika session belum ada maka tidak bisa akses menu
        if(!$this->session->userdata("id_admin")){
            redirect('/','refresh');
        }
    }

    public function index(){

        $this->load->model('Mtransaksi');
        $data['transaksi'] = $this->Mtransaksi->tampil();
        $this->load->view('header');
        $this->load->view('transaksi_tampil', $data);
        $this->load->view('footer');
    }

    function detail($id_transaksi){
        //Penggil model transaksi
        $this->load->model('Mtransaksi');
        //Panggil fungsi detail transaksi
        $data["transaksi"] = $this->Mtransaksi->detail($id_transaksi);
        //Panggil fungsi transaksi_detail
        $data["transaksi_detail"] = $this->Mtransaksi->transaksi_detail($id_transaksi);


        $this->load->view('header');
        $this->load->view('transaksi_detail', $data);
        $this->load->view('footer');
    }
}