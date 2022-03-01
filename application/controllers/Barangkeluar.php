<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangkeluar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Barangkeluar_m');
        $this->load->library('form_validation', 'upload');
    }
    public function index()
    {
        $data['title'] = "Barang Keluar | Bahan Diseminasi";
        $data['barangkeluar'] = $this->Barangkeluar_m->getBarangKeluar();
        $this->load->view('template/template', $data);
		$this->load->view('Transaksi/barangkeluar/v_barangkeluar', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah()
    {
        $data['barang'] = $this->Barangkeluar_m->get('barang', null, ['stok >' => 0]);
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal', 'required');
        $this->form_validation->set_rules('barang_id', 'barang', 'required');
        $this->form_validation->set_rules('jumlah_keluar', 'jumlah keluar', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Barang Keluar | Bahan Diseminasi';
            $this->load->view('template/template', $data);
            $this->load->view('Transaksi/Barangkeluar/v_tambahbarangkeluar', $data);
            $this->load->view('template/footer', $data);
        } else {
            $foto = $_FILES['foto']['name'];
            if ($foto) {
                $config['upload_path'] = './assets/file/barangkeluar';
                $config['allowed_types'] = 'jepg|jpg|png|pdf|docx|zip';
                $config['max_size']     = '3000';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                } else {
                    echo "Unggah file gagal!";
                }
            } else {
                $foto = 'default.png';
            }
            
            $dokumen = $_FILES['dokumen']['name'];
            if ($dokumen) {
                $config['upload_path'] = './assets/file/barangkeluar';
                $config['allowed_types'] = 'jepg|jpg|png|pdf|docx|zip';
                $config['max_size']     = '30000';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('dokumen')) {
                    $dokumen = $this->upload->data('file_name');
                } else {
                    echo "Unggah file gagal!";
                }
            } else {
            }
            // $jumlahData = count($_FILES['dokumen']['name']); //Menghitung jumlah file yang keluar
            // for ($i=0; $i < $jumlahData ; $i++);
            // isset ($dokumen['file']['name'])     == isset ($_FILES['dokumen']['name'][$i]);
            // isset ($dokumen['file']['type'])     == isset ($_FILES['dokumen']['type'][$i]);
            // isset ($dokumen['file']['tmp_name']) == isset ($_FILES['dokumen']['tmp_name'][$i]);
            // isset ($dokumen['file']['size'])     == isset ($_FILES['dokumen']['size'][$i]);
            // // $dokumen = $_FILES['dokumen']['name'];
            // // if ($dokumen) {
            // $config['upload_path'] = './assets/dokumen/barangkeluar';
            // $config['allowed_types'] = 'jepg|jpg|png|pdf|docx';
            // $config['max_size']     = '3000';
            // $this->load->library('upload', $config);
            // if ($this->upload->do_upload('dokumen')) {
            //     $dokumen = $this->upload->data('file_name');
            // } else {
            //     echo "Unggah file gagal!";
            // }
            // // } else {
            // // }
            $data = [
                'tanggal_keluar' => $this->input->post('tanggal_keluar'),
                'barang_id' => $this->input->post('barang_id'),
                'jumlah_keluar' => $this->input->post('jumlah_keluar'),
                'foto' => $foto,
                'dokumen' => $dokumen,
                'keterangan' => $this->input->post('keterangan')
            ];
            // var_dump($data);
            $this->Barangkeluar_m->input_data($data, 'barang_keluar');
            $this->session->set_flashdata('sukses', 'Data Barang Keluar Berhasil Ditambahkan');
            redirect('barangkeluar');
        }
    }

    public function edit($id_barangkeluar)
    {
        $data['title'] = 'Edit Data Barang Keluar | Bahan Diseminasi';
        $data['detail'] = $this->Barangkeluar_m->getDetail($id_barangkeluar);
        $data['barang'] = $this->Barangkeluar_m->get('barang', null, ['stok >' => 0]);
        $data['barangkeluar'] = $this->Barangkeluar_m->get('barang_keluar', ['id_barangkeluar' => $id_barangkeluar]);
        $ket1 = 'barang.id_barang = barang_keluar.barang_id';
        $ket2 = 'barang_keluar.id_barangkeluar';
        $detailbarang = $this->Barangkeluar_m->join2('barang_keluar', 'barang', $ket1, $ket2, $id_barangkeluar);
        $data['detailbarang'] = $detailbarang;
        $stokbarang = $detailbarang->stok;
        $stok_valid = $stokbarang + 1;
        // var_dump($stokbarang);
        
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar', 'required|trim');
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan');
        $this->form_validation->set_rules(
            'jumlah_keluar',
            'Jumlah Keluar',
            "required|trim|numeric|greater_than[0]|less_than[{$stok_valid}]",
            [
                'less_than' => "Jumlah Keluar tidak boleh lebih dari {$stokbarang}"
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Data Barang keluar | Bahan Diseminasi';
            $this->load->view('template/template', $data);
            $this->load->view('Transaksi/Barangkeluar/v_editbarangkeluar', $data);
            $this->load->view('template/footer', $data);

        } else {
        $this->load->view('template/template', $data);
        $this->load->view('Transaksi/Barangkeluark/v_editbarangkeluar', $data);
        $this->load->view('template/footer', $data);
        }
    }

    public function simpan()
    {
        $id_barangkeluar = $this->input->post('id');
        $ket = ['id_barangkeluar' => $id_barangkeluar];
        $detail = $this->Barangkeluar_m->detailupdate('barang_keluar', $ket);
        $foto = $_FILES['foto']['name'];
            if ($foto) {
                $config['upload_path']   = './assets/file/Barangkeluar';
                $config['allowed_types'] = 'jepg|jpg|png|pdf|docx|zip';
                $config['max_size']      = '3000';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $foto_lama = $detail->foto;
                    if($foto_lama != 'default.png'){
                    unlink(FCPATH.'/assets/file/Barangkeluar/'.$foto_lama);
                    }
                    $foto = $this->upload->data('file_name');
                } else {
                    echo "Unggah file gagal!";
                }
            } else {
                $foto = $detail->foto;
            }

            $dokumen = $_FILES['dokumen']['name'];
            if ($dokumen) {
                $config['upload_path']   = './assets/file/Barangkeluar';
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
            'tanggal_keluar' => $this->input->post('tanggal_keluar'),
            'barang_id' => $this->input->post('barang_id'),
            'jumlah_keluar' => $this->input->post('jumlah_keluar'),
            'keterangan' => $this->input->post('keterangan'),
            'foto' => $foto,
            'dokumen' => $dokumen
        ];
        // var_dump($data);
        $this->Barangkeluar_m->update('barang_keluar', $data, $ket);
        $this->session->set_flashdata('sukses', 'Data Barang Keluar Berhasil Diubah');
        redirect('barangkeluar');
    }

    public function detail($id_barangkeluar)
    {
        $data['title'] = 'Detail Data Barang Keluar | Bahan Diseminasi';
        $detail = $this->Barangkeluar_m->detail_data($id_barangkeluar);
        $data['detail'] = $detail;
        $barang_id = $detail->barang_id;
        $ket1 = 'jenis.id_jenis = barang.jenis_id';
        $ket2 = 'satuan.id = barang.satuan_id';
        $ket3 = 'barang.id_barang';
        $detailbarang = $this->Barangkeluar_m->join3('barang', 'jenis', 'satuan', $ket1, $ket2, $ket3, $barang_id);
        $data['detailbarang'] = $detailbarang;
        // var_dump($detailbarang);
        $this->load->view('template/template', $data);
        $this->load->view('Transaksi/Barangkeluar/v_detailbarangkeluar', $data);
        $this->load->view('template/footer', $data);
    }

    public function hapus($id_barangkeluar)
	{
		$where = array('id_barangkeluar' => $id_barangkeluar);
		$this->Databarang_m->hapus_data($where, 'barang_keluar');
        $this->session->set_flashdata('sukses', 'Data Barang Keluar Berhasil Dihapus');
		redirect('barangkeluar');
	}

}
