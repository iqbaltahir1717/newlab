<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_sim_response extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('*');
        $this->db->from('tbl_sim_response a');
        $this->db->join('tbl_user b', 'a.user_id=b.user_id', 'LEFT');
        
        if($key!=''){
            $this->db->like("a.user_id", $key);
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

    public function my_response($user, $date)
    {
        $this->db->select('*');
        $this->db->from('tbl_sim_response a');
        $this->db->join('tbl_user b', 'a.user_id=b.user_id', 'LEFT');
        $this->db->where('a.user_id', $user);
        $this->db->like('a.createtime', $date);
        $this->db->order_by('a.createtime', 'desc');

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
        $this->db->insert('tbl_sim_response', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function update($data) {
        $this->db->update('tbl_sim_response', $data, array('sim_response_id' => $data['sim_response_id']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_sim_response', array('sim_response_id' => $id));
    }
    
    public function get($id) {
        $this->db->where('sim_response_id', $id);
        $query = $this->db->get('tbl_sim_response', 1);
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
