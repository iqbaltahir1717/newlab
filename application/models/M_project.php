<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_project extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key)
    {
        $this->db->select('a.*');
        $this->db->from('tbl_project a');

        if ($key != '') {
            $this->db->like("a.project_name", $key);
        }

        if ($limit != "" or $start != "") {
            $this->db->limit($limit, $start);
        }

        $this->db->order_by('a.project_id', 'DESC');

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
        $this->db->insert('tbl_project', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_project', $data, array('project_id' => $data['project_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_project', array('project_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('project_id', $id);
        $query = $this->db->get('tbl_project', 1);
        return $query->result();
    }

    public function widget()
    {
        $query  = $this->db->query(" SELECT
            (SELECT count(project_id) FROM tbl_project) as total_project
        ");
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
