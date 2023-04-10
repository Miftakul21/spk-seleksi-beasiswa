  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #F05757">
      <div class="container">
        <a class="navbar-brand ms-2" href="#">
          <i class="fas fa-graduation-cap" style="font-size: 2.3rem;"></i>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= base_url('home') ?>">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                Beasiswa
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?= base_url('daftarbeasiswa') ?>">Daftar</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('informasi'); ?>">Informasi</a>
            </li>
          </ul>
          <div class="d-flex profil-user">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <div class="nav-link d-flex align-items-center" data-toggle="dropdown">
                  <i class="fas fa-user-circle font-weight-normal text-white mr-2" style="font-size: 1.6rem;"></i>
                  <span class="text-white font-weight-normal"><?= $this->session->userdata('nama_mhs'); ?></span>
                </div>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <!-- 
                    base_url('loginuser/logout'); 
                  -->
                  <a href="<?= base_url('login/logout'); ?>" class="dropdown-item text-danger">
                    <i class="fas fa-sharp fa-solid fa-door-open mr-2"></i>Log Out
                    <span class="float-right text-muted text-sm"></span>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
