<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_cluster extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key)
    {
        $this->db->select('a.*');
        $this->db->from('tbl_cluster a');


        if ($limit != "" or $start != "") {
            $this->db->limit($limit, $start);
        }

        $this->db->order_by('a.cluster_id', 'DESC');

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
        $this->db->insert('tbl_cluster', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_cluster', $data, array('cluster_id' => $data['cluster_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_cluster', array('cluster_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('cluster_id', $id);
        $query = $this->db->get('tbl_cluster', 1);
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
