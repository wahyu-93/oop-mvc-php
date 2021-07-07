<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <?= Flasher::Flash(); ?>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formModal">
               Tambah Data Mahasiswa
            </button>
            <br><br>

            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach($data['mhs'] as $mhs) :?>
                    <li class="list-group-item"><?= $mhs['nama']; ?>
                        <a  href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id'] ?>" 
                            class="badge badge-danger float-right ml-1"
                            onClick="return confirm('Yakin Dihapus ?' )">
                            Hapus
                        </a>                            
                        <a  href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id'] ?>" 
                            class="badge badge-primary float-right ml-1">
                            Detail
                        </a>                            
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>

                <div class="form-group">
                    <label for="nrp">NRP</label>
                    <input type="number" class="form-control" id="nrp" name="nrp">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select class="form-control" id="jurusan" name="jurusan">
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Bangunan">Teknik Bangunan</option>
                        <option value="Teknik Listrik">Teknik Listrik</option>
                        <option value="Teknik Tambang">Teknik Tambang</option>
                    </select>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>