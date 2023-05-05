<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/login/style.css" />
  </head>
  <body>
    <div class="circle"></div>
    <h1>PENERIMAAN BEASISWA MAHASISWA BARU <br> UNIVERSITAS 17 AGUSTUS 1945 SURABAYA</h1>  
    <!-- Form Login -->
    <div class="container">
      <div class="row">
        <div class="col-2">
          <img src="<?= base_url()?>assets/image/img-dss-2.svg" />
        </div>
        <div class="col-2">
          <div class="card">
            <h3>Login</h3>
            <form class="form" action="<?php echo base_url('login/cek_login'); ?>" method="POST">
              <label for="username">Username</label>
              <input type="text" placeholder="Masukkan Username" id="username" name="username" />
              <label for="password">Password</label>
              <input type="password" placeholder="Masukkan Password" id="password" name="password" />
              <button>Login</button>
            </form>
            <?php if($this->session->userdata('error')){ ?>
              <span class="form-message">Kesalahan saat login, silahakan coba lagi!</span>
            <?php 
                $this->session->unset_userdata('error');
                $this->session->unset_userdata('message');
              }
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- End Form Login -->
  </body>
</html>
