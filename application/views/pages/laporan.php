<?php 
$jenis_beasiswa = $this->db->query("SELECT * FROM tb_beasiswa GROUP BY jenis_beasiswa")->result_array();
$tahun = date('Y');
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
                            <h1 class="m-0 fw-bold">Laporan Seleksi Beasiswa</h1>
                            <div class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-primary" style="text-decoration: none;">Dashboard</a></li>
                                <li class="breadcrumb-item text-secondary" aria-current="page">Laporan</li>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid #bbb">

                    <form action="<?= base_url('laporan') ?>" method="POST">
                        <div class="row">
                            <div class="col-4 d-flex align-items-center">
                                <label for="jenis_beasiswa" class="mr-3">Jenis Beasiswa</label>
                                <!-- <input type="text" class="form-control col-5"> -->
                                <select class="form-control col-5" id="jenis_beasiswa" name="id_beasiswa">
                                    <option>Jenis Beasiswa</option>
                                    <?php foreach($jenis_beasiswa as $jb):?>
                                        <option value="<?= $jb['id_beasiswa'] ?>"><?= $jb['jenis_beasiswa'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-4 d-flex align-items-center">
                                <label for="periode" class="mr-3">Periode</label>
                                <!-- <input type="text" class="form-control col-5"> -->
                                <select name="periode" id="periode" class="form-control col-5">
                                    <option value="">Periode</option>
                                    <?php for($i = $tahun; $i >= 2019; $i--){ ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                    <?php } ?>
                                </select>                                
                            </div>
                            <div class="col-1">
                                <button class="btn btn-primary">Proses</button>
                            </div>
                        </div>
                    </form>

                <?php 
                    foreach($beasiswa as $b){ 
                        $id_beasiswa = $b['id_beasiswa'];
                ?>
                    
                    <!-- <a href="<?//= base_url('laporan/hasil') ?>" class="btn btn-success mt-3">
                        <i class="fas fa-print text-white"></i> Cetak PDF
                    </a> -->
                    <form action="<?= base_url('laporan/hasil') ?>" method="POST">
                        <input type="hidden" value="<?= $b['kuota'] ?>" name="kuota">
                        <input type="hidden" value="<?= $b['id_beasiswa'] ?>" name="id_beasiswa">
                        <button class="btn btn-success mt-3">
                            <i class="fas fa-print text-white"></i> Cetak PDF
                        </button>
                    </form>

                    <!-- Menampilkan Hasil Perangkingan -->
                    <div class="d-flex justify-content-center">
                        <div class="col-8">
                            <div class="card ">
                                <div class="card-body">
                                    <table class="table table-hover table-striped w-100">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">NIM</th>
                                                <th scope="col">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php 
                                        $hasil_seleksi = $this->db->query("SELECT a.nama, a.nim, b.nilai FROM tb_mahasiswa AS a 
                                                                JOIN tb_hasil AS b ON a.nim = b.nim WHERE a.`id_beasiswa` = '$id_beasiswa'  
                                                                ORDER BY b.nilai DESC")->result_array();
                                        $kuota = $b['kuota'];
                                        $no = 0;
                                        foreach($hasil_seleksi as $hasil){
                                            $ket = ($no++ <= $kuota) ? 'Diterima' : 'Ditolak';
                                    ?>
                                            <tr>
                                                <th scope="row"><?= $no++; ?></th>
                                                <td><?= $hasil['nama']; ?></td>
                                                <td><?= $hasil['nim']; ?></td>
                                                <td><?= $hasil['nilai']; ?></td>
                                                <td><?= $ket; ?></td>                                                    
                                            </tr>
                                    <?php  } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

                </div>
            </div>
        </div>
        <?php $this->load->view('layout/page/footer') ?>
    </div>
		
<?php $this->load->view('layout/page/bottom'); ?>