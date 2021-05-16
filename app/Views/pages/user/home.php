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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    
    <!-- Fontstyle -->
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>

    <!-- Title Icon -->
    <link rel="icon" href="<?php echo base_url('assets/img/paw.png')?>" type="image/icon type">

    <title>CATTY</title>
    <script type="text/javascript" src="<?php echo base_url('assets/script/script.js')?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
    
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

    <!-- Landing Page -->
    <div id="home">
        <div class="landing-text">
            <h3>Welcome to Cat Adoption Comunity</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                voluptatem veniam, est atque cumque eum delectus sint!</p><br>
            <a href="<?php echo base_url('Kucing/addKucing') ?>" class="btn btn-post btn-primary btn-lg">POST A CAT</a>
        </div>
    </div>
    <!-- Landing Page -->

    <!-- Isi Content -->
    <div class="card card-lp-outer shadow p-2 m-5 rounded">
      <div class="card-body">
          <h3 class="card-title-lp-outer">Rekomendasi</h3>
          <div class="card-text-lp">
              <div class="row">
                  <?php foreach ($rekomendasi as $row) { ?>
                  <div class="col-md-6 col-lg-2">
                      <div class="card card-lp text-center ">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="<?php echo base_url('files/' . $row['foto'])?>" class="img-fluid" />
                          <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                          </a>
                        </div>
                        
                        <div class="card-body">
                          <h5 class="card-title-lp"><?php echo $row['nama_kucing']; ?></h5>
                          <?php foreach($ras_kucing as $rk){ 
                                if($row['id_ras'] == $rk['id_ras']){?>
                                    <p class="card-text-lp"><?php echo $rk['nama_ras'] ?></p>  
                          <?php } } ?>
                          <a href="<?php echo base_url('Kucing/lihatKucing/' . $row['id_kucing']) ?>" class="btn btn-lihat">Lihat</a>
                          <!-- <span style="cursor:pointer" onclick="like_kucing(php echo $row['id_kucing']; ?>)"><i class="fa fa-heart" style="width:30px"></i></span>
                          <span id="like_count">1</span> -->
                        </div>
                      </div>
                  </div>
                  <?php  } ?>
              </div>
          </div>
      </div>
  </div>
    <!-- Isi Content -->

    <!-- Landing Page -->
    
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
    
    <script type="text/javascript">
      function like_kucing(id_kucing){
        $.ajax({
          type: "post",
          url: "<?php echo base_url('Kucing/like')?>",
          data: {id_kucing:id_kucing},
          cache: false,
          success: function(val){
            if(val==1){
              console.log(val);
              $('#like_count').html(val);
            }
          } 
        });
      }
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
  </body>
</html>