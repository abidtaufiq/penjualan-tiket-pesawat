<?php 
	class Sign_in extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function p()
		{
			$data['judul'] = "SignIn";
			$this->load->view("signin/view.php",$data);
		}
		public function proses()
		{
			$user = $this->input->post('user');
			$pass = md5($this->input->post('pass'));
			$row = $this->db->get_where('tb_user',['username'=>$user,'password'=>$pass])->row();
			if ($row == 0) {
		?>
			<script type="text/javascript">
				alert("Anda gagal login!!");
				window.location='p/view';
			</script>
		<?php
			}else{
				$a = [
					'id_user' => $row->id_user,
					'user' => $row->username,
					'level' => $row->level
				];
				$this->session->set_userdata($a);
				$this->session->set_flashdata('success','Selamat Datang '.$row->username);
				redirect(site_url('beranda/p/view'));
			}
		}
		public function signout()
		{
			$a = ['id_user','user','level'];
			$this->session->unset_userdata($a);
			$this->session->set_flashdata('success','Sampai Jumpa');
			redirect(site_url('sign_in/p/view'));
		}
	}
 ?>