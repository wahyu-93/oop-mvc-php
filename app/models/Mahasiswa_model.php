<?php

class Mahasiswa_model
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getAllMahasiswa()
    {
        $this->db->query("select * from ". $this->table);
        return $this->db->resultSet();
    }

    public function getaMahasiswaById($id)
    {
        $this->db->query("select * from ". $this->table . " where id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $qry = "insert into mahasiswa values (null, :nama, :nrp, :email, :jurusan)";
        $this->db->query($qry);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $qry = "delete from " .$this->table. ' where id=:id';
        $this->db->query($qry);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $qry = " UPDATE " .$this->table." SET 
                    nama = :nama,
                    nrp = :nrp,
                    email = :email,
                    jurusan = :jurusan
                 WHERE id = :id ";
                 
        $this->db->query($qry);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariDataMahasiswa()
    {
        $qry = "SELECT * FROM " .$this->table. " WHERE nama LIKE :nama";

        $this->db->query($qry);
        $this->db->bind('nama', "%$_POST[keyword]%");
        $this->db->execute();
        return $this->db->resultSet();
    }
       
}