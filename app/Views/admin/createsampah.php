<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Pegawai</h1>
    <form action="<?= base_url('/saveEmployee'); ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon</label>
                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                </div>

                <div class="form-group">
                    <label for="foto">Foto Pegawai</label>
                    <input type="file" class="form-control-file" id="foto" name="foto" required>
                    <small class="form-text text-muted">Maximum ukuran file gambar adalah 300kb dan file dalam bentuk .jpg dan .jpeg</small>
                </div>
                <div class="form-group">
                    <img src="<?= base_url('img/default.svg'); ?>" alt="Default Gambar" id="default-preview" style="max-width: 100%; max-height: 200px;">
                    <img src="#" alt="Preview Gambar" id="preview" style="display: none; max-width: 100%; max-height: 200px;">
                </div>

                <div class="form-group">
                    <label for="gaji">Gaji</label>
                    <input type="number" class="form-control" id="gaji" name="gaji" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_bergabung">Tanggal Bergabung</label>
                    <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" required>
                </div>

                <div class="form-group">
                    <label for="status_pernikahan">Status Pernikahan</label>
                    <select class="form-control" id="status_pernikahan" name="status_pernikahan" required>
                        <option value="Sudah Menikah">Sudah Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#confirmationModal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin membatalkan penambahan pegawai? Data yang telah dimasukkan tidak akan disimpan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <a href="<?= base_url('pegawai'); ?>" class="btn btn-primary">Batal</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('foto').addEventListener('change', function() {
        var preview = document.getElementById('preview');
        var defaultPreview = document.getElementById('default-preview');
        var fileInput = document.getElementById('foto');
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block'; // Menampilkan preview gambar
            defaultPreview.style.display = 'none'; // Menyembunyikan gambar default
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    });
</script>
<?= $this->endSection(); ?>