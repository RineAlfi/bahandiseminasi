<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

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
            $table = $input['transaksi'];
            $tanggal = $input['tanggal'];
            $pecah = explode(' - ', $tanggal);
            $mulai = date('Y-m-d', strtotime($pecah[0]));
            $akhir = date('Y-m-d', strtotime(end($pecah)));

            $query = '';
            if ($table == 'barang_masuk') {
                $query = $this->Laporan_m->getBarangMasuk(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
            } else {
                $query = $this->Laporan_m->getBarangKeluar(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
            }

            $this->_cetak($query, $table, $tanggal);
        }
    }

    private function _cetak($data, $table_, $tanggal)
    {
        $this->load->library('CustomPDF');
        $table = $table_ == 'barang_masuk' ? 'Barang Masuk' : 'Barang Keluar'; 'Barang Kembali';

        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Transaksi Bahan Diseminasi';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan_Transaksi';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('Laporan/v_laporan',$this->data, true);	    
        
        // run dompdf
        // $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);

        // Ambil Data Barang Keluar
        // $data['barangkeluar'] = $this->Barangkeluar_m->getBarangKeluar();
        // $data['detail'] = $detail;
        // $barang_id = $detail->barang_id;
        // $ket1 = 'jenis.id_jenis = barang.jenis_id';
        // $ket2 = 'satuan.id = barang.satuan_id';
        // $ket3 = 'barang.id_barang';
        // $detailbarang = $this->Barangkeluar_m->join3('barang', 'jenis', 'satuan', $ket1, $ket2, $ket3, $barang_id);
        // $data['detailbarang'] = $detailbarang;
        // var_dump($data['detail']);

    }
}
