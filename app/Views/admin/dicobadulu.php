<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Kalkulator Bank Sampah</h1>

  <!-- Form untuk Memilih Jenis Sampah dan Input Jumlah Sampah -->
  <form method="post" action="<?= base_url('/calculate'); ?>">
    <div class="form-group">
      <label for="jenis_sampah">Pilih Jenis Sampah:</label>
      <select class="form-control" id="jenis_sampah" name="jenis_sampah" required>
        <option value="">Pilih Jenis Sampah</option>
        <?php foreach ($employees as $employee) : ?>
          <option value="<?= $employee['id']; ?>"><?= $employee['nama']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="jumlah_sampah">Jumlah Sampah (Kilogram):</label>
      <input type="number" class="form-control" id="jumlah_sampah" name="jumlah_sampah" step="0.01" min="0" required>
    </div>
    <button type="submit" class="btn btn-primary">Hitung</button>
  </form>

  <!-- Hasil Perhitungan Total Harga -->
  <?php if (isset($total_harga)) : ?>
    <h3>Total Harga:</h3>
    <p><?= $total_harga; ?> IDR</p>
  <?php endif; ?>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>