  <!-- Top -->
  <?php $this->load->view('layout/page2/top'); ?>
  <!-- Navbar -->
  <?php $this->load->view('layout/page2/navbar'); ?>
    <!-- Content Section -->
    <div class="container mt-3">
      <div class="card">
        <div class="card-body">
          <div class="jumbotron bg-transparent">
            <h1 class="display-4">Selamat Datang</h1>
            <p class="lead">Mahasiswa Pejuang Beasiswa, disini merupakan media informasi untuk pendaftaran beasiswa</p>
            <hr class="my-3">
            <p>Berikut Informasi Pendaftaran Beasiswa : </p>
            <div>
            <?php 
              foreach($beasiswa as $data){ 
                // $hari = $data['tgl_pendaftaran'];
                $bulan1 = split_date($data['tgl_pendaftaran'], 1);
                $bulan2 = split_date($data['tgl_penutupan'], 1);
            ?>
              <div class="mb-2">
                <h4 class="mb-3"><?= $data['jenis_beasiswa'] ?></h4>
                <p>Tanggal Pembukaan Pendaftaran: <?= $data['hari_pendaftaran']; ?> <?= nama_bulan($bulan1); ?> <?= split_date($data['tgl_pendaftaran'],0); ?></p>
                <p>Tanggal Penutupan Pendaftaran: <?= $data['hari_penutupan']; ?> <?= nama_bulan($bulan2); ?> <?= split_date($data['tgl_pendaftaran'],0); ?></p>
              </div>
            <?php } ?>
            </div>
            <div class="informasi-keterangan">
              <p class=" fw-bold" style="margin-top: 3rem;">Keterangan<span class="text-danger">*</span></p>
              Jadawal pendaftaran dapat berubah sewaktu-waktu
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer">
      <p>Informasi Pendaftaran Beasiswa</p>
    </div>


<?php $this->load->view('layout/page2/bottom') ?>