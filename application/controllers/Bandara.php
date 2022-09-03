<?php 
	class Bandara extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('ModelBandara');
		}
		public function p()
		{
			$p = $this->uri->segment(3);
			$data['judul'] = "Data Bandara";
			$data['folder'] = "Bandara";

			$data['p'] = $p;
			if ($p == "view") {
				$data['val'] = $this->ModelBandara->views("tb_bandara")->result();
				$this->load->view('index',$data);
			}elseif ($p == "input") {
				$id = $this->uri->segment(4);
				if (empty($id)) {
					$data['judul'] = "Inpu Data Bandara";
					$data['btn'] = "Simpan";
					$data['url'] = "bandara/simpan";

					$qr = $this->ModelBandara->id()->row_array();
					$kode = $qr['no'];
					$nu = (int) substr($kode, 6,9);
					$nu++;
					$tgl = date('y');
					$data['id'] = "BAN".$tgl.sprintf('%04s',$nu);

					$this->load->view('index', $data);
				}else{
					$data['judul'] = "Edit Data Bandara";
					$data['btn'] = "Edit";
					$data['url'] = "bandara/edit";
					$data['val'] = $this->ModelBandara->all("tb_bandara","WHERE id_bandara = '$id'");
					$this->load->view("index",$data);
				}
			}
		}
		public function simpan()
		{
			$val = array(
				'id_bandara' => $this->input->post('id_bandara'),
				'kode' => $this->input->post('kode'),
				'nama' => $this->input->post('nama'),
				'kota' => $this->input->post('kota')
			);
			$this->ModelBandara->simpan($val);
			$this->session->set_flashdata('success','Tabel berhasil di perbaharui');
			redirect('bandara/p/view');
		}
		public function edit()
		{
			$id = $this->input->post('id_bandara');
			$val = array(
				'id_bandara' => $id,
				'kode' => $this->input->post('kode'),
				'nama' => $this->input->post('nama'),
				'kota' => $this->input->post('kota')
			);
			$this->ModelBandara->edit($id,$val);
			$this->session->set_flashdata('success','Tabel berhasil di perbaharui');
			redirect('bandara/p/view');
		}
		public function hapus($id)
		{
			$this->ModelBandara->hapus($id);
			$this->session->set_flashdata('success','Tabel berhasil di perbaharui');
			redirect('bandara/p/view');
		}
	}
 ?>