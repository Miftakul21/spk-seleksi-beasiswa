	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
			<nav class="main-header navbar navbar-expand navbar-white navbar-light d-flex justify-content-end">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link" data-toggle="dropdown" href="#">
							<i class="far fa-user mr-2"></i>
							<span>Admin</span>
						</a>
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
								<div class="small-box bg-info">
									<div class="inner">
										<h3>150</h3>

										<p>New Orders</p>
									</div>
									<div class="icon">
										<i class="ion ion-bag"></i>
									</div>
									<a href="#" class="small-box-footer"
										>More info <i class="fas fa-arrow-circle-right"></i
									></a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<div class="small-box bg-success">
									<div class="inner">
										<h3>53<sup style="font-size: 20px">%</sup></h3>
										<p>Bounce Rate</p>
									</div>
									<div class="icon">
										<i class="ion ion-stats-bars"></i>
									</div>
									<a href="#" class="small-box-footer"
										>More info <i class="fas fa-arrow-circle-right"></i
									></a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-warning">
									<div class="inner">
										<h3>44</h3>

										<p>User Registrations</p>
									</div>
									<div class="icon">
										<i class="ion ion-person-add"></i>
									</div>
									<a href="#" class="small-box-footer"
										>More info <i class="fas fa-arrow-circle-right"></i
									></a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<div class="small-box bg-danger">
									<div class="inner">
										<h3>65</h3>

										<p>Unique Visitors</p>
									</div>
									<div class="icon">
										<i class="ion ion-pie-graph"></i>
									</div>
									<a href="#" class="small-box-footer"
										>More info <i class="fas fa-arrow-circle-right"></i
									></a>
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