<?php 
	class Tarif extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('ModelTarif');
		}
		public function p()
		{
			$p = $this->uri->segment(3);
			$data['judul'] = "Data tarif";
			$data['folder'] = "tarif";

			$data['p'] = $p;
			if ($p == "view") {
				$data['val'] = $this->ModelTarif->views("tb_tarif_penerbangan")->result();
				$this->load->view('index',$data);
			}elseif ($p == "input") {
				$id = $this->uri->segment(4);
				if (empty($id)) {
					$data['judul'] = "inpu data tarif";
					$data['btn'] = "Simpan";
					$data['url'] = "tarif/simpan";

					$qr = $this->ModelTarif->id()->row_array();
					$kode = $qr['no'];
					$nu = (int) substr($kode, 6,9);
					$nu++;
					$tgl = date('y');
					$data['id'] = "TAR".$tgl.sprintf('%04s',$nu);

					$this->load->view('index', $data);
				}else{
					$data['judul'] = "Edit data tarif";
					$data['btn'] = "Edit";
					$data['url'] = "tarif/edit";
					$data['val'] = $this->ModelTarif->all("tb_tarif_penerbangan","WHERE id_tarif = '$id'");
					$this->load->view("index",$data);
				}
			}
		}
		public function simpan()
		{
			$val = array(
				'id_tarif' => $this->input->post('id_tarif'),
				'id_penerbangan' => $this->input->post('id_penerbangan'),
				'kelas' => $this->input->post('kelas'),
				'tarif' => $this->input->post('tarif')
			);
			$this->ModelTarif->simpan($val);
			$this->session->set_flashdata('success','Tabel berhasil di perbaharui');
			redirect('tarif/p/view');
		}
		public function hapus($id)
		{
			$this->ModelTarif->hapus($id);
			$this->session->set_flashdata('success','Tabel berhasil di perbaharui');
			redirect('tarif/p/view');
		}
		public function modalpenerbangan()
		{
			$data['jd'] = "Data Penerbangan";
			$data['val'] = $this->ModelTarif->penerbangan()->result();
			$this->load->view('tarif/tb_penerbangan.php',$data);
		}
		public function valpenerbangan()
		{
			$val = $this->ModelTarif->all("tb_penerbangan","WHERE id_penerbangan = '$_POST[id]'")->row_array();
			$a = [
					'id_penerbangan' => $val['id_penerbangan'],
					'tgl_penerbangan' => $val['tgl_penerbangan'],
					'asal' => $val['asal'],
					'tujuan' => $val['tujuan'],
					'jam_berangkat' => $val['jam_berangkat'],
					'jam_tiba' => $val['jam_tiba']
				];
			echo json_encode($a);
		}
	}
 ?>