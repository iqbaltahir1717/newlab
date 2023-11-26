<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_sim_goals extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key, $part = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_sim_goals');

        if ($key != '') {
            $this->db->like("sim_goals_text", $key);
        }

        if ($part != '') {
            $this->db->like("sim_goals_part", $part);
        }

        if ($limit != "" or $start != "") {
            $this->db->limit($limit, $start);
        }
        $this->db->order_by('sim_goals_part', 'asc');

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
        $this->db->insert('tbl_sim_goals', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_sim_goals', $data, array('sim_goals_id' => $data['sim_goals_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_sim_goals', array('sim_goals_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('sim_goals_id', $id);
        $query = $this->db->get('tbl_sim_goals', 1);
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
