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
								<h1 class="m-0 fw-bold">Data Mahasiswa</h1>
							</div>
						</div>

                        <hr style="border-top: 1px solid #bbb">

                        <div class="alert alert-light shadow-sm" role="alert">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="text-primary">Dashboard</a></li>
                                    <li class="breadcrumb-item text-secondary" aria-current="page">Mahasiswa</li>
                                </ol>
                            </nav>
                        </div>
					</div>
				</div>
			</div>

			<footer class="main-footer">
				<strong>Sistem Pendukung Keputusan Seleksi Beasiswa</strong>
			</footer>
		</div>