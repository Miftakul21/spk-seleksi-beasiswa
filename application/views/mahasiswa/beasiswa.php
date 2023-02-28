<!-- Top -->
<?php $this->load->view('layout/page2/top') ?>
<!-- Navbar -->
<?php $this->load->view('layout/page2/navbar') ?>

<div class="container mt-3">
  <div class="row">
    <div class="col">
      <div class="card mt-3">
				<div class="card-body">
					<div>
						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Periode</th>
									<th>Status</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
                <?php 
                  $no = 1;
                  foreach($beasiswa as $b):
                    $status = ($b['status'] = '1') ? 'Aktif' : 'Tutup';
                ?>
								<tr>
									<td><?= $no++; ?></td>
                  <td>
                    <p>Pendaftaran Dibuka : <?= tgl_indo($b['tgl_pendaftaran']); ?></p>
                    <p>Pendaftaran Dibuka : <?= tgl_indo($b['tgl_pendaftaran']); ?></p>
                  </td>
                  <td>
                    <button class="btn btn-success fw-bold"><?= $status; ?></button>
                  </td>
                  <td>
                    <button class="btn btn-success fw-500" data-toggle="modal" data-target="#tambahData<?= $b['id_beasiswa'] ?>">
                      Daftar Beasiswa
										</button>
                  </td>
								</tr>
                <?php
                  endforeach;
                ?>
							</tbody>
						</table>
					</div>
          <span>Catatan<span class="text-danger">*</span> Pendaftaran hanya bisa dilakukan sekali</span>
				</div>
			</div>
    </div>
  </div>
</div>

<!-- Modal -->
<?php 
foreach($beasiswa as $b): 
  $id_beasiswa = $b['id_beasiswa'];
  $sql = "SELECT * FROM tb_beasiswa AS a JOIN tb_kriteria AS b ON a.`id_beasiswa` = b.`id_beasiswa` WHERE a.`id_beasiswa` = '$id_beasiswa'";
  $kriteria = $this->db->query($sql)->result_array();
?>
<div class="modal fade" id="tambahData<?= $b['id_beasiswa']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="daftarbeasiswa/store" method="POST" enctype="multipart/form-data">
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
            <select class="form-control form-select" id="<?= $k['nama_kriteria']; ?>" class="nilai_rata2_rapot" name="<?= $no++; ?>">
                <option value="">--Pilih--</option>
                <?php
                  foreach($subkriteria as $sk):
                ?>
                  <option value="<?= $sk['id_subkriteria']; ?>"><?= $sk['nama_subkriteria']; ?></option>
                <?php endforeach; ?>
            </select>
          </div>
          <?php endforeach; ?>
          <div class="row">
            <div class="col-4 ">
                <label for="nilai_rapot" class="mb-2">Upload File Nilai Rapot</label>
                <input type="file" class="d-block" id="nilai_rapot" name="file_1">
                <small id="emailHelp" class="form-text text-muted">Upload file maksimal 2mb</small>
            </div>
            <div class="col-4 offset-2">
                <label for="sktm" class="mb-2">Upload File KIP/PKH/KKS</label>
                <input type="file" class="d-block" id="sktm" name="file_2">
                <small id="emailHelp" class="form-text text-muted">Upload file maksimal 2mb</small>
            </div>
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
