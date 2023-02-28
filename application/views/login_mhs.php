<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/login/style2.css" />
  </head>
  <body>
    <div class="logo-login">
      <img src="<?= base_url() ?>assets/image/logo-beasiswa-2.jpg" alt="logo-beasiswa" width="100">
    </div>
    <h5 class="title-form">Sistem Informasi Beasiswa</h5>
    <div class="container">
      <div class="row">
        <div class="col-2">
          <div class="card">
            <p>Masukkan username dan password sesuai <br> dengan Nomor Induk Mahasiswa</p>
            <form class="form" action="<?php echo base_url('loginuser/cek_login_mhs'); ?>" method="POST">
              <label for="username">Username</label>
              <input type="text" placeholder="Masukkan Username" id="username" name="username" />
              <label for="password">Password</label>
              <input type="password" placeholder="Masukkan Password" id="password" name="password" />
              <button>Login</button>
            </form>
            <?php if($this->session->userdata('error')){ ?>
              <span class="form-message"><?= $this->session->userdata('message'); ?></span>
            <?php 
                $this->session->unset_userdata('error');
                $this->session->unset_userdata('message');
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
