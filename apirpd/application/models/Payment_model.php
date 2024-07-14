<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function fetch_data($limit, $start, $search)
    {
        $this->db->select('*');
        $this->db->from('tb_payment');
        if ($search != '') {
            $this->db->like('payment_nama', $search);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('payment_id', 'ASC');
        return $this->db->get();
    }
}
