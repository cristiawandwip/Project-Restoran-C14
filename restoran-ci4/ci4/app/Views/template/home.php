<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/fontawesome/css/all') ?>">
    <title>Restoran SUKSES</title>
</head>

<body style="overflow-x: hidden;">

    <nav class="navbar navbar-expand-lg header">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/Front/HomePage/read/1/') ?>">
                <h2 class="text-uppercase text-white header">Restoran SUKSES</h2>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">


                    <?php if (!empty(session()->get('pelanggan')) && !empty(session()->get('email'))) { ?>
                        <li class="nav-item mt-2 ml-3"><a class="text-white" href="<?= base_url('/Front/HomePage/histori') ?>"><img class="mr-2 mb-1" src="<?= base_url('/icon/clock.svg'); ?>" alt="">
                                Histori
                            </a></li>



                        <li class="nav-item mt-2 ml-3 "><img class="mr-2 mb-1" src="<?= base_url('/icon/akun.svg'); ?>" alt=""> Pelanggan : </li>
                        <li class="nav-item  mt-2 ml-2">
                            <a class="text-white" href="#"> <?= session()->get('pelanggan'); ?> <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item mt-2 ml-2 "><img class="mr-2 mb-1" src="<?= base_url('/icon/email.svg'); ?>" alt=""> Email : </li>
                        <li class="nav-item mt-2 ml-1 text-white">
                            <?= session()->get('email'); ?>
                        </li>

                        <li class="nav-item ml-3 logout">
                            <a href="<?= base_url('/login/logout') ?>" class="btn btn-danger">Logout</a>
                        </li>

                    <?php } else { ?>
                        <li class="nav-item mt-2 ml-5"><a class="text-white" href="<?= base_url('/Front/HomePage/create') ?>"><img class="mr-2 mb-1" src="<?= base_url('/icon/daftar.svg'); ?>" alt="">Daftar</a></li>
                        <li class="nav-item mt-2 ml-5"><a class="text-white" href="<?= base_url('/login') ?>"><img class="mr-2 mb-1" src="<?= base_url('/icon/akun.svg'); ?>" alt="">Login</a></li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>



    <div class="row pl-3 pt-3">
        <div class="col-3">
            <div class="mt-2" style="width: 15rem;">
                <h2 class="font-weight-bolder">Kategori</h2>
                <hr>
                <div class="list-group">
                    <?php foreach ($kategori as $key) : ?>
                        <a href="<?= base_url('/Front/HomePage/read/' . $key['idkategori'] . '')  ?>" class="list-group-item list-group-item-action text-decoration-none"><?= $key['kategori'] ?></a>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="col-9 px-2">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <!-- footer -->
    <div class="card text-center ">
        <div class="card-header footer-medsos ">

            <!-- //instagram// -->
            <a class="mr-2" href="https://www.instagram.com/cristiawan_dwi_p/" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#666666;">
                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g fill="#666666">
                            <path d="M57.33333,21.5c-19.7585,0 -35.83333,16.07483 -35.83333,35.83333v57.33333c0,19.7585 16.07483,35.83333 35.83333,35.83333h57.33333c19.7585,0 35.83333,-16.07483 35.83333,-35.83333v-57.33333c0,-19.7585 -16.07483,-35.83333 -35.83333,-35.83333zM57.33333,35.83333h57.33333c11.85367,0 21.5,9.64633 21.5,21.5v57.33333c0,11.85367 -9.64633,21.5 -21.5,21.5h-57.33333c-11.85367,0 -21.5,-9.64633 -21.5,-21.5v-57.33333c0,-11.85367 9.64633,-21.5 21.5,-21.5zM121.83333,43c-3.95804,0 -7.16667,3.20863 -7.16667,7.16667c0,3.95804 3.20863,7.16667 7.16667,7.16667c3.95804,0 7.16667,-3.20863 7.16667,-7.16667c0,-3.95804 -3.20863,-7.16667 -7.16667,-7.16667zM86,50.16667c-19.7585,0 -35.83333,16.07483 -35.83333,35.83333c0,19.7585 16.07483,35.83333 35.83333,35.83333c19.7585,0 35.83333,-16.07483 35.83333,-35.83333c0,-19.7585 -16.07483,-35.83333 -35.83333,-35.83333zM86,64.5c11.85367,0 21.5,9.64633 21.5,21.5c0,11.85367 -9.64633,21.5 -21.5,21.5c-11.85367,0 -21.5,-9.64633 -21.5,-21.5c0,-11.85367 9.64633,-21.5 21.5,-21.5z">
                            </path>
                        </g>
                    </g>
                </svg>
            </a>

            <!-- GitHub -->
            <a class="mr-2" href="https://www.github.com/cristiawandwip/" target="_blank">
                <img src="https://img.icons8.com/material-sharp/30/666666/github.png">
            </a>

            <!-- whatsapp -->
            <a class="mr-2" href="https://web.whatsapp.com/" target="_blank">
                <img class="mr-2 " style="width: 25px;" src="<?= base_url('/icon/wa1.png'); ?>" alt="">
            </a>
        </div>
        <div class="maps">
            <div class="card-body text-white bg-dark ">
                <h5 class="card-title">Alamat Restoran : </h5>
                <p class="card-text">Jln.Jenggala No.45 Buduran,Sidoarjo.</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3956.253651869743!2d112.722703!3d-7.437161!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xca242be056073ad8!2sSMKN%202%20Buduran!5e0!3m2!1sen!2sid!4v1572789309467!5m2!1sen!2sid" width="400" height="220" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>

        <div class="card-footer font-weight-bolder copy">
            <p class="text-center">Copyright@Restoran SUKSES.com - 2020
                <br>
                Design BY : Cristiawandwip
            </p>
        </div>
    </div>

</body>

</html>