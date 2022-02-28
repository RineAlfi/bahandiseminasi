<?php
class Masuk_m extends CI_model
{
    public function get_data($table)
    {
        return $this->db->get($table)->result();
    }

    function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function getemail($email, $table, $ket)
    {
        $query = $this->db->get_where($table, [$ket => $email])->row_array();
        return $query;
    }
}
