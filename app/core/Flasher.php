<?php

class Flasher 
{
    // $pesan = gagal, berhasil
    // $aksi = ditambahkan, dihapus, diubah
    // $tipe = success, primary, danger, warning .... 
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi'  => $aksi, 
            'tipe'  => $tipe
        ];
    }   
    
    public static function Flash()
    {
        if (isset($_SESSION['flash'])){

            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'].' alert-dismissible fade show" role="alert">
            Data Mahasiswa <strong>' .$_SESSION['flash']['pesan']. '</strong> ' .$_SESSION['flash']['aksi'].
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        };

        // hapus session
        unset($_SESSION['flash']);
    }
}