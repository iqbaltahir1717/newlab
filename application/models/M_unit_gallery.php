<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_unit_gallery extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $id)
    {
        $this->db->select('a.*, b.*, c.*');
        $this->db->from('tbl_gallery a');
        $this->db->join('tbl_unit b','a.unit_id=b.unit_id','LEFT');
        $this->db->join('tbl_gallery_category c','a.gallery_category_id=c.gallery_category_id','LEFT');
        $this->db->where("a.unit_id = ", $id);

        $this->db->order_by('a.gallery_id', 'DESC');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function read_id( $id)
    {
        $this->db->select('a.*, b.*, c.*');
        $this->db->from('tbl_gallery a');
        $this->db->join('tbl_unit b','a.unit_id=b.unit_id','LEFT');
        $this->db->join('tbl_gallery_category c','a.gallery_category_id=c.gallery_category_id','LEFT');
        $this->db->where("a.unit_id = ", $id);

        $this->db->order_by('a.gallery_id', 'DESC');
        
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
        $this->db->insert('tbl_gallery', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_gallery', $data, array('gallery_id' => $data['gallery_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_gallery', array('gallery_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('gallery_id', $id);
        $query = $this->db->get('tbl_gallery', 1);
        return $query->result();
    }

    public function widget()
    {
        $query  = $this->db->query(" SELECT
            (SELECT count(gallery_id) FROM tbl_gallery) as total_gallery
        ");
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
