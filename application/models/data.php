<?php 
class data extends CI_Model
{
	function read($table){
            return $this->db->get($table);
	}

	function readWhere($table, $id, $where){
            return $this->db->get_where($table, array($where => $id));
	}

	function readWhere2($type, $admin){
        $this->db->select('*');
		$this->db->from('lapangan');
		$this->db->where('type', $type);
		$this->db->where('pemilik', $admin);
		$query = $this->db->get();
		return $query;
	}

	function getDataKompetisi($where="") {
		$query = $this->db->query('select * from kompetisi ' .$where);
		return $query->result_array();
	}

	function selectLapangan($admin){
        $this->db->select('*');
		$this->db->from('lapangan');
		$this->db->where('pemilik', $admin);
		$query = $this->db->get();
		return $query;
	}

	function selectLapangan1(){
        $this->db->select('*');
		$this->db->from('lapangan');
		$query = $this->db->get();
		return $query;
	}

	function selectLapanganSewa($type){
        $this->db->select('*');
		$this->db->from('lapangan');
		$this->db->where('type', $type);
		$query = $this->db->get();
		return $query;
	}

	function selectKompetisi(){
            return $this->db->query('SELECT `id_kompetisi`, `nama_kompetisi`, `tanggal_kompetisi`, `penyelenggara`, `lokasi_kompetisi`, `gambar_kompetisi` FROM `kompetisi` WHERE 1'
            );
	}

	function selectKompetisi1($type){
        $this->db->select('*');
		$this->db->from('kompetisi');
		$this->db->where('type', $type);
		$query = $this->db->get();
		return $query->result();
	}

	function get_kompetisi(){
		$this->db->select('*');
 		$this->db->from('kompetisi');
 		$query = $this->db->get();
 		return $query->result();
    }

    function get_kompetisitype($type){
		$this->db->select('*');
 		$this->db->from('kompetisi');
 		$this->db->where('type', $type);
 		$query = $this->db->get();
 		return $query->result();
    }

	function selectJadwal($user){
        $this->db->select('*');
		$this->db->from('jadwal');
		$this->db->where('nama', $user);
		$query = $this->db->get();
		return $query;
	}

	function selectData($id){
        $this->db->select('*');
		$this->db->from('lapangan');
		$this->db->where('id_lapangan', $id);
		$query = $this->db->get();
		return $query;
	}


	function selectJadwal2($user){
        $this->db->select('*');
		$this->db->from('jadwal');
		$this->db->where('admin', $user);
		$query = $this->db->get();
		return $query;
	}

	function selectJadwal1($nama){
        $this->db->select('*');
		$this->db->from('waktu');
		$this->db->where('nama_lapangan', $nama);
		$query = $this->db->get();
		return $query;
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

	function deleteLapangan($item){  
		$this->db->where_in('id_lapangan', $item);  
		$res = $this->db->delete('lapangan'); 
		return $res;
	}

	function updateData($table, $data, $where){
		$res=$this->db->update($table, $data, $where);
		return $res;
	}

	function updateData1($table, $data, $where,$where2){
		$res=$this->db->query("UPDATE `waktu` SET `status`= 1 WHERE `jam`= '$where' AND `nama_lapangan`= '$where2'");
		return $res;
	}

    function get_jadwal($no){
		$this->db->select('*');
 		$this->db->from('jadwal');
 		$this->db->where('no', $no);
 		$query = $this->db->get();
 		return $query->result_array();
    }

    function getNumRow($no, $type, $nama, $kategori, $nomer_identitas, $nama_lapangan, $tanggal, $jam, $lama_sewa, $nota_pembayaran, $status){
        $this->db->where('no',$no);
        $this->db->where('type',$type);
        $this->db->where('nama',$nama);
        $this->db->where('kategori',$kategori);
        $this->db->where('nomer_identitas',$nomer_identitas);
        $this->db->where('nama_lapangan',$nama_lapangan);
        $this->db->where('tanggal',$tanggal);
        $this->db->where('jam',$jam);
        $this->db->where('lama_sewa',$lama_sewa);
        $this->db->where('nota_pembayaran',$nota_pembayaran);
        $this->db->where('status',$status);
        
        $query = $this->db->get('jadwal');
        return $query->num_rows();
        
        
    }
}
 ?>