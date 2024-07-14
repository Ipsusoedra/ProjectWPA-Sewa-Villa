<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function fetch_data($limit, $start, $search)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        if ($search != '') {
            $this->db->like('user_nama', $search);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('user_id', 'ASC');
        return $this->db->get();
    }
}
