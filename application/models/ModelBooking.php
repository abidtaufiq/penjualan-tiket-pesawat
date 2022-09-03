<?php 
	class ModelBooking extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		public function all($tb,$prop)
		{
			return $this->db->query("SELECT * FROM $tb $prop");
		}
		public function views($tb)
		{
			return $this->db->get($tb);
		}
		public function simpan($tb,$val)
		{
			return $this->db->insert($tb,$val);
		}
		public function kurangKursi($filed,$kursi,$id)
		{
			$sql = "UPDATE tb_pesawat SET $filed=$filed-$kursi WHERE id_pesawat= '$id' ";
			return $this->db->query($sql);
		}
		public function tambahKursi($filed,$kursi,$id)
		{
			$sql = "UPDATE tb_pesawat SET $filed=$filed+$kursi WHERE id_pesawat= '$id' ";
			return $this->db->query($sql);
		}
		public function hapus($tb,$id,$prop)
		{
			$this->db->where($id,$prop);
			return $this->db->delete($tb);
		}
		public function id()
		{
			return $this->db->query("SELECT max(id_booking) as no FROM tb_booking");
		}
		public function booking()
		{
			return $this->db->query("
					SELECT tb_booking.id_booking, tgl_booking, jumlah_penumpang, total_tarif,status_bayar,id_detail,kelas,id_pesawat	 -- tb_customer.id_customer,(tb_customer.nama) as customer
					FROM tb_booking
					INNER JOIN tb_dtl_booking ON tb_booking.id_booking=tb_dtl_booking.id_booking
					INNER JOIN tb_tarif_penerbangan ON tb_dtl_booking.id_tarif=tb_tarif_penerbangan.id_tarif
					INNER JOIN tb_penerbangan ON tb_tarif_penerbangan.id_penerbangan=tb_penerbangan.id_penerbangan
					-- INNER JOIN tb_customer ON tb_booking.id_customer=tb_customer.id_customer
				");
		}
		public function jadwal($prop)
		{
			$q = $this->db->query("
				SELECT tb_penerbangan.id_penerbangan,tb_pesawat.id_pesawat,tgl_penerbangan,asal,tujuan,jam_berangkat,jam_tiba,kota,(tb_bandara.nama) as bandara,tipe_pesawat,jml_kursi_ekonomi,jml_kursi_bisnis,id_tarif,kelas,tarif
				FROM tb_penerbangan
				INNER JOIN tb_bandara ON tb_penerbangan.id_bandara=tb_bandara.id_bandara
				INNER JOIN tb_pesawat on tb_penerbangan.id_pesawat=tb_pesawat.id_pesawat
				INNER JOIN tb_tarif_penerbangan ON tb_penerbangan.id_penerbangan=tb_tarif_penerbangan.id_penerbangan
				$prop
				");
			return $q;
		}
		public function find_id_dtl_booking($id)
		{
			return $this->db->query("
					SELECT id_detail FROM tb_dtl_booking WHERE id_booking = '$id'
				");
		}
		public function tiket($id)
		{
			$sql = "SELECT * FROM tb_passenger
					INNER JOIN tb_dtl_booking ON tb_passenger.id_detail=tb_dtl_booking.id_detail
					INNER JOIN tb_booking ON tb_dtl_booking.id_booking=tb_booking.id_booking
					INNER JOIN tb_tarif_penerbangan ON tb_dtl_booking.id_tarif=tb_tarif_penerbangan.id_tarif
					INNER JOIN tb_penerbangan ON tb_tarif_penerbangan.id_penerbangan=tb_penerbangan.id_penerbangan
					WHERE tb_dtl_booking.id_detail='$id'
				";
			return $this->db->query($sql);
		}
	}
 ?>