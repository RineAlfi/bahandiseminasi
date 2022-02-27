<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangmasuk extends CI_Controller {
    // public $result = [
    //     'status' => false,
    //     'data' => [],
    // ];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barangmasuk_m');
        // $this->load->model('Databarang_m');
        $this->load->library('form_validation', 'upload');
    }
    public function index()
    {
        $data['title'] = "Barang Masuk | Bahan Diseminasi";
        $data['barangmasuk'] = $this->Barangmasuk_m->getBarangMasuk();
        $this->load->view('template/template', $data);
		$this->load->view('Transaksi/barangmasuk/v_barangmasuk', $data);
        $this->load->view('template/footer', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required|trim');
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah_masuk', 'Jumlah Masuk', 'required|trim|numeric|greater_than[0]');
    }
    
    
    public function tambah()
    {
        $barang = $this->Barangmasuk_m->get('barang');
        $data['title'] = 'Tambah Barang Masuk | Bahan Diseminasi';
        // $data['id_barang'] = $this->Databarang_m->getList();
        // $data['barang'] = $this->Barangmasuk_m->get('barang');
        $data['barang'] = $barang;
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal', 'required');
        $this->form_validation->set_rules('barang_id', 'barang', 'required');
        $this->form_validation->set_rules('jumlah_masuk', 'jumlah masuk', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/template', $data);
            $this->load->view('Transaksi/Barangmasuk/v_tambahbarangmasuk', $data);
            $this->load->view('template/footer', $data);
        } else {
            $foto = $_FILES['foto']['name'];
            if ($foto) {
                $config['upload_path'] = './assets/file/Barangmasuk';
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
                $config['upload_path'] = './assets/file/Barangmasuk';
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
            // $dokumen = $_FILES['dokumen']['name'];
            // $jumlahData = count($_FILES['dokumen']['name']); //Menghitung jumlah file yang masuk
            // for ($i=0; $i < $jumlahData ; $i++);
            //     isset ($_FILES['file']['name'])     == isset ($_FILES['dokumen']['name'][$i]);
            //     isset ($_FILES['file']['type'])     == isset ($_FILES['dokumen']['type'][$i]);
            //     isset ($_FILES['file']['tmp_name']) == isset ($_FILES['dokumen']['tmp_name'][$i]);
            //     isset ($_FILES['file']['size'])     == isset ($_FILES['dokumen']['size'][$i]);
            //     // $dokumen = $_FILES['dokumen']['name'];
            //     // if ($dokumen) {
            //     $config['upload_path'] = './assets/dokumen/barangmasuk';
            //     $config['allowed_types'] = 'jepg|jpg|png|pdf|docx';
            //     // $config['max_size']     = '3000';
            //     $this->load->library('upload', $config);
            //     if ($this->upload->do_upload('file')) {
            //         $fileData = $this->upload->data(); // Lakukan Upload Data
            //         $uploadData[$i]['dokumen'] = $fileData['file_name'];
            //     } 
                // else {
                //     echo "Unggah file gagal!";
                // }
            // endfor;

            // if($uploadData !== null){
            //     //Insert ke db
            //       $insert = $this->Barangmasuk_m->upload($uploadData);

            //       if($insert){
            //           echo " <a href='".base_url()."'> Kembali </a><br> Berhasil Upload ";
            //       } else{
            //           echo "Gagal Upload!"
            //       }
            // }
            $data = [
                'tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'barang_id' => $this->input->post('barang_id'),
                'jumlah_masuk' => $this->input->post('jumlah_masuk'),
                'foto' => $foto,
                'dokumen' => $dokumen,
                'keterangan' => $this->input->post('keterangan')
            ];
            // var_dump($data);
            $this->Barangmasuk_m->input_data($data, 'barang_masuk');
            // $input = $this->input->post(null, true);
            // $insert = $this->Barangmasuk_m->insert('barang_masuk', $input);
            $this->session->set_flashdata('sukses', 'Data Barang Masuk Berhasil Ditambahkan');
            redirect('barangmasuk');
            // }
        }
    }
    
	public function edit($id_barangmasuk)
    {
        $this->_validasi();
        $data['detail'] = $this->Barangmasuk_m->getDetail($id_barangmasuk);
        $data['barang'] = $this->Barangmasuk_m->get('barang');
        $data['barangmasuk'] = $this->Barangmasuk_m->get('barang_masuk', ['id_barangmasuk' => $id_barangmasuk]);
        // var_dump($data['barangmasuk']);
        $data['title'] = 'Edit Data Barang Masuk | Bahan Diseminasi';
        // $data['jenis'] = $this->Databarang_m->get('jenis');
        $this->load->view('template/template', $data);
        $this->load->view('Transaksi/Barangmasuk/v_editbarangmasuk', $data);
        $this->load->view('template/footer', $data);
    }

    public function simpan()
    {
        $id_barangmasuk = $this->input->post('id');
        $ket = ['id_barangmasuk' => $id_barangmasuk];
        $detail = $this->Barangmasuk_m->detailupdate('barang_masuk', $ket);
        // // var_dump($detail);
        $foto = $_FILES['foto']['name'];
            if ($foto) {
                $config['upload_path']   = './assets/file/Barangmasuk';
                $config['allowed_types'] = 'jepg|jpg|png|pdf|docx|zip';
                $config['max_size']      = '3000';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $foto_lama = $detail->foto;
                    unlink(FCPATH.'/assets/file/Barangmasuk/'.$foto_lama);
                    $foto = $this->upload->data('file_name');
                } else {
                    echo "Unggah file gagal!";
                }
            } else {
                $foto = $detail->foto;
            }

            $dokumen = $_FILES['dokumen']['name'];
            if ($dokumen) {
                $config['upload_path']   = './assets/file/Barangmasuk';
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
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'barang_id' => $this->input->post('barang_id'),
            'jumlah_masuk' => $this->input->post('jumlah_masuk'),
            'keterangan' => $this->input->post('keterangan'),
            'foto' => $foto,
            'dokumen' => $dokumen
        ];
        // var_dump($data);
        $this->Barangmasuk_m->update('barang_masuk', $data, $ket);
        $this->session->set_flashdata('sukses', 'Data Barang Masuk Berhasil Diubah');
        redirect('barangmasuk');
    }
    
    public function detail($id_barangmasuk)
    {
        
        $data['title'] = 'Detail Data Barang Masuk | Bahan Diseminasi';
        $detail = $this->Barangmasuk_m->detail_data($id_barangmasuk);
        $data['detail'] = $detail;
        $barang_id = $detail->barang_id;
        $ket1 = 'jenis.id_jenis = barang.jenis_id';
        $ket2 = 'satuan.id = barang.satuan_id';
        $ket3 = 'barang.id_barang';
        $detailbarang = $this->Barangmasuk_m->join3('barang', 'jenis', 'satuan', $ket1, $ket2, $ket3, $barang_id);
        $data['detailbarang'] = $detailbarang;
        $this->load->view('template/template', $data);
        $this->load->view('Transaksi/Barangmasuk/v_detailbarangmasuk', $data);
        $this->load->view('template/footer', $data);
    }

    function hapus($id_barangmasuk)
	{
		$where = array('id_barangmasuk' => $id_barangmasuk);
		$this->Databarang_m->hapus_data($where, 'barang_masuk');
        $this->session->set_flashdata('sukses', 'Data Barang Masuk Berhasil Dihapus');
		redirect('barangmasuk');
	}

    // function get_barang()
    // {
    //     $barang_id=$this->input->post('barang_id');
    //     $data=$this->Databarang_m->get_data_barang_bybarang_id($barang_id);
    //     echo json_encode($data);
    // }
}