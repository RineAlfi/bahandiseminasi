<?php
class Barangmasuk_m extends CI_model
{
	public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
    
	public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function getDetail($id)
	{
		return $this->db->where('id_barangmasuk', $id)->get('barang_masuk')->row();
	}

    public function update($table, $data, $ket)
    {
        $this->db->where($ket);
        $this->db->update($table, $data);
    }

    public function detail_data($barang_id)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('barang', 'barang.id_barang = barang_masuk.barang_id', 'left');
        $this->db->where('barang_masuk.id_barangmasuk', $barang_id);
        $query = $this->db->get();
        return $query->row();
	}

    function join3($table, $table2, $table3, $ktabel21, $ktable31, $ket, $param)
    {

        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $ktabel21, 'left');
        $this->db->join($table3, $ktable31, 'left');
        $this->db->where($ket, $param);
        $query = $this->db->get();
        return $query->row();
    }

	// public function getBarang()
    // {
    //     $this->db->join('jenis j', 'b.jenis_id = j.id_jenis');
    //     $this->db->join('satuan s', 'b.satuan_id = s.id');
    //     $this->db->order_by('id_barang');
    //     $this->db->where('id_barang')
    //     return $this->db->get('barang b')->result_array();
    // }

	public function getBarangMasuk($limit = null, $id_barang = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('barang b', 'bm.barang_id = b.id_barang');
        $this->db->join('satuan s', 'b.satuan_id = s.id');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_barang != null) {
            $this->db->where('id_barang', $id_barang);
        }

        if ($range != null) {
            $this->db->where('tanggal_masuk' . ' >=', $range['mulai']);
            $this->db->where('tanggal_masuk' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_barangmasuk', 'DESC');
        return $this->db->get('barang_masuk bm')->result_array();
    }

    // function get_stok(){
    //     $query = $this->db->get('barang')->result();
    //     return $query;

    // }	

    // public function edit_data($where,$table){
	// 	return $this->db->get_where($table,$where);
	// }

	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

    public function detailupdate($table, $ket){
        $query = $this->db->get_where($table, $ket)->row();
        return $query;
    }
}