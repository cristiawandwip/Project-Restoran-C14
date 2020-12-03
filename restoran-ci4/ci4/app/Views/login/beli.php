<?= $this->extend('template/home') ?>

<?= $this->section('content') ?>

<div class="row mt-2">
    <div class="col ml-5">
        <h3><?= $judul ?></h3>
    </div>
</div>

<div class="row mt-2">

    <div class="col-11 ml-5">
        <table class="table">

            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Hapus</th>
            </tr>

            <?php $no = 1; ?>
            <?php foreach ($menu as $k => $v) : ?>
                <?php foreach ($v as $key => $value) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['menu'] ?></td>
                        <td><?= $value['harga'] ?></td>
                        <td><a href="<?= base_url('/Front/pembelian/kurang/' . $value['idmenu']) ?>">[-]</a>&nbsp;&nbsp;<?= $jumlah[$k] ?>&nbsp;&nbsp;<a href="<?= base_url('/Front/pembelian/tambah/' . $value['idmenu']) ?>">[+]</a></td>
                        <td><?= $jumlah[$k] * $value['harga'] ?></td>
                        <td><a href="<?= base_url('/Front/pembelian/delete/' . $value['idmenu']) ?>"><img src="<?= base_url('/icon/can.svg'); ?>" alt=""></a></td>
                        <?php $total = $total + ($jumlah[$k] * $value['harga']); ?>
                    </tr>
                <?php endforeach ?>
            <?php endforeach ?>
            <tr>
                <td colspan="4">
                    <h4>GRAND TOTAL :</h4>
                </td>
                <td>
                    <h4><?= $total ?></h4>
                </td>
            </tr>
        </table>
        <?php if ($total > 0) : ?>
            <a href="<?= base_url('/Front/pembelian/checkout/' . $total) ?>" role="button" class="btn btn-success">CHECKOUT</a>
        <?php endif ?>
    </div>
</div>

<?= $this->endSection() ?>