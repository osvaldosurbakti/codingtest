<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Data Bank Sampah</h1>

  <!-- Tombol Tambah Pegawai -->
  <a href="<?= base_url('/createsampah'); ?>" class="btn btn-success mb-3">Tambah Data Sampah</a>

  <div class="row">
    <div class="col-lg-12">
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
          <?php foreach ($jenis_sampah as $js) :  ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $js['nama']; ?></td>
              <td><?= $js['alamat']; ?></td>
              <td><?= $js['jenis_kelamin']; ?></td>

              <td>
                <a href="<?= base_url('admin/detail/' . $js['id']); ?>" class="btn btn-info">Detail</a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>