<?php
class Mkategori extends CI_Model {
    function tampil(){
        $query = $this->db->get("kategori");
        $d = $query->result_array();
        return $d;
    }

    function simpan($inputan){
        $config['upload_path'] = './assets/kategori/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        //Sesi upload foto
        $ngupload = $this->upload->do_upload("foto_kategori");
        //Jika upload, kemudian dapatkan nama fotonya untuk ditampung ke db
        if($ngupload){
            $inputan['foto_kategori'] = $this->upload->data("file_name");
        }
        //query simpan 
        $this->db->insert('kategori', $inputan);
    }

    function hapus($id_kategori){
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
    }

    function detail($id_kategori){
        $this->db->where('id_kategori', $id_kategori);
        $query_select = $this->db->get('kategori');
        $output = $query_select->row_array();

        return $output;
    }

    function edit($inputan, $id_kategori){
        //Urusi foto kategori
        $config['upload_path'] = './assets/kategori/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);

        //Sesi upload foto
        $ngupload = $this->upload->do_upload("foto_kategori");

        //Jika upload, kemudian dapatkan nama fotonya untuk ditampung ke db
        if($ngupload){
            $inputan['foto_kategori'] = $this->upload->data("file_name");
        }

        //query simpan 
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $inputan);
    }
}