<?= $this->extend('template/home') ?>

<?= $this->section('content') ?>
<div class="row mt-2">
    <div class="col">
        <h3><?= $judul ?></h3>
        <?php
        $no = 1 + $mulai;
        ?>

        <div class="row">
            <div class="col-10">
                <form action="<?= base_url('Front/HomePage/cari') ?>" method="POST">
                    <div class="form-group col-6 float-left">
                        <label for="awal">Awal</label>
                        <input type="date" name="awal" required class="form-control" id="awal">
                    </div>
                    <div class="form-group col-6 float-left">
                        <label for="sampai">Sampai</label>
                        <input type="date" name="sampai" required class="form-control" id="sampai">
                    </div>
                    <div class="form-group ml-3">
                        <input type="submit" name="cari" value="Cari" class="btn btn-outline-success" role="button">
                    </div>
                </form>
            </div>
        </div>

        <table class="table table-bordered w-50 mt-6">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Detail</th>
            </tr>

            <?php foreach ($vorder as $key => $value) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['tglorder'] ?></td>
                    <td><?= $value['total'] ?></td>
                    <td><a role="button" class="btn btn-outline-danger" href="<?= base_url('/Front/HomePage/detail/' . $value['idorder'] . '') ?>">Detail</a></td>
                </tr>
            <?php endforeach ?>

        </table>
        <?= $pager->makeLinks(1, $tampil, $total, 'bootstrap') ?>
    </div>
</div>

<?= $this->endSection() ?>