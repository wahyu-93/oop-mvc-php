<?php 

class About extends Controller
{
    public function index(string $nama = "Wahyu", string $pekerjaan = "Programmer Pemula", string $umur = "28")
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;

        $data['judul'] = 'About my';

        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $data['judul'] = 'my pages';

        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}