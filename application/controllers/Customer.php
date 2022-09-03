<?php 
	class Customer extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('ModelCustomer');
		}
		public function p()
		{
			$p = $this->uri->segment(3);
			$data['judul'] = "Data Customer";
			$data['folder'] = "customer";

			$data['p'] = $p;
			if ($p == "view") {
				$data['val'] = $this->ModelCustomer->views("tb_customer")->result();
				$this->load->view('index',$data);
			}elseif ($p == "input") {
				$id = $this->uri->segment(4);
				if (empty($id)) {
					$data['judul'] = "inpu data customer";
					$data['btn'] = "Simpan";
					$data['url'] = "customer/simpan";

					$qr = $this->ModelCustomer->id()->row_array();
					$kode = $qr['no'];
					$nu = (int) substr($kode, 6,9);
					$nu++;
					$tgl = date('y');
					$data['id'] = "CUS".$tgl.sprintf('%04s',$nu);

					$this->load->view('index', $data);
				}else{
					$data['judul'] = "Edit data customer";
					$data['btn'] = "Edit";
					$data['url'] = "customer/edit";
					$data['val'] = $this->ModelCustomer->all("tb_customer","WHERE id_customer = '$id'");
					$this->load->view("index",$data);
				}
			}
		}
		public function simpan()
		{
			$val = array(
				'id_customer' => $this->input->post('id_customer'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'kota' => $this->input->post('kota'),
				'negara' => $this->input->post('negara')
			);
			$this->ModelCustomer->simpan($val);
			$this->session->set_flashdata('success','Tabel berhasil di perbaharui');
			redirect('customer/p/view');
		}
		public function edit()
		{
			$id = $this->input->post('id_customer');
			$val = array(
				'id_customer' => $id,
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'kota' => $this->input->post('kota'),
				'negara' => $this->input->post('negara')
			);
			$this->ModelCustomer->edit($id,$val);
			$this->session->set_flashdata('success','Tabel berhasil di perbaharui');
			redirect('customer/p/view');
		}
		public function hapus($id)
		{
			$this->ModelCustomer->hapus($id);
			$this->session->set_flashdata('success','Tabel berhasil di perbaharui');
			redirect('customer/p/view');
		}
	}
 ?>