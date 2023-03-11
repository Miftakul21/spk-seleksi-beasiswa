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
							<div class="col-sm-12 col-12 d-flex justify-content-between">
								<h1 class="m-0 fw-bold">Laporan Seleksi Beasiswa</h1>
								<div class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-primary" style="text-decoration: none;">Dashboard</a></li>
                                    <li class="breadcrumb-item text-secondary" aria-current="page">Laporan</li>
								</div>
							</div>
						</div>
                        <hr style="border-top: 1px solid #bbb">
						
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						    <i class="fas fa-solid fa-plus mr-2"></i> Tambah Data
						</button> -->


                        <div class="row">
                            <div class="col-4 d-flex align-items-center">
                                <label for="" class="mr-3">Jenis Beasiswa</label>
                                <input type="text" class="form-control col-5">
                            </div>
                            <div class="col-4 d-flex align-items-center">
                                <label for="" class="mr-3">Periode</label>
                                <input type="text" class="form-control col-5">
                            </div>
                            <div class="col-1">
                                <button class="btn btn-primary">Proses</button>
                            </div>
                        </div>

                        <!-- Dikasih Pengkondisian -->
                        <!-- Jika Tidak Melakukan Pencarian Maka Tidak Menampilkan Data -->

                        <button class="btn btn-success mt-3"><i class="fas fa-print text-white"></i> Cetak PDF</button>
                        <!-- Menampilkan Hasil Perangkingan -->
						
                        <div class="d-flex justify-content-center">
                            <div class="col-8">
                                <div class="card ">
                                    <div class="card-body">
                                        <table class="table table-hover table-striped w-100">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">NIM</th>
                                                    <th scope="col">Peringkat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>




					</div>
				</div>
			</div>
			<?php $this->load->view('layout/page/footer') ?>
		</div>
		
<?php $this->load->view('layout/page/bottom'); ?>