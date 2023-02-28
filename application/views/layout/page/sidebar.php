			<aside class="main-sidebar sidebar-bg-primary elevation-1">
				<div class="sidebar">
					<div class="user-panel mt-3 p-3  d-flex align-items-center">
						<img src="<?= base_url() ?>assets/image/logo-beasiswa.svg">					
						<h5>Seleksi Beasiswa</h5>
					</div>
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

							<li class="nav-item <?= activate_menu('user'); ?>">
								<a href="<?= base_url('user') ?>" class="nav-link ">
									<i class="fas fa-solid fa-user"></i>
									<p class="ml-2">Daftar Beasiswa</p>
								</a>
							</li>


							<!-- Catatan Buat 2 Fitur Jika Nanti Disuruh Rubah -->
							<!--
								Pertama 
								Terdapat Form Pencaraian Jenis Beasiswa Dan Tahun Periode (Atau Otamatis Dari Tahun Saat INI)

								Kedua 
								Langung Menampilkan Data Pendaftar Beasiswa
							-->

							<!-- Buat halaman dinamis -->
							<!-- Navigasi item active berdasarkan controller daftar -->
							<!-- Contoh : localhost/spk-seleksi-beasiswa/Data Pendaftar/KIP-Kuliah -->
							



							<!-- <li class="nav-item ">
								<a href="#" class="nav-link">
									<i class="fas fa-solid fa-database mr-2"></i>
									<p>Data Pendaftar<i class="fas fa-angle-left right"></i></p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="#" class="nav-link"><p>Nilai Kriteria</p></a>
									</li>
									<li class="nav-item">
										<a href="#"class="nav-link"><p>Hasil Perhitungan</p></a>
									</li>
								</ul>
							</li> -->


						</ul>
					</nav>
				</div>
			</aside>			