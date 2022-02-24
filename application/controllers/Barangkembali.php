<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangkembali extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Barangkembali_m');
        $this->load->library('form_validation', 'upload');
    }
    public function index()
    {
        $data['title'] = "Barang kembali | Bahan Diseminasi";
        $data['keluarkembali'] = $this->Barangkembali_m->join2inner();
        // $data['keluar'] = $this->Barangkembali_m->join2inner();
        $this->load->view('template/template', $data);
		$this->load->view('Transaksi/barangkembali/v_barangkembali', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah($id_barangkeluar)
    {
        $data['barang'] = $this->Barangkembali_m->get('barang');
        $data['barangkeluar'] = $this->Barangkembali_m->get('barang_keluar', ['id_barangkeluar' => $id_barangkeluar]);
        $data['barangkembali'] = $this->Barangkembali_m->get('barang_kembali');
        $ket1 = 'barang.id_barang = barang_keluar.barang_id';
        $ket2 = 'barang_keluar.id_barangkeluar';
        $barang = $this->Barangkembali_m->join2('barang_keluar', 'barang', $ket1, $ket2, $id_barangkeluar);
        // $data['barang'] = $barang;
        // $stokbarang = $barang->stok;
        // var_dump($stokbarang);
        
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal', 'required');
        $this->form_validation->set_rules('jumlah_kembali', 'Jumlah Kembali', 'required');
        

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Data Barang Kembali | Bahan Diseminasi';
            $this->load->view('template/template', $data);
            $this->load->view('Transaksi/Barangkembali/v_tambahbarangkembali', $data);
            $this->load->view('template/footer', $data);

        } else {
            $foto = $_FILES['foto']['name'];
            if ($foto) {
                $config['upload_path'] = './assets/file/barangkembali';
                $config['allowed_types'] = 'jepg|jpg|png|pdf|docx|zip';
                $config['max_size']     = '3000';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                } else {
                    echo "Unggah file gagal!";
                }
            } else {
            }
            
            $dokumen = $_FILES['dokumen']['name'];
            if ($dokumen) {
                $config['upload_path'] = './assets/file/barangkembali';
                $config['allowed_types'] = 'jepg|jpg|png|pdf|docx|zip';
                $config['max_size']     = '3000';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('dokumen')) {
                    $dokumen = $this->upload->data('file_name');
                } else {
                    echo "Unggah file gagal!";
                }
            } else {
            }
            $data = [
                'barang_idkeluar'=>$barang->id_barangkeluar,
                'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                'jumlah_kembali' => $this->input->post('jumlah_kembali'),
                'keterangan' => $this->input->post('keterangankembali'),
                'foto' => $foto,
                'dokumen' => $dokumen
            ];
            // var_dump($barang);
            $this->Barangkembali_m->input_data($data, 'barang_kembali');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Barang Kembali Ditambahkan </div>');
            redirect('barangkembali');
        }
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'required|trim');
        $this->form_validation->set_rules('jumlah_kembali', 'Jumlah Kembali', 'required|trim|numeric|greater_than[0]');
    }

    public function edit($id_barangkembali)
    {
        $this->_validasi();
        $data['detail'] = $this->Barangkembali_m->getDetail($id_barangkembali);
        $data['barang'] = $this->Barangkembali_m->get('barang');
        $ket = 'barang_kembali.id_barangkembali';
        $detaildata = $this->Barangkembali_m->join2innerdetail($ket, $id_barangkembali);
        $data['barangkembali'] = $detaildata;
        // var_dump($id_barangkembali,$detaildata);
        $data['title'] = 'Edit Data Barang kembali | Bahan Diseminasi';
        $this->load->view('template/template', $data);
        $this->load->view('Transaksi/Barangkembali/v_editbarangkembali', $data);
        $this->load->view('template/footer', $data);
    }

    public function simpan()
    {
        $id_barangkembali = $this->input->post('id');
        $ket = ['id_barangkembali' => $id_barangkembali];
        $detail = $this->Barangkembali_m->detailupdate('barang_kembali', $ket);
        // // var_dump($detail);
        $foto = $_FILES['foto']['name'];
            if ($foto) {
                $config['upload_path']   = './assets/file/Barangkembali';
                $config['allowed_types'] = 'jepg|jpg|png|pdf|docx|zip';
                $config['max_size']      = '3000';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $foto_lama = $detail->foto;
                    unlink(FCPATH.'/assets/file/Barangkembali/'.$foto_lama);
                    $foto = $this->upload->data('file_name');
                } else {
                    echo "Unggah file gagal!";
                }
            } else {
                $foto = $detail->foto;
            }

            $dokumen = $_FILES['dokumen']['name'];
            if ($dokumen) {
                $config['upload_path']   = './assets/file/Barangkembali';
                $config['allowed_types'] = 'jepg|jpg|png|pdf|docx|zip';
                $config['max_size']      = '30000';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('dokumen')) {
                    $dokumen_lama = $detail->dokumen;
                    $dokumen = $this->upload->data('file_name');
                } else {
                    echo "Unggah file gagal!";
                }
            } else {
                $dokumen= $detail->dokumen;
            }
        $data = [
            'tanggal_kembali' => $this->input->post('tanggal_kembali'),
            'barang_id' => $this->input->post('barang_id'),
            'jumlah_kembali' => $this->input->post('jumlah_kembali'),
            'keterangan' => $this->input->post('keterangan'),
            'foto' => $foto,
            'dokumenkembali' => $dokumen
        ];
        // var_dump($data);
        $this->Barangkembali_m->update('barang_kembali', $data, $ket);
        $this->session->set_flashdata('sukses', 'Data Barang kembali Berhasil Diubah');
        redirect('barangkembali');
    }

    public function detail($id_barangkembali)
    {
        $data['title'] = 'Detail Data Barang Kembali | Bahan Diseminasi';
        $ket = 'barang_kembali.id_barangkembali';
        $detaildata = $this->Barangkembali_m->join2innerdetail($ket, $id_barangkembali);
        $data['detaildata'] = $detaildata;
        $barang_id = $detaildata->barang_id;
        $ket1 = 'jenis.id_jenis = barang.jenis_id';
        $ket2 = 'satuan.id = barang.satuan_id';
        $ket3 = 'barang.id_barang';
        $detailbarang = $this->Barangkembali_m->join3('barang', 'jenis', 'satuan', $ket1, $ket2, $ket3, $detaildata->barang_id);
        $data['detailbarang'] = $detailbarang;
        // var_dump($data['detaildata']);
        $this->load->view('template/template', $data);
        $this->load->view('Transaksi/Barangkembali/v_detailbarangkembali', $data);
        $this->load->view('template/footer', $data);
    }

    public function hapus($id_barangkembali)
	{
		$where = array('id_barangkembali' => $id_barangkembali);
		$this->Databarang_m->hapus_data($where, 'barang_kembali');
        $this->session->set_flashdata('sukses', 'Data Barang kembali Berhasil Dihapus');
		redirect('barangkembali');
	}
}
