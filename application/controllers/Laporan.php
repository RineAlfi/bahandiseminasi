<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekmasuk();

        $this->load->model('Laporan_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('transaksi', 'Transaksi', 'required|in_list[barang_masuk,barang_keluar,barang_kembali]');
        $this->form_validation->set_rules('tanggal', 'Periode Tanggal', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Laporan Transaksi | Bahan Diseminasi";
            $this->load->view('template/template', $data);
            $this->load->view('Laporan/v_laporan', $data);
            $this->load->view('template/footer', $data);

        } else {
            $input = $this->input->post(null, true);
            $tanggal = $input['tanggal'];
            $pecah = explode(' - ', $tanggal);
            $mulai = date('Y-m-d', strtotime($pecah[0]));
            $akhir = date('Y-m-d', strtotime(end($pecah)));
            $this->data['mulai'] = date('d M Y', strtotime($pecah[0]));
            $this->data['akhir'] = date('d M Y', strtotime(end($pecah)));

            if($this->input->post('transaksi') == 'barang_masuk'){
                $this->data['query'] = $this->Laporan_m->getBarangMasuk(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
                $this->data['title_pdf'] = 'Laporan Transaksi Barang Masuk';
                $file_pdf = 'laporan_transaksi_barang_masuk';
                $html=$this->load->view('pdf/v_laporan_barangmasuk', $this->data, true);
            } elseif ($this->input->post('transaksi') == 'barang_keluar'){
                $this->data['query'] = $this->Laporan_m->getBarangKeluar(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
                $this->data['title_pdf'] = 'Laporan Transaksi Barang Keluar';
                $file_pdf = 'laporan_transaksi_barang_keluar';
                $html=$this->load->view('pdf/v_laporan_barangkeluar', $this->data, true);
            } else {
                $this->data['query'] = $this->Laporan_m->getBarangKembali(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
                $this->data['title_pdf'] = 'Laporan Transaksi Barang Kembali';
                $file_pdf = 'laporan_transaksi_barang_kembali';
                $html=$this->load->view('pdf/v_laporan_barangkembali', $this->data, true);
            }

            //panggil library yang kita buat sebelumnya yang bernama pdfgenerator
            $this->load->library('pdfgenerator');

            // setting paper
            $paper = 'A4';

            //orientasi paper potrait / landscape
            $orientation = "portrait";

            //run dompdf
            $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
        }
    }
}
