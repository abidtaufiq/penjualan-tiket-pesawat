<?php 
	class ModelBandara extends CI_Model
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
		public function simpan($val)
		{
			return $this->db->insert("tb_bandara",$val);
		}
		public function edit($id,$val)
		{
			$this->db->where("id_bandara",$id);
			return $this->db->update("tb_bandara",$val);
		}
		public function hapus($id)
		{
			$this->db->where("id_bandara",$id);
			return $this->db->delete("tb_bandara");
		}
		public function id()
		{
			return $this->db->query("SELECT max(id_bandara) as no FROM tb_bandara");
		}
	}
 ?>