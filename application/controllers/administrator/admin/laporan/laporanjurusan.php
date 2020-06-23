<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporanjurusan extends CI_Controller
{
    public function index()
    {
        //ambil nilai yang di post
        $filter   = $this->input->post('filter');
        $jurusan  = $this->input->post('jurusan');
        $kelas    = $this->input->post('kelas');

        //cek nilai filter untuk dihubungkan dengan model
        if ($filter == '1') {
            $data['jurusan'] = $this->jurusan_model->view_by_jurusan($jurusan);
        } elseif ($filter == '2') {
            $data['jurusan'] = $this->jurusan_model->view_by_kelas($kelas);
        } elseif ($filter == '3') {
            $data['jurusan'] = $this->jurusan_model->view_by_jurusankelas($jurusan, $kelas);
        } else { // Jika user tidak mengklik tombol tampilkan
            $data['jurusan'] = $this->jurusan_model->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        //kirimkan data yang diambil dari model ke view laporan
        $this->load->library('mypdf');
        $this->mypdf->generate('administrator/laporan/print_jurusan', $data);
    }

    // public function filter($id)
    // {
    //     if ($id == 0) {
    //         $data = $this->db->get('tb_jrs')->result();
    //     } else {
    //         $data = $this->db->get_where('tb_jrs', ['jurusan' => $id])->result();
    //     }
    //     $dt['jrs'] = $data;
    //     $dt['jurusan'] = $id;
    //     $this->load->view('administrator/admin/laporan/result', $dt);
    // }
}
