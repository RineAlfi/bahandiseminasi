<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Coba_m');
        $this->load->library('form_validation', 'upload');
    }
    public function index()
    {
        $data['title'] = "Barang Masuk | Bahan Diseminasi";
        // $data['barangmasuk'] = $this->Barangmasuk_m->getBarangMasuk();
        // $this->load->view('template/template', $data);
		$this->load->view('coba', $data);
        // $this->load->view('template/footer', $data);
    }
    public function upload_dok(){
        // $this->load->view('coba', $data);
        $jumlahData = count($_FILES['dokumen']['name']); //Menghitung jumlah file yang masuk
        for ($i=0; $i < $jumlahData ; $i++);
            isset ($_FILES['file']['name'])     == isset ($_FILES['dokumen']['name'][$i]);
            isset ($_FILES['file']['type'])     == isset ($_FILES['dokumen']['type'][$i]);
            isset ($_FILES['file']['tmp_name']) == isset ($_FILES['dokumen']['tmp_name'][$i]);
            isset ($_FILES['file']['size'])     == isset ($_FILES['dokumen']['size'][$i]);
            // $dokumen = $_FILES['dokumen']['name'];
            // if ($dokumen) {
            $config['upload_path'] = './assets/dokumen/barangmasuk';
            $config['allowed_types'] = 'jepg|jpg|png|pdf|docx';
            // $config['max_size']     = '3000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $fileData = $this->upload->data(); // Lakukan Upload Data
                $uploadData[$i]['dokumen'] = $fileData['file_name'];
            }
            // vardump($uploadData);
        // endfor;

        if($uploadData !== null){
            vardump($uploadData);
        //     //Insert ke db
            
        //         // $insert = $this->Barangmasuk_m->upload($uploadData);

        //         // if($insert){
        //         //     echo " <a href='".base_url()."'> Kembali </a><br> Berhasil Upload ";
        //         // } else{
        //         //     echo "Gagal Upload!";
        //         // }
        }
    }
}