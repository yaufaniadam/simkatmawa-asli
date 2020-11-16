<?php

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper(array('url'));
        $this->load->database();
        $this->load->model('M_login');
        // in_access();
    }

    function index()
    {
       $this->session->sess_destroy();
       $this->load->view('login');
   }

   function signin(){

    $username=$this->security->sanitize_filename($_POST['username']);
    $password=$this->security->sanitize_filename($_POST['password']);


    $params = http_build_query(
        array(
            'username' => $username,
            'password' => $password
        )
    );
    $body = array('http' =>
        array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $params
        )
    );
    $context = stream_context_create($body);
    $link = file_get_contents('https://sso.umy.ac.id/api/Authentication/Login', false, $context);
    $json = json_decode($link);
        //return $json;
        //var_dump($json);
        // print_r($json);
        // echo $json->{'code'};
        // print $json->{'description'};

    $ceknum = $json->{'code'};

    if($ceknum==0){
        $cek_akses=$this->M_login->cek_akses($username);
        if (count($cek_akses)!=0) {
            $this->session->set_userdata('email_kat',$username);
            $this->session->set_userdata('level_kat',1);
            redirect('Beranda');
        }else{
            $this->session->set_flashdata('error','Maaf Anda Bukan Pengguna Simkatmawa');
            redirect('Login');
        }
    }else{
        $this->session->set_flashdata('error','username/password Salah');
        redirect('Login');
    }


}

public function logout()
{

    $this->session->unset_userdata('email');
    $this->session->unset_userdata('STUDENTID');
    $this->session->sess_destroy();

    $this->session->set_flashdata('sukses', 'Terimakasih Telah Menggunakan SIMKATMAWA');
    redirect('login');
}

}