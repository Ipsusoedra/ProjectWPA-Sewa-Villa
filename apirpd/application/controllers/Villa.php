<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Villa extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Villa_model', 'tb_villa');
    }
    function list_get()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        header('Content-Type: application/json');
        $search = $this->input->post('search', TRUE);
        $limit = $this->input->post('limit', TRUE);
        $start = $this->input->post('start', TRUE);
        $villa = $this->tb_villa->fetch_data($limit, $start, $search);
        if ($villa->num_rows() == 0 && $this->input->post('start') == 0) {
            $result = 0;
        } else {
            $result = 1;
        }
        if ($villa->num_rows() > 0) {
            $this->response([
                'status' => TRUE,
                'data' => $villa->result(),
                'result' => $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Villa tidak ditemukan',
                'result' => $result
            ], REST_Controller::HTTP_OK);
        }
    }


    public function simpan_post()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods:POST");
        header('Content-Type: application/json');
        $villa_id = $this->input->post('villa_id', TRUE);
        if (!empty($_FILES['villa_gambar']['tmp_name'])) {
            $errors = array();
            $allowed_ext = array('jpg', 'jpeg', 'png',);
            $file_size = $_FILES['villa_gambar']['size'];
            $file_tmp = $_FILES['villa_gambar']['tmp_name'];
            $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
            $data = file_get_contents($file_tmp);
            $tmp = explode('.', $_FILES['villa_gambar']['name']);
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
                    'villa_nama' => $this->input->post('villa_nama', TRUE),
                    'villa_lokasi' => $this->input->post('villa_lokasi', TRUE),
                    'villa_harga' => $this->input->post('villa_harga', TRUE),
                    'villa_gambar' => $base64,
                    'villa_deskripsi' => $this->input->post('villa_deskripsi', TRUE),
                    'villa_kontak' => $this->input->post('villa_kontak', TRUE),
                    'villa_kapasitas' => $this->input->post('villa_kapasitas', TRUE),
                ];
            } else {
                echo json_encode($errors);
            }
        } else {
            $data = [
                'villa_nama' => $this->input->post('villa_nama', TRUE),
                'villa_lokasi' => $this->input->post('villa_lokasi', TRUE),
                'villa_harga' => $this->input->post('villa_harga', TRUE),
                'villa_deskripsi' => $this->input->post('villa_deskripsi', TRUE),
                'villa_kontak' => $this->input->post('villa_kontak', TRUE),
                'villa_kapasitas' => $this->input->post('villa_kapasitas', TRUE),

            ];
        }
        if ($villa_id == "") {
            $this->db->insert('tb_villa', $data);
            $msg = "Data villa berhasil ditambahkan";
        } else {
            $this->db->where('villa_id', $villa_id);
            $this->db->update('tb_villa', $data);
            $msg = "Data villa berhasil diubah";
        }
        echo json_encode(['status' => true, 'message' => $msg]);
    }

    public function detail_get($villa_id)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header('Content-Type: application/json');
        $villa = $this->db->get_where('tb_villa', ['villa_id' => $villa_id]);
        if ($villa->num_rows() > 0) {
            $this->response([
                'status' => TRUE,
                'data' => $villa->row()
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Barang tidak ditemukan'
            ], REST_Controller::HTTP_OK);
        }
    }
    public function hapus_get($villa_id)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header('Content-Type: application/json');
        $this->db->where('villa_id', $villa_id);
        $this->db->delete('tb_villa');
        echo json_encode(['status' => true, 'message' => 'Data villa berhasil dihapus']);
    }
}
