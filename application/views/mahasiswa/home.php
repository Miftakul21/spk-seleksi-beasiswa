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
              <h4 class="mb-3">Beasiswa KIP-Kuliah</h4>
              <p>Tanggal Pembukaan Pendaftaran: Senin, 17 Februari 2023</p>
              <p>Tanggal Penutupan Pendaftaran: Senin, 17 Maret 2023</p>
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