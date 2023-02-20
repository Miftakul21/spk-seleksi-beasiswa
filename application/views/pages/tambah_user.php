	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
			<!-- Navbar -->
			<?php $this->load->view('layout/page/navbar'); ?>
			<!-- Sidebar Menu -->
			<?php $this->load->view('layout/page/sidebar'); ?>
			<div class="content-wrapper">
				<div class="content-header">
					<div class="container-fluid">
                        <div class="alert alert-light shadow-sm" role="alert">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-primary" style="text-decoration: none;">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('user') ?>" class="text-primary" style="text-decoration: none;">User</a></li>
                                    <li class="breadcrumb-item text-secondary" aria-current="page">Tambah User</li>
                                </ol>
                            </nav>
                        </div>
						<div class="row mb-2">
							<div class="col-8">
								<div class="card">
                                    <div class="card-header sidebar-bg-primary text-white">
                                        <i class="fas fa-solid fa-user-plus mr-2"></i> User
                                    </div>
                                    <div class="card-body">
										<form method="POST" action="<?= base_url('user/store') ?>">
											<div class="mb-3">
												<label for="nama" class="form-label">Nama<span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
											</div>
											<div class="mb-3">
												<label for="username" class="form-label">Username<span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
											</div>
											<div class="mb-3">
												<label for="password" class="form-label">Password</label>
												<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
											</div>
											<div class="mb-3">
												<label for="level" class="form-label">Level user <span class="text-danger">*</span></label>
												<select class="form-select form-control" id="level" name="level_user">
													<option selected>-- Pilih Level --</option>
													<option value="Admin">Admin</option>
													<option value="Petugas">Petugas</option>
												</select>
											</div>
											<button type="submit" class="btn btn-primary">Simpan</button>
											<button class="btn btn-secondary">Batal</button>
										</form>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			

			<?php $this->load->view('layout/page/footer') ?>
		</div>