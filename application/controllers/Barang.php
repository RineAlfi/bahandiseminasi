<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Databarang_m');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['barang'] = $this->Databarang_m->getBarang();
        $data['title'] = "Data Barang | Bahan Diseminasi";
        $this->load->view('template/template',$data);
		$this->load->view('DataMaster/data_barang/v_data',$data);
        $this->load->view('template/footer',$data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jenis_id', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('satuan_id', 'Satuan Barang', 'required');
    }
   
    public function tambah()
	{
        $this->_validasi();

        if ($this->form_validation->run() == false){
            $data['title'] = 'Tambah Data Barang | Bahan Diseminasi';
            $data['jenis'] = $this->Databarang_m->get('jenis');
            $data['satuan'] = $this->Databarang_m->get('satuan');
            $this->load->view('template/template',$data);
            $this->load->view('DataMaster/data_barang/v_tambahdatabarang',$data);
            $this->load->view('template/footer',$data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->Databarang_m->insert('barang', $input);

            if($insert){
                $this->session->set_flashdata('sukses', 'Data Barang Berhasil Ditambahkan');
                redirect('barang');
            } else {
                $this->session->set_flashdata('error');
                redirect('data_barang/v_tambahdatabarang');
            }
        }
		//$data['title'] = 'Tambah Data Barang | Bahan Diseminasi';
        //$id_jenis = $this->input->post('id', TRUE);
        //$data['jenis'] = $this->Databarang_m->get_nama_jenis($id_jenis);
        //$id = $this->input->post('id', TRUE);
        // $data['satuan'] = $this->Databarang_m->get_nama_satuan($id);
        // $this->load->view('template/template',$data);
		// $this->load->view('DataMaster/data_barang/v_tambahdatabarang',$data);
        // $this->load->view('template/footer',$data);
    }

    public function edit($id)
    {
        // $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Data Barang | Bahan Diseminasi';
            $data['jenis'] = $this->Databarang_m->get('jenis');
            $data['satuan'] = $this->Databarang_m->get('satuan');
            $data['barang'] = $this->Databarang_m->get('barang', ['id_barang' => $id]);
            $this->load->view('template/template', $data);
            $this->load->view('DataMaster/data_barang/v_editdatabarang', $data);
            $this->load->view('template/footer', $data);

        } else {
            $input = $this->input->post(null, true);
            $update = $this->Databarang_m->update('barang', 'id_barang', $id, $input);

            if ($update) {
                $this->session->set_flashdata('sukses', 'Data Barang Berhasil Diubah');
                redirect('barang');

            } else {
                $this->session->$this->session->set_flashdata('error', 'Data Barang Gagal Ditambahkan');
                redirect('data_barang/v_editdatabarang/');
            }
        }
    }
    
    public function hapus($id_barang)
	{
		$where = array('id_barang' => $id_barang);
		$this->Databarang_m->hapus_data($where, 'barang');
        $this->session->set_flashdata('sukses', 'Data Barang Berhasil Dihapus');
		redirect('barang');
	}

    // public function getstok($getId)
    // {
    //     $id = encode_php_tags($getId);
    //     $query = $this->Databarang_m->cekStok($id);
    //     output_json($query);
    // }
}