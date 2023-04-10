    <!-- Top -->
    <?php $this->load->view('layout/page2/top'); ?>
    <!-- Navbar -->
    <?php $this->load->view('layout/page2/navbar'); ?>

    <!-- Content -->
    <div class="container mt-3">
        <div class="card" style="width: 70%; margin: 0 auto;">
            <div class="card-body"> 
                <?php 
                    foreach($beasiswa as $b){ 
                        $id_beasiswa = $b['id_beasiswa'];
                        $kriteria = $this->db->query("SELECT nama_kriteria, nilai_bobot FROM tb_kriteria WHERE id_beasiswa =  '$id_beasiswa'")->result_array();
                ?>
                    <div class="card mt-2">
                        <div class="card-header">
                            <h5><?= $b['jenis_beasiswa'] ?></h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col" class="text-center">Penilaian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach($kriteria as $k){
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $k['nama_kriteria']; ?></td>
                                        <td class="text-center"><?= $k['nilai_bobot']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } ?>


            </div>
        </div>
    </div>
    <!-- End Content -->


    <div class="footer">
        <p>Informasi Pendaftaran Beasiswa</p>
    </div>
<?php $this->load->view('layout/page2/bottom') ?>