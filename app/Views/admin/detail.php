<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Bank Sampah</h1>

    <div class="row">
        <div class="col-md-4">
            <!-- Card untuk Foto Karyawan -->
            <div class="card">
                <img src="<?= base_url('/uploads/' . $employee['foto']) ?>" class="card-img-top" alt="<?= $employee['nama']; ?>">
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <!-- List untuk Informasi Karyawan -->
            <ul class="list-group">
                <li class="list-group-item">
                    <h5 class="mb-0">Nama:</h5>
                    <?= $employee['nama']; ?>
                </li>
                <li class="list-group-item">
                    <h5 class="mb-0">Deskripsi:</h5>
                    <?= $employee['alamat']; ?>
                </li>
                <li class="list-group-item">
                    <h5 class="mb-0">Harga Perkilogram</h5>
                    <?= $employee['jenis_kelamin']; ?>
                </li>
            </ul>

            <!-- Tombol Aksi -->
            <div class="mt-3">
                <a href="<?= base_url('admin/employeedata') ?>" class="btn btn-primary">&laquo; Kembali</a>
                <a href="<?= base_url('admin/editemployee/' . $employee['id']) ?>" class="btn btn-primary">Edit</a>
                <button class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteModal">Hapus</button>
            </div>

            <!-- Modal Konfirmasi Hapus -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus Data Bank Sampah ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a href="<?= base_url('admin/deleteemployee/' . $employee['id']) ?>" class="btn btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>