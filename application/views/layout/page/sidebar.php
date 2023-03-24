<?php 
	$beasiswa = $this->db->query("SELECT * FROM tb_beasiswa ORDER BY id_beasiswa")->result_array();
?>			
<aside class="main-sidebar sidebar-bg-primary elevation-1">
	<div class="sidebar">
		<div class="user-panel mt-3 p-3  d-flex align-items-center">
			<img src="<?= base_url() ?>assets/image/logo-beasiswa.svg">					
			<h5>Seleksi Beasiswa</h5>
		</div>
	<?php if($this->session->userdata('level_user') == 'Admin' || $this->session->userdata('level_user') == 'Petugas'){ ?>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
				data-accordion="false">
				<li class="nav-header">
					<img src="<?= base_url() ?>assets/image/arrow-down.png" width="10" class="mr-1"> Menu
				</li>
				<!-- active -->
				<li class="nav-item <?= activate_menu('dashboard'); ?>">
					<a href="<?= base_url('dashboard') ?>" class="nav-link">
						<i class="fas fa-solid fa-compass"></i>
						<p class="ml-2">Dashboard</p>
					</a>
				</li>
				<li class="nav-item <?= activate_menu('mahasiswa'); ?>">
					<a href="<?= base_url('mahasiswa') ?>" class="nav-link ">
						<i class="fas fa-regular fa-users"></i>
						<p class="ml-1">Mahasiswa</p>
					</a>
				</li>
				<li class="nav-item <?= activate_menu('beasiswa'); ?>">
					<a href="<?= base_url('beasiswa') ?>" class="nav-link ">
						<i class="fas fa-regular fa-book"></i>
						<p class="ml-2">Beasiswa</p>
					</a>
				</li>
				<li class="nav-item <?= activate_menu('kriteria'); ?>">
					<a href="<?= base_url('kriteria') ?>" class="nav-link ">
						<i class="fas fa-solid fa-user-check"></i>
						<p class="ml-1">Kriteria</p>
					</a>
				</li>
				<li class="nav-item <?= activate_menu('user'); ?>">
					<a href="<?= base_url('user') ?>" class="nav-link ">
						<i class="fas fa-solid fa-user"></i>
						<p class="ml-2">User</p>
					</a>
				</li>
				<li class="nav-item ">
					<a href="#" class="nav-link">
						<i class="fas fa-table mr-2"></i>
						<p>Data Penilian<i class="fas fa-angle-left right"></i></p>
					</a>
					<ul class="nav nav-treeview">
					<?php foreach($beasiswa as $jb): ?>	
						<li class="nav-item">
							<a href="<?= base_url('datanilai/beasiswa/') ?><?= $jb['id_beasiswa'] ?>" class="nav-link"><p><?= $jb['jenis_beasiswa'] ?></p></a>
						</li>
					<?php endforeach; ?>
					</ul>
				</li>
				<li class="nav-item <?= activate_menu('laporan'); ?>">
					<a href="<?= base_url('laporan') ?>" class="nav-link ">
						<i class="fas fa-file-alt"></i>
						<p class="ml-2">Laporan</p>
					</a>
				</li>
			</ul>
		</nav>
	<?php } else if($this->session->userdata('level_user') == 'Kepala Biro') { ?>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
			data-accordion="false">
				<li class="nav-header">
					<img src="<?= base_url() ?>assets/image/arrow-down.png" width="10" class="mr-1"> Menu
				</li>
				<!-- active -->
				<li class="nav-item <?= activate_menu('dashboard'); ?>">
					<a href="<?= base_url('dashboard') ?>" class="nav-link">
						<i class="fas fa-solid fa-compass"></i>
						<p class="ml-2">Dashboard</p>
					</a>
				</li>
				<li class="nav-item ">
					<a href="#" class="nav-link">
						<i class="fas fa-table mr-2"></i>
						<p>Data Penilian<i class="fas fa-angle-left right"></i></p>
					</a>
					<ul class="nav nav-treeview">
					<?php foreach($beasiswa as $jb): ?>	
						<li class="nav-item">
							<a href="<?= base_url('datanilai/beasiswa/') ?><?= $jb['id_beasiswa'] ?>" class="nav-link"><p><?= $jb['jenis_beasiswa'] ?></p></a>
						</li>
					<?php endforeach; ?>
					</ul>
				</li>
				<li class="nav-item <?= activate_menu('laporan'); ?>">
					<a href="<?= base_url('laporan') ?>" class="nav-link ">
						<i class="fas fa-file-alt"></i>
						<p class="ml-2">Laporan</p>
					</a>
				</li>
			</ul>
		</nav>
	<?php } ?> 
	</div>
</aside>			