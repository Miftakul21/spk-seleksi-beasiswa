	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
			<!--
			<nav class="main-header navbar navbar-expand navbar-white navbar-light d-flex justify-content-end">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<div class="nav-link d-flex align-item-center" data-toggle="dropdown">
							<img src="<?= base_url() ?>assets/image/avatar.png" alt="logo-admin" class="rounded-circle mr-2" width="25">
							<span style="font-weight: bold;">Admin</span>
						</div>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
							<div class="dropdown-divider"></div>
							<a href="<?= base_url('login/logout'); ?>" class="dropdown-item text-danger">
								<i class="fas fa-sharp fa-solid fa-door-open mr-2"></i>Log Out
								<span class="float-right text-muted text-sm"></span>
							</a>
						</div>
					</li>
				</ul>
			</nav>
			-->
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
							<div class="col-lg-3 col-6">
								<div class="small-box">
									<div class="icon-box icon text-white">
										<i class="fas fa-solid fa-users"></i>
									</div>
									<div class="inner bg-primary text-right">
										<h3>150</h3>
										<p>Mahasiswa</p>
									</div>
									<a href="#" class="small-box-footer d-flex justify-content-between bg-white">
										<span class="p-2 text-primary" style="font-size: 1.1rem; font-weight: semibold;">More info</span>
										<i class="fas fa-arrow-circle-right p-3 text-primary" style="font-size: 1.1rem;"></i>
									</a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<div class="small-box">
									<div class="inner bg-success text-right">
										<h3>53</h3>
										<p>Beasiswa</p>
									</div>
									<div class="icon text-white">
										<i class="fas fa-regular fa-book"></i>
									</div>
									<a href="#" class="small-box-footer d-flex justify-content-between bg-white">
										<span class="p-2 text-success" style="font-size: 1.1rem; font-weight: semibold;">More info</span>
										<i class="fas fa-arrow-circle-right p-3 text-success" style="font-size: 1.1rem;"></i>
									</a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<div class="small-box">
									<div class="inner bg-warning text-right">
										<h3 class="text-white">44</h3>
										<p class="text-white">Daftar Kriteria</p>
									</div>
									<div class="icon text-white">
										<i class="fas fa-solid fa-user-check"></i>
									</div>
									<a href="#" class="small-box-footer d-flex justify-content-between bg-white">
										<span class="p-2 text-warning" style="font-size: 1.1rem; font-weight: semibold;">More info</span>
										<i class="fas fa-arrow-circle-right p-3 text-warning" style="font-size: 1.1rem;"></i>
									</a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<div class="small-box">
									<div class="inner bg-danger text-right">
										<h3>65</h3>
										<p>Daftar User</p>
									</div>
									<div class="icon text-white">
										<i class="fas fa-solid fa-user"></i>
									</div>
									<a href="#" class="small-box-footer d-flex justify-content-between bg-white">
										<span class="p-2 text-danger" style="font-size: 1.1rem; font-weight: semibold;">More info</span>
										<i class="fas fa-arrow-circle-right p-3 text-danger" style="font-size: 1.1rem;"></i>
									</a>
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