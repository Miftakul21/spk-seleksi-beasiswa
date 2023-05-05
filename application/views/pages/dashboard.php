	<style>
		@media only screen and (max-width: 600px){
			
		}
	</style>
	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
			<!-- navbar -->
			<?php $this->load->view('layout/page/navbar')?>
			<!-- Sidebar Menu -->
			<?php $this->load->view('layout/page/sidebar'); ?>
			<div class="content-wrapper">
				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0">Dashboard</h1>
							</div>
						</div>
					</div>
				</div>
				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-6 col-sm-12">
								<div class="small-box">
									<div class="icon-box icon text-white">
										<i class="fas fa-solid fa-users"></i>
									</div>
									<div class="inner text-right">
										<h3><?= $mahasiswa; ?></h3>
										<p>Mahasiswa</p>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-6 col-sm-12">
								<div class="small-box">
									<div class="inner text-right">
										<h3><?= $beasiswa; ?></h3>
										<p>Beasiswa</p>
									</div>
									<div class="icon text-white">
										<i class="fas fa-regular fa-book"></i>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-6 col-sm-12">
								<div class="small-box">
									<div class="inner text-right">
										<h3><?= $kriteria; ?></h3>
										<p>Daftar Kriteria</p>
									</div>
									<div class="icon text-white">
										<i class="fas fa-user-check"></i>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-6 col-sm-12">
								<div class="small-box">
									<div class="inner text-right">
										<h3><?= $users; ?></h3>
										<p>Daftar User</p>
									</div>
									<div class="icon text-white">
										<i class="fas fa-solid fa-user"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<footer class="main-footer">
				<strong>Sistem Pendukung Keputusan Seleksi Beasiswa</strong>
			</footer>
		</div>


<?php $this->load->view('layout/page/bottom'); ?>