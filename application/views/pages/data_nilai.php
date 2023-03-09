<?php 
	$CI = & get_instance();
	$CI->load->model('M_datanilai');
	// Id beasiswa
	$id_beasiswa = $this->uri->segment(3);	
	$beasiswa = $CI->M_datanilai->get_data_beasiswa($id_beasiswa);
?>

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
								<h1 class="m-0 fw-bold">Data Penilaian Beasiswa KIP-Kuliah</h1>
								<div class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-primary" style="text-decoration: none;">Dashboard</a></li>
                                    <li class="breadcrumb-item text-secondary" aria-current="page">Data Penilaian</li>
								</div>
							</div>
						</div>
                        <hr style="border-top: 1px solid #bbb">

						<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						    <i class="fas fa-solid fa-plus mr-2"></i> Tambah Data Mahasiswa
						</button> -->

				<!-- Data Kriteria Mahasiswa -->
						<div class="card mt-3">
							<div class="card-header">
								<h5>Data Kriteria Mahasiswa  <?= $id_beasiswa; ?> </h5>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-striped w-100" >
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>NIM</th>
												<th>Nilai Rapot</th>
												<th>Penghasilan Orang Tua</th>
												<th>Jumlah Tanggungan</th>
												<th>Status Anak</th>
												<th>Kartu Sosial</th>
												<th style="width: 150">Aksi</th>
											</tr>
										</thead>
										<tbody>
						<?php 
							$no = 1;
							foreach($beasiswa as $b):
								$id_beasiswa = $b['id_beasiswa'];
								$mhs = $CI->M_datanilai->get_data_mahasiswa($id_beasiswa);

								foreach($mhs as $m):
									$nim_mhs = $m['nim'];
									$nilai = $CI->M_datanilai->get_data_nama_kriteria($nim_mhs);
						?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $m['nama'] ?></td>
												<td><?= $m['nim'] ?></td>
											<?php foreach($nilai as $n): ?>
												<td><?= $n['nama_subkriteria']; ?></td>
											<?php endforeach; ?>
												<td>
													<button class="btn btn-danger">hapus</button>
												</td>
											</tr>
						<?php 									
								endforeach;
							endforeach;
						?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

				<!-- Data Nilai Kriteria -->
						<div class="card mt-3">
							<div class="card-header">
								<h5>Data Nilai Kriteria</h5>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-striped w-100">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>NIM</th>
												<th>Nilai Rapot</th>
												<th>Penghasilan Orang Tua</th>
												<th>Jumlah Tanggungan</th>
												<th>Status Anak</th>
												<th>Kartu Sosial</th>
											</tr>
										</thead>
										<tbody>
						<?php 
							$no = 1;
							foreach($beasiswa as $b):
								$id_beasiswa = $b['id_beasiswa'];
								$mhs = $CI->M_datanilai->get_data_mahasiswa($id_beasiswa);
								foreach($mhs as $m):
									$nim_mhs = $m['nim'];
									$nilai = $CI->M_datanilai->get_data_nilai_kriteria($nim_mhs);
						?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $m['nama'] ?></td>
												<td><?= $m['nim'] ?></td>
											<?php foreach($nilai as $n): ?>
												<td><?= $n['nilai']; ?></td>
											<?php endforeach; ?>
											</tr>
						<?php 									
								endforeach;
							endforeach;
						?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
				<!-- Data Normalisasi -->
				<div class="card mt-3">
							<div class="card-header">
								<h5 class="fw-bold">Normalisasi</h5>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-striped w-100">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>NIM</th>
												<th>Nilai Rapot</th>
												<th>Penghasilan Orang Tua</th>
												<th>Jumlah Tanggungan</th>
												<th>Status Anak</th>
												<th>Kartu Sosial</th>
											</tr>
										</thead>
										<tbody>
						<?php 
							$no = 1;
							foreach($beasiswa as $b):
								$id_beasiswa = $b['id_beasiswa'];
								$mhs = $CI->M_datanilai->get_data_mahasiswa($id_beasiswa);

								foreach($mhs as $m):
									$nim_mhs = $m['nim'];
									$nilai = $CI->M_datanilai->get_data_nilai_kriteria($nim_mhs);
						?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $m['nama'] ?></td>
												<td><?= $m['nim'] ?></td>	
						<?php 
									// $hasil_normalisasi = 0;
									// $hasil = 0;
									foreach($nilai as $n){
										$id_kriteria = $n['id_kriteria'];
										$kriteria = $CI->M_datanilai->get_data_kriteria($id_kriteria);

										foreach($kriteria as $k){
											if($k['atribut_kriteria'] == 'Cost') {
												$nilai_min = $CI->M_datanilai->get_data_nilai_min($id_kriteria);
												foreach($nilai_min as $min){
													// $data_min = $min['nilai_min'];
													$hasil = $min['nilai_min'] / $n['nilai'];

												
						
						?>			
										<td><?= $hasil ?></td>
						<?php 
												}	
											} else if($k['atribut_kriteria'] == 'Benefit'){
												$nilai_max = $CI->M_datanilai->get_data_nilai_max($id_kriteria);
												foreach($nilai_max as $max){
													$hasil = $n['nilai'] / $max['nilai_max'];												
						?>
										<td><?= $hasil ?></td>
						<?php 
												}
											}
										}
									}
						?>
											</tr>
						<?php 									
								endforeach;
							endforeach;
						?>
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
				<form action="<?= base_url('datanilai/store') ?>" method="POST">
					<!-- id Beasiswa -->
					<input type="hidden" name="id_beasiswa" value="<?= $id_beasiswa ?>">
					

					<div class="form-group">
						<label for="nim">Mahasiswa<span class="text-danger">*</span></label>	
						<select name="nim" id="nim" class="form-control">
							<option value="">--Pilih---</option>
						<?php foreach($mahasiswa as $m): ?>
							<option value="<?= $m['nim'];?>"><?= $m['nama']; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				<?php foreach($beasiswa as $b):
						$id_beasiswa = $b['id_beasiswa'];

						// // Nanti Diganti -----------------
						// $sql = "SELECT * FROM tb_kriteria AS a JOIN tb_beasiswa AS b ON 
						// 		a.id_beasiswa = b.`id_beasiswa` WHERE b.id_beasiswa = '$id_beasiswa'";
						// $kriteria = $this->db->query($sql)->result_array();
				?>
				<?php endforeach ?>
				<?php 
					foreach($beasiswa as $b):
						$id_beasiswa = $b['id_beasiswa'];
						$sql2 = "SELECT a.id_kriteria, a.nama_kriteria FROM tb_kriteria AS a 
								JOIN tb_beasiswa AS b ON a.`id_beasiswa` = b.`id_beasiswa`
								WHERE a.`id_beasiswa` = '1'";
						$kriteria = $this->db->query($sql2)->result_array();
						$no = 1;
						foreach($kriteria as $k):
				?>
				<div class="form-group">
					<label for="<?= $k['nama_kriteria']; ?>"><?= $k['nama_kriteria']; ?></label>
					<select class="form-control form-select" name="<?= $no++; ?>" id="<?= $nama_kriteria ?>">
						<option value="">--Pilih--</option>
						<?php
							$id_kriteria = $k['id_kriteria']; 
							$sql3 = "SELECT a.id_subkriteria, a.nama_subkriteria, a.nilai_subkriteria, b.id_kriteria FROM tb_subkriteria AS a JOIN
									tb_kriteria AS b ON a.`id_kriteria` = b.`id_kriteria` WHERE b.`id_kriteria` = '$id_kriteria'";
							$subkriteria = $this->db->query($sql3)->result_array();
							foreach($subkriteria as $sk):
						?>
						<!-- 1. id_kriteria, 2. id_subkriteria, 3. nilai_subkritreia -->
						<option value="<?= $sk['id_kriteria']; ?>|<?= $sk['id_subkriteria']; ?>|<?= $sk['nilai_subkriteria']; ?>"><?= $sk['nama_subkriteria'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<?php 
						endforeach;
					endforeach;
				?>
				</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button class="btn btn-primary">Simpan</button>
					</div>
				</form>
				</div>
			</div>
		</div>

		
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
