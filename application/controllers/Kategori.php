<?php 
class Kategori extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        //jika session belum ada maka tidak bisa akses menu
        if(!$this->session->userdata("id_admin")){
            redirect('/','refresh');
        }
    }

    function index(){
        //panggil model kategori
        $this->load->model("Mkategori");
        $data["kategori"] = $this->Mkategori->tampil();

        $this->load->view("header");
        $this->load->view("kategori_tampil", $data);
        $this->load->view("footer");
    }

    function tambah(){

        //Dapatkan file yang diinput
        $inputan = $this->input->post();

        //Jika terdapat inputan
        if($inputan){
            //Panggil model kategori
            $this->load->model('Mkategori');
            
            //Jalankan fungsi simpan
            $this->Mkategori->simpan($inputan);

            print_r($_FILES);
            //Tampilkan pesan dilayar
            $this->session->set_flashdata('pesan_sukses', 'Data kategori baru disimpan');
            
            //Kembalikan ke halaman kategori
            redirect('kategori','refresh');
            
        }
        $this->load->view('header');
        $this->load->view('kategori_tambah');
        $this->load->view('footer');
    }

    function hapus($id_kategori){

        echo $id_kategori;
        
        //memanggil model
       $this->load->model('Mkategori');

       //jalankan fungsi hapus
       $this->Mkategori->hapus($id_kategori);

       //berikan pesan 
       $this->session->set_flashdata('pesan sukses', 'Data Kategori Berhasil Dihapus');

       //redirect ke halaman kategori
       redirect('kategori', 'refresh');
    }

    function edit($id_kategori){

        //Tampilkan kategori lama
        $this->load->model("Mkategori");
        $data['kategori'] = $this->Mkategori->detail($id_kategori);

        //Perbarui Data
        $inputan = $this->input->post();

        //Jika ada inputan data
        if ($inputan){
            //Jalankan fungsi edit
            $this->Mkategori->edit($inputan, $id_kategori);
            //Tampilkan pesan
            $this->session->set_flashdata('pesan_sukses', 'kategori telah diperbaharui');
            //Redirect
            redirect('kategori', 'refresh');
        }

        $this->load->view("header");
        $this->load->view("kategori_edit", $data);
        $this->load->view("footer");
    }
}