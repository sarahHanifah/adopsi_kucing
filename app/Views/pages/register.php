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

    <!-- Title Icon -->
    <link rel="icon" href="<?php echo base_url('assets/img/paw.png')?>" type="image/icon type">

    <title>Register</title>
  </head>
  <body>
    <div class="container">
            <div class="card login-form shadow p-3 mb-5 ml-3 rounded">
                <div class="card-body">
                    <h2 class="card-title text-center"><i class="catt fa fa-cat"></i>SIGN UP</h2>
                    <div class="sign-up text-center">Create your own account</div>
                    <div class="card-text">
        <form action="<?php echo base_url('User/saveUser'); ?>" method="post">
            <?= csrf_field() ?>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" required >
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required >   
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-at"></i></span>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required >
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required >
                        </div>
                    </div>
                </div>
            </div>
            <div class="card kanan-register login-form shadow p-3 mb-5 rounded">
                <div class="card-body">
                    <div class="card-text">
                        <br>
                        <br>
                        <div class="input-group mb-3 pt-5 mt-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-city"></i></span>
                            <select class="form-select" name="id_kota" id="id_kota">
                                    <?php foreach($kota as $row){ ?>
                                        <option value="<?php echo $row['id_kota'];?>"><?php echo $row['nama_kota'];?></option>
                                    <?php } ?>
                            </select>   
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                            <input type="text" id="no_telfon" name="no_telfon" class="form-control" placeholder="Telephone" aria-label="Telephone" aria-describedby="basic-addon1" required >  
                        </div> 
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker-alt"></i></span>
                            <textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" aria-label="Alamat" aria-describedby="basic-addon1"></textarea>
                        </div>
                        <button class="daftar-btn" type="submit" class="btn btn-light btn-block">BUAT AKUN BARU</button>
                    </div>
                </div>
            </div>
        </form>
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