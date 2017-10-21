<?php 
class data extends CI_Model
{
	function read($table){
            return $this->db->get($table);
	}

	function readWhere($table, $id, $where){
            return $this->db->get_where($table, array($where => $id));
	}

	function selectLapangan(){
            return $this->db->query('SELECT `id_lapangan`, `nama_lapangan`, `detail_lapangan`, `tarif_mahasiswa`, `tarif_nonits`, `gambar_lapangan` FROM `lapangan` WHERE 1'
            );
	}

	function selectJadwal(){
            return $this->db->query('SELECT `no`, `nama`, `kategori`, `nomer_identitas`, `nama_lapangan`, `tanggal`, `jam`, `lama_sewa`, `status` FROM `jadwal` WHERE 1'
            );
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
        function deleteUser($item){  
		$this->db->where_in('id_user', $item);  
		$res = $this->db->delete('user'); 
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
    function getNumRow($no,$nama, $kategori, $nomer_identitas, $nama_lapangan, $tanggal, $jam, $lama_sewa){
        $this->db->where('no',$no);
        $this->db->where('nama',$nama);
        $this->db->where('kategori',$kategori);
        $this->db->where('nomer_identitas',$nomer_identitas);
        $this->db->where('tanggal',$tanggal);
        $this->db->where('jam',$jam);
        $this->db->where('lama_sewa',$lama_sewa);
        
        $query = $this->db->get('jadwal');
        return $query->num_rows();
        
        
    }
}
 ?>