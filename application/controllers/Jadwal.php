<?php 

	class Jadwal extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model("ModelJadwal");
		}
		public function index()
		{
			$now = date('Y-m-d');
			$tgl_penerbangan = $this->input->post('tgl');
			$asal = $this->input->post('kotaAsal');
			$tujuan = $this->input->post('kotaTujuan');
			if (empty($asal)) {
				$data['val'] = $this->ModelJadwal->sql("WHERE tb_penerbangan.tgl_penerbangan = '$now'")->result();
				$this->load->view('jadwal/index',$data);
			}else{
				$data['val'] = $this->ModelJadwal->sql("WHERE tb_penerbangan.asal = '$asal' AND tb_penerbangan.tujuan LIKE '%$tujuan%' AND tb_penerbangan.tgl_penerbangan = '$tgl_penerbangan'")->result();
				$this->load->view('jadwal/index',$data);
			}
		}
		public function p()
		{
			$data['judul'] = "Data Jadwal";
			$data['folder'] = "jadwal";
			$data['p'] = "view";
			$data['val'] = $this->ModelJadwal->sql("")->result();
			$this->load->view('index',$data);
		}
	}
 ?>