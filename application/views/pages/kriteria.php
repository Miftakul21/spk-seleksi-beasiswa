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
							<div class="col-sm-6">
								<h1 class="m-0 fw-bold">Data Kriteria</h1>
							</div>
						</div>
                        <hr style="border-top: 1px solid #bbb">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						    <i class="fas fa-solid fa-plus mr-2"></i> Tambah Data
						</button>

						<?php 
							$beasiswa = $this->db->query('SELECT * FROM tb_beasiswa ORDER BY id_beasiswa ASC')->result_array();
							foreach($beasiswa as $b):
						?>
							<!-- Jenis Beasiswa -->
							<h4 class="text-center"><?= $b['jenis_beasiswa']; ?></h4>

							<?php 
								$id_beasiswa = $b['id_beasiswa'];
								$query = "SELECT * FROM tb_kriteria AS a JOIN tb_beasiswa AS b 
										ON a.id_beasiswa = b.id_beasiswa WHERE a.id_beasiswa = '$id_beasiswa'";
								$kriteria = $this->db->query($query)->result_array();
							?>

							<!-- Kriteria Berdasarkan Beasiswa -->
							<div class="row mt-2">
							<?php  foreach($kriteria as $k): ?>
								<div class="col-6">
									<div class="card">
										<div class="header-card">
											<div class="title-card">
												<h5><?= $k['nama_kriteria']; ?></h5>
												<p>Nilai Bobot: <?= $k['nilai_bobot']; ?></p>
											</div>
											<div class="action-card">
												<button class="btn btn-sm btn-primary" data-toggle="modal"
													data-target="#tambahDataSubkriteria<?= $k['id_kriteria'] ?>">
													<i class="fas fa-solid fa-plus"></i>
												</button>
												<button class="btn btn-sm btn-warning" data-toggle="modal"
												    data-target="#editDataKriteria<?= $k['id_kriteria'] ?>">
													<i class="fas fa-edit fa-fw text-white"></i>
												</button>
												<button class="btn btn-sm btn-danger" data-toggle="modal" 
													data-target="#hapusDataKriteria<?= $k['id_kriteria'] ?>">
													<i class="fas fa-trash fa-fw"></i>
												</button>
											</div>
										</div>
										<div class="card-body">
										<?php 
											$id_kriteria = $k['id_kriteria'];
											$query2 = "SELECT * FROM tb_subkriteria AS a JOIN tb_kriteria AS b 
													ON a.id_kriteria = b.id_kriteria WHERE a.id_kriteria = '$id_kriteria'";
											$subkriteria = $this->db->query($query2)->result_array();
										?>											
											<table class="table table-hover table-striped-columns table-striped">
												<thead>
													<tr>
														<th scope="col">No</th>
														<th scope="col">Sub Kriteria</th>
														<th scope="col">Nilai</th>
														<th scope="col">Aksi</th>
													</tr>
												</thead>
												<tbody>
										<?php 
											$no = 1;
											foreach($subkriteria as $sk):
										?>
												<tr>
													<th scope="row"><?= $no++; ?></th>
													<td><?= $sk['nama_kriteria']; ?></td>
													<td><?= $nilai_bobot ?></td>
													<td>
														<button class="btn btn-sm btn-info">Edit</button>
														<button class="btn btn-sm btn-danger">Hapus</button>
													</td>
												</tr>
										<?php 
											endforeach;
										?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
							</div>

							<!-- Modal Tambah Data Subkriteria -->
							<?php foreach($kriteria as $k): ?>
							<div class="modal fade" id="tambahDataSubkriteria<?= $k['id_kriteria']; ?>" tabindex="-1"
							    aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
										<form action="<?= base_url('kriteria/update') ?>" method="POST">
											<div class="form-group">
												<label for="sub_kriteria">Sub Kriteria<span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="sub_kriteria" name="sub_kriteria" 
													placeholder="Masukkan Subkriteria">
											</div>
											<div class="form-group">
												<label for="nilai">Nilai <span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="nilai" name="nilai" 
													placeholder="Masukkan Nilai">
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

							<!-- Modal Hapus Data Kriteria-->
							<?php foreach($kriteria as $k): ?>
							<div class="modal fade" id="hapusDataKriteria<?= $k['id_kriteria']; ?>" tabindex="-1" 
								aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<form action="<?= base_url('kriteria/delete'); ?>" method="POST">
										<input type="hidden" value="<?= $k['id_kriteria']; ?>" name="id">
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
							<?php  endforeach; ?>

							<!-- Modal Update Data Kriteria-->
							<?php foreach($kriteria as $k): ?>
							<div class="modal fade" id="editDataKriteria<?= $k['id_kriteria']; ?>" tabindex="-1"
							    aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
										<form action="<?= base_url('kriteria/update') ?>" method="POST">
											<input type="hidden" value="<?= $k['id_kriteria']; ?>" name="id">
											<input type="hidden" value="<?= $k['id_beasiswa']; ?>" name="jenis_beasiswa">
											<div class="form-group">
												<label for="jenis_beasiswa">Jenis Beasiswa<span class="text-danger">*</span></label>
												<select class="form-control" id="jenis_beasiswa" name="jenis_beasiswa" 
													value="<?= $k['id_beasiswa'] ?>" disabled>
													<?php 
														foreach($beasiswa as $b): 
															$selected = ($b['id_beasiswa'] == $k['id_beasiswa']) ? 'selected' : '';
													?>
														<option value="<?= $b['id_beasiswa']; ?>" <?= $selected; ?> >
															<?= $b['jenis_beasiswa']; ?>
														</option>
													<?php endforeach; ?> 
												</select>
											</div>
											<div class="form-group">
												<label for="nama_kriteria">Kriteria<span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" 
													value="<?= $k['nama_kriteria']; ?>">
											</div>
											<div class="form-group">
												<label for="nilai_bobot">Nilai Bobot<span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="nilai_bobot" name="nilai_bobot" 
													value="<?= $k['nilai_bobot']; ?>">
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
							<?php  endforeach; ?>

						<?php endforeach; ?>

					</div>
				</div>
			</div>
			<?php $this->load->view('layout/page/footer') ?>
		</div>

		<!-- Modal Tambah Data-->
		<form action="<?= base_url('kriteria/store') ?>" method="POST">
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
							<select class="form-control" id="jenis_beasiswa" name="jenis_beasiswa">
								<option>--Pilih--</option>
								<?php foreach($beasiswa as $b): ?>
									<option value="<?= $b['id_beasiswa']; ?>"><?= $b['jenis_beasiswa']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="nama_kriteria">Kriteria<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" placeholder="Masukkan Kriteria">
						</div>
						<div class="form-group">
							<label for="nilai_bobot">Nilai Bobot<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="nilai_bobot" name="nilai_bobot" placeholder="Masukkan Nilai Bobot">
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


