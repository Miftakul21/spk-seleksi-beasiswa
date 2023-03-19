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
								<h1 class="m-0 fw-bold">Data User</h1>
								<div class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-primary" style="text-decoration: none;">Dashboard</a></li>
                                    <li class="breadcrumb-item text-secondary" aria-current="page">User</li>
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
												<th>Username</th>
												<th>Level</th>
												<th style="width: 150">Aksi</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											$i = 1;
											foreach($user as $u): 
										?>
											<tr>
												<td><?= $i++; ?></td>
												<td><?= $u['nama']; ?></td>
												<td><?= $u['username']; ?></td>
												<td><?= $u['level_user']; ?></td>
												<td>
													<button class="btn btn-sm btn-danger" data-toggle="modal"
													    data-target="#hapusData<?= $u['id_users']; ?>">
														<i class="fas fa-trash fa-fw"></i>
													</button>
													<button class="btn btn-sm btn-info" data-toggle="modal" 
														data-target="#editData<?= $u['id_users']; ?>">
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
		<form action="<?= base_url('user/store') ?>" method="POST">
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
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="username" value="" placeholder="Masukkan Username">
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" value="" placeholder="Masukkan Password">
						</div>

						<div class="form-group">
							<label for="level_user">Level User</label>
							<select class="form-control" id="level_user" name="level_user">
								<option>--Pilih--</option>
								<?php foreach($level_user as $l):?>
									<option value="<?= $l ?>"><?= $l ?></option>
								<?php endforeach; ?>
							</select>
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
		<?php foreach($user as $u): ?>
		 <div class="modal fade" id="editData<?= $u['id_users']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<form action="<?= base_url('user/update'); ?>" method="POST">
					<div class="modal-body">
						<input type="hidden" value="<?= $u['id_users']; ?>" name="id">	
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" value="<?= $u['nama']; ?>">
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="username" value="<?= $u['username'] ?>">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" value="<?= str_repeat("*", strlen(substr($u['password'], 0, 8))); ?>">
						</div>
						<div class="form-group">
							<label for="level_user">Level User</label>
							<select class="form-control" id="level_user" name="level_user" >
								<?php 
									foreach($level_user as $l): 
										$selected = ($l == $u['level_user']) ? 'selected' : "";							
								?>	
									<option value="<?= $l ?>" <?= $selected ?>>
										<?= $l; ?>
									</option>
								<?php endforeach; ?>

							</select>
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

		<!-- Modal Hapus Data-->
		<?php foreach($user as $u): ?>
		<div class="modal fade" id="hapusData<?= $u['id_users']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<form action="<?= base_url('user/delete'); ?>" method="POST">
					<input type="hidden" value="<?= $u['id_users']; ?>" name="id">
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