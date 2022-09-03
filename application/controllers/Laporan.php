<?php

class Laporan extends CI_COntroller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('ModelLaporan');
	}
	public function p()
	{
		$p = $this->uri->segment(3);
		$data['judul'] = "Laporan Booking";
		$data['folder'] = "laporan";

		$data['p'] = $p;
		if ($p == "view") {
			$this->load->view('index',$data);
		}
	}
	public function bulan()
	{
		$bulan = $this->input->post("bulan");
		$tahun = $this->input->post("tahun");
		$data['bln'] = $bulan;
		$data['thn'] = $tahun;
		$data['judul'] = "Bulan";
		$data['val'] = $this->ModelLaporan->bulan($bulan,$tahun)->result();
		$this->load->view('laporan/cetak',$data);
	}

	public function taggal()
	{
		$tgl1 = $this->input->post("tgl1");
		$tgl2 = $this->input->post("tgl2");
		$data['tgl1'] = $tgl1;
		$data['tgl2'] = $tgl2;
		$data['judul'] = "Tanggal";
		$data['val'] = $this->ModelLaporan->tgl($tgl1,$tgl2)->result();
		$this->load->view('laporan/cetak',$data);
	}
}
 ?>