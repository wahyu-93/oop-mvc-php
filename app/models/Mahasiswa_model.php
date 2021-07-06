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
       
}