<?php

class Mahasiswa_model
{
    private $mhs = [
        [
            "nama"  => "Wahyu",
            "nrp"   => "032323323",
            "email" => "wahyu@gmail.com",
            "jurusan"=> "Teknik Informatika" 
        ],
        [
            "nama"  => "Biyan",
            "nrp"   => "9990323",
            "email" => "biyan@gmail.com",
            "jurusan"=> "Teknik Informatika" 
        ],
        [
            "nama"  => "Alfatih",
            "nrp"   => "0215454",
            "email" => "alfatih@gmail.com",
            "jurusan"=> "Teknik Informatika" 
        ],
    ];

    public function getAllMahasiswa()
    {
        return $this->mhs;
    }
}