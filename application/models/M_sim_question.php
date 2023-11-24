<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_sim_question extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('*');
        $this->db->from('tbl_sim_question');
        
        if($key!=''){
            $this->db->like("sim_question_text", $key);
        }

        if($limit !="" OR $start !=""){
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

    public function create($data) {
        $this->db->insert('tbl_sim_question', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_sim_question', $data, array('sim_question_id' => $data['sim_question_id']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_sim_question', array('sim_question_id' => $id));
    }
    
    public function get($id) {
        $this->db->where('sim_question_id', $id);
        $query = $this->db->get('tbl_sim_question', 1);
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>