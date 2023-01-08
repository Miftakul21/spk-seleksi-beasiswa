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
								<h1 class="m-0 fw-bold">Data Kriteria</h1>
							</div>
						</div>
                        <hr style="border-top: 1px solid #bbb">
                        <div class="alert alert-light shadow-sm" role="alert">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-primary" style="text-decoration: none;">Dashboard</a></li>
                                    <li class="breadcrumb-item text-secondary" aria-current="page">Kriteria</li>
                                </ol>
                            </nav>
                        </div>						
						<button class="btn btn-primary"><i class="fas fa-solid fa-plus mr-2"></i> Tambah Data</button>
						<div class="card mt-3">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-striped w-100" id="table">
										<thead>
											<tr>
											<th>No</th>
											<th>Nama Dokter</th>
											<th>Jenis Kelamin</th>
											<th>Spesialis</th>
											<th style="width: 150">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>Joko</td>
												<td>Bono</td>
												<td>Sinto</td>
												<td>
													<a class="btn btn-sm btn-danger mb-md-0 mb-1" href="#" onclick="return confirm('Anda ingin hapus?')">
														<i class="fas fa-trash fa-fw"></i>
													</a>
													<a class="btn btn-sm btn-info" href="#">
														<i class="fas fa-edit fa-fw"></i>
													</a>
												</td>
											</tr>
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