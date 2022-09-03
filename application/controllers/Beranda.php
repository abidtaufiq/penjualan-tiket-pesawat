<?php
    class Beranda extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function p()
        {
            $data['judul'] = "Beranda";
            $data['folder'] = "beranda";
            $data['tb_customer'] = $this->db->get('tb_customer')->num_rows();
            $data['tb_bandara'] = $this->db->get('tb_bandara')->num_rows();
            $data['tb_pesawat'] = $this->db->get('tb_pesawat')->num_rows();
            $data['tb_penerbangan'] = $this->db->get('tb_penerbangan')->num_rows();
            $data['tb_tarif_penerbangan'] = $this->db->get('tb_tarif_penerbangan')->num_rows();
            $data['tb_booking'] = $this->db->get('tb_booking')->num_rows();
            if (empty($p)) {
                $data['p'] = "view";
                $this->load->view('index', $data);
            }else{
                $data['p'] = "view";
                $this->load->view('index', $data);
            }
        }
    }
    
?>