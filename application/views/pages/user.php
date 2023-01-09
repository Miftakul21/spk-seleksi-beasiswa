	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
			<!-- Navbar -->
			<?php $this->load->view('layout/page/navbar'); ?>
			<!-- Sidebar Menu -->
			<?php $this->load->view('layout/page/sidebar'); ?>
			<div class="content-wrapper">
				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0 fw-bold">Data User</h1>
							</div>
						</div>
                        <hr style="border-top: 1px solid #bbb">
                        <div class="alert alert-light shadow-sm" role="alert">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-primary" style="text-decoration: none;">Dashboard</a></li>
                                    <li class="breadcrumb-item text-secondary" aria-current="page">User</li>
                                </ol>
                            </nav>
                        </div>
						<!-- Modal Tambah Data -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
							<i class="fas fa-solid fa-plus mr-2"></i> Tambah Data
						</button>

						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="" method="post">
											<div class="form-group">
												<label for="nama">Nama<span class="text-danger <?= form_error('nama') ? 'is-invalid' : null ?>">*</span></label>
												<input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>">
												<?php if(form_error('nama')){ ?>
													<div class="invalid-feedback ml-2">
														<?= form_error('nama') ?>
													</div>
												<?php } ?>
											</div>
											<div class="form-group">
												<label for="username">Username<span class="text-danger">*</span></label>
												<input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : null ?>" id="username" name="username" value="<?= set_value('username'); ?>">
												<?php if(form_error('username')){ ?>
													<div class="invalid-feedback ml-2">
														<?= form_error('username') ?>
													</div>
												<?php } ?>
											</div>
											<div class="form-group">
												<label for="password">Password<span class="text-danger">*</span></label>
												<input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : null ?>" id="password" name="password" value="<?= set_value('password') ?>">
												<?php if(form_error('password')){ ?>
													<div class="invalid-feedback ml-2">
														<?= form_error('password') ?>
													</div>
												<?php } ?>
											</div>
											<div class="form-group">
												<label for="level_user">Level User<span class="text-danger">*</span></label>
												<select class="form-control <?= form_error('password') ? 'is-invalid' : null ?>" id="level_user" name="level_user">
													<option>Admin</option>
													<option>Petugas</option>
													<option>Kepala Biro</option>
												</select>
												<?php if(form_error('level_user')){ ?>
													<div class="invalid-feedback ml-2">
														<?= form_error('level_user') ?>
													</div>
												<?php } ?>
											</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Simpan</button>
										<button type="button" class="btn btn-primary">Batal</button>
										</form>
									</div>
								</div>
							</div>
						</div>

						<div class="modal fade" id="tambah_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">New message</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form>
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Recipient:</label>
										<input type="text" class="form-control" id="recipient-name">
									</div>
									<div class="form-group">
										<label for="message-text" class="col-form-label">Message:</label>
										<textarea class="form-control" id="message-text"></textarea>
									</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Send message</button>
								</div>
								</div>
							</div>
						</div>

						<div class="card mt-3">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-striped w-100" id="table">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Username</th>
												<th>Level</th>
												<th style="width: 150">Aksi</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											$i = 1;
											foreach($user as $u): 
										?>
											<tr>
												<td><?= $i++; ?></td>
												<td><?= $u['nama']; ?></td>
												<td><?= $u['username']; ?></td>
												<td><?= $u['level_user']; ?></td>
												<td>
													<a class="btn btn-sm btn-danger mb-md-0 mb-1" href="#" onclick="return confirm('Anda ingin hapus?')">
														<i class="fas fa-trash fa-fw"></i>
													</a>
													<a class="btn btn-sm btn-info" href="#">
														<i class="fas fa-edit fa-fw"></i>
													</a>
												</td>
											</tr>
										<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('layout/page/footer') ?>
		</div>