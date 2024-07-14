<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function fetch_data($limit, $start, $search)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_villa', 'tb_villa.villa_id = tb_transaksi.villa_id');
        $this->db->join('tb_user', 'tb_user.user_id = tb_transaksi.user_id');
        $this->db->join('tb_payment', 'tb_payment.payment_id = tb_transaksi.payment_id');

        if ($search != '') {
            $this->db->like('villa_nama', $search);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('transaksi_id', 'DESC');
        return $this->db->get();
    }
}
