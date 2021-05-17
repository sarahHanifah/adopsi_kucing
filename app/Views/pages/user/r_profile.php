<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/r_style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style_sarah.css') ?>">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <!-- Fontstyle -->
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>

    <!-- Title Icon -->
    <link rel="icon" href="<?php echo base_url('assets/img/paw.png') ?>" type="image/icon type">

    <title>Akun Saya</title>
</head>

<body>
    <!-- Navbar -->
    <div class="container-home">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url('user/index') ?>"><i class="brand-cat fa fa-cat"></i>CATTY</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navigasi">
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?php echo base_url('pencarian/pencarian') ?>"><i class="fa fa-search"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?php echo base_url('user/profile') ?>">AKUN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?php echo base_url('user/logout') ?>"><i class="fa fa-heart"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar -->
    <!---single produk detail-->
    <div class="single-produk">
        <div class="row">
            <div class="col-4">
                <div class="profil-user mx-auto d-block"><i class="fa fa-paw"></i></div>
                <a class="side-left-btn btn" href="<?php echo base_url('Kucing/addKucing') ?>">Post A Cat</a>
                <a class="side-left-btn btn" href="<?php echo base_url('User/editUser') ?>">Edit Profile</a>
            </div>
            <div class="col-8">
                <p>Home / Akun
                <p>
                <div class="kucing">

                    <h2>
                        My Profile
                    </h2>

                </div>
                <hr>
                <h4><i class="far fa-address-card"></i> Info Pemilik </h4>

                <div class="table-responsive">
                    <table class="table table-sm table-borderless mb-0">

                        <tbody>
                            <tr class="table-info">
                                <th class="pl-0 w-25" scope="row"><strong>Username</strong></th>
                                <td>@
                                    <?php echo $user['username']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Nama</strong></th>
                                <td>
                                    <?php echo $user['nama']; ?>
                                </td>
                            </tr>
                            <tr class="table-secondary">
                                <th class="pl-0 w-25" scope="row"><strong>Kota</strong></th>
                                <td>
                                    <?php echo $user['nama_kota']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>No Telp</strong></th>
                                <td>
                                    <?php echo $user['no_telfon']; ?>
                                </td>
                            </tr>
                            <tr class="table-info">
                                <th class="pl-0 w-25" scope="row"><strong>Alamat</strong></th>
                                <td>
                                    <?php echo $user['alamat']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Email</strong></th>
                                <td>
                                    <?php echo $user['email']; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <hr>


            </div>


        </div>



        <div class="kucingku">
            <h3 class="mycat">My Cat</h3>
        </div>

        <div class="row">
            <?php $i = 0; ?>
            <?php foreach ($kucing as $row) { ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card text-center ">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="<?php echo base_url('files/' . $row['foto']) ?>" width="271" height="250" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title-lp"><?php echo $row['nama_kucing']; ?></h5>
                            <?php foreach ($ras_kucing as $rk) {
                                if ($row['id_ras'] == $rk['id_ras']) { ?>
                                    <p class="card-text-lp"><?php echo $rk['nama_ras'] ?></p>
                            <?php }
                            } ?>
                            <a class="side-left-btn btn" href="<?php echo base_url('Kucing/lihatKucing/' . $row['id_kucing']) ?>">Lihat</a>
                            <a class="side-left-btn btn" href="<?php echo base_url('Kucing/deleteKucing/' . $row['id_kucing']) ?>">Hapus</a>
                            <a class="side-left-btn btn" href="<?php echo base_url('Kucing/editKucing/' . $row['id_kucing']) ?>">Edit</a>
                        </div>
                    </div>
                </div>

                <?php $i++; ?>
            <?php } ?>
            <?php if ($i == 0) { ?>
                <div class="sarah-tengah">
                    <h3>Tidak ada data.</h3>
                </div>
            <?php } ?>
        </div>


    </div>






    <!--Foooter-->
    <footer class="text-center text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-light navbar-brand"><i class="brand-cat fa fa-cat"></i>CATTY</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-light">TENTANG</a>
                        </li>
                        <li>
                            <a href="#!" class="text-light">KONTAK</a>
                        </li>
                        <li>
                            <a href="#!" class="text-light">BANTUAN</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-light">Footer Content</h5>
                    <p class="text-light">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                        molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                        voluptatem veniam, est atque cumque eum delectus sint!
                    </p>
                    <button class="logout-btn" type="submit" class="btn-light btn-block">LOGOUT</button>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->
        <!-- Copyright -->
        <div class="text-center copyright p-3">
            <i class="fas fa-copyright"></i> 2021 Catty.com
        </div>
        <!-- Copyright -->
        <!-- Copyright -->
        <!-- <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div> -->
        <!-- Copyright -->

    </footer>

    <!--Foooter-->

    <script>
        var menuitem = document.getElementById("menuitem");

        menuitem.style.maxHeight = "0px";

        function menutoggle() {
            if (menuitem.style.maxHeight == "0px") {
                menuitem.style.maxHeight = "200px"
            } else {
                menuitem.style.maxHeight = "0px"
            }
        }
    </script>

    <!--JS untuk produk galeri-->
    <script>
        var produkimg = document.getElementById("produkimg");
        var small = document.getElementsByClassName("small-img");
        small[0].onclick = function() {
            produkimg.src = small[0].src;
        }
        small[1].onclick = function() {
            produkimg.src = small[1].src;
        }
        small[2].onclick = function() {
            produkimg.src = small[2].src;
        }
        small[3].onclick = function() {
            produkimg.src = small[3].src;
        }
    </script>
</body>

</html>