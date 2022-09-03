<?php 
	class ModelJadwal extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function sql($prop)
		{
			$sql = "SELECT tb_penerbangan.id_penerbangan,tgl_penerbangan,asal,tujuan,jam_berangkat,jam_tiba,kota,(tb_bandara.nama) as bandara,tipe_pesawat,jml_kursi_ekonomi,jml_kursi_bisnis
				FROM tb_penerbangan
				INNER JOIN tb_bandara ON tb_penerbangan.id_bandara=tb_bandara.id_bandara
				INNER JOIN tb_pesawat on tb_penerbangan.id_pesawat=tb_pesawat.id_pesawat $prop";
			$data = $this->db->query($sql);
			return $data;
		}
	}
 ?>