<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_content extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key)
    {
        $this->db->select('a.*');
        $this->db->from('tbl_web_content a');


        if ($limit != "" or $start != "") {
            $this->db->limit($limit, $start);
        }

        $this->db->order_by('a.content_id', 'DESC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }
    

    public function update($data) {
        $this->db->update('tbl_web_content', $data, array('content_id' => $data['content_id']));
    }
    
    public function get($id) {
        $this->db->where('content_menu', $id);
        $query = $this->db->get('tbl_web_content', 1);
        return $query->result();
    }


    public function widget() {
        $query  = $this->db->query(" SELECT
            (SELECT count(regulation_id) FROM tbl_web_regulation) as total_regulasi,
            (SELECT count(news_id) FROM tbl_web_news) as total_berita
        ");
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>