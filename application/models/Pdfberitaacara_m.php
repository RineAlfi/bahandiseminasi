<?php
class Pdfberitaacara_m extends CI_model
{
    public function getBarangKeluar($limit = null, $id_barang = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('barang b', 'barang_keluar.barang_id = barang.id_barang');
        $this->db->join('satuan s', 'barang.satuan_id = satuan.id');
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($id_barang != null) {
            $this->db->where('id_barang', $id_barang);
        }
        if ($range != null) {
            $this->db->where('tanggal_keluar' . ' >=', $range['mulai']);
            $this->db->where('tanggal_keluar' . ' <=', $range['akhir']);
        }
        $this->db->order_by('id_barangkeluar', 'DESC');
        return $this->db->get('barang_keluar')->row();
    }
}