<?php 

class User_model
{
    private string $nama = "Wahyu";
    
    public function getUser()
    {
        return $this->nama;
    }
}