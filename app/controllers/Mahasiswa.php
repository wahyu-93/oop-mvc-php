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
            var_dump('ok');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}