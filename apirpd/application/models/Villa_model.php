<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Villa_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    function fetch_data($limit, $start, $search)
    {
        $this->db->select('*');
        $this->db->from('tb_villa');
        if ($search != '') {
            $this->db->like('villa_nama', $search);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('villa_id', 'ASC');
        return $this->db->get();
    }
}
