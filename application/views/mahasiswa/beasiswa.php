<?php 
	$CI = & get_instance();
	$CI->load->model('M_datanilai');
?>

<!-- Top -->
<?php $this->load->view('layout/page2/top') ?>
<!-- Navbar -->
<?php $this->load->view('layout/page2/navbar') ?>

<div class="container mt-3">
  <div class="row">
    <div class="col">
      <div class="card mt-3">
			<div class="card-body">
				<table class="table table-hover table-striped w-100 border-info">
					<thead>
						<tr>
							<th>Jenis Beasiswa</th>
							<th>Masa Periode</th>
							<th>Status</th>
							<th>File Pengumuman</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
              <?php 
                foreach($beasiswa as $b):
                    $status = ($b['status'] == '1') ? 'modal' : '';
                    $status_pendaftaran = ($b['status'] == '1') ? 'Aktif' : 'Tutup';
                    $text_color = ($status_pendaftaran == 'Aktif') ? 'text-success' : 'text-danger';
              ?>
						<tr>
							<td>Beasiswa KIP-Kuliah</td>
							<td>
								<p>Pendaftaran Dibuka: <?= date('d-m-Y', strtotime($b['tgl_pendaftaran'])); ?> 
                  <br> Pendaftaran Ditutup: <?= date('d-m-Y', strtotime($b['tgl_penutupan'])); ?>
                </p>
							</td>
							<td>
								<h5 class="<?= $text_color ?>"><?= $status_pendaftaran; ?></h5>
							</td>
							<td>
                <a href="<?= base_url('daftarbeasiswa/view/') ?><?= $b['file']; ?>" class="btn btn-light shadow bg-white rounded">
                  File
                </a>
							</td>
							<td>
								<button class="btn btn-success fw-500" data-toggle="<?= $status ?>" data-target="#daftarBeasiswa<?= $b['id_beasiswa'] ?>">
									Daftar Beasiswa
								</button>
							</td>
						</tr>
                <?php
                	endforeach;
                ?>
					</tbody>
				</table>
				<!-- <span>Catatan<span class="text-danger">*</span> Pendaftaran hanya bisa dilakukan sekali</span> -->
			</div>
		</div>
    </div>
  </div>
</div>



<!-- Modal Daftar Beasiswa-->
<?php 
foreach($beasiswa as $b): 
  $id_beasiswa = $b['id_beasiswa'];
  $sql = "SELECT * FROM tb_beasiswa AS a JOIN tb_kriteria AS b ON a.`id_beasiswa` = b.`id_beasiswa` WHERE a.`id_beasiswa` = '$id_beasiswa'";
  $kriteria = $this->db->query($sql)->result_array();
?>
<div class="modal fade" id="daftarBeasiswa<?= $b['id_beasiswa']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pendaftaran Beasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
      <!-- daftarbeasiswa/store -->
      <form method="POST" enctype="multipart/form-data" id="form" action="<?= base_url('daftarbeasiswa/store') ?>">
          <!-- NIM Mahasiswa -->
          <input type="hidden" name="nim" value="<?= $this->session->userdata('nim'); ?>" >
          <!-- Id Beasiswa -->
          <input type="hidden" name="id_beasiswa" value="<?= $b['id_beasiswa']; ?>" >
          <?php 
            $no = 1; 
            foreach($kriteria as $k):
              $id_kriteria = $k['id_kriteria'];
              $sql2 = "SELECT * FROM tb_subkriteria AS a JOIN tb_kriteria AS b ON a.id_kriteria = b.id_kriteria WHERE 
                      a.id_kriteria = '$id_kriteria'";
              $subkriteria = $this->db->query($sql2)->result_array();
          ?>
          <div class="form-group mb-2">
            <label for="<?= $k['nama_kriteria']; ?>"><?= $k['nama_kriteria']; ?></label>
            <select class="form-control form-select" id="<?= $k['nama_kriteria']; ?>" name="<?= $no++; ?>">
                <option value="">--Pilih--</option>
                <?php
                  foreach($subkriteria as $sk):
                ?>
				          <!-- 1. id_kriteria, 2. id_subkriteria, 3. nilai_subkritreia -->		
                  <option value="<?= $sk['id_kriteria']; ?>|<?= $sk['id_subkriteria']; ?>|<?= $sk['nilai_subkriteria']; ?>">
                    <?= $sk['nama_subkriteria']; ?>
                  </option>
                <?php endforeach; ?>
            </select>
          </div>
          <?php endforeach; ?>

          <!-- <input type="file" class="form-control"> -->
          <div class="form-group mb-2">
            <label for="">Upload Nilai Rapot</label>
            <input type="file" class="form-control" name="file1">
          </div>

          <div class="form-group mb-2">
            <label for="">Upload Kartu Sosial / Surat Keterangan</label>
            <input type="file" class="form-control" name="file2">
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Simpan</button>
    </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


<!-- 
	Jika Ada File Maka Menampilkan File Pengumuman
	Jika Tidak Maka Menampilkan Card
 -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">File Pengumuman</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			
		</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>


<div class="footer">
  <p>Informasi Pendaftaran Beasiswa</p>
</div>

<?php $this->load->view('layout/page2/bottom') ?>
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
