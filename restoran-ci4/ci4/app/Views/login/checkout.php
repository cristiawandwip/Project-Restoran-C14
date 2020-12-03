<?= $this->extend('template/home') ?>

<?= $this->section('content') ?>



<div class="row mt-2">
    <div class="col ml-5">
        <h3><?= $judul ?></h3>
    </div>
</div>

<ul class="nav navbar-top-links navbar-right pull-right form-inline">
    <li>
        <form role="search" class="app-search hidden-sm hidden-xs m-r-10 ml-5">
            <input type="text" placeholder="Bantuan..." class="form-control"> <a href="<?= base_url('/front/pembelian/index') ?>"><i class="fa fa-search"></i></a>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </li>

</ul>

<div class="row mt-2">

    <div class="col-11 ml-5">
        <h5>
            Cart Atau Keranjang Anda :
        </h5>
        <table class="table table-bordered col-9">
            <tr>
                <th>No</th>
                <th>Pesanan</th>
                <th>Jumlah</th>
            </tr>
            <?php $no = 1;
            foreach ($order as $key => $value) : ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <td><?= $value['menu'] ?></td>
                    <td><?= $value['jumlah'] ?></td>
                </tr>
            <?php endforeach ?>
        </table>

        <div class="mr-10">
            <a href="<?= base_url('/Front/HomePage/read/1/') ?>" class="btn btn-outline-success ">
                Pesan Lagi?
            </a>

            <a href="<?= base_url('/login/logout') ?>" class="btn btn-outline-danger ml-20">
                Keluar!!!
            </a>
        </div>



    </div>
</div>

<?= $this->endSection() ?>