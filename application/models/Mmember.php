<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmember extends CI_Model{
    function tampil(){
        $q = $this->db->get('member');
        $d = $q->result_array();
        return $d;
    }
}