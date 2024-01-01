<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_unit extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key)
    {
        $this->db->select('a.*');
        $this->db->from('tbl_unit a');

        if ($key != '') {
            $this->db->like("a.unit_name", $key);
            $this->db->or_like("a.unit_bedroom", $key);
        }

        if ($limit != "" or $start != "") {
            $this->db->limit($limit, $start);
        }

        $this->db->order_by('a.unit_id', 'DESC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function create($data)
    {
        $this->db->insert('tbl_unit', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_unit', $data, array('unit_id' => $data['unit_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_unit', array('unit_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('unit_id', $id);
        $query = $this->db->get('tbl_unit', 1);
        return $query->result();
    }

    public function widget()
    {
        $query  = $this->db->query(" SELECT
            (SELECT count(unit_id) FROM tbl_unit) as total_unit
        ");
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
