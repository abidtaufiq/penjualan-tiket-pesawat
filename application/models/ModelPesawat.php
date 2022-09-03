<?php 
	class ModelPesawat extends CI_Model
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
			return $this->db->insert("tb_pesawat",$val);
		}
		public function edit($id,$val)
		{
			$this->db->where("id_pesawat",$id);
			return $this->db->update("tb_pesawat",$val);
		}
		public function hapus($id)
		{
			$this->db->where("id_pesawat",$id);
			return $this->db->delete("tb_pesawat");
		}
		public function id()
		{
			return $this->db->query("SELECT max(id_pesawat) as no FROM tb_pesawat");
		}
	}
 ?>