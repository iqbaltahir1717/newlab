<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_consult_q_option extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key, $consult_question)
    {
        $this->db->select('*');
        $this->db->from('tbl_consult_q_option');

        if ($key != '') {
            $this->db->like("consult_q_option_text", $key);
        }

        if ($consult_question != '') {
            $this->db->like("consult_question_id", $consult_question);
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
        $this->db->insert('tbl_consult_q_option', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_consult_q_option', $data, array('consult_q_option_id' => $data['consult_q_option_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_consult_q_option', array('consult_q_option_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('consult_q_option_id', $id);
        $query = $this->db->get('tbl_consult_q_option', 1);
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
