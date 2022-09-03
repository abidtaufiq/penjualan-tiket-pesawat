<?php
	class Booking extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('ModelBooking');
		}
		public function p()
		{
			$p = $this->uri->segment(3);
			$data['judul'] = "Data booking";
			$data['folder'] = "booking";

			$data['p'] = $p;
			if ($p == "view") {
				$data['val'] = $this->ModelBooking->booking()->result();
				$this->load->view('index',$data);
			}elseif ($p == "input") {
				$id = $this->uri->segment(4);
				$data['judul'] = "input data booking";
				$data['btn'] = "Simpan";
				$data['url'] = "booking/simpan";

				$qr = $this->ModelBooking->id()->row_array();
				$kode = $qr['no'];
				$nu = (int) substr($kode, 6,9);
				$nu++;
				$tgl = date('y');
				$data['id'] = "BOO".$tgl.sprintf('%04s',$nu);

				$now = date('Y-m-d');
				$asal = $this->input->post('kotaAsal');
				$tujuan = $this->input->post('kotaTujuan');
				if (empty($asal)) {
					$data['valjadwal'] = $this->ModelBooking->jadwal("WHERE tb_penerbangan.tgl_penerbangan = '$now'")->result();
				}else{
					$data['valjadwal'] = $this->ModelBooking->jadwal("WHERE tb_penerbangan.asal = '$asal' AND tb_penerbangan.tujuan LIKE '%$tujuan%' AND tb_penerbangan.tgl_penerbangan = '$now'")->result();
				}
				$data['bandara'] = $this->ModelBooking->views("tb_booking")->result();

				$this->load->view("index",$data);
			}elseif ($p == "passenger") {
				$data['judul'] = "input data passenger";
				$data['btn'] = "Simpan";
				$data['url'] = "booking/savePassenger";
				$this->load->view("index",$data);
			}elseif ($p == "tiket") {
				$data['judul'] = "Cetak Tiket";
				$id = $this->uri->segment(4);
				$data['val'] = $this->ModelBooking->tiket($id)->result();
				$this->load->view("booking/tiket",$data);
			}
		}
		public function simpan()
		{
			if ($this->input->post("id_customer") == null) {
				// Tb Booking
				$val = array(
					'id_booking' => $this->input->post('id_booking'),
					'id_customer' => '',
					'tgl_booking' => $this->input->post('tgl_booking'),
					'jumlah_penumpang' => $this->input->post('jumlah_penumpang'),
					'total_tarif' => $this->input->post('total_tarif'),
					'status_bayar' => $this->input->post('status_bayar')
				);
				$this->ModelBooking->simpan("tb_booking",$val);
				// Detail Booking
				$val = array(
					'id_tarif' => $this->input->post('id_tarif'),
					'id_booking' => $this->input->post('id_booking')
				);
				$this->ModelBooking->simpan("tb_dtl_booking",$val);
				//Validasi Kursi
				$id_pesawat = $this->input->post('id_pesawat');
				$kursi = $this->input->post('jumlah_penumpang');

				if ($this->input->post("kelas") == "Ekonomi") {
					$this->ModelBooking->kurangKursi("jml_kursi_ekonomi",$kursi,$id_pesawat);
				}elseif ($this->input->post("kelas") == "Bisnis") {
					$this->ModelBooking->kurangKursi("jml_kursi_bisnis",$kursi,$id_pesawat);
				}
				// Passenger
				$dtl_booking = $this->ModelBooking->find_id_dtl_booking($this->input->post('id_booking'))->row_array();
				$a = [
					'kelas' => $this->input->post('kelas'),
					'jumlah_penumpang' => $this->input->post('jumlah_penumpang'),
					'id_detail' => $dtl_booking['id_detail']
				];
				$this->session->set_userdata($a);
				redirect('booking/p/passenger');
			}else{
				// Tb Booking
				$val = array(
					'id_booking' => $this->input->post('id_booking'),
					'id_customer' => $this->input->post('id_customer'),
					'tgl_booking' => $this->input->post('tgl_booking'),
					'jumlah_penumpang' => $this->input->post('jumlah_penumpang'),
					'total_tarif' => $this->input->post('total_tarif'),
					'status_bayar' => $this->input->post('status_bayar')
				);
				$this->ModelBooking->simpan("tb_booking",$val);

				// Detail Booking
				$val = array(
					'id_tarif' => $this->input->post('id_tarif'),
					'id_booking' => $this->input->post('id_booking')
				);
				$this->ModelBooking->simpan("tb_dtl_booking",$val);

				//Validasi Kursi
				$id_pesawat = $this->input->post('id_pesawat');
				$kursi = $this->input->post('jumlah_penumpang');

				if ($this->input->post("kelas") == "Ekonomi") {
					$this->ModelBooking->kurangKursi("jml_kursi_ekonomi",$kursi,$id_pesawat);
				}elseif ($this->input->post("kelas") == "Bisnis") {
					$this->ModelBooking->kurangKursi("jml_kursi_bisnis",$kursi,$id_pesawat);
				}

				// Passenger
				$dtl_booking = $this->ModelBooking->find_id_dtl_booking($this->input->post('id_booking'))->row_array();
				$a = [
					'kelas' => $this->input->post('kelas'),
					'jumlah_penumpang' => $this->input->post('jumlah_penumpang'),
					'id_detail' => $dtl_booking['id_detail']
				];
				$this->session->set_userdata($a);

				redirect('booking/p/passenger');
			}
		}
		public function savePassenger()
		{
			$kursi = count($this->input->post('no_kursi'));
			for ($i=0; $i < $kursi ; $i++) {
				$val[] = [
					'id_detail' => $this->input->post('id_dtl_booking')[$i],
					'nama' => $this->input->post('nama')[$i],
					'no_kursi' => $this->input->post('no_kursi')[$i]
				];
			}
			$this->db->insert_batch("tb_passenger",$val);
			
			$id = $this->input->post('id_detail');
			$this->session->set_flashdata('success','Tabel berhasil di perbaharui');
			redirect('booking/p/tiket/'.$id);
		}
		public function hapus($id,$id_detail,$kelas,$kursi,$id_pesawat)
		{
			$this->ModelBooking->hapus("tb_booking","id_booking",$id);
			$this->ModelBooking->hapus("tb_dtl_booking","id_booking",$id);
			$this->ModelBooking->hapus("tb_passenger","id_detail",$id_detail);
			//Validasi Kursi
			if ($kelas == "Ekonomi") {
				$this->ModelBooking->tambahKursi("jml_kursi_ekonomi",$kursi,$id_pesawat);
			}elseif ($kelas == "Bisnis") {
				$this->ModelBooking->tambahKursi("jml_kursi_bisnis",$kursi,$id_pesawat);
			}
			$this->session->set_flashdata('success','Tabel berhasil di perbaharui');
			redirect('booking/p/view');
		}
		public function datajadwal()
		{
			$valp = $this->ModelBooking->all("tb_penerbangan","WHERE id_penerbangan = '$_POST[id_penerbangan]'")->row_array();

			$valt = $this->ModelBooking->all("tb_tarif_penerbangan","WHERE id_tarif = '$_POST[id_tarif]'")->row_array();

			$a = [
					'id_penerbangan' => $valp['id_penerbangan'],
					'tgl_penerbangan' => $valp['tgl_penerbangan'],
					'asal' => $valp['asal'],
					'tujuan' => $valp['tujuan'],
					'jam_berangkat' => $valp['jam_berangkat'],
					'jam_tiba' => $valp['jam_tiba'],
					'bandara_tujuan' => $valp['bandara_tujuan'],
					'id_pesawat' => $valp['id_pesawat'],

					'id_tarif' => $valt['id_tarif'],
					'kelas' => $valt['kelas'],
					'tarif' => $valt['tarif']

				];
			echo json_encode($a);
		}
		public function modalcustomer()
		{
			$data['jd'] = "Data Customer";
			$data['val'] = $this->ModelBooking->views('tb_customer')->result();
			$this->load->view('booking/tb_customer.php',$data);
		}
		public function valcustomer()
		{
			$val = $this->ModelBooking->all("tb_customer","WHERE id_customer = '$_POST[id]'")->row_array();
			$a = [
					'id_customer' => $val['id_customer'],
					'nama' => $val['nama'],
					'email' => $val['email'],
					'kota' => $val['kota'],
					'negara' => $val['negara']
				];
			echo json_encode($a);
		}
	}
 ?>