<?php
class Alumni_model extends CI_Model{

		public function tampil_data($table)
		{
			return $this->db->get($table);
		}

		public function ambil_id_alumni($id)
		{
		$hasil = $this->db->where('id',$id)->get('tb_alumni');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
		}

		public function input_data($data,$table)
		{
			$this->db->insert($table, $data);
		}

		public function edit_data($where,$table)
		{
			return $this->db->get_where($table,$where);
		}

		public function update_data($where,$data,$table)
		{
			$this->db->where($where);
			$this->db->update($table,$data);
		}	
		
		public function hapus_data($where,$table)
		{
			$this->db->where($where);
			return $this->db->delete($table);
		}
	}