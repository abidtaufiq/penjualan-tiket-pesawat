<?php 
	class ModelLaporan extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function bulan($bln,$thn)
		{
			$sql = "SELECT * FROM tb_booking WHERE month(tgl_booking) = '$bln' AND year(tgl_booking) = '$thn'";
			return $this->db->query($sql);
		}
		public function tgl($tgl1,$tgl2)
		{
			$sql = "SELECT * FROM tb_booking WHERE tgl_booking  BETWEEN '$tgl1' AND '$tgl2'";
			return $this->db->query($sql);
		}
	}
 ?>