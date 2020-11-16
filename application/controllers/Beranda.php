<?php

class Beranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper(array('url'));
        $this->load->database();
        $this->load->model('M_login');
        $this->load->model('M_transaksi');
        no_access();
    }

    function index()
    {
        $email=$this->session->userdata('email_kat');
        $studentid = GET_STUDENTID($email);
        $nama = GET_NAMA($email);
        $this->session->set_userdata('STUDENTID',$studentid);
        $this->session->set_userdata('nama',$nama);

        $data = array(
            "title"=>'Beranda',
            "mahasiswa"=>$this->M_login->get_profil_mahasiswa($email),
            "rekognisi"=>$this->M_transaksi->rekognisi($studentid),
            "wirausaha"=>$this->M_transaksi->wirausaha($studentid),
            "pengabdian"=>$this->M_transaksi->pengabdian($studentid),
            "exchange"=>$this->M_transaksi->exchange($studentid),
            "mandiri"=>$this->M_transaksi->mandiri($studentid),
            "footer" => "footer.php",
            "header" => "header.php",
            "content" => "beranda/index.php",
        );
        $this->load->view('layout/template', $data);
    }

}