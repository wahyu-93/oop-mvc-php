<?php

class Mahasiswa_model
{
    // private $mhs = [
    //     [
    //         "nama"  => "Wahyu",
    //         "nrp"   => "032323323",
    //         "email" => "wahyu@gmail.com",
    //         "jurusan"=> "Teknik Informatika" 
    //     ],
    //     [
    //         "nama"  => "Biyan",
    //         "nrp"   => "9990323",
    //         "email" => "biyan@gmail.com",
    //         "jurusan"=> "Teknik Informatika" 
    //     ],
    //     [
    //         "nama"  => "Alfatih",
    //         "nrp"   => "0215454",
    //         "email" => "alfatih@gmail.com",
    //         "jurusan"=> "Teknik Informatika" 
    //     ],
    // ];

    // public function getAllMahasiswa()
    // {
    //     return $this->mhs;
    // }


    // contoh konek ke db ini kasih permodel sebagai dontoh

    // database handler
    private $dbh;
    
    // state query
    private $statement;    

    // langsung jalankan ketika objek diinstansiasi
    public function __construct()
    {
        // data source name
        // cara konek dengan PDO
        // mysql:host;dbname
        $dsn = 'mysql:host=localhost;dbname=phpmvc';
        try {
            // new PDO($dsn, user, pass)
            $this->dbh = new PDO($dsn, 'wahyu93', 'wahyu1993');
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }
    
    public function getAllMahasiswa()
    {
        $this->statement = $this->dbh->prepare("SELECT * FROM mahasiswa");
        $this->statement->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
       
}