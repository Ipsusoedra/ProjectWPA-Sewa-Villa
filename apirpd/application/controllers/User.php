<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class User extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'tb_user');
    }
    function list_get()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        header('Content-Type: application/json');
        $search = $this->input->post('search', TRUE);
        $limit = $this->input->post('limit', TRUE);
        $start = $this->input->post('start', TRUE);
        $user = $this->tb_user->fetch_data($limit, $start, $search);
        if ($user->num_rows() == 0 && $this->input->post('start') == 0) {
            $result = 0;
        } else {
            $result = 1;
        }
        if ($user->num_rows() > 0) {
            $this->response([
                'status' => TRUE,
                'data' => $user->result(),
                'result' => $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'User tidak ditemukan',
                'result' => $result
            ], REST_Controller::HTTP_OK);
        }
    }
    public function simpan_post()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods:POST");
        header('Content-Type: application/json');
        $user_id = $this->input->post('user_id', TRUE);
        if (!empty($_FILES['user_gambar']['tmp_name'])) {
            $errors = array();
            $allowed_ext = array('jpg', 'jpeg', 'png',);
            $file_size = $_FILES['user_gambar']['size'];
            $file_tmp = $_FILES['user_gambar']['tmp_name'];
            $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
            $data = file_get_contents($file_tmp);
            $tmp = explode('.', $_FILES['user_gambar']['name']);
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
                    'user_nama' => $this->input->post('user_nama', TRUE),
                    'user_password' => md5($this->input->post('user_password', TRUE)),
                    'user_gambar' => $base64,
                    'user_kontak' => $this->input->post('user_kontak', TRUE),
                    'user_status' => $this->input->post('user_status', TRUE),
                ];
            } else {
                echo json_encode($errors);
            }
        } else {
            $data = [
                'user_nama' => $this->input->post('user_nama', TRUE),
                'user_password' => md5($this->input->post('user_password', TRUE)),
                'user_kontak' => $this->input->post('user_kontak', TRUE),
                'user_status' => $this->input->post('user_status', TRUE),
            ];
        }
        if ($user_id == "") {
            $this->db->insert('tb_user', $data);
            $msg = "Data user berhasil ditambahkan";
        } else {
            $this->db->where('user_id', $user_id);
            $this->db->update('tb_user', $data);
            $msg = "Data user berhasil diubah";
        }
        echo json_encode(['status' => true, 'message' => $msg]);
    }

    public function detail_get($user_id)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header('Content-Type: application/json');
        $user = $this->db->get_where('tb_user', ['user_id' => $user_id]);
        if ($user->num_rows() > 0) {
            $this->response([
                'status' => TRUE,
                'data' => $user->row()
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'User tidak ditemukan'
            ], REST_Controller::HTTP_OK);
        }
    }
    public function hapus_get($user_id)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header('Content-Type: application/json');
        $this->db->where('user_id', $user_id);
        $this->db->delete('tb_user');
        echo json_encode(['status' => true, 'message' => 'Data user berhasil dihapus']);
    }
}
