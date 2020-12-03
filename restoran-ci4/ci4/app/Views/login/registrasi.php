<?= $this->extend('template/home') ?>

<?= $this->section('content') ?>

<div class="col">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        $error = session()->getFlashdata('info');
        foreach ($error as $key => $value) {
            echo $key . "=>" . $value;
            echo "<br>";
        }
        echo '</div>';
    }
    ?>
</div>

<div class="col">
    <h3><?= $judul ?></h3>
</div>

<div class="col-8">
    <form action="<?= base_url('/front/homepage/daftar') ?>" method="POST">
        <div class="form-group">
            <label for="nama">Nama Pelanggan :</label>
            <input type="text" name="nama" required class="form-control" id="nama">
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" required class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="telepon">No.Telepon :</label>
            <input type="text" name="telepon" required class="form-control" id="telepon">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat :</label>
            <input type="text" name="alamat" required class="form-control" id="alamat">
        </div>
        <div class="form-group">
            <label for="password">Password :</label>
            <input type="password" name="password" required class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="konfirmasi">Konfirmasi Password :</label>
            <input type="password" name="konfirmasi" required class="form-control" id="konfirmasi">
        </div>
        <div class="form-group">
            <input type="submit" name="simpan" value="SIMPAN" class="btn btn-success">
        </div>

    </form>
</div>
<?= $this->endSection() ?>