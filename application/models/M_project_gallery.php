<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_project_gallery extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $id)
    {
        $this->db->select('a.*, b.*');
        $this->db->from('tbl_project_gallery a');
        $this->db->join('tbl_project b','a.project_id=b.project_id','LEFT');
        $this->db->where("a.project_id = ", $id);

        $this->db->order_by('a.project_gallery_id', 'DESC');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function read_id($id)
    {
        $this->db->select('a.*, b.*');
        $this->db->from('tbl_project_gallery a');
        $this->db->join('tbl_project b','a.project_id=b.project_id','LEFT');
        $this->db->where("a.project_id = ", $id);

        $this->db->order_by('a.project_gallery_id', 'DESC');
        
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
        $this->db->insert('tbl_project_gallery', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_project_gallery', $data, array('project_gallery_id' => $data['project_gallery_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_project_gallery', array('project_gallery_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('project_gallery_id', $id);
        $query = $this->db->get('tbl_project_gallery', 1);
        return $query->result();
    }

    // ==================================================================================
    public function read_gallery($limit, $start, $key, $gallery) {
        $this->db->select('*');
        $this->db->from('tbl_project_gallery');
        $this->db->where('project_gallery_id', $gallery);
        
        if($key!=''){
            $this->db->like("project_gallery_image", $key);
        }

        if($limit !="" OR $start !=""){
            $this->db->limit($limit, $start);
        }

        $this->db->order_by("project_gallery_id", "DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }
    

    public function create_gallery($data) {
        $this->db->insert('tbl_project_gallery', $data);
    }
    
    public function delete_gallery($token) {
        $this->db->delete('tbl_project_gallery', array('project_gallery_token' => $token));
    }

    public function widget()
    {
        $query  = $this->db->query(" SELECT
            (SELECT count(project_gallery_id) FROM tbl_project_gallery) as tbl_project_gallery
        ");
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
