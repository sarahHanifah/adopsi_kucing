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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style_sarah.css')?>">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    
    <!-- Fontstyle -->
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>

    <!-- Title Icon -->
    <link rel="icon" href="<?php echo base_url('assets/img/paw.png')?>" type="image/icon type">

    <title>Upload Kucing</title>
  </head>
  <body>
    <!-- Navbar -->
    <div class="container-home">
        <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
        <a class="navbar-brand" href="<?php echo base_url('user/index')?>"><i class="brand-cat fa fa-cat"></i>CATTY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navigasi">
              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url('pencarian/pencarian')?>"><i class="fa fa-search"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url('user/profile')?>">AKUN</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url('user/logout')?>"><i class="fa fa-sign-out-alt"></i></a>
                  </li>
                </ul>
              </div>
            </div>
        </div>
        </nav>
    </div>
    <!-- Navbar -->

    
    <!-- Post Kucing -->
    <h3 class="profile-header mt-4">Post A Cat</h3>
    <div class="card card-upload mx-auto d-block">
    <?php echo form_open_multipart('Kucing/saveKucing'); ?>
    <?= csrf_field(); ?>
        <div class="row">
            <div class="col">
                <div class="input-group mb-2">
                    <label class="input-edit">Nama Kucing</label>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-paw"></i></span>
                    <input type="text" class="form-control" id="nama_kucing" name="nama_kucing" placeholder="Nama Kucing" aria-label="Nama Kucing" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-2">
                    <label class="input-edit">Ras Kucing<br></label>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-paw"></i></span>
                    <select class="form-select" name="id_ras" id="id_ras">
                        <?php foreach($ras_kucing as $row){ ?>
                            <option value="<?php echo $row['id_ras'];?>"><?php echo $row['nama_ras'];?></option>
                        <?php } ?>
                     </select> 
                </div>
                <div class="input-group mb-2">
                    <label class="input-edit">Umur<br></label>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-paw"></i></span>
                    <select class="form-select" name="umur" id="umur">
                        <option value="Di bawah 1 tahun">Di bawah 1 tahun</option>
                        <option value="1 - 2 tahun">1 - 2 tahun</option>
                        <option value="Di atas 2 tahun">Di atas 2 tahun</option>
                    </select> 
                </div>
                <div class="input-group mb-2">
                    <label class="input-edit">Jenis Kelamin<br></label>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-paw"></i></span>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="Jantan">Jantan</option>
                        <option value="Betina">Betina</option>  
                    </select> 
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-2">
                  <label class="input-edit">Deskripsi<br></label>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-paw"></i></span>
                  <textarea type="text" id="tentang" name="tentang" class="form-control" placeholder="Tuliskan sesuatu" aria-label="deskripsi" aria-describedby="basic-addon1"></textarea>
                </div>
                <div class="input-group mb-2">
                    <label class="input-edit">Foto<br></label>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-paw"></i></span>
                    <input type="file" name="foto_upload" class="form-control" placeholder="foto" aria-label="foto" aria-describedby="basic-addon1">
                </div>
                <button class="posting-btn" type="submit" class="btn-light btn-block">POST</button>
            </div>
        </div>
    <?php echo form_close(); ?>
    </div>
    <!-- Post Kucing -->

    <!-- Footer -->
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
    <!-- Footer -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
  </body>
</html>