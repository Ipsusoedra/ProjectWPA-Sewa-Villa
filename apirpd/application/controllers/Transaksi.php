<?php
include 'koneksi.php';

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Transaksi extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model', 'tb_transaksi');
    }
    function list_get()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        header('Content-Type: application/json');
        $search = $this->input->post('search', TRUE);
        $limit = $this->input->post('limit', TRUE);
        $start = $this->input->post('start', TRUE);
        $transaksi = $this->tb_transaksi->fetch_data($limit, $start, $search);
        if ($transaksi->num_rows() == 0 && $this->input->post('start') == 0) {
            $result = 0;
        } else {
            $result = 1;
        }
        if ($transaksi->num_rows() > 0) {
            $this->response([
                'status' => TRUE,
                'data' => $transaksi->result(),
                'result' => $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Transaksi tidak ditemukan',
                'result' => $result
            ], REST_Controller::HTTP_OK);
        }
    }
    public function simpan_post()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods:POST");
        header('Content-Type: application/json');
        $transaksi_id = $this->input->post('transaksi_id', TRUE);
        $data = [
            'user_id' => $this->input->post('user_id', TRUE),
            'villa_id' => $this->input->post('villa_id', TRUE),
            'payment_id' => $this->input->post('payment_id', TRUE),
            'jumlah_orang' => $this->input->post('jumlah_orang', TRUE),
            'harga_charge' => $this->input->post('harga_charge', TRUE),
            'transaksi_total' => $this->input->post('transaksi_total', TRUE),
            'transaksi_kode' => $this->input->post('transaksi_kode', TRUE),
            'transaksi_tanggal' => $this->input->post('transaksi_tanggal', TRUE),
        ];
        if ($transaksi_id == "") {
            $this->db->insert('tb_transaksi', $data);
            $msg = "Data transaksi berhasil ditambahkan";
        } else {
            $this->db->where('user_id', $transaksi_id);
            $this->db->update('tb_user', $data);
            $msg = "Data transaksi  berhasil diubah";
        }
        echo json_encode(['status' => true, 'message' => $msg]);
    }

    public function detail_get($transaksi_id)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header('Content-Type: application/json');

        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_villa', 'tb_villa.villa_id = tb_transaksi.villa_id');
        $this->db->join('tb_user', 'tb_user.user_id = tb_transaksi.user_id');
        $this->db->join('tb_payment', 'tb_payment.payment_id = tb_transaksi.payment_id');
        $this->db->where('transaksi_id', $transaksi_id);
        $transaksi = $this->db->get();
        if ($transaksi->num_rows() > 0) {
            $this->response([
                'status' => TRUE,
                'data' => $transaksi->row()
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Transaksi tidak ditemukan'
            ], REST_Controller::HTTP_OK);
        }
    }
    public function hapus_get($transaksi_id)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header('Content-Type: application/json');
        $this->db->where('transaksi_id', $transaksi_id);
        $this->db->delete('tb_transaksi');
        echo json_encode(['status' => true, 'message' => 'Data transaksi berhasil dihapus']);
    }
}
