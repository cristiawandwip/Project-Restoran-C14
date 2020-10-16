<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<h1> <?= $judul; ?> </h1>

<table border="1px">

    <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Keterangan</th>

    </tr>

    <?php $no = 1; ?>
    <?php foreach ($kategori as $key => $value) : ?>

        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['kategori'] ?></td>
            <td><?= $value['keterangan'] ?></td>

        </tr>

    <?php endforeach; ?>


</table>




<?= $this->endSection() ?>