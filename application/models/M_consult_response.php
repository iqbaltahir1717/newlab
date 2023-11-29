<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_consult_response extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key)
    {
        $this->db->select('*');
        $this->db->from('tbl_consult_response a');
        $this->db->join('tbl_user b', 'a.user_id=b.user_id', 'LEFT');

        if ($key != '') {
            $this->db->like("a.user_id", $key);
        }

        if ($limit != "" or $start != "") {
            $this->db->limit($limit, $start);
        }

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
        $this->db->insert('tbl_consult_response', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_consult_response', $data, array('consult_response_id' => $data['consult_response_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_consult_response', array('consult_response_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('consult_response_id', $id);
        $query = $this->db->get('tbl_consult_response', 1);
        return $query->result();
    }

    public function get_response($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('tbl_consult_response', 1);
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
