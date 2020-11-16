<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$this->load->view('welcome_message'); 
	}

	public function embed($file)
	{
		echo "<embed src='".base_url('dokument/rekognisi/'.$file)."' width='100%' height='100%'></embed>";
	}

	public function embed_1($file)
	{
		echo "<embed src='".base_url('dokument/wirausaha/'.$file)."' width='100%' height='100%'></embed>";
	}

	public function embed_2($file)
	{
		echo "<embed src='".base_url('dokument/pengabdian/'.$file)."' width='100%' height='100%'></embed>";
	}

	public function embed_3($file)
	{
		echo "<embed src='".base_url('dokument/exchange/'.$file)."' width='100%' height='100%'></embed>";
	}

	public function embed_4($file)
	{
		echo "<embed src='".base_url('dokument/mandiri/'.$file)."' width='100%' height='100%'></embed>";
	}
}
