<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_product extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('*');
        $this->db->from('tbl_product');
        
        if($key!=''){
            $this->db->like("product_name", $key);
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
        $this->db->insert('tbl_product', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_product', $data, array('product_id' => $data['product_id']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_product', array('product_id' => $id));
    }
    
    public function get($id) {
        $this->db->where('product_id', $id);
        $query = $this->db->get('tbl_product', 1);
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>