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
								<h1 class="m-0 fw-bold">Data Beasiswa</h1>
								<div class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-primary" style="text-decoration: none;">Dashboard</a></li>
                                    <li class="breadcrumb-item text-secondary" aria-current="page">Beasiswa</li>
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
												<th>Jenis Beasiswa</th>
												<th>Kuota</th>
												<th>Periode</th>
												<th>Tanggal Pendaftaran</th>
												<th>File Pengumuman</th>
												<th style="width: 150">Aksi</th>
												<th style="width: 150">#</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$no = 1; 
												foreach($beasiswa as $b):
											?>
											<tr>
												<td><?= $no++; ?></td>												
												<td><?= $b['jenis_beasiswa']; ?></td>												
												<td><?= $b['kuota']; ?></td>												
												<td><?= $b['periode']; ?></td>	
												<td>
													Pendaftaran Dibuka :<?= $b['tgl_pendaftaran']; ?><br>
													Pendaftaran Ditutup :<?= $b['tgl_penutupan']; ?>
												</td>	
												<td>													
													<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#uploadFile<?= $b['id_beasiswa']; ?>">
														File
													</button>
												</td>	
												<td>
													<button class="btn btn-danger" data-toggle="modal" 
														data-target="#hapusData<?= $b['id_beasiswa']; ?>">
														<i class="fas fa-trash fa-fw"></i>
													</button>
													<button class="btn btn-info" data-toggle="modal" 
														data-target="#editData<?= $b['id_beasiswa']; ?>">
														<i class="fas fa-edit fa-fw"></i>
													</button>
												</td>
												<td>
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#statusPendaftaran<?= $b['id_beasiswa'] ?>">
														Status
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
		<form action="<?= base_url('beasiswa/store') ?>" method="POST">
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
							<label for="jenis_beasiswa">Jenis Beasiswa<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="jenis_beasiswa" name="jenis_beasiswa" placeholder="Masukkan Jenis Beasiswa">
						</div>
						<div class="form-group">
							<label for="kuota">Kuota<span class="text-danger">*</span></label>
							<input type="number" class="form-control" id="kuota" name="kuota" placeholder="Masukkan Kuota">
						</div>
						<div class="form-group">
							<label for="periode">Periode<span class="text-danger">*</span></label>
							<input type="number" class="form-control" id="password" name="periode" placeholder="Masukkan Periode">
						</div>
						<div class="form-group">
							<label for="tgl-pendaftaran">Tanggal Pendaftaran<span class="text-danger">*</span></label>
							<input type="date" class="form-control" id="tgl-pendaftaran" name="tgl-pendaftaran">
						</div>
						<div class="form-group">
							<label for="tgl-penutupan">Tanggal Penutupan<span class="text-danger">*</span></label>
							<input type="date" class="form-control" id="tgl-penutupan" name="tgl-penutupan">
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
		<!-- Modal Edit Data -->
		<?php foreach($beasiswa as $b): ?>
		<div class="modal fade" id="editData<?= $b['id_beasiswa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url('beasiswa/update') ?>" method="POST">
						<input type="hidden" value="<?= $b['id_beasiswa'] ?>" name="id_beasiswa">
						<div class="form-group">
							<label for="jenis_beasiswa">Jenis Beasiswa<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="jenis_beasiswa" name="jenis_beasiswa" value="<?= $b['jenis_beasiswa'] ?>">
						</div>
						<div class="form-group">
							<label for="kuota">Kuota<span class="text-danger">*</span></label>
							<input type="number" class="form-control" id="kuota" name="kuota" value="<?= $b['kuota'] ?>">
						</div>
						<div class="form-group">
							<label for="periode">Periode<span class="text-danger">*</span></label>
							<input type="number" class="form-control" id="password" name="periode" value="<?= $b['periode'] ?>">
						</div>
						<div class="form-group">
							<label for="tgl-pendaftaran">Tanggal Pendaftaran<span class="text-danger">*</span></label>
							<input type="date" class="form-control" id="tgl-pendaftaran" name="tgl_pendaftaran" value="<?= $b['tgl_pendaftaran']; ?>">
						</div>
						<div class="form-group">
							<label for="tgl-penutupan">Tanggal Penutupan<span class="text-danger">*</span></label>
							<input type="date" class="form-control" id="tgl-penutupan" name="tgl_penutupan" value="<?= $b['tgl_pendaftaran']; ?>">
						</div>
					</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" data-dismiss="modal">Batal</button>
							<button class="btn btn-primary">Ubah</button>
						</div>
					</form>
					</div>
				</div>
		</div>
		<?php endforeach; ?>

		<!-- Modal Delete Data -->
		<?php foreach($beasiswa as $u): ?>
		<div class="modal fade" id="hapusData<?= $u['id_beasiswa']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<form action="<?= base_url('beasiswa/delete'); ?>" method="POST">
					<input type="hidden" value="<?= $b['id_beasiswa']; ?>" name="id_beasiswa">
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




		<!-- Modal Upload File Pengumuman -->
		<?php foreach($beasiswa as $u): ?>
		<div class="modal fade" id="uploadFile<?= $u['id_beasiswa']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Upload File Pengumuman</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<form action="<?= base_url('beasiswa/delete'); ?>" method="POST">
					<input type="hidden" value="<?= $b['id_beasiswa']; ?>" name="id_beasiswa">
					<div class="modal-body">
						<div class="input-group mb-3">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="inputGroupFile01">
								<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
							</div>
						</div>
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


		<!-- Modal Status Pendaftaran Beasiswa -->
		<?php foreach($beasiswa as $u): ?>
		<div class="modal fade" id="statusPendaftaran<?= $u['id_beasiswa']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Status Pendaftaran</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<form action="<?= base_url('beasiswa/delete'); ?>" method="POST">
					<input type="hidden" value="<?= $b['id_beasiswa']; ?>" name="id_beasiswa">
					<div class="modal-body">
						<div class="text-center">
							<h5>Status</h5>
							<!-- Nanti Diambil Status Keterangan  -->
							<!-- Berdasarkan Data Dari Database -->
							<h5>Pendaftaran Dibuka</h5>
						</div>
					</div>
						<div class="modal-footer d-flex justify-content-center">
							<button name="status" value="buka" class="btn btn-success mr-5" data-dismiss="modal">Buka</button>
							<button name="status" value="tutup" class="btn btn-danger">Tutup</button>
						</div>
				</form>
					</div>
				</div>
			</div>
		<?php endforeach; ?>



		<script src="<?= base_url() ?>assets/jquery.js"></script>
		<script>
			$('#inputGroupFile01').on('change', function(){
				var fileName = $(this).val();
				let namaFile = fileName.split('fakepath\\');
				$(this).next('.custom-file-label').html(namaFile[1]);
			});
		</script>


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
