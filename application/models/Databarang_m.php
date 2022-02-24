<?php
class Databarang_m extends CI_model
{
	public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }
	
	public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function getBarang()
    {
        $this->db->join('jenis j', 'b.jenis_id = j.id_jenis');
        $this->db->join('satuan s', 'b.satuan_id = s.id');
        $this->db->order_by('id_barang');
        return $this->db->get('barang b')->result_array();
    }

	public function hapus_data($where,$table)
    {
		$this->db->where($where);
		$this->db->delete($table);
	}

    public function cekStok($id)
    {
        $this->db->join('satuan s', 'b.satuan_id=s.id');
        return $this->db->get_where('barang b', ['id_barang' => $id])->row_array();
    }

    // public function get_data_barang_bybarang_id($id_barang)
    // {
    //     $hsl=$this->db->select('*');
    //     $this->db->from('barang');
    //     $this->db->join('satuan', 'satuan.id = barang.satuan_id');
    //     // $this->db->join('barang_masuk', 'barang_masuk.barang_id = barang.id_barang');
    //     return $hsl=$this->db->where('id_barang', $id_barang)->get()->row();
    //     if($hsl->num_rows()>0){
    //     foreach ($hsl->result() as $data) {
    //         $hasil=array(
    //             // 'barang_id' => $data->barang_id,
    //             'stok' => $data->stok,
    //             'satuan' => $data->satuan,
    //             );
	// 		}
	// 	}
	// 	return $hasil;
	// }
} 