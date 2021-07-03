<?php 

class About
{
    public function index(?string $nama = NULL, ?string $status = NULL)
    {
        // echo 'About/index';
        echo "Haloo nama saya $nama, saya seorang $status";
    }

    public function page()
    {
        echo 'About/page';
    }
}