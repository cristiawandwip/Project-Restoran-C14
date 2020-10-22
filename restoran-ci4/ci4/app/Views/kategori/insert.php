<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>


<?php

echo session()->getFlashdata('info');

?>


<h1>INSERT DATA</h1>

<form action="<?= base_url() ?>/admin/kategori/insert" method="POST">
    kategori : <input type="text" name="kategori" required>
    <br>
    keterangan : <input type="text" name="keterangan" required>
    <br>
    <input type="submit" name="simpan" value="SIMPAN">


</form>

<?= $this->endSection() ?>