<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Informasi Jenis Sampah</h1>

    <!-- Tampilkan Daftar Jenis Sampah -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Foto</th>
                <th scope="col">Harga Per Kilogram</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($employees as $employee) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $employee['nama']; ?></td>
                    <td><?= $employee['alamat']; ?></td>
                    <td>
                        <?php if (!empty($employee['foto'])) : ?>
                            <img src="<?= base_url('public/uploads/' . $employee['foto']); ?>" alt="<?= $employee['nama']; ?>" width="100">
                        <?php else : ?>
                            Foto tidak tersedia
                        <?php endif; ?>
                    </td>
                    <td><?= number_format($employee['gaji'], 2); ?> IDR</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>