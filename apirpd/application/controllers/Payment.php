<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Payment extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Payment_model', 'tb_payment');
    }
    function list_get()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        header('Content-Type: application/json');
        $search = $this->input->post('search', TRUE);
        $limit = $this->input->post('limit', TRUE);
        $start = $this->input->post('start', TRUE);
        $payment = $this->tb_payment->fetch_data($limit, $start, $search);
        if ($payment->num_rows() == 0 && $this->input->post('start') == 0) {
            $result = 0;
        } else {
            $result = 1;
        }
        if ($payment->num_rows() > 0) {
            $this->response([
                'status' => TRUE,
                'data' => $payment->result(),
                'result' => $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Payment tidak ditemukan',
                'result' => $result
            ], REST_Controller::HTTP_OK);
        }
    }
    public function simpan_post()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods:POST");
        header('Content-Type: application/json');
        $payment_id = $this->input->post('payment_id', TRUE);
        if (!empty($_FILES['payment_gambar']['tmp_name'])) {
            $errors = array();
            $allowed_ext = array('jpg', 'jpeg', 'png',);
            $file_size = $_FILES['payment_gambar']['size'];
            $file_tmp = $_FILES['payment_gambar']['tmp_name'];
            $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
            $data = file_get_contents($file_tmp);
            $tmp = explode('.', $_FILES['payment_gambar']['name']);
            $file_ext = end($tmp);
            if (in_array($file_ext, $allowed_ext) === false) {
                $errors[] = 'Ekstensi file tidak di izinkan';
                echo json_encode(['status' => false, 'message' => 'Ekstensi
    file tidak di izinkan']);
                die();
            }
            if ($file_size > 2097152) {
                $errors[] = 'Ukuran file maksimal 2 MB';
                echo json_encode(['status' => false, 'message' => 'Ukuran
    file maksimal 2 MB']);
                die();
            }
            if (empty($errors)) {
                $base64 = 'data:image/' . $type . ';base64,' .
                    base64_encode($data);
                $data = [
                    'payment_nama' => $this->input->post('payment_nama', TRUE),
                    'payment_harga' => $this->input->post('payment_harga', TRUE),
                    'payment_gambar' => $base64,
                ];
            } else {
                echo json_encode($errors);
            }
        } else {
            $data = [
                'payment_nama' => $this->input->post('payment_nama', TRUE),
                'payment_harga' => $this->input->post('payment_harga', TRUE),
            ];
        }
        if ($payment_id == "") {
            $this->db->insert('tb_payment', $data);
            $msg = "Data payment berhasil ditambahkan";
        } else {
            $this->db->where('payment_id', $payment_id);
            $this->db->update('tb_payment', $data);
            $msg = "Data payment berhasil diubah";
        }
        echo json_encode(['status' => true, 'message' => $msg]);
    }

    public function detail_get($payment_id)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header('Content-Type: application/json');
        $payment = $this->db->get_where('tb_payment', ['payment_id' => $payment_id]);
        if ($payment->num_rows() > 0) {
            $this->response([
                'status' => TRUE,
                'data' => $payment->row()
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Payment tidak ditemukan'
            ], REST_Controller::HTTP_OK);
        }
    }
    public function hapus_get($payment_id)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header('Content-Type: application/json');
        $this->db->where('payment_id', $payment_id);
        $this->db->delete('tb_payment');
        echo json_encode(['status' => true, 'message' => 'Data payment berhasil dihapus']);
    }
}
