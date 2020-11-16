<?php

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper(array('url'));
        $this->load->database();
        $this->load->model('M_transaksi');
        no_access();
    }

    //-----------------------------rekognisi-----------------------------//

    function rekognisi()
    {
        $nim = $this->session->userdata('STUDENTID');

        $data = array(
            "title" => 'Bidang Rekognisi',
            "all" => $this->M_transaksi->rekognisi($nim),
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "rekogniksi/index_rekognisi.php",
        );
        $this->load->view('layout/template', $data);
    }


    function input_rekognisi()
    {
        $data = array(
            "title" => 'Tambah Bidang Rekognisi',
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "rekogniksi/tambah_rekognisi.php",
        );
        $this->load->view('layout/template', $data);
    }

    function lihat_rekognisi($id)
    {
        $id = decrypt_url($id);

        $data = array(
            "title" => 'Detail Bidang Rekognisi',
            "rekognisi" => $this->M_transaksi->rekognisi_detail($id),
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "rekogniksi/lihat_rekognisi.php",
        );
        $this->load->view('layout/template', $data);
    }

    function ubah_rekognisi($id)
    {
        $id = decrypt_url($id);

        $data = array(
            "title" => 'Ubah Bidang Rekognisi',
            "rekognisi" => $this->M_transaksi->rekognisi_detail($id),
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "rekogniksi/ubah_rekognisi.php",
        );
        $this->load->view('layout/template', $data);
    }

    function hapus_rekognisi($id)
    {
        $id = decrypt_url($id);

        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('Transaksi/rekognisi');
        } else {
            $this->db->where('Bidang_Rekognisi_Id', $id);
            $this->db->delete('Tr_Bidang_Rekognisi');
            $this->session->set_flashdata('success', "Data Berhasil Dihapus");
            redirect('Transaksi/rekognisi');
        }
    }

    function tambah_rekognisi()
    {
        $this->form_validation->set_rules('id-student', 'id-student', 'required');
        $this->form_validation->set_rules('jenis-rekonigsi', 'jenis-rekonigsi', 'required');
        $this->form_validation->set_rules('nama-karya', 'nama-karya', 'required');
        $this->form_validation->set_rules('tahun-pengajuan', 'tahun-pengajuan', 'required');
        $this->form_validation->set_rules('no-registrasi', 'no-registrasi', 'required');
        $this->form_validation->set_rules('no-hak-cipta', 'no-hak-cipta', 'required');


        date_default_timezone_set("Asia/Jakarta");
        $date_input = date("Y-m-d h:i:sa");

        $random = rand();
        $nim = $_POST['id-student'];


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/input_rekognisi');
        } else {
            if ($_FILES['input-file']['name'] != "") {
                $stnk = $_FILES['input-file']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/rekognisi/"; //tempat upload foto
                $file = 'input-file'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file = 'Dokumen-kegiatan-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file);
            } else {
                $new_input_file = null;
            }

            if ($_FILES['input-file-1']['name'] != "") {
                $stnk = $_FILES['input-file-1']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/rekognisi/"; //tempat upload foto
                $file = 'input-file-1'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_1 = 'Prociding Conference-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_1);
            } else {
                $new_input_file_1 = null;
            }

            if ($_FILES['input-file-2']['name'] != "") {
                $stnk = $_FILES['input-file-2']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/rekognisi/"; //tempat upload foto
                $file = 'input-file-2'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_2 = 'Bukti-karya-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_2);
            } else {
                $new_input_file_2 = null;
            }

            $data = array(
                "Nim" => $nim,
                "Jenis_Rekognisi_Id" => $_POST['jenis-rekonigsi'],
                "Nama_Karya" => $_POST['nama-karya'],
                "Tahun_Pengajuan" => $_POST['tahun-pengajuan'],
                "Nomor_Registrasi" => $_POST['no-registrasi'],
                "Nomor_Pencatatan_Hak_Cipta" => $_POST['no-hak-cipta'],
                "Url" => $_POST['url'],
                "Url_Penyelenggara" => $_POST['url-penyelenggara'],
                "Url_Publikasi_Penyelenggaraan_Kegiatan" => $_POST['url-penyelenggara-kegiatan'],
                "Url_Bukti_Keikutsertaan" => $_POST['url-bukti-keikutsertaan'],
                "Upload_Dokumentasi_Kegiatan" => $new_input_file,
                "Upload_Prociding_Conference" => $new_input_file_1,
                "Upload_Bukti_Karya" => $new_input_file_2,

                "Created_Date" => $date_input,
                "Created_By" => $nim,
            );

            $this->M_transaksi->simpan_regoknisi($data);


            $this->session->set_flashdata('success', "Data berhasil Ditambahkan.");
            redirect('Transaksi/rekognisi/');
        }
    }

    function edit_rekognisi()
    {
        $this->form_validation->set_rules('id-rekognisi', 'id-rekognisi', 'required');
        $this->form_validation->set_rules('id-student', 'id-student', 'required');
        $this->form_validation->set_rules('jenis-rekonigsi', 'jenis-rekonigsi', 'required');
        $this->form_validation->set_rules('nama-karya', 'nama-karya', 'required');
        $this->form_validation->set_rules('tahun-pengajuan', 'tahun-pengajuan', 'required');
        $this->form_validation->set_rules('no-registrasi', 'no-registrasi', 'required');
        $this->form_validation->set_rules('no-hak-cipta', 'no-hak-cipta', 'required');

        date_default_timezone_set("Asia/Jakarta");
        $date_input = date("Y-m-d h:i:sa");

        $random = rand();
        $nim = $_POST['id-student'];
        $rekognisi = $_POST['id-rekognisi'];


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/ubah_rekognisi/' . encrypt_url($rekognisi));
        } else {
            if ($_FILES['input-file']['name'] != "") {
                $stnk = $_FILES['input-file']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/rekognisi/"; //tempat upload foto
                $file = 'input-file'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file = 'Dokumen-kegiatan-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file);

                unlink("dokument/rekognisi/" . $_POST['input-file-a']);
            } else {
                $new_input_file = $_POST['input-file-a'];
            }

            if ($_FILES['input-file-1']['name'] != "") {
                $stnk = $_FILES['input-file-1']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/rekognisi/"; //tempat upload foto
                $file = 'input-file-1'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_1 = 'Prociding Conference-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_1);

                unlink("dokument/rekognisi/" . $_POST['input-file-1-a']);
            } else {
                $new_input_file_1 = $_POST['input-file-1-a'];
            }

            if ($_FILES['input-file-2']['name'] != "") {
                $stnk = $_FILES['input-file-2']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/rekognisi/"; //tempat upload foto
                $file = 'input-file-2'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_2 = 'Bukti-karya-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_2);

                unlink("dokument/rekognisi/" . $_POST['input-file-2-a']);
            } else {
                $new_input_file_2 = $_POST['input-file-2-a'];
            }

            $data = array(
                "Jenis_Rekognisi_Id" => $_POST['jenis-rekonigsi'],
                "Nama_Karya" => $_POST['nama-karya'],
                "Tahun_Pengajuan" => $_POST['tahun-pengajuan'],
                "Nomor_Registrasi" => $_POST['no-registrasi'],
                "Nomor_Pencatatan_Hak_Cipta" => $_POST['no-hak-cipta'],
                "Url" => $_POST['url'],
                "Url_Penyelenggara" => $_POST['url-penyelenggara'],
                "Url_Publikasi_Penyelenggaraan_Kegiatan" => $_POST['url-penyelenggara-kegiatan'],
                "Url_Bukti_Keikutsertaan" => $_POST['url-bukti-keikutsertaan'],
                "Upload_Dokumentasi_Kegiatan" => $new_input_file,
                "Upload_Prociding_Conference" => $new_input_file_1,
                "Upload_Bukti_Karya" => $new_input_file_2,

                "Modified_Date" => $date_input,
                "Modified_By" => $nim,
            );

            $this->db->where('Bidang_Rekognisi_Id', $rekognisi);
            $this->db->update('Tr_Bidang_Rekognisi', $data);


            $this->session->set_flashdata('success', "Data berhasil Di Ubah.");
            redirect('Transaksi/lihat_rekognisi/' . encrypt_url($rekognisi));
        }
    }


    //-----------------------------wirausaha-----------------------------//

    function wirausaha()
    {
        $nim = $this->session->userdata('STUDENTID');

        $data = array(
            "title" => 'Bidang Kelompok wirausaha',
            "all" => $this->M_transaksi->wirausaha($nim),
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "wirausaha/index_wirausaha.php",
        );
        $this->load->view('layout/template', $data);
    }

    function lihat_wirausaha($id)
    {
        $id = decrypt_url($id);

        $data = array(
            "title" => 'Detail Bidang kelompok Wirausaha',
            "wirausaha" => $this->M_transaksi->wirausaha_detail($id),
            "anggota" => $this->M_transaksi->wirausaha_anggota($id),
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "wirausaha/lihat_wirausaha.php",
        );
        $this->load->view('layout/template', $data);
    }

    function input_wirausaha()
    {
        $data = array(
            "title" => 'Tambah Bidang Kelompok wirausaha',
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "wirausaha/tambah_wirausaha.php",
        );
        $this->load->view('layout/template', $data);
    }

    function ubah_wirausaha($id)
    {
        $id = decrypt_url($id);

        $data = array(
            "title" => 'Ubah Bidang Kelompok wirausaha',
            "wirausaha" => $this->M_transaksi->wirausaha_detail($id),
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "wirausaha/ubah_wirausaha.php",
        );
        $this->load->view('layout/template', $data);
    }

    function tambah_wirausaha()
    {
        $this->form_validation->set_rules('nama-usaha', 'nama-usaha', 'required');
        $this->form_validation->set_rules('deskripsi-usaha', 'deskripsi-usaha', 'required');
        $this->form_validation->set_rules('kewirausahaan', 'kewirausahaan', 'required');
        $this->form_validation->set_rules('tahun-pendirian', 'tahun-pendirian', 'required');
        $this->form_validation->set_rules('omset', 'omset', 'required');


        date_default_timezone_set("Asia/Jakarta");
        $date_input = date("Y-m-d h:i:sa");

        $random = rand();

        $nim = $this->session->userdata('STUDENTID');

        $judul = $_POST['nama-usaha'];


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/input_wirausaha');
        } else {
            if ($_FILES['input-file']['name'] != "") {
                $stnk = $_FILES['input-file']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/wirausaha/"; //tempat upload foto
                $file = 'input-file'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));


                $new_input_file = 'Proposal-Bisnis-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file);
            } else {
                $new_input_file = null;
            }

            if ($_FILES['input-file-1']['name'] != "") {
                $stnk = $_FILES['input-file-1']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/wirausaha/"; //tempat upload foto
                $file = 'input-file-1'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_1 = 'Foto-Usaha-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_1);
            } else {
                $new_input_file_1 = null;
            }

            if ($_FILES['input-file-2']['name'] != "") {
                $stnk = $_FILES['input-file-2']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/wirausaha/"; //tempat upload foto
                $file = 'input-file-2'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_2 = 'Legalitas-Usaha-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_2);
            } else {
                $new_input_file_2 = null;
            }

            if ($_FILES['input-file-3']['name'] != "") {
                $stnk = $_FILES['input-file-3']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/wirausaha/"; //tempat upload foto
                $file = 'input-file-3'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_3 = 'Bukti-Usaha-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_3);
            } else {
                $new_input_file_3 = null;
            }

            $data = array(
                "Nama_Usaha" => $judul,
                "Deskripsi_Usaha" => $_POST['deskripsi-usaha'],
                "Program_Kegiatan_Pembinaan_Kewirausahaan" => $_POST['kewirausahaan'],
                "Tahun_Pendirian_Usaha" => $_POST['tahun-pendirian'],
                "Omset_Perbulan" => $_POST['omset'],
                "Owner" => $nim,
                "Upload_Proposal_Bisnis" => $new_input_file,
                "Upload_Foto_Usaha" => $new_input_file_1,
                "Upload_Legalitas_Usaha" => $new_input_file_2,
                "Upload_Bukti_Usaha" => $new_input_file_3,

                "Created_Date" => $date_input,
                "Created_By" => $nim,
            );

            $this->M_transaksi->simpan_wirausaha($data);


            $cek = $this->db->query("select * from Tr_Kelompok_Wirausaha where Nama_Usaha='$judul'");

            if ($cek->num_rows() > 0) {
                $rows = $cek->row_array();

                $this->session->set_flashdata('success', "Data Berhasil Disimpan");
                redirect('Transaksi/input_anggota_wirausaha/' . encrypt_url($nim) . '/' . encrypt_url($rows['Kelompok_Wirausaha_Id']));
            } else {
                $this->session->set_flashdata('error', "Data Gagal Diinputkan");
                redirect('Transaksi/input_wirausaha');
            }
        }
    }

    function input_anggota_wirausaha($id, $id_usaha)
    {
        $id = decrypt_url($id);
        $id_usaha = decrypt_url($id_usaha);

        $data = array(
            "title" => 'Tambah Anggota Bidang Kelompok wirausaha',
            "maha" => $this->M_transaksi->mahasiswa($id),
            "id_usaha" => $id_usaha,
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "wirausaha/tambah_anggota_wirausaha.php",
        );
        $this->load->view('layout/template', $data);
    }

    function input_anggota_wirausaha_1($id_usaha)
    {
        $id_usaha = decrypt_url($id_usaha);

        $data = array(
            "title" => 'Tambah Anggota Bidang Kelompok wirausaha',
            "cek" => $this->M_transaksi->cek_anggota_wirausaha(@$cari, @$id_usaha),
            "id_usaha" => $id_usaha,
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "wirausaha/tambah_anggota_wirausaha_1.php",
        );
        $this->load->view('layout/template', $data);
    }

    function input_anggota_wirausaha_2()
    {
        $id_usaha = $_POST['id-usaha'];
        $cari = $_POST['cari'];

        $data = array(
            "title" => 'Tambah Anggota Bidang Kelompok wirausaha',
            "cek" => $this->M_transaksi->cek_anggota_wirausaha($cari, $id_usaha),
            "maha" => $this->M_transaksi->mahasiswa($cari),
            "id_usaha" => $id_usaha,
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "wirausaha/tambah_anggota_wirausaha_1.php",
        );
        $this->load->view('layout/template', $data);
    }

    function tambah_anggota_wirausaha()
    {
        $this->form_validation->set_rules('id-usaha', 'id-usaha', 'required');
        $this->form_validation->set_rules('peran', 'peran', 'required');
        $this->form_validation->set_rules('nim', 'nim', 'required');


        date_default_timezone_set("Asia/Jakarta");
        $date_input = date("Y-m-d h:i:sa");

        $id_usaha = $_POST['id-usaha'];
        $nim = $_POST['nim'];

        $si_input = $this->session->userdata('STUDENTID');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/input_anggota_wirausaha/' . encrypt_url($nim) . '/' . encrypt_url($id_usaha));
        } else {

            $data = array(
                "Kelompok_Wirausaha_Id" => $id_usaha,
                "Nim" => $nim,
                "Is_Ketua" => $_POST['peran'],
                "No_Hp" => $_POST['hp'],

                "Created_Date" => $date_input,
                "Created_By" => $si_input,
            );

            $this->M_transaksi->simpan_angota_wirausaha($data);


            $this->session->set_flashdata('success', "Anggota Berhasil Ditambahkan");
            redirect('Transaksi/lihat_wirausaha/' . encrypt_url($id_usaha));
        }
    }

    function edit_anggota_wirausaha($id, $id_usaha)
    {
        $id = decrypt_url($id);
        $id_usaha = decrypt_url($id_usaha);

        $data = array(
            "title" => 'Ubah Anggota Bidang Kelompok wirausaha',
            "maha" => $this->M_transaksi->edit_wirausaha_anggota($id, $id_usaha),
            "id_usaha" => $id_usaha,
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "wirausaha/ubah_anggota_wirausaha.php",
        );
        $this->load->view('layout/template', $data);
    }

    function ubah_anggota_wirausaha()
    {
        $this->form_validation->set_rules('id-usaha', 'id-usaha', 'required');
        $this->form_validation->set_rules('peran', 'peran', 'required');
        $this->form_validation->set_rules('nim', 'nim', 'required');


        date_default_timezone_set("Asia/Jakarta");
        $date_input = date("Y-m-d h:i:sa");

        $id_usaha = $_POST['id-usaha'];
        $nim = $_POST['nim'];

        $si_input = $this->session->userdata('STUDENTID');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/edit_anggota_wirausaha/' . encrypt_url($nim) . '/' . encrypt_url($id_usaha));
        } else {

            $data = array(
                "Is_Ketua" => $_POST['peran'],
                "No_Hp" => $_POST['hp'],

                "Modified_Date" => $date_input,
                "Modified_By" => $si_input,
            );

            $this->db->where('Kelompok_Wirausaha_Id', $id_usaha);
            $this->db->where('Nim', $nim);
            $this->db->update('Tr_Kelompok_Wirausaha_Member', $data);


            $this->session->set_flashdata('success', "Data Anggota Berhasil Diubah");
            redirect('Transaksi/lihat_wirausaha/' . encrypt_url($id_usaha));
        }
    }

    function hapus_anggota_wirausaha($id, $id_usaha)
    {
        $id = decrypt_url($id);
        $id_usaha = decrypt_url($id_usaha);

        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('Transaksi/lihat_wirausaha/' . encrypt_url($id_usaha));
        } else {
            $this->db->where('Kelompok_Wirausaha_Member_Id', $id);
            $this->db->delete('Tr_Kelompok_Wirausaha_Member');
            $this->session->set_flashdata('success', "Data Berhasil Dihapus");
            redirect('Transaksi/lihat_wirausaha/' . encrypt_url($id_usaha));
        }
    }

    function edit_wirausaha()
    {
        $this->form_validation->set_rules('id-usaha', 'id-usaha', 'required');
        $this->form_validation->set_rules('nama-usaha', 'nama-usaha', 'required');
        $this->form_validation->set_rules('deskripsi-usaha', 'deskripsi-usaha', 'required');
        $this->form_validation->set_rules('kewirausahaan', 'kewirausahaan', 'required');
        $this->form_validation->set_rules('tahun-pendirian', 'tahun-pendirian', 'required');
        $this->form_validation->set_rules('omset', 'omset', 'required');


        date_default_timezone_set("Asia/Jakarta");
        $date_input = date("Y-m-d h:i:sa");

        $random = rand();

        $nim = $this->session->userdata('STUDENTID');

        $id_usaha = $_POST['id-usaha'];

        $judul = $_POST['nama-usaha'];


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/input_wirausaha');
        } else {
            if ($_FILES['input-file']['name'] != "") {
                $stnk = $_FILES['input-file']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/wirausaha/"; //tempat upload foto
                $file = 'input-file'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file = 'Proposal-Bisnis-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file);

                unlink("dokument/wirausaha/" . $_POST['input-file-a']);
            } else {
                $new_input_file = $_POST['input-file-a'];
            }

            if ($_FILES['input-file-1']['name'] != "") {
                $stnk = $_FILES['input-file-1']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/wirausaha/"; //tempat upload foto
                $file = 'input-file-1'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_1 = 'Foto-Usaha-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_1);

                unlink("dokument/wirausaha/" . $_POST['input-file-a-1']);
            } else {
                $new_input_file_1 = $_POST['input-file-a-1'];
            }

            if ($_FILES['input-file-2']['name'] != "") {
                $stnk = $_FILES['input-file-2']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/wirausaha/"; //tempat upload foto
                $file = 'input-file-2'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_2 = 'Legalitas-Usaha-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_2);

                unlink("dokument/wirausaha/" . $_POST['input-file-a-2']);
            } else {
                $new_input_file_2 = $_POST['input-file-a-2'];
            }

            if ($_FILES['input-file-3']['name'] != "") {
                $stnk = $_FILES['input-file-3']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/wirausaha/"; //tempat upload foto
                $file = 'input-file-3'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_3 = 'Bukti-Usaha-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_3);

                unlink("dokument/wirausaha/" . $_POST['input-file-a-3']);
            } else {
                $new_input_file_3 = $_POST['input-file-a-3'];
            }

            $data = array(
                "Nama_Usaha" => $judul,
                "Deskripsi_Usaha" => $_POST['deskripsi-usaha'],
                "Program_Kegiatan_Pembinaan_Kewirausahaan" => $_POST['kewirausahaan'],
                "Tahun_Pendirian_Usaha" => $_POST['tahun-pendirian'],
                "Omset_Perbulan" => $_POST['omset'],
                "Upload_Proposal_Bisnis" => $new_input_file,
                "Upload_Foto_Usaha" => $new_input_file_1,
                "Upload_Legalitas_Usaha" => $new_input_file_2,
                "Upload_Bukti_Usaha" => $new_input_file_3,

                "Modified_Date" => $date_input,
                "Modified_By" => $nim,
            );

            $this->db->where('Kelompok_Wirausaha_Id', $id_usaha);
            $this->db->update('Tr_Kelompok_Wirausaha', $data);


            $this->session->set_flashdata('success', "Data Berhasil Diubah");
            redirect('Transaksi/lihat_wirausaha/' . encrypt_url($id_usaha));
        }
    }

    function hapus_wirausaha($id)
    {
        $id = decrypt_url($id);

        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('Transaksi/wirausaha');
        } else {
            $this->db->where('Kelompok_Wirausaha_Id', $id);
            $this->db->delete('Tr_Kelompok_Wirausaha_Member');

            $this->db->where('Kelompok_Wirausaha_Id', $id);
            $this->db->delete('Tr_Kelompok_Wirausaha');

            $this->session->set_flashdata('success', "Data Berhasil Dihapus");
            redirect('Transaksi/wirausaha');
        }
    }


    //-----------------------------pengabdian-----------------------------//

    function pengabdian()
    {
        $nim = $this->session->userdata('STUDENTID');

        $data = array(
            "title" => 'Bidang Pengabdian Masyarakat',
            "all" => $this->M_transaksi->pengabdian($nim),
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "pengabdian/index_pengabdian.php",
        );
        $this->load->view('layout/template', $data);
    }

    function lihat_pengabdian($id)
    {
        $id = decrypt_url($id);

        $data = array(
            "title" => 'Detail Bidang Pengabdian Masyarakat',
            "pengabdian" => $this->M_transaksi->pengabdian_detail($id),
            "anggota" => $this->M_transaksi->pengabdian_anggota($id),
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "pengabdian/lihat_pengabdian.php",
        );
        $this->load->view('layout/template', $data);
    }

    function input_pengabdian()
    {
        $data = array(
            "title" => 'Tambah Bidang Pengabdian Masyarakat',
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "pengabdian/tambah_pengabdian.php",
        );
        $this->load->view('layout/template', $data);
    }

    function tambah_pengabdian()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('kelompok-sasaran', 'kelompok-sasaran', 'required');
        $this->form_validation->set_rules('organisasi-pelaksana', 'organisasi-pelaksana', 'required');
        $this->form_validation->set_rules('tahun-kegiatan', 'tahun-kegiatan', 'required');
        $this->form_validation->set_rules('jumlah-mahasiswa', 'jumlah-mahasiswa', 'required');


        date_default_timezone_set("Asia/Jakarta");
        $date_input = date("Y-m-d h:i:sa");

        $random = rand();

        $nim = $this->session->userdata('STUDENTID');

        $judul = $_POST['judul'];


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/input_pengabdian');
        } else {
            if ($_FILES['input-file']['name'] != "") {
                $stnk = $_FILES['input-file']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/pengabdian/"; //tempat upload foto
                $file = 'input-file'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));


                $new_input_file = 'Upload-Bukti-Keikutsertaan-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file);
            } else {
                $new_input_file = null;
            }

            if ($_FILES['input-file-1']['name'] != "") {
                $stnk = $_FILES['input-file-1']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/pengabdian/"; //tempat upload foto
                $file = 'input-file-1'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_1 = 'Upload-Laporan-Pengabdian-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_1);
            } else {
                $new_input_file_1 = null;
            }


            $data = array(
                "Judul_Pengabdian" => $judul,
                "Kelompok_Sasaran" => $_POST['kelompok-sasaran'],
                "Nama_Organisasi_Pelaksana" => $_POST['organisasi-pelaksana'],
                "Jumlah_Mahasiswa" => $_POST['jumlah-mahasiswa'],
                "Tahun_Kegiatan" => $_POST['tahun-kegiatan'],
                "Owner" => $nim,
                "Upload_Bukti_Keikutsertaan" => $new_input_file,
                "Upload_Laporan_Pengabdian" => $new_input_file_1,

                "Created_Date" => $date_input,
                "Created_By" => $nim,
            );

            $this->M_transaksi->simpan_pengabdian($data);


            $cek = $this->db->query("select * from Tr_Pengabdian where Judul_Pengabdian='$judul'");

            if ($cek->num_rows() > 0) {
                $rows = $cek->row_array();

                $this->session->set_flashdata('success', "Data Berhasil Disimpan");
                redirect('Transaksi/input_anggota_pengabdian/' . encrypt_url($nim) . '/' . encrypt_url($rows['Pengabdian_Id']));
            } else {
                $this->session->set_flashdata('error', "Data Gagal Diinputkan");
                redirect('Transaksi/input_pengabdian');
            }
        }
    }

    function input_anggota_pengabdian($id, $id_pengabdian)
    {
        $id = decrypt_url($id);
        $id_pengabdian = decrypt_url($id_pengabdian);

        $data = array(
            "title" => 'Tambah Anggota Bidang Pengabdian Masyarakat',
            "maha" => $this->M_transaksi->mahasiswa($id),
            "id_pengabdian" => $id_pengabdian,
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "pengabdian/tambah_anggota_pengabdian.php",
        );
        $this->load->view('layout/template', $data);
    }

    function input_anggota_pengabdian_1($id_pengabdian)
    {
        $id_pengabdian = decrypt_url($id_pengabdian);

        $data = array(
            "title" => 'Tambah Anggota Bidang Pengabdian Masyarakat',
            "cek" => $this->M_transaksi->cek_anggota_pengabdi(@$cari, @$id_pengabdian),
            "id_pengabdian" => $id_pengabdian,
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "pengabdian/tambah_anggota_pengabdian_1.php",
        );
        $this->load->view('layout/template', $data);
    }

    function input_anggota_pengabdian_2()
    {
        $id_pengabdian = $_POST['id-pengabdian'];
        $cari = $_POST['cari'];

        $data = array(
            "title" => 'Tambah Anggota Bidang Pengabdian Masyarakat',
            "cek" => $this->M_transaksi->cek_anggota_pengabdi($cari, $id_pengabdian),
            "maha" => $this->M_transaksi->mahasiswa($cari),
            "id_pengabdian" => $id_pengabdian,
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "pengabdian/tambah_anggota_pengabdian_1.php",
        );
        $this->load->view('layout/template', $data);
    }

    function tambah_anggota_pengabdian()
    {
        $this->form_validation->set_rules('id-pengabdian', 'id-pengabdian', 'required');
        $this->form_validation->set_rules('peran', 'peran', 'required');
        $this->form_validation->set_rules('nim', 'nim', 'required');


        date_default_timezone_set("Asia/Jakarta");
        $date_input = date("Y-m-d h:i:sa");

        $id_pengabdian = $_POST['id-pengabdian'];
        $nim = $_POST['nim'];

        $si_input = $this->session->userdata('STUDENTID');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/input_anggota_pengabdian/' . encrypt_url($nim) . '/' . encrypt_url($id_pengabdian));
        } else {

            $data = array(
                "Pengabdian_Id" => $id_pengabdian,
                "Nim" => $nim,
                "Is_Ketua" => $_POST['peran'],

                "Created_Date" => $date_input,
                "Created_By" => $si_input,
            );

            $this->M_transaksi->simpan_angota_pengabdian($data);


            $this->session->set_flashdata('success', "Anggota Berhasil Ditambahkan");
            redirect('Transaksi/lihat_pengabdian/' . encrypt_url($id_pengabdian));
        }
    }

    function edit_anggota_pengabdian($id, $id_pengabdian)
    {
        $id = decrypt_url($id);
        $id_pengabdian = decrypt_url($id_pengabdian);

        $data = array(
            "title" => 'Ubah Anggota Bidang Kelompok wirausaha',
            "maha" => $this->M_transaksi->edit_pengabdian_anggota($id, $id_pengabdian),
            "id_pengabdian" => $id_pengabdian,
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "pengabdian/ubah_anggota_pengabdian.php",
        );
        $this->load->view('layout/template', $data);
    }

    function ubah_anggota_pengabdian()
    {
        $this->form_validation->set_rules('id-pengabdian', 'id-pengabdian', 'required');
        $this->form_validation->set_rules('peran', 'peran', 'required');
        $this->form_validation->set_rules('nim', 'nim', 'required');


        date_default_timezone_set("Asia/Jakarta");
        $date_input = date("Y-m-d h:i:sa");

        $id_pengabdian = $_POST['id-pengabdian'];
        $nim = $_POST['nim'];

        $si_input = $this->session->userdata('STUDENTID');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/edit_anggota_pengabdian/' . encrypt_url($nim) . '/' . encrypt_url($id_pengabdian));
        } else {

            $data = array(
                "Is_Ketua" => $_POST['peran'],

                "Modified_Date" => $date_input,
                "Modified_By" => $si_input,
            );

            $this->db->where('Pengabdian_Id', $id_pengabdian);
            $this->db->where('Nim', $nim);
            $this->db->update('Tr_Pengabdian_Member', $data);


            $this->session->set_flashdata('success', "Data Anggota Berhasil Diubah");
            redirect('Transaksi/lihat_pengabdian/' . encrypt_url($id_pengabdian));
        }
    }

    function hapus_anggota_pengabdian($id, $id_pengabdian)
    {
        $id = decrypt_url($id);
        $id_pengabdian = decrypt_url($id_pengabdian);

        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('Transaksi/lihat_pengabdian/' . encrypt_url($id_pengabdian));
        } else {
            $this->db->where('Pengabdian_Member_Id', $id);
            $this->db->delete('Tr_Pengabdian_Member');
            $this->session->set_flashdata('success', "Data Berhasil Dihapus");
            redirect('Transaksi/lihat_pengabdian/' . encrypt_url($id_pengabdian));
        }
    }

    function ubah_pengabdian($id)
    {
        $id = decrypt_url($id);

        $data = array(
            "title" => 'Ubah Bidang Pengabdian Masyarakat',
            "pengabdian" => $this->M_transaksi->pengabdian_detail($id),
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "pengabdian/ubah_pengabdian.php",
        );
        $this->load->view('layout/template', $data);
    }

    function edit_pengabdian()
    {
        $this->form_validation->set_rules('id-pengabdian', 'id-pengabdian', 'required');
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('kelompok-sasaran', 'kelompok-sasaran', 'required');
        $this->form_validation->set_rules('organisasi-pelaksana', 'organisasi-pelaksana', 'required');
        $this->form_validation->set_rules('tahun-kegiatan', 'tahun-kegiatan', 'required');
        $this->form_validation->set_rules('jumlah-mahasiswa', 'jumlah-mahasiswa', 'required');


        date_default_timezone_set("Asia/Jakarta");
        $date_input = date("Y-m-d h:i:sa");

        $random = rand();

        $nim = $this->session->userdata('STUDENTID');

        $id_pengabdian = $_POST['id-pengabdian'];

        $judul = $_POST['judul'];


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/ubah_pengabdian/' . encrypt_url($id_pengabdian));
        } else {
            if ($_FILES['input-file']['name'] != "") {
                $stnk = $_FILES['input-file']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/pengabdian/"; //tempat upload foto
                $file = 'input-file'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file = 'Upload-Bukti-Keikutsertaan-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file);

                unlink("dokument/pengabdian/" . $_POST['input-file-a']);
            } else {
                $new_input_file = $_POST['input-file-a'];
            }

            if ($_FILES['input-file-1']['name'] != "") {
                $stnk = $_FILES['input-file-1']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/pengabdian/"; //tempat upload foto
                $file = 'input-file-1'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_1 = 'Upload-Laporan-Pengabdian-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_1);

                unlink("dokument/pengabdian/" . $_POST['input-file-a-1']);
            } else {
                $new_input_file_1 = $_POST['input-file-a-1'];
            }


            $data = array(
                "Judul_Pengabdian" => $judul,
                "Kelompok_Sasaran" => $_POST['kelompok-sasaran'],
                "Nama_Organisasi_Pelaksana" => $_POST['organisasi-pelaksana'],
                "Jumlah_Mahasiswa" => $_POST['jumlah-mahasiswa'],
                "Tahun_Kegiatan" => $_POST['tahun-kegiatan'],
                "Owner" => $nim,
                "Upload_Bukti_Keikutsertaan" => $new_input_file,
                "Upload_Laporan_Pengabdian" => $new_input_file_1,

                "Modified_Date" => $date_input,
                "Modified_By" => $nim,
            );

            $this->db->where('Pengabdian_Id', $id_pengabdian);
            $this->db->update('Tr_Pengabdian', $data);

            $this->session->set_flashdata('success', "Data Berhasil Diubah");
            redirect('Transaksi/lihat_pengabdian/' . encrypt_url($id_pengabdian));
        }
    }

    function hapus_pengabdian($id)
    {
        $id = decrypt_url($id);

        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('Transaksi/pengabdian');
        } else {
            $this->db->where('Pengabdian_Id', $id);
            $this->db->delete('Tr_Pengabdian_Member');

            $this->db->where('Pengabdian_Id', $id);
            $this->db->delete('Tr_Pengabdian');

            $this->session->set_flashdata('success', "Data Berhasil Dihapus");
            redirect('Transaksi/pengabdian');
        }
    }

    function tambah_dospem($id)
    {
        $id = decrypt_url($id);

        $data = array(
            "title" => 'Tambah Dosen Pembimbing Bidang Pengabdian Masyarakat',
            "id_pengabdian" => $id,
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "pengabdian/tambah_dospem_pengabdian.php",
        );
        $this->load->view('layout/template', $data);
    }

    function fetch()
    {
        $output = '';
        $query = '';
        $id_pengabdian = $this->input->post('pengabdian');
        $this->load->model('M_transaksi');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->M_transaksi->fetch_data($query);

        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $a =  site_url('Transaksi/input_dospem/' . encrypt_url($row->id_pegawai) . '/' . encrypt_url($id_pengabdian));
                $output .= '

                <div class="card-body d-sm-flex justify-content-between">

                <div class="container">
                <div class="row">                                   
                <div class="col-sm">

                <div class="card">

                <div class="card-body">

                <div class="row">

                <div class="col-md-3 offset-md-1 mx-3 my-3">

                <div class="view overlay zoom" style="position: center;">
                <img src="https://kepegawaian.umy.ac.id/Pegawai/Admin/getImage?id=' . $row->id_pegawai . '" alt="Belum Ada Foto" class="img-fluid size-img img-thumbnail" >
                <div class="mask flex-center waves-effect waves-light">
                </div>
                </div>
                </div>
                <!-- Grid column -->

                <div class="col-md-3 offset-md-1 ml-3 mt-3">
                <table width="100%" border="0">
                <tr>
                <td width="20%">Nama</td>
                <td width="80%">: ' . $row->nama . '</td>
                </tr>
                <tr>
                <td>NIK</td>
                <td>: ' . $row->nik . '</td>
                </tr>
                <tr>
                <td>Unit Kerja</td>
                <td>: ' . $row->unitkerja . '</td>
                </tr>
                </table>
                </div>

                </div>

                <div class="modal-footer">

                <a href="' . $a . '" class="btn btn-primary bg-umy"> Pilih </a>

                </div>

                </div>
                </div>

                </div>

                </div>
                </div>

                </div>


                ';
            }
        } else {
            $output .= '<div class="alert alert-danger" role="alert">
            Data Tidak Ditemukan.
            </div>';
        }
        echo $output;
    }

    function input_dospem($id_pegawai, $id_pengabdian)
    {
        $id_pegawai = decrypt_url($id_pegawai);
        $id_pengabdian = decrypt_url($id_pengabdian);


        if ($id_pegawai == null && $id_pengabdian == null) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/tambah_dospem/' . encrypt_url($id_pengabdian));
        } else if ($id_pegawai != null && $id_pengabdian == null) {
            $this->session->set_flashdata('error', "Id Pengabdian Tidak Boleh Kosong !");
            redirect('Transaksi/tambah_dospem/' . encrypt_url($id_pengabdian));
        } else if ($id_pegawai == null && $id_pengabdian != null) {
            $this->session->set_flashdata('error', "Id Pegawai Tidak Boleh Kosong !");
            redirect('Transaksi/tambah_dospem/' . encrypt_url($id_pengabdian));
        } else {

            $data = array(
                "Employee_Id" => $id_pegawai,
            );

            $this->db->where('Pengabdian_Id', $id_pengabdian);
            $this->db->update('Tr_Pengabdian', $data);

            $this->session->set_flashdata('success', "Data Berhasil Diubah");
            redirect('Transaksi/lihat_pengabdian/' . encrypt_url($id_pengabdian));
        }
    }


    //-----------------------------student exchange-----------------------------//

    function exchange()
    {
        $nim = $this->session->userdata('STUDENTID');

        $data = array(
            "title" => 'Bidang Student Exchange',
            "all" => $this->M_transaksi->exchange($nim),
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "exchange/index_exchange.php",
        );
        $this->load->view('layout/template', $data);
    }

    function lihat_exchange($id)
    {
        $id = decrypt_url($id);

        $data = array(
            "title" => 'Detail Student Exchange',
            "exchange" => $this->M_transaksi->exchange_detail($id),
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "exchange/lihat_exchange.php",
        );
        $this->load->view('layout/template', $data);
    }

    function input_exchange()
    {
        $data = array(
            "title" => 'Tambah Student Exchange',
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "exchange/tambah_exchange.php",
        );
        $this->load->view('layout/template', $data);
    }

    function tambah_exchange()
    {
        $this->form_validation->set_rules('id-student', 'id-student', 'required');
        $this->form_validation->set_rules('nama-program', 'nama-program', 'required');
        $this->form_validation->set_rules('tahun-pelaksanaan', 'tahun-pelaksanaan', 'required');

        date_default_timezone_set("Asia/Jakarta");
        $date_input = date("Y-m-d h:i:sa");

        $random = rand();
        $nim = $_POST['id-student'];


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/input_exchange');
        } else {
            if ($_FILES['input-file']['name'] != "") {
                $stnk = $_FILES['input-file']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/exchange/"; //tempat upload foto
                $file = 'input-file'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file = 'Dokumen-Pendukung-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file);
            } else {
                $new_input_file = null;
            }

            if ($_FILES['input-file-1']['name'] != "") {
                $stnk = $_FILES['input-file-1']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/exchange/"; //tempat upload foto
                $file = 'input-file-1'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_1 = 'Foto-Kegiatan-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_1);
            } else {
                $new_input_file_1 = null;
            }

            $data = array(
                "Nim" => $nim,
                "Nama_Program_Kegiatan" => $_POST['nama-program'],
                "Tahun_Pelaksanaan" => $_POST['tahun-pelaksanaan'],

                "Upload_Dokumen_Pendukung" => $new_input_file,
                "Upload_Foto_Kegiatan" => $new_input_file_1,

                "Created_Date" => $date_input,
                "Created_By" => $nim,
            );

            $this->M_transaksi->simpan_exchange($data);

            $this->session->set_flashdata('success', "Data berhasil Ditambahkan.");
            redirect('Transaksi/exchange/');
        }
    }

    function ubah_exchange($id)
    {
        $id = decrypt_url($id);

        $data = array(
            "title" => 'Ubah Student Exchange',
            "exchange" => $this->M_transaksi->exchange_detail($id),
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "exchange/ubah_exchange.php",
        );
        $this->load->view('layout/template', $data);
    }

    function edit_exchange()
    {
        $this->form_validation->set_rules('id-exchange', 'id-exchange', 'required');
        $this->form_validation->set_rules('id-student', 'id-student', 'required');
        $this->form_validation->set_rules('nama-program', 'nama-program', 'required');
        $this->form_validation->set_rules('tahun-pelaksanaan', 'tahun-pelaksanaan', 'required');

        date_default_timezone_set("Asia/Jakarta");
        $date_input = date("Y-m-d h:i:sa");

        $random = rand();
        $nim = $_POST['id-student'];
        $exchange = $_POST['id-exchange'];


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/ubah_exchange/' . encrypt_url($exchange));
        } else {
            if ($_FILES['input-file']['name'] != "") {
                $stnk = $_FILES['input-file']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/exchange/"; //tempat upload foto
                $file = 'input-file'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file = 'Dokumen-Pendukung-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file);

                unlink("dokument/exchange/" . $_POST['input-file-a']);
            } else {
                $new_input_file = $_POST['input-file-a'];
            }

            if ($_FILES['input-file-1']['name'] != "") {
                $stnk = $_FILES['input-file-1']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/exchange/"; //tempat upload foto
                $file = 'input-file-1'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_1 = 'Foto-Kegiatan-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_1);

                unlink("dokument/exchange/" . $_POST['input-file-a-1']);
            } else {
                $new_input_file_1 = $_POST['input-file-a-1'];
            }

            $data = array(
                "Nim" => $nim,
                "Nama_Program_Kegiatan" => $_POST['nama-program'],
                "Tahun_Pelaksanaan" => $_POST['tahun-pelaksanaan'],

                "Upload_Dokumen_Pendukung" => $new_input_file,
                "Upload_Foto_Kegiatan" => $new_input_file_1,

                "Modified_Date" => $date_input,
                "Modified_By" => $nim,
            );

            $this->db->where('Student_Exchange_Id', $exchange);
            $this->db->update('Tr_Student_Exchange', $data);

            $this->session->set_flashdata('success', "Data berhasil Diubah.");
            redirect('Transaksi/exchange/');
        }
    }

    function hapus_exchange($id)
    {
        $id = decrypt_url($id);

        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('Transaksi/exchange');
        } else {

            $this->db->where('Student_Exchange_Id', $id);
            $this->db->delete('Tr_Student_Exchange');

            $this->session->set_flashdata('success', "Data Berhasil Dihapus");
            redirect('Transaksi/exchange');
        }
    }


    //-----------------------------prestasi mandiri-----------------------------//


    function mandiri()
    {
        $nim = $this->session->userdata('STUDENTID');

        $data = array(
            "title" => 'Bidang Prestasi Mandiri',
            "all" => $this->M_transaksi->mandiri($nim),
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "mandiri/index_mandiri.php",
        );
        $this->load->view('layout/template', $data);
    }

    function lihat_mandiri($id)
    {
        $id = decrypt_url($id);

        $data = array(
            "title" => 'Detail Prestasi Mandiri',
            "mandiri" => $this->M_transaksi->mandiri_detail($id),
            "anggota" => $this->M_transaksi->mandiri_anggota($id),
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "mandiri/lihat_mandiri.php",
        );
        $this->load->view('layout/template', $data);
    }

    function input_mandiri()
    {
        $data = array(
            "title" => 'Tambah Prestasi Mandiri',
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "mandiri/tambah_mandiri.php",
        );
        $this->load->view('layout/template', $data);
    }

    function tambah_mandiri()
    {
        $this->form_validation->set_rules('jenis-pengajuan', 'jenis-pengajuan', 'required');
        $this->form_validation->set_rules('capaian-prestasi', 'capaian-prestasi', 'required');
        $this->form_validation->set_rules('tingkat-prestasi', 'tingkat-prestasi', 'required');
        $this->form_validation->set_rules('nama-lomba', 'nama-lomba', 'required');
        $this->form_validation->set_rules('instansi', 'instansi', 'required');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');

        if ($_POST['tgl-mulai'] == null) {
            $tgl_mulai = null;
        } else {
            $tgl_mulai = date_format(date_create($_POST['tgl-mulai']), "Y-m-d H:i:s");
        }
        if ($_POST['tgl-selesai'] == null) {
            $tgl_selesai = null;
        } else {
            $tgl_selesai = date_format(date_create($_POST['tgl-selesai']), "Y-m-d H:i:s");
        }


        date_default_timezone_set("Asia/Jakarta");
        $date_input = date("Y-m-d h:i:sa");

        $random = rand();

        $nim = $this->session->userdata('STUDENTID');

        $judul = $_POST['nama-lomba'];


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/input_mandiri');
        } else {
            if ($_FILES['input-file']['name'] != "") {
                $stnk = $_FILES['input-file']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/mandiri/"; //tempat upload foto
                $file = 'input-file'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));


                $new_input_file = 'Upload-Sertifikat-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file);
            } else {
                $new_input_file = null;
            }

            if ($_FILES['input-file-1']['name'] != "") {
                $stnk = $_FILES['input-file-1']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/mandiri/"; //tempat upload foto
                $file = 'input-file-1'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_1 = 'Upload-Bukti-Delegasi-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_1);
            } else {
                $new_input_file_1 = null;
            }

            if ($_FILES['input-file-2']['name'] != "") {
                $stnk = $_FILES['input-file-2']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/mandiri/"; //tempat upload foto
                $file = 'input-file-2'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));


                $new_input_file_2 = 'Foto-Penyerahan-Prestasi-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_2);
            } else {
                $new_input_file_2 = null;
            }

            if ($_FILES['input-file-3']['name'] != "") {
                $stnk = $_FILES['input-file-3']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/mandiri/"; //tempat upload foto
                $file = 'input-file-3'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_3 = 'Foto-Kegiatan-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_3);
            } else {
                $new_input_file_3 = null;
            }


            $data = array(
                "Jenis_Pengajuan_Id" => $_POST['jenis-pengajuan'],
                "Capaian_Prestasi_Id" => $_POST['capaian-prestasi'],
                "Tingkat_Prestasi_Id" => $_POST['tingkat-prestasi'],
                "Nama_Tim_Pelaksana" => $_POST['nama-tim'],
                "Nama_Lomba" => $judul,
                "Instansi_Penyelenggara" => $_POST['instansi'],
                "Lokasi_Lomba" => $_POST['lokasi'],
                "Url_Penyelenggara" => $_POST['url'],
                "Kategori_Kegiatan_Id" => $_POST['kategori-kegiatan'],

                "Tanggal_Mulai" => $tgl_mulai,
                "Tanggal_Selesai" => $tgl_selesai,

                "Tahun_Perolehan_Prestasi" => $_POST['tahun-prestasi'],
                "Deskripsi" => $_POST['deskripsi'],
                "Owner" => $nim,

                "Upload_Sertifikat" => $new_input_file,
                "Upload_Bukti_Delegasi" => $new_input_file_1,
                "Foto_Penyerahan_Prestasi" => $new_input_file_2,
                "Foto_Kegiatan" => $new_input_file_3,

                "Created_Date" => $date_input,
                "Created_By" => $nim,
            );

            $this->M_transaksi->simpan_mandiri($data);


            $cek = $this->db->query("select * from Tr_Prestasi_Mandiri where Nama_Lomba='$judul'");

            if ($cek->num_rows() > 0) {
                $rows = $cek->row_array();

                $this->session->set_flashdata('success', "Data Berhasil Disimpan");
                redirect('Transaksi/input_anggota_mandiri/' . encrypt_url($nim) . '/' . encrypt_url($rows['Prestasi_Mandiri_Id']));
            } else {
                $this->session->set_flashdata('error', "Data Gagal Diinputkan");
                redirect('Transaksi/input_mandiri');
            }
        }
    }

    function input_anggota_mandiri($id, $id_mandiri)
    {
        $id = decrypt_url($id);
        $id_mandiri = decrypt_url($id_mandiri);

        $data = array(
            "title" => 'Tambah Anggota Prestasi Mandiri',
            "maha" => $this->M_transaksi->mahasiswa($id),
            "id_mandiri" => $id_mandiri,
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "mandiri/tambah_anggota_mandiri.php",
        );
        $this->load->view('layout/template', $data);
    }

    function input_anggota_mandiri_1($id_mandiri)
    {
        $id_mandiri = decrypt_url($id_mandiri);

        $data = array(
            "title" => 'Tambah Anggota Prestasi Mandiri',
            "cek" => $this->M_transaksi->cek_anggota_mandiri(@$cari, @$id_mandiri),
            "id_mandiri" => $id_mandiri,
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "mandiri/tambah_anggota_mandiri_1.php",
        );
        $this->load->view('layout/template', $data);
    }

    function input_anggota_mandiri_2()
    {
        $id_mandiri = $_POST['id-mandiri'];
        $cari = $_POST['cari'];

        $data = array(
            "title" => 'Tambah Anggota Prestasi Mandiri',
            "cek" => $this->M_transaksi->cek_anggota_mandiri($cari, $id_mandiri),
            "maha" => $this->M_transaksi->mahasiswa($cari),
            "id_mandiri" => $id_mandiri,
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "mandiri/tambah_anggota_mandiri_1.php",
        );
        $this->load->view('layout/template', $data);
    }

    function tambah_anggota_mandiri()
    {
        $this->form_validation->set_rules('id-mandiri', 'id-mandiri', 'required');
        $this->form_validation->set_rules('peran', 'peran', 'required');
        $this->form_validation->set_rules('nim', 'nim', 'required');


        date_default_timezone_set("Asia/Jakarta");
        $date_input = date("Y-m-d h:i:sa");

        $id_mandiri = $_POST['id-mandiri'];
        $nim = $_POST['nim'];

        $si_input = $this->session->userdata('STUDENTID');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/input_anggota_mandiri/' . encrypt_url($nim) . '/' . encrypt_url($id_mandiri));
        } else {

            $data = array(
                "Prestasi_Mandiri_Id" => $id_mandiri,
                "Nim" => $nim,
                "Is_Ketua" => $_POST['peran'],

                "Created_Date" => $date_input,
                "Created_By" => $si_input,
            );

            $this->M_transaksi->simpan_angota_mandiri($data);


            $this->session->set_flashdata('success', "Anggota Berhasil Ditambahkan");
            redirect('Transaksi/lihat_mandiri/' . encrypt_url($id_mandiri));
        }
    }

    function edit_anggota_mandiri($id, $id_mandiri)
    {
        $id = decrypt_url($id);
        $id_mandiri = decrypt_url($id_mandiri);

        $data = array(
            "title" => 'Ubah Anggota Prestasi Mandiri',
            "maha" => $this->M_transaksi->edit_mandiri_anggota($id, $id_mandiri),
            "id_mandiri" => $id_mandiri,
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "mandiri/ubah_anggota_mandiri.php",
        );
        $this->load->view('layout/template', $data);
    }


    function tambah_dospem_1($id)
    {
        $id = decrypt_url($id);

        $data = array(
            "title" => 'Tambah Dosen Pembimbing Prestasi Mandiri',
            "id_mandiri" => $id,
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "mandiri/tambah_dospem_mandiri.php",
        );
        $this->load->view('layout/template', $data);
    }

    function fetch_1()
    {
        $output = '';
        $query = '';
        $id_mandiri = $this->input->post('mandiri');
        $this->load->model('M_transaksi');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->M_transaksi->fetch_data($query);

        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $a =  site_url('Transaksi/input_dospem_1/' . encrypt_url($row->id_pegawai) . '/' . encrypt_url($id_mandiri));
                $output .= '

                <div class="card-body d-sm-flex justify-content-between">

                <div class="container">
                <div class="row">                                   
                <div class="col-sm">

                <div class="card">

                <div class="card-body">

                <div class="row">

                <div class="col-md-3 offset-md-1 mx-3 my-3">

                <div class="view overlay zoom" style="position: center;">
                <img src="https://kepegawaian.umy.ac.id/Pegawai/Admin/getImage?id=' . $row->id_pegawai . '" alt="Belum Ada Foto" class="img-fluid size-img img-thumbnail" >
                <div class="mask flex-center waves-effect waves-light">
                </div>
                </div>
                </div>
                <!-- Grid column -->

                <div class="col-md-3 offset-md-1 ml-3 mt-3">
                <table width="100%" border="0">
                <tr>
                <td width="20%">Nama</td>
                <td width="80%">: ' . $row->nama . '</td>
                </tr>
                <tr>
                <td>NIK</td>
                <td>: ' . $row->nik . '</td>
                </tr>
                <tr>
                <td>Unit Kerja</td>
                <td>: ' . $row->unitkerja . '</td>
                </tr>
                </table>
                </div>

                </div>

                <div class="modal-footer">

                <a href="' . $a . '" class="btn btn-primary bg-umy"> Pilih </a>

                </div>

                </div>
                </div>

                </div>

                </div>
                </div>

                </div>


                ';
            }
        } else {
            $output .= '<div class="alert alert-danger" role="alert">
            Data Tidak Ditemukan.
            </div>';
        }
        echo $output;
    }

    function input_dospem_1($id_pegawai, $id_mandiri)
    {
        $id_pegawai = decrypt_url($id_pegawai);
        $id_mandiri = decrypt_url($id_mandiri);


        if ($id_pegawai == null && $id_mandiri == null) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/tambah_dospem_1/' . encrypt_url($id_mandiri));
        } else if ($id_pegawai != null && $id_mandiri == null) {
            $this->session->set_flashdata('error', "Id Pengabdian Tidak Boleh Kosong !");
            redirect('Transaksi/tambah_dospem_1/' . encrypt_url($id_mandiri));
        } else if ($id_pegawai == null && $id_mandiri != null) {
            $this->session->set_flashdata('error', "Id Pegawai Tidak Boleh Kosong !");
            redirect('Transaksi/tambah_dospem_1/' . encrypt_url($id_mandiri));
        } else {

            $data = array(
                "Employee_Id" => $id_pegawai,
            );

            $this->db->where('Prestasi_Mandiri_Id', $id_mandiri);
            $this->db->update('Tr_Prestasi_Mandiri', $data);

            $this->session->set_flashdata('success', "Data Berhasil Diubah");
            redirect('Transaksi/lihat_mandiri/' . encrypt_url($id_mandiri));
        }
    }

    function ubah_anggota_mandiri()
    {
        $this->form_validation->set_rules('id-mandiri', 'id-mandiri', 'required');
        $this->form_validation->set_rules('peran', 'peran', 'required');
        $this->form_validation->set_rules('nim', 'nim', 'required');


        date_default_timezone_set("Asia/Jakarta");
        $date_input = date("Y-m-d h:i:sa");

        $id_mandiri = $_POST['id-mandiri'];
        $nim = $_POST['nim'];

        $si_input = $this->session->userdata('STUDENTID');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/edit_anggota_mandiri/' . encrypt_url($nim) . '/' . encrypt_url($id_mandiri));
        } else {

            $data = array(
                "Is_Ketua" => $_POST['peran'],

                "Modified_Date" => $date_input,
                "Modified_By" => $si_input,
            );

            $this->db->where('Prestasi_Mandiri_Id', $id_mandiri);
            $this->db->where('Nim', $nim);
            $this->db->update('Tr_Prestasi_Mandiri_Member', $data);


            $this->session->set_flashdata('success', "Data Anggota Berhasil Diubah");
            redirect('Transaksi/lihat_mandiri/' . encrypt_url($id_mandiri));
        }
    }

    function hapus_anggota_mandiri($id, $id_mandiri)
    {
        $id = decrypt_url($id);
        $id_mandiri = decrypt_url($id_mandiri);

        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('Transaksi/lihat_mandiri/' . encrypt_url($id_mandiri));
        } else {
            $this->db->where('Prestasi_Mandiri_Member', $id);
            $this->db->delete('Tr_Prestasi_Mandiri_Member');
            $this->session->set_flashdata('success', "Data Berhasil Dihapus");
            redirect('Transaksi/lihat_mandiri/' . encrypt_url($id_mandiri));
        }
    }

    function ubah_mandiri($id)
    {
        $id = decrypt_url($id);

        $data = array(
            "title" => 'Ubah Prestasi Mandiri',
            "mandiri" => $this->M_transaksi->mandiri_detail($id),
            "footer" => "footer.php",
            "header" => "header_a.php",
            "content" => "mandiri/ubah_mandiri.php",
        );
        $this->load->view('layout/template', $data);
    }

    function edit_mandiri()
    {
        $this->form_validation->set_rules('id-mandiri', 'id-mandiri', 'required');
        $this->form_validation->set_rules('jenis-pengajuan', 'jenis-pengajuan', 'required');
        $this->form_validation->set_rules('capaian-prestasi', 'capaian-prestasi', 'required');
        $this->form_validation->set_rules('tingkat-prestasi', 'tingkat-prestasi', 'required');
        $this->form_validation->set_rules('nama-lomba', 'nama-lomba', 'required');
        $this->form_validation->set_rules('instansi', 'instansi', 'required');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');

        if ($_POST['tgl-mulai'] == null) {
            $tgl_mulai = null;
        } else {
            $tgl_mulai = date_format(date_create($_POST['tgl-mulai']), "Y-m-d H:i:s");
        }
        if ($_POST['tgl-selesai'] == null) {
            $tgl_selesai = null;
        } else {
            $tgl_selesai = date_format(date_create($_POST['tgl-selesai']), "Y-m-d H:i:s");
        }


        date_default_timezone_set("Asia/Jakarta");
        $date_input = date("Y-m-d h:i:sa");

        $random = rand();

        $nim = $this->session->userdata('STUDENTID');

        $id_mandiri = $_POST['id-mandiri'];

        $judul = $_POST['nama-lomba'];


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Tidak Boleh Kosong !");
            redirect('Transaksi/ubah_mandiri/' . encrypt_url($id_mandiri));
        } else {
            if ($_FILES['input-file']['name'] != "") {
                $stnk = $_FILES['input-file']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/mandiri/"; //tempat upload foto
                $file = 'input-file'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));


                $new_input_file = 'Upload-Sertifikat-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file);

                unlink("dokument/mandiri/" . $_POST['input-file-a']);
            } else {
                $new_input_file = $_POST['input-file-a'];
            }

            if ($_FILES['input-file-1']['name'] != "") {
                $stnk = $_FILES['input-file-1']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/mandiri/"; //tempat upload foto
                $file = 'input-file-1'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_1 = 'Upload-Bukti-Delegasi-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_1);

                unlink("dokument/mandiri/" . $_POST['input-file-a-1']);
            } else {
                $new_input_file_1 = $_POST['input-file-a-1'];
            }

            if ($_FILES['input-file-2']['name'] != "") {
                $stnk = $_FILES['input-file-2']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/mandiri/"; //tempat upload foto
                $file = 'input-file-2'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));


                $new_input_file_2 = 'Foto-Penyerahan-Prestasi-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_2);

                unlink("dokument/mandiri/" . $_POST['input-file-a-2']);
            } else {
                $new_input_file_2 = $_POST['input-file-a-2'];
            }

            if ($_FILES['input-file-3']['name'] != "") {
                $stnk = $_FILES['input-file-3']['name'];
                $dir = "uploads/"; //tempat upload foto
                $dirs = "dokument/mandiri/"; //tempat upload foto
                $file = 'input-file-3'; //name pada input type file

                $x = explode('.', $stnk);
                $ekstensi = strtolower(end($x));

                $new_input_file_3 = 'Foto-Kegiatan-' . $nim . '-' . $random . '.' . $ekstensi; //name pada input type file
                $vdir_upload = $dir;
                $file_name = $_FILES['' . $file . '']["name"];
                $vfile_upload = $vdir_upload . $file;
                $tmp_name = $_FILES['' . $file . '']["tmp_name"];
                move_uploaded_file($tmp_name, $dirs . $file_name);
                $source_url3 = $dir . $file_name;
                rename($dirs . $file_name, $dirs . $new_input_file_3);

                unlink("dokument/mandiri/" . $_POST['input-file-a-3']);
            } else {
                $new_input_file_3 = $_POST['input-file-a-3'];
            }


            $data = array(
                "Jenis_Pengajuan_Id" => $_POST['jenis-pengajuan'],
                "Capaian_Prestasi_Id" => $_POST['capaian-prestasi'],
                "Tingkat_Prestasi_Id" => $_POST['tingkat-prestasi'],
                "Nama_Tim_Pelaksana" => $_POST['nama-tim'],
                "Nama_Lomba" => $judul,
                "Instansi_Penyelenggara" => $_POST['instansi'],
                "Lokasi_Lomba" => $_POST['lokasi'],
                "Url_Penyelenggara" => $_POST['url'],
                "Kategori_Kegiatan_Id" => $_POST['kategori-kegiatan'],

                "Tanggal_Mulai" => $tgl_mulai,
                "Tanggal_Selesai" => $tgl_selesai,

                "Tahun_Perolehan_Prestasi" => $_POST['tahun-prestasi'],
                "Deskripsi" => $_POST['deskripsi'],
                "Owner" => $nim,

                "Upload_Sertifikat" => $new_input_file,
                "Upload_Bukti_Delegasi" => $new_input_file_1,
                "Foto_Penyerahan_Prestasi" => $new_input_file_2,
                "Foto_Kegiatan" => $new_input_file_3,

                "Modified_Date" => $date_input,
                "Modified_By" => $nim,
            );

            $this->db->where('Prestasi_Mandiri_Id', $id_mandiri);
            $this->db->update('Tr_Prestasi_Mandiri', $data);

            $this->session->set_flashdata('success', "Data Berhasil Diubah");
            redirect('Transaksi/lihat_mandiri/' . encrypt_url($id_mandiri));
        }
    }

    function hapus_mandiri($id)
    {
        $id = decrypt_url($id);

        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('Transaksi/mandiri');
        } else {
            $this->db->where('Prestasi_Mandiri_Id', $id);
            $this->db->delete('Tr_Prestasi_Mandiri_Member');

            $this->db->where('Prestasi_Mandiri_Id', $id);
            $this->db->delete('Tr_Prestasi_Mandiri');

            $this->session->set_flashdata('success', "Data Berhasil Dihapus");
            redirect('Transaksi/mandiri');
        }
    }
}
