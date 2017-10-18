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
        
        function readDataAdmin2($where){
                $username = strtolower($where);
                $query = $this->db->get_where('admin', [ 'username_admin' => $username ]);
                return $query->row();
        }
        
	public function enkripsi($password){
            $key = $this->config->item('encryption_key');
	    $salt1 = hash('sha1', $key . $password);
	    $salt2 = hash('sha1', $password . $key);
	    return hash('sha1', $salt1 . $password . $salt2);	
	}
	function insertData($table, $data){
		$this->db->insert($table, $data );
	}

	function createJadwal($table, $data){
		$this->db->insert($data, $table);
	}

	public function addData($data) {
		return $this->db->insert('user', $data);
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
	function get_lapangan(){
		$this->db->select('*');
 		$this->db->from('lapangan');
 		$query = $this->db->get();
 		return $query->result();
    }
}
 ?>