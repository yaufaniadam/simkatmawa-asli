<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function simpan_regoknisi($data)
	{
		$this->db->insert('Tr_Bidang_Rekognisi', $data);
		return TRUE;
	}

	function rekognisi($nim){
		$this->db->select('*');
		$this->db->from('Tr_Bidang_Rekognisi');
		$this->db->join('Mstr_Jenis_Rekognisi', 'Tr_Bidang_Rekognisi.Jenis_Rekognisi_Id = Mstr_Jenis_Rekognisi.Jenis_Rekognisi_Id');
		$this->db->where('Tr_Bidang_Rekognisi.Nim', $nim);
		$query = $this->db->get();
		return $query->result();
	}

	function rekognisi_detail($id){
		$this->db->select('*');
		$this->db->from('Tr_Bidang_Rekognisi');
		$this->db->join('Mstr_Jenis_Rekognisi', 'Tr_Bidang_Rekognisi.Jenis_Rekognisi_Id = Mstr_Jenis_Rekognisi.Jenis_Rekognisi_Id');
		$this->db->where('Tr_Bidang_Rekognisi.Bidang_Rekognisi_Id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function simpan_wirausaha($data)
	{
		$this->db->insert('Tr_Kelompok_Wirausaha', $data);
		return TRUE;
	}

	function wirausaha($nim){
		$this->db->select('*');
		$this->db->from('Tr_Kelompok_Wirausaha');
		$this->db->join('Tr_Kelompok_Wirausaha_Member', 'Tr_Kelompok_Wirausaha_Member.Kelompok_Wirausaha_Id = Tr_Kelompok_Wirausaha.Kelompok_Wirausaha_Id');
		$this->db->where('Tr_Kelompok_Wirausaha_Member.Nim', $nim);
		$query = $this->db->get();
		return $query->result();
	}

	function mahasiswa($id){
		$this->db->select('*');
		$this->db->from('V_Mahasiswa');
		$this->db->where('STUDENTID', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function simpan_angota_wirausaha($data)
	{
		$this->db->insert('Tr_Kelompok_Wirausaha_Member', $data);
		return TRUE;
	}

	function wirausaha_detail($id){
		$this->db->select('*');
		$this->db->from('Tr_Kelompok_Wirausaha');
		$this->db->where('Kelompok_Wirausaha_Id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function wirausaha_anggota($id){
		$this->db->select('*');
		$this->db->from('Tr_Kelompok_Wirausaha_Member');
		$this->db->join('V_Mahasiswa', 'V_Mahasiswa.STUDENTID = Tr_Kelompok_Wirausaha_Member.Nim');
		$this->db->where('Kelompok_Wirausaha_Id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	function edit_wirausaha_anggota($id,$id_usaha){
		$this->db->select('*');
		$this->db->from('Tr_Kelompok_Wirausaha_Member');
		$this->db->join('V_Mahasiswa', 'V_Mahasiswa.STUDENTID = Tr_Kelompok_Wirausaha_Member.Nim');
		$this->db->where('Tr_Kelompok_Wirausaha_Member.Kelompok_Wirausaha_Id', $id_usaha);
		$this->db->where('Tr_Kelompok_Wirausaha_Member.Nim', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function cek_anggota_wirausaha($id,$id_usaha){
		$this->db->select('*');
		$this->db->from('Tr_Kelompok_Wirausaha_Member');
		$this->db->where('Kelompok_Wirausaha_Id', $id_usaha);
		$this->db->where('Nim', $id);
		$query = $this->db->get();
		$cek = $query->num_rows();

		if($cek>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	function pengabdian($nim){
		$this->db->select('*');
		$this->db->from('Tr_Pengabdian');
		$this->db->join('Tr_Pengabdian_Member', 'Tr_Pengabdian.Pengabdian_Id = Tr_Pengabdian_Member.Pengabdian_Id');
		$this->db->join('V_Dosen', 'Tr_Pengabdian.Employee_Id = V_Dosen.id_pegawai', 'left');
		$this->db->where('Tr_Pengabdian_Member.Nim', $nim);
		$query = $this->db->get();
		return $query->result();
	}

	public function simpan_pengabdian($data)
	{
		$this->db->insert('Tr_Pengabdian', $data);
		return TRUE;
	}

	public function simpan_angota_pengabdian($data)
	{
		$this->db->insert('Tr_Pengabdian_Member', $data);
		return TRUE;
	}

	function pengabdian_detail($id){
		$this->db->select('*');
		$this->db->from('Tr_Pengabdian');
		$this->db->join('V_Dosen', 'Tr_Pengabdian.Employee_Id = V_Dosen.id_pegawai', 'left');
		$this->db->where('Tr_Pengabdian.Pengabdian_Id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function pengabdian_anggota($id){
		$this->db->select('*');
		$this->db->from('Tr_Pengabdian_Member');
		$this->db->join('V_Mahasiswa', 'V_Mahasiswa.STUDENTID = Tr_Pengabdian_Member.Nim');
		$this->db->where('Pengabdian_Id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	function edit_pengabdian_anggota($id,$id_pengabdian){
		$this->db->select('*');
		$this->db->from('Tr_Pengabdian_Member');
		$this->db->join('V_Mahasiswa', 'V_Mahasiswa.STUDENTID = Tr_Pengabdian_Member.Nim');
		$this->db->where('Tr_Pengabdian_Member.Pengabdian_Id', $id_pengabdian);
		$this->db->where('Tr_Pengabdian_Member.Nim', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function cek_anggota_pengabdi($id,$id_pengabdian){
		$this->db->select('*');
		$this->db->from('Tr_Pengabdian_Member');
		$this->db->where('Pengabdian_Id', $id_pengabdian);
		$this->db->where('Nim', $id);
		$query = $this->db->get();
		$cek = $query->num_rows();

		if($cek>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	function fetch_data($query)
	{
		$aktif='Aktif';

		$this->db->select("*");
		$this->db->from("V_Dosen");
		if($query != '')
		{
			$this->db->like('nik', $query);
			$this->db->or_like('nama', $query);
		}
		$this->db->where('status_aktif', $aktif);
		return $this->db->get();
	}


	public function simpan_exchange($data)
	{
		$this->db->insert('Tr_Student_Exchange', $data);
		return TRUE;
	}

	function exchange($nim){
		$this->db->select('*');
		$this->db->from('Tr_Student_Exchange');
		$this->db->join('V_Mahasiswa', 'V_Mahasiswa.STUDENTID = Tr_Student_Exchange.Nim');
		$this->db->where('Tr_Student_Exchange.Nim', $nim);
		$query = $this->db->get();
		return $query->result();
	}

	function exchange_detail($id){
		$this->db->select('*');
		$this->db->from('Tr_Student_Exchange');
		$this->db->where('Student_Exchange_Id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}


	function mandiri($nim){
		$this->db->select('*');
		$this->db->from('Tr_Prestasi_Mandiri');
		$this->db->join('Tr_Prestasi_Mandiri_Member', 'Tr_Prestasi_Mandiri.Prestasi_Mandiri_Id = Tr_Prestasi_Mandiri_Member.Prestasi_Mandiri_Id');
		$this->db->join('V_Dosen', 'Tr_Prestasi_Mandiri.Employee_Id = V_Dosen.id_pegawai', 'left');

		$this->db->join('Mstr_Capaian_Prestasi', 'Tr_Prestasi_Mandiri.Capaian_Prestasi_Id = Mstr_Capaian_Prestasi.Capaian_Prestasi_Id');
		$this->db->join('Mstr_Jenis_Pengajuan', 'Tr_Prestasi_Mandiri.Jenis_Pengajuan_Id = Mstr_Jenis_Pengajuan.Jenis_Pengajuan_Id');
		$this->db->join('Mstr_Tingkat_Prestasi', 'Tr_Prestasi_Mandiri.Tingkat_Prestasi_Id = Mstr_Tingkat_Prestasi.Tingkat_Prestasi_Id');
		$this->db->join('Mstr_Kategori_Kegiatan', 'Tr_Prestasi_Mandiri.Kategori_Kegiatan_Id = Mstr_Kategori_Kegiatan.Kategori_Kegiatan_Id');
		$this->db->where('Tr_Prestasi_Mandiri_Member.Nim', $nim);
		$query = $this->db->get();
		return $query->result();
	}

	public function simpan_mandiri($data)
	{
		$this->db->insert('Tr_Prestasi_Mandiri', $data);
		return TRUE;
	}

	public function simpan_angota_mandiri($data)
	{
		$this->db->insert('Tr_Prestasi_Mandiri_Member', $data);
		return TRUE;
	}

	function mandiri_detail($id){
		$this->db->select('*');
		$this->db->from('Tr_Prestasi_Mandiri');
		$this->db->join('V_Dosen', 'Tr_Prestasi_Mandiri.Employee_Id = V_Dosen.id_pegawai', 'left');

		$this->db->join('Mstr_Capaian_Prestasi', 'Tr_Prestasi_Mandiri.Capaian_Prestasi_Id = Mstr_Capaian_Prestasi.Capaian_Prestasi_Id');
		$this->db->join('Mstr_Jenis_Pengajuan', 'Tr_Prestasi_Mandiri.Jenis_Pengajuan_Id = Mstr_Jenis_Pengajuan.Jenis_Pengajuan_Id');
		$this->db->join('Mstr_Tingkat_Prestasi', 'Tr_Prestasi_Mandiri.Tingkat_Prestasi_Id = Mstr_Tingkat_Prestasi.Tingkat_Prestasi_Id');
		$this->db->join('Mstr_Kategori_Kegiatan', 'Tr_Prestasi_Mandiri.Kategori_Kegiatan_Id = Mstr_Kategori_Kegiatan.Kategori_Kegiatan_Id');
		$this->db->where('Tr_Prestasi_Mandiri.Prestasi_Mandiri_Id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function mandiri_anggota($id){
		$this->db->select('*');
		$this->db->from('Tr_Prestasi_Mandiri_Member');
		$this->db->join('V_Mahasiswa', 'V_Mahasiswa.STUDENTID = Tr_Prestasi_Mandiri_Member.Nim');
		$this->db->where('Prestasi_Mandiri_Id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	function cek_anggota_mandiri($id,$id_mandiri){
		$this->db->select('*');
		$this->db->from('Tr_Prestasi_Mandiri_Member');
		$this->db->where('Prestasi_Mandiri_Id', $id_mandiri);
		$this->db->where('Nim', $id);
		$query = $this->db->get();
		$cek = $query->num_rows();

		if($cek>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	function edit_mandiri_anggota($id,$id_mandiri){
		$this->db->select('*');
		$this->db->from('Tr_Prestasi_Mandiri_Member');
		$this->db->join('V_Mahasiswa', 'V_Mahasiswa.STUDENTID = Tr_Prestasi_Mandiri_Member.Nim');
		$this->db->where('Tr_Prestasi_Mandiri_Member.Prestasi_Mandiri_Id', $id_mandiri);
		$this->db->where('Tr_Prestasi_Mandiri_Member.Nim', $id);
		$query = $this->db->get();
		return $query->row_array();
	}


}