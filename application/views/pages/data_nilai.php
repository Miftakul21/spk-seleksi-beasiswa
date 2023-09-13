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
						<!-- Data Kriteria Mahasiswa -->
						<div class="card mt-3">
							<div class="card-header">
								<h5>Data Kriteria Mahasiswa </h5>
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
												<th>SKTM</th>
												<th>Prestasi Sekolah</th>
												<th>File Upload</th>
												<th style="width: 150">Aksi</th>
											</tr>
										</thead>
										<tbody>
						<?php 
							$no = 1;
							foreach($beasiswa as $b){
								$id_beasiswa = $b['id_beasiswa'];
								$mhs = $CI->M_datanilai->get_data_mahasiswa($id_beasiswa);
								foreach($mhs as $m){
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
													<button class="btn btn-primary" data-toggle="modal" data-target="#fileBukti<?= $m['nim'] ?>">
														<i class="fas fa-file-alt"></i>
													</button>
												</td>
												<td>
													<button class="btn btn-danger" data-toggle="modal" data-target="#hapusData<?= $m['nim']; ?>">
														<i class="fas fa-trash fa-fw"></i>
													</button>
												</td>
											</tr>
						<?php 									
								}
							}
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
												<!-- <th>NIM</th> -->
											<?php for($Ci = 1; $Ci <=6; $Ci++){ ?>
												<th>C<?= $Ci; ?></th>
											<?php } ?>
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


						<!-- Perkalian Bobot -->
						<div class="card mt-3">
							<div class="card-header">
								<h5 class="fw-bold">Data Nilai Pembobotan</h5>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-striped w-100">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<?php for($Ci = 1; $Ci <=6; $Ci++){ ?>
													<th>C<?= $Ci; ?></th>
												<?php } ?>
												<th>Hasil</th>
												<!-- <th>Nilai Tambah</th> -->
												<!-- <th>Total</th> -->
											</tr>
										</thead>
										<tbody>
								<?php 
									$hasil_ranks = array();
									$no = 1;
									// Beasiswa
									foreach($beasiswa as $b){
										$id_beasiswa = $b['id_beasiswa'];
										$mhs = $CI->M_datanilai->get_data_mahasiswa($id_beasiswa);
										foreach($mhs as $m){
											$nim_mhs = $m['nim'];
											// Ambil nilai dari tabel penilaian
											$nilai = $CI->M_datanilai->get_data_nilai_kriteria($nim_mhs);

								?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $m['nama'] ?></td>
											
											<?php 
												$hasil_pembobotan = 0; // nilai asli 
												$nilai_prestasi = 0; // nilai tambah
												$total = 0; // nilai keseluruhan (nilai asli + nilai tambah)
												foreach($nilai as $n){
													// Id kriteria pada tabel penilaian
													$id_kriteria = $n['id_kriteria'];
													// Id kriteria pada tabel kriteria
													$kriteria = $CI->M_datanilai->get_data_kriteria($id_kriteria);
													foreach($kriteria as $k) {

														// Ambil Kriteria Prestasi Sekolah
														if($k['nama_kriteria'] == 'Prestasi Sekolah') {
															// Ambil Nilai Prestasi Sekolah
															$sertifikat = $CI->M_datanilai->cek_file_sertifikat($nim_mhs);

															$temp1 = 0;
															$temp2 = 0;
															$temp = 0;
															$nilai_tambah = 0;
															foreach($sertifikat as $s){	
																$temp1  = ($s['file7'] != NULL) ? $n['nilai'] : 0 ;
																$temp2  = ($s['file8'] != NULL) ? $n['nilai'] : 0 ;

																$bobot_kriteria = ($k['nama_kriteria'] == 'Prestasi Sekolah') ? $k['nilai_bobot']  : 0;
																// Rumus Nilai Tambah
																$nilai_tambah = ($temp1 + $temp2) / $n['nilai'] * $bobot_kriteria;
																
															}

															$nilai_prestasi = $nilai_tambah;
														}

														if($k['id_kriteria'] == $id_kriteria){
															$hasil_kali_bobot = $k['nilai_bobot'] * $n['nilai'];
															$hasil_pembobotan += $hasil_kali_bobot + $nilai_prestasi;
															// $hasil_tambah = $nilai_prestasi;
															// $total = $hasil_pembobotan + $nilai_prestasi;

											?>
												<td><?= $hasil_kali_bobot; ?></td>

											<?php 
														}
													}
												}
												// Hasil Pembobotan
												$nilai_rank['nim'] = $nim_mhs;
												$nilai_rank['nilai'] = $hasil_pembobotan;
												array_push($hasil_ranks,$nilai_rank)
											?>
												<td><?= $hasil_pembobotan; ?></td>
												<!-- <td><?//= $nilai_tambah; ?></td>
												<td><?//= $total ?></td> -->
											</tr>
								<?php 
											}
										}
								?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<!-- Insert Data Hasil Pembobotan Untuk Perangkingan -->
						<?php 
							// Cek Jumlah Data Penilaian (Group Berdasarkan NIM Mahasiswa)
							$query1 = "SELECT * FROM tb_penilaian GROUP BY nim";
							$penilaian = $this->db->query($query1)->result_array();
							
							foreach($penilaian as $p){
								foreach($hasil_ranks as $rank){
									$nim = $rank['nim'];
									$hasil_pembobotan = $rank['nilai'];
									$cek = $this->db->query("SELECT * FROM tb_hasil WHERE nim = '$nim'")->result_array();
									
									if(count($cek)==0){
										$this->db->query("INSERT INTO tb_hasil(nim, nilai) VALUES ('$nim', $hasil_pembobotan)");		
									}

									$nim2 = $p['nim'];

									// Buat Update Data
									if($nim == $nim2) {
										$this->db->query("UPDATE tb_hasil SET nilai = '$hasil_pembobotan' WHERE nim = '$nim'");
									}
								}
							}
						?>
					<!-- End Content -->

					</div>
				</div>
			</div>
			<?php $this->load->view('layout/page/footer') ?>
		</div>		

		<!-- Modal File Bukti -->
		<?php 
			foreach($beasiswa as $b):
				$id_beasiswa = $b['id_beasiswa']; 
				$mhs = $CI->M_datanilai->get_data_mahasiswa($id_beasiswa);
				foreach($mhs as $m):
					$nim_mhs = $m['nim'];
					$data_file = $CI->M_datanilai->get_data_file($nim_mhs);
		?>
		<div class="modal fade" id="fileBukti<?= $m['nim']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">File Bukti <?= $m['nama'] ?></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php foreach($data_file as $file):?>
							<div class="row">
								<div class="col-4">
									<label for="staticEmail" class="col-sm-8 col-form-label d-inline font-weight-bold">File Upload Dokumen</label>
								</div>
							</div>
							<div class="row mt-3 mb-3">
								<div class="col-3">
									<label for="" class="d-block text-center">Nilai Raport</label>
									<div class="text-center">
										<a href="<?= base_url('datanilai/view/') ?><?= $file['file1'] ?>" class="btn btn-primary"><i class="fas fa-file-alt"></i></a>									
									</div>
								</div>
								<div class="col-3">
									<label for="" class="d-block text-center">Surat Penghasilan</label>
									<div class="text-center">
										<a href="<?= base_url('datanilai/view/') ?><?= $file['file2'] ?>" class="btn btn-primary"><i class="fas fa-file-alt"></i></a>									
									</div>
								</div>
								<div class="col-3">
									<label for="" class="d-block text-center">Kartu Keluarga</label>
									<div class="text-center">
										<a href="<?= base_url('datanilai/view/') ?><?= $file['file3'] ?>" class="btn btn-primary"><i class="fas fa-file-alt"></i></a>									
									</div>
								</div>
								<div class="col-3">
									<label for="" class="d-block text-center">Surat SKTM</label>
									<div class="text-center">
										<a href="<?= base_url('datanilai/view/') ?><?= $file['file4'] ?>" class="btn btn-primary"><i class="fas fa-file-alt"></i></a>									
									</div>
								</div>
								<div class="col-3 mt-2">
									<label for="" class="d-block text-center">KIP-Kuliah</label>
									<div class="text-center">
										<a href="<?= base_url('datanilai/view/') ?><?= $file['file5'] ?>" class="btn btn-primary"><i class="fas fa-file-alt"></i></a>									
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-4">
									<label for="staticEmail" class="col-sm-8 col-form-label d-inline font-weight-bold">File Sertifikat/Piagam</label>
								</div>
							</div>
							<div class="row">
								<div class="col-4">
									<label for="" class="d-block text-center">Sertifikat / Piagam 1</label>
									<div class="text-center">
										<a href="<?= base_url('datanilai/view/') ?><?= $file['file6'] ?>" class="btn btn-primary"><i class="fas fa-file-alt"></i></a>									
									</div>
								</div>
								<div class="col-4">
									<label for="" class="d-block text-center">Sertifikat / Piagam 2</label>
									<div class="text-center">
										<a href="<?= base_url('datanilai/view/') ?><?= $file['file7'] ?>" class="btn btn-primary"><i class="fas fa-file-alt"></i></a>									
									</div>
								</div>
								<div class="col-4">
									<label for="" class="d-block text-center">Sertifikat / Piagam 3</label>
									<div class="text-center">
										<a href="<?= base_url('datanilai/view/') ?><?= $file['file8'] ?>" class="btn btn-primary"><i class="fas fa-file-alt"></i></a>									
									</div>
								</div>
							</div>

							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		<?php 
				endforeach;
			endforeach; 
		?>

		<!-- Modal Hapus Data-->
		<?php 
		foreach($beasiswa as $b):
			$id_beasiswa = $b['id_beasiswa'];
			$mhs = $CI->M_datanilai->get_data_mahasiswa($id_beasiswa);
			foreach($mhs as $m): 
		?>
		<div class="modal fade" id="hapusData<?= $m['nim']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Hapus Data <?= $m['nama']; ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<form action="<?= base_url('datanilai/delete'); ?>" method="POST">
					<input type="hidden" value="<?= $b['id_beasiswa'] ?>" name="id_beasiswa">
					<input type="hidden" value="<?= $m['nim']; ?>" name="nim">
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
		<?php 
			endforeach; 
		endforeach;
		?>

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
