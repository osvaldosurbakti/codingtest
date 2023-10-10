<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data Bank Sampah</h1>

    <form action="<?= base_url('admin/updateemployee') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="id" value="<?= $employee['id'] ?>">

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= base_url('/uploads/' . $employee['foto']) ?>" class="card-img-top" alt="<?= $employee['nama']; ?>">
                    <div class="card-body">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                        <small class="form-text text-muted">Upload gambar baru jika ingin mengganti gambar yang ada.</small>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $employee['nama'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Deskripsi</label>
                    <textarea class="form-control" id="alamat" name="alamat" required><?= $employee['alamat'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Harga Perkilogram</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki" <?= ($employee['jenis_kelamin'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="Perempuan" <?= ($employee['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('admin/detail/' . $employee['id']) ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>