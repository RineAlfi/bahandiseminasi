<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
    {
        parent::__construct();

        $this->load->model('Dashboard_m');
    }


	//public function __construct(){
		//parent::__construct();
	// 	$this->load->library('session');
	// 	// $this->load->Model('Model_login');
	// 	// // if($this->Login_Model->accountCheck() == true){
	// 	// // 	redirect('setup');
	// 	// // }
	// 	// // if($this->session->userdata('logged_in') == true){
	// 	// // 	redirect('welcome');
	// 	// // }
	// 	// if($this->session->userdata('logged_in') == true){
	// 	// 	redirect('beranda','refresh');
	// 	// }
	//}

	public function index()
	{
        $data['title']="Dashboard | Balitklimat";
		$this->load->view('template/template',$data);
        $this->load->view('v_dashboard');
        $this->load->view('template/footer',$data);

		$data['barang'] = $this->Dashboard_m->count('barang');
        $data['barangmasuk'] = $this->Dashboard_m->count('barang_masuk');
        $data['barangkeluar'] = $this->Dashboard_m->count('barang_keluar');

	}

}
