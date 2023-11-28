<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_sim_q_option extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key, $sim_question)
    {
        $this->db->select('*');
        $this->db->from('tbl_sim_q_option');

        if ($key != '') {
            $this->db->like("sim_q_option_text", $key);
        }

        if ($sim_question != '') {
            $this->db->where("sim_question_id", $sim_question);
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
        $this->db->insert('tbl_sim_q_option', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_sim_q_option', $data, array('sim_q_option_id' => $data['sim_q_option_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_sim_q_option', array('sim_q_option_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('sim_q_option_id', $id);
        $query = $this->db->get('tbl_sim_q_option', 1);
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
