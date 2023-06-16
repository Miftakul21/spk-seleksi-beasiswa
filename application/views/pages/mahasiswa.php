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
							<div class="col-sm-12 col-12 d-flex justify-content-between align-items-center">
								<h1 class="m-0 fw-bold">Data Mahasiswa</h1>
								<div class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-primary" style="text-decoration: none;">Dashboard</a></li>
                                    <li class="breadcrumb-item text-secondary" aria-current="page">Mahasiswa</li>
								</div>
							</div>
						</div>
                        <hr style="border-top: 1px solid #bbb">					
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
							<i class="fas fa-solid fa-plus mr-2"></i> Tambah Data
						</button>
						<div class="card mt-3">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-striped w-100" id="table">
										<thead>
											<tr>
											<th>No</th>
											<th>Nama</th>
											<th>NIM</th>
											<th>Jurusan</th>
											<th>Angkatan</th>
											<th style="width: 150">Aksi</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											$no = 1;
											foreach($mahasiswa as $mhs):  
										?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $mhs['nama']; ?></td>
												<td><?= $mhs['nim']; ?></td>
												<td><?= $mhs['jurusan']; ?></td>
												<td><?= $mhs['angkatan']; ?></td>
												<td>
													<button class="btn btn-sm btn-danger" data-toggle="modal"
													    data-target="#hapusData<?= $mhs['id_mahasiswa']; ?>">
														<i class="fas fa-trash fa-fw"></i>
													</button>
													<button class="btn btn-sm btn-info" data-toggle="modal" 
														data-target="#editData<?= $mhs['id_mahasiswa']; ?>">
														<i class="fas fa-edit fa-fw"></i>
													</button>
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

		<!-- Modal Tambah Data-->
		<form action="<?= base_url('mahasiswa/store') ?>" method="POST">
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
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" value="" placeholder="Masukkan Nama">
						</div>
						<div class="form-group">
							<label for="nim">NIM</label>
							<input type="text" class="form-control" id="nim" name="nim" value="" placeholder="Masukkan NIM">
						</div>
						<div class="form-group">
							<label for="jurusan">Jurusan</label>
							<input type="text" class="form-control" id="jurusan" name="jurusan" value="" placeholder="Masukkan Jurusan">
						</div>
						<div class="form-group">
							<label for="angkatan">Angkatan</label>
							<input type="text" class="form-control" id="angkatan" name="angkatan" value="" placeholder="Masukkan Angkatan">
						</div>
					</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" data-dismiss="modal">Batal</button>
							<button class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
			</div>
		</form>

		<!-- Modal Update Data-->
		<?php foreach($mahasiswa as $mhs): ?>
		<div class="modal fade" id="editData<?= $mhs['id_mahasiswa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url('mahasiswa/update') ?>" method="POST">
					    <input type="hidden" value="<?= $mhs['id_mahasiswa']; ?>" name="id_mahasiswa">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs['nama']; ?>">
						</div>
						<div class="form-group">
							<label for="nim">NIM</label>
							<input type="text" class="form-control" id="nim" name="nim" value="<?= $mhs['nim']; ?>">
						</div>
						<div class="form-group">
							<label for="jurusan">Jurusan</label>
							<input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $mhs['jurusan']; ?>">
						</div>
						<div class="form-group">
							<label for="angkatan">Angkatan</label>
							<input type="text" class="form-control" id="angkatan" name="angkatan" value="<?= $mhs['angkatan']; ?>">
						</div>
					</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" data-dismiss="modal">Batal</button>
							<button class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php endforeach; ?>

		<!-- Model Delete Data -->
		<?php foreach($mahasiswa as $mhs): ?>
		<div class="modal fade" id="hapusData<?= $mhs['id_mahasiswa']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<form action="<?= base_url('mahasiswa/delete'); ?>" method="POST">
				<input type="hidden" value="<?= $mhs['id_mahasiswa']; ?>" name="id_mahasiswa">
				<input type="hidden" value="<?= $mhs['nim'] ?>" name="nim">
				<div class="modal-body">
					Anda ingin menghapus?
				</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button class="btn btn-danger">Hapus</button>
					</div>
			</form>
				</div>
			</div>
		</div>
		<?php endforeach; ?>


<?php $this->load->view('layout/page/bottom'); ?>
<?php 
if($this->session->userdata('info') == 'Success'){	
?>
<script>
	iziToast.success({
        title: 'Sukses',
        message: `<?= $this->session->userdata('message'); ?>`,
        position: 'topCenter',
        timeout: 5000
    });
</script>
<?php
$this->session->unset_userdata('info'); 
$this->session->unset_userdata('message'); 
} else if($this->session->userdata('info') == 'Error') {
?>
<script>
	iziToast.error({
        title: 'Failed',
        message: `<?= $this->session->userdata('message'); ?>`,
        position: 'topCenter',
        timeout: 5000
    });
</script>

<?php 
$this->session->unset_userdata('info'); 
$this->session->unset_userdata('message');
} 
?>