<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_product_service extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key, $product)
    {
        $this->db->select('*');
        $this->db->from('tbl_product_service');

        if ($key != '') {
            $this->db->like("product_service_name", $key);
        }

        if ($product != '') {
            $this->db->like("product_id", $product);
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
        $this->db->insert('tbl_product_service', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_product_service', $data, array('product_service_id' => $data['product_service_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_product_service', array('product_service_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('product_service_id', $id);
        $query = $this->db->get('tbl_product_service', 1);
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
