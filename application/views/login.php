<body class="bg-gradient-primary">
    <div class="container-fluid" style="margin-top: 5rem;">
        <div class="row d-flex justify-content-between">
            <div class="col-xl-2">
                <img src="<?= base_url() ?>/assets/image/img-dss.svg" class="position-absolute" alt="img-dss" width="600" height="600">
            </div>
            <div class="col-xl-4 offset-2" style="margin-top: 4rem; ">
                <div class="text-center">
                    <h5 style="font-weight: bold;">SISTEM PENDUKUNG KEPUTUSAN SELEKSI BEASISWA</h5>
                    <h5 style="font-weight: bold;">UNIVERSITAS 17 AGUSTUS 1945 SURABAYA</h5>
                </div>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <?php if($this->session->userdata('error')) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <span><?= $this->session->userdata('message'); ?></span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php 
                                        $this->session->unset_userdata('error');
                                        $this->session->unset_userdata('message');
                                        }
                                    ?>
                                    <div class="text-center">
                                        <h1 class=" text-gray-900 mb-4 fw-semibold">Login</>
                                    </div>
                                    <form class="user" action="<?= base_url('login/cek_login') ?>" method='POST'>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user shadow-none <?= form_error('username') ? 'is-invalid' : null  ?>"
                                                placeholder="Masukkan Username" name="username" value="<?= set_value('username'); ?>">
                                            <?php if(form_error('username')){ ?>
                                                <div class="invalid-feedback ml-2">
                                                    <?= form_error('username') ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user shadow-none <?= form_error('password') ? 'is-invalid' : null  ?>"
                                                placeholder="Masukkan Password" name="password" value="<?= set_value('password'); ?>">
                                            <?php if(form_error('password')){ ?>
                                                <div class="invalid-feedback ml-2">
                                                    <?= form_error('password') ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <button class="btn btn-block mt-4" style="background-color: #F95B5B; font-size: 1.1rem; color: #fff;">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>