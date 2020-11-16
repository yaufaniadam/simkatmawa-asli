<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	public function cek_akses($username)
	{
		$sql = " select * from SIMKatmawa.dbo.V_Mahasiswa where email='$username'";
		$hasil = $this->db->query($sql);
		return $hasil->result();
	}

	function get_profil_mahasiswa($id)
	{
		$this->db->select('*');
		$this->db->from('SIMKatmawa.dbo.V_Mahasiswa');
		$this->db->where('email', $id);
		$query = $this->db->get();
		return $query->row_array();
	}


}
