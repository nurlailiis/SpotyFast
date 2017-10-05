<?php 
class data extends CI_Model
{
	function read($table){
		return $this->db->get($table);
	}

	function readWhere($table, $id, $where){
		return $this->db->get_where($table, array($where => $id));
	}

	function getDataLapangan($where="") {
		$query = $this->db->query('select * from lapangan ' .$where);
		return $query->result_array();
	}
	function selectLapangan(){
		return $this->db->query('SELECT `id_lapangan`, `nama_lapangan`, `detail_lapangan`, `tarif_mahasiswa`, `tarif_nonits`, `gambar_lapangan` FROM `lapangan` WHERE 1'
		);
	}

	function selectJadwal(){
		return $this->db->query('SELECT `no`, `nama`, `kategori`, `nomer_identitas`, `nama_lapangan`, `tanggal`, `jam`, `lama_sewa`, `status` FROM `jadwal` WHERE 1'
		);
	}

	function inputLapangan(){
		return $this->db->query('SELECT `id_lapangan`, `nama_lapangan`, `detail_lapangan`, `tarif_mahasiswa`, `tarif_nonits`, `gambar_lapangan` FROM `lapangan` WHERE 1'
		);
	}

	function readDataAdmin2($where){
		$query = $this->db->query('select * from admin where username_admin ="' .$where.'" ');
		return $query->result_array();
	}

	function login($password){
		$key = $this->config->item('encryption_key');
	    $salt1 = hash('sha512', $key . $password);
	    $salt2 = hash('sha512', $password . $key);
	    return hash('sha512', $salt1 . $password . $salt2);
	}

	function insertData($table, $data){
		return $this->db->insert($table, $data);
	}

	function createJadwal($table, $data){
		$this->db->insert($data, $table);
	}

	public function addData($data) {
		$this->db->insert('user', $data);
	} 

	function readData($where){
		$query = $this->db->query('select * from user where id_user ="' .$where.'" ');
		return $query->result_array();
		//return $this->db->get_where($table, array($id => $where));
	}

	function deleteData($item){  
		$this->db->where_in('no', $item);  
		$res = $this->db->delete('jadwal'); 
		return $res;
	}

	function deleteDataLapangan($item){  
		$this->db->where_in('id_lapangan', $item);  
		$res = $this->db->delete('lapangan'); 
		return $res;
	}

	function updateData($table, $data, $where){
		$res=$this->db->update($table, $data, $where);
		return $res;
	}
}
 ?>