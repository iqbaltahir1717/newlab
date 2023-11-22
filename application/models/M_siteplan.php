<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_siteplan extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key)
    {
        $this->db->select('a.*');
        $this->db->from('tbl_siteplan a');


        if ($limit != "" or $start != "") {
            $this->db->limit($limit, $start);
        }

        $this->db->order_by('a.siteplan_id', 'DESC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function update($data)
    {
        $this->db->update('tbl_siteplan', $data, array('siteplan_id' => $data['siteplan_id']));
    }

    public function get($id)
    {
        $this->db->where('siteplan_id', $id);
        $query = $this->db->get('tbl_siteplan', 1);
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
