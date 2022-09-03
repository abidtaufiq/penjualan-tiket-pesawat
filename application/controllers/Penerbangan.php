<?php
	class Penerbangan extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('ModelPenerbangan');
		}
		public function p()
		{
			$p = $this->uri->segment(3);
			$data['judul'] = "Data penerbangan";
			$data['folder'] = "penerbangan";

			$data['p'] = $p;
			if ($p == "view") {
				$data['val'] = $this->ModelPenerbangan->penerbangan()->result();
				$this->load->view('index',$data);
			}elseif ($p == "input") {
				$id = $this->uri->segment(4);
				if (empty($id)) {
					$data['judul'] = "inpu data penerbangan";
					$data['btn'] = "Simpan";
					$data['url'] = "penerbangan/simpan";

					$qr = $this->ModelPenerbangan->id()->row_array();
					$kode = $qr['no'];
					$nu = (int) substr($kode, 6,9);
					$nu++;
					$tgl = date('y');
					$data['id'] = "PEN".$tgl.sprintf('%04s',$nu);

					$data['bandara'] = $this->ModelPenerbangan->views("tb_penerbangan")->result();

					$this->load->view('index', $data);
				}else{
					$data['judul'] = "Edit data penerbangan";
					$data['btn'] = "Edit";
					$data['url'] = "penerbangan/edit";
					$data['val'] = $this->ModelPenerbangan->all("tb_penerbangan","WHERE id_penerbangan = '$id'");
					$data['bandara'] = $this->ModelPenerbangan->views("tb_penerbangan")->result();
					$this->load->view("index",$data);
				}
			}
		}
		public function simpan()
		{
			$val = array(
				'id_penerbangan' => $this->input->post('id_penerbangan'),
				'id_bandara' => $this->input->post('id_bandara'),
				'id_pesawat' => $this->input->post('id_pesawat'),
				'tgl_penerbangan' => $this->input->post('tgl_penerbangan'),
				'asal' => $this->input->post('asal'),
				'tujuan' => $this->input->post('tujuan'),
				'jam_berangkat' => $this->input->post('jam_berangkat'),
				'jam_tiba' => $this->input->post('jam_tiba'),
				'bandara_tujuan' => $this->input->post('bandara_tujuan')
			);
			$this->ModelPenerbangan->simpan($val);
			$this->session->set_flashdata('success','Tabel berhasil di perbaharui');
			redirect('penerbangan/p/view');
		}
		public function hapus($id)
		{
			$this->ModelPenerbangan->hapus($id);
			$this->session->set_flashdata('success','Tabel berhasil di perbaharui');
			redirect('penerbangan/p/view');
		}
		public function modalbandara()
		{
			$data['jd'] = "Data Bandara";
			$data['btn'] = $_POST['btn'];
			$data['val'] = $this->ModelPenerbangan->views('tb_bandara')->result();
			$this->load->view('penerbangan/tb_bandara.php',$data);
		}
		public function valbandara()
		{
			$val = $this->ModelPenerbangan->all("tb_bandara","WHERE id_bandara = '$_POST[id]'")->row_array();
			$a = [
					'id_bandara' => $val['id_bandara'],
					'kode' => $val['kode'],
					'nama' => $val['nama'],
					'kota' => $val['kota']
				];
			echo json_encode($a);
		}
		public function modalpesawat()
		{
			$data['jd'] = "Data Pesawat";
			$data['val'] = $this->ModelPenerbangan->views('tb_pesawat')->result();
			$this->load->view('penerbangan/tb_pesawat.php',$data);
		}
		public function valpesawat()
		{
			$val = $this->ModelPenerbangan->all("tb_pesawat","WHERE id_pesawat = '$_POST[id]'")->row_array();
			$a = [
					'id_pesawat' => $val['id_pesawat'],
					'tipe' => $val['tipe_pesawat'],
					'ekonomi' => $val['jml_kursi_ekonomi'],
					'bisnis' => $val['jml_kursi_bisnis']
				];
			echo json_encode($a);
		}
	}
 ?>