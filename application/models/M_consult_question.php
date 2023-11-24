<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_consult_question extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('*');
        $this->db->from('tbl_consult_question');
        
        if($key!=''){
            $this->db->like("consult_question_text", $key);
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
        $this->db->insert('tbl_consult_question', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_consult_question', $data, array('consult_question_id' => $data['consult_question_id']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_consult_question', array('consult_question_id' => $id));
    }
    
    public function get($id) {
        $this->db->where('consult_question_id', $id);
        $query = $this->db->get('tbl_consult_question', 1);
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>