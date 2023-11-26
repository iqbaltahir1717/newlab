<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_widget extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($table, $join = '', $value = '', $where = '')
    {
        $this->db->select('*');
        $this->db->from($table);
        if ($join != '')
            $this->db->join($join, $value, 'left');
        if ($where != '')
            $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }
}
