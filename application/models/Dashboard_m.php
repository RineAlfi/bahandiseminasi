<?php
class Dashboard_m extends CI_model
{
    public function get_data($table)
    {
        return $this->db->get($table)->result();
    }

    function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }

}
