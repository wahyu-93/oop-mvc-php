$(function(){
    const base = "http://localhost:8080/oop-mvc-php/public";

    $('.tambahData').on('click', function(){
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });

    $('.ubahData').on('click', function(){
        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');

        $('.modal-body form').attr('action', base + '/mahasiswa/ubah');

        let id = $(this).data('id');
       
        $.ajax({
            url: base + '/mahasiswa/getubah',
            data: {id:id},
            method: 'POST',
            dataType: 'json',
            success: function(data){
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }   
        })
    });
})