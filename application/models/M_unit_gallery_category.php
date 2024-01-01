<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_unit_gallery_category extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $id)
    {
        $this->db->select('a.*');
        $this->db->from('tbl_gallery_category a');

        if ($limit != "" or $start != "") {
            $this->db->limit($limit, $start);
        }

        $this->db->order_by('a.gallery_category_id', 'DESC');
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
        $this->db->insert('tbl_gallery_category', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_gallery_category', $data, array('gallery_category_id' => $data['gallery_category_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_gallery_category', array('gallery_category_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('gallery_category_id', $id);
        $query = $this->db->get('tbl_gallery_category', 1);
        return $query->result();
    }

    public function widget()
    {
        $query  = $this->db->query(" SELECT
            (SELECT count(gallery_category_id) FROM tbl_gallery_category) as total_gallery_category
        ");
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
