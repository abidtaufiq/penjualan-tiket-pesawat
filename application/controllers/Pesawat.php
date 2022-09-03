<?php 
	class Pesawat extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('ModelPesawat');
		}
		public function p()
		{
			$p = $this->uri->segment(3);
			$data['judul'] = "Data pesawat";
			$data['folder'] = "pesawat";

			$data['p'] = $p;
			if ($p == "view") {
				$data['val'] = $this->ModelPesawat->views("tb_pesawat")->result();
				$this->load->view('index',$data);
			}elseif ($p == "input") {
				$id = $this->uri->segment(4);
				if (empty($id)) {
					$data['judul'] = "Inpu Data pesawat";
					$data['btn'] = "Simpan";
					$data['url'] = "pesawat/simpan";

					$qr = $this->ModelPesawat->id()->row_array();
					$kode = $qr['no'];
					$nu = (int) substr($kode, 6,9);
					$nu++;
					$tgl = date('y');
					$data['id'] = "PES".$tgl.sprintf('%04s',$nu);

					$this->load->view('index', $data);
				}else{
					$data['judul'] = "Edit Data pesawat";
					$data['btn'] = "Edit";
					$data['url'] = "pesawat/edit";
					$data['val'] = $this->ModelPesawat->all("tb_pesawat","WHERE id_pesawat = '$id'");
					$this->load->view("index",$data);
				}
			}
		}
		public function simpan()
		{
			$val = array(
				'id_pesawat' => $this->input->post('id_pesawat'),
				'tipe_pesawat' => $this->input->post('tipe_pesawat'),
				'jml_kursi_ekonomi' => $this->input->post('jml_kursi_ekonomi'),
				'jml_kursi_bisnis' => $this->input->post('jml_kursi_bisnis')
			);
			$this->ModelPesawat->simpan($val);
			$this->session->set_flashdata('success','Tabel berhasil di perbaharui');
			redirect('pesawat/p/view');

		}
		public function edit()
		{
			$id = $this->input->post('id_pesawat');
			$val = array(
				'id_pesawat' => $id,
				'tipe_pesawat' => $this->input->post('tipe_pesawat'),
				'jml_kursi_ekonomi' => $this->input->post('jml_kursi_ekonomi'),
				'jml_kursi_bisnis' => $this->input->post('jml_kursi_bisnis')
			);
			$this->ModelPesawat->edit($id,$val);
			$this->session->set_flashdata('success','Tabel berhasil di perbaharui');
			redirect('pesawat/p/view');
		}
		public function hapus($id)
		{
			$this->ModelPesawat->hapus($id);
			$this->session->set_flashdata('success','Tabel berhasil di perbaharui');
			redirect('pesawat/p/view');
		}
	}
 ?>