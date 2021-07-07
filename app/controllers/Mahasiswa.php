<?php

class Mahasiswa extends Controller 
{
    public function index()
    {
        $data['judul'] = 'Halaman Mahasiswa';
        $data['mhs']   = $this->model('Mahasiswa_model')->getAllMahasiswa();

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index',$data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs']   = $this->model('Mahasiswa_model')->getaMahasiswaById($id);
       
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail',$data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
        }
        else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
        };

        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    }

    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0){
            Flasher::setFlash('berhasil', 'dihapus', 'success');
        }
        else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
        };

        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    }
}