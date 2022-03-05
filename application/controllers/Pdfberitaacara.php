<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfberitaacara extends CI_Controller {
    public function pdf()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_penjualan_toko_kita';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('pdf/v_beritaacara',$this->data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);

        // Ambil Data Barang Keluar
        $data['barangkeluar'] = $this->Barangkeluar_m->getBarangKeluar();
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