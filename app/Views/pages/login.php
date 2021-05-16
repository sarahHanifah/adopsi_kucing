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
    
    <!-- Title Icon -->
    <link rel="icon" href="<?php echo base_url('assets/img/paw.png')?>" type="image/icon type">

    <title>Login!</title>
  </head>
  <body>
    <div class="container">
      <div class="card login-form shadow p-3 mb-5 rounded">
        <div class="card-body">
          <h2 class="card-title text-center"><i class="catt fa fa-cat"></i>LOGIN</h2>
          <div class="sign-up text-center">Sign to your account</div>
          <div class="card-text">
            <form action="<?php echo base_url('login/proses_login/') ?>" method="post">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" required>   
              </div>
              <button class="login-btn" type="submit" class="btn-light btn-block">LOGIN</button>
            </form>
            <div class="lupa-password">Lupa password? <a href="#">Klik disini</a></div>
            <!-- <a class="daftar-btn" class="btn btn-light btn-block" href="register.html" role="button">DAFTAR AKUN BARU</a> -->
            <button class="daftar-btn sarah" type="button" class="btn btn-light btn-block"><a href="<?php echo base_url('Register/index') ?>">DAFTAR AKUN BARU</a></button>
          </div>
        </div>
      </div>
    </div>

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