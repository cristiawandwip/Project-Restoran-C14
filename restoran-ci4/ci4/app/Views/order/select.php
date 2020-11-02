<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col">
        <h3><?= $judul ?></h3>
    </div>
</div>



<div class="row mt-2">
    <div class="col">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Idorder</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Bayar</th>
                <th>Kembali</th>
                <th>Status</th>
            </tr>
            <?php $no = 1 ?>
            <?php foreach ($order as  $value) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['idorder'] ?></td>
                    <td><?= $value['pelanggan'] ?></td>
                    <td><?= $value['tglorder'] ?></td>
                    <td><?= $value['total'] ?></td>
                    <td><?= $value['bayar'] ?></td>
                    <td><?= $value['kembali'] ?></td>
                    <?php
                    if ($value['status'] == 1) {
                        $status = "LUNAS";
                    } else {
                        $status = "BAYAR";
                    }
                    ?>
                    <td><?= $status ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>


    <?= $this->endSection() ?>