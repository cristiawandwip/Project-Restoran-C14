<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<h1> UPDATE DATA</h1>

<form action="<?= base_url('/admin/kategori/update') ?>" method="POST">
    kategori : <input type="text" name="kategori" value="<?= $kategori['kategori'] ?>" required>
    <br>
    keterangan : <input type="text" name="keterangan" value="<?= $kategori['keterangan'] ?>" required>
    <br>
    <input type="hidden" name="idkategori" value="<?= $kategori['idkategori'] ?>">
    <input type="submit" name="simpan" value="SIMPAN">


</form>

<?= $this->endSection() ?>