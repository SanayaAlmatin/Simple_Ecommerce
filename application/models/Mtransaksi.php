<?php
class Mtransaksi extends CI_Model{
    function tampil(){
        $q = $this->db->get('transaksi');
        $d = $q->result_array();

        return $d;
    }

    function detail($id_transaksi){
        $this->db->where("id_transaksi", $id_transaksi);
        $query = $this->db->get("transaksi");
        $data = $query->row_array();
        return $data;
    }

    function transaksi_detail($id_transaksi){
        $this->db->where("id_transaksi", $id_transaksi);
        $query = $this->db->get('transaksi_detail');
        $data = $query->result_array;

        return $data;
    }
}