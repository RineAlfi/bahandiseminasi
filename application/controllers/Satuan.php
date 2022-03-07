<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        cekmasuk();

        $this->load->Model('Satuan_m');
    }
    
    function index()
    {
        $data['satuan'] = $this->Satuan_m->tampil_data('satuan')->result();
        $data['title'] = "Satuan Barang | Bahan Diseminasi";
        $this->load->view('template/template',$data);
		$this->load->view('DataMaster/satuan/v_satuan',$data);
        $this->load->view('template/footer',$data);
    }

    function tambah()
	{
        $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required|trim');
		$data['title'] = 'Tambah Satuan Barang | Bahan Diseminasi';
        $this->load->view('template/template',$data);
		$this->load->view('DataMaster/satuan/v_tambahsatuan',$data);
        $this->load->view('template/footer',$data);
    }

    function tambah_aksi()
    {
        $satuan = $this->input->post('nama_satuan');
        $data = array(
            'nama_satuan' =>$satuan,
        );
        $this->Satuan_m->input_data($data, 'satuan');
        $this->session->set_flashdata('sukses', 'Data Satuan Barang Berhasil Ditambahkan');
        redirect('satuan');
    }

    function edit($id)
    {
        $where = array('id' => $id);
        $data['satuan'] = $this->db->query("SELECT * FROM satuan WHERE id='$id'")->result();
        $data['title'] = "Edit Data Satuan Barang | Bahan Diseminasi";
        $this->load->view('template/template',$data);
		$this->load->view('DataMaster/satuan/v_editsatuan',$data);
        $this->load->view('template/footer',$data);
    }

    function update()
    {
        $id = $this->input->post('id');
        $data['satuan'] = $this->db->query("SELECT * FROM satuan WHERE id='$id'")->result();
        $satuan = $this->input->post('nama_satuan');
        $data = array(
            'nama_satuan' =>$satuan,
        );
        $where = array(
            'id' => $id
        );
        $this->load->Model('satuan_m');
        $this->Satuan_m->update_data($where, $data, 'satuan');
        $this->session->set_flashdata('sukses', 'Data Satuan Barang Berhasil Diubah');
        redirect('satuan');
    }
    
    function hapus($id)
	{
		$where = array('id' => $id);
		$this->Satuan_m->hapus_data($where, 'satuan');
        $this->session->set_flashdata('sukses', 'Data Satuan Barang Berhasil Dihapus');
		redirect('satuan');
	}
}