<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Laporan Hasil Seleksi</title>
    <style>
        .container-content{
            padding: 0 30px;
        }
        img{
            position: absolute;
            width: 100px;
        }
        #image-bg{
            width: 100%;
        }
        .row .col-9 {
            margin-top: 10px;
            margin-left: 130px;
            line-height: 0.5;
        }
        .col-9 h5{
            margin-top: 10px;
            font-size: 1.4rem;
            text-transform: uppercase;
        }
        .col-9 p{
            font-size: 12px;
            font-weight: 200;
            font-style: italic;
        }
        .table-list-mhs{
            margin-left: -54px;
            border: 0.5px solid #000000;
        }
        .table-list-mhs > thead > tr > th,
        .table-list-mhs > tbody > tr > th,
        .table-list-mhs > thead > tr > td,
        .table-list-mhs > tbody > tr > td
        {
            border: 0.5px solid #000000;
        }
        .table-list-mhs, th, td {
            padding: 0 5px;
        }
        .container-ttd {
            margin-top: 20%; 
            text-align:right;
        }
        .container-ttd .tgl-ttd{
            margin-bottom: 13%;
        }
    </style>
  </head>
  <body>

    <div class="container-content">
        <div class="continer-fluid">
            <div class="row">
                <div class="col-2" id="image-bg">
                    <img src="<?= base_url() ?>assets/image/lg-untag.png">
                </div>
                <div class="col-9">
                    <h5 class="text-center">Universitas 17 agustus 1945 surabaya</h5>
                    <p class="text-center">Alamat: Jl. Semolowaru No.45 Surabaya 60118 Telp:+6231 5931800 (hunting) Fax. +6231 5927187</p>
                    <p class="text-center">
                        Homepage: <a href="">www.untag-sby.ac.id</a>
                        <span class="ml-2">e-mail: <a href="">humas@untag-sby.ac.id</a><span>
                    </p>
                </div>
            </div>
        </div>
        <hr style="border: 1px solid #000;">

        <div class="container">
            <h5 class="text-center">Laporan Hasil Penerima Beasiswa KIP-Kuliah Periode 2023</h5>
            <table class="table-list-mhs" style="width: 122%;">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">NIM</th>
                    <th class="text-center">Hasil Nilai</th>
                    <th class="text-center">Keternagan</th>
                </tr>
            <?php 
                $no = 1;
                foreach($hasil as $h){
                    $ket = ($no <= $kuota) ? 'Diterima' : 'Ditolak';
            ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $h['nama']; ?></td>
                    <td><?= $h['nim']; ?></td>
                    <td><?= $h['nilai']; ?></td>
                    <td class="text-center"><?= $ket ?></td>
                </tr>
            <?php } ?>

            </table>
        </div>

        <div class="container-ttd">
            <p class="tgl-ttd">Surabaya, 17 Agustus 2024</p>
            <p class="pimpinan">Kepala Biro Kemahasiswaan</p>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>

<!--
                <tr>
                    <td class="text-center">1</td>
                    <td>Joko Widodo Putra</td>
                    <td>1462000012</td>
                    <td>Teknik Informatika</td>
                    <td class="text-center">2020</td>
                    <td class="text-center">Diterima</td>
                </tr>
                <tr>
                    <td class="text-center">1</td>
                    <td>Joko Widodo</td>
                    <td>1462000012</td>
                    <td>Teknik Sipil</td>
                    <td class="text-center">2020</td>
                    <td class="text-center">Diterima</td>
                </tr>
                <tr>
                    <td class="text-center">1</td>
                    <td>Joko Widodo Putri</td>
                    <td>1462000012</td>
                    <td>Teknik Mesin</td>
                    <td class="text-center">2020</td>
                    <td class="text-center">Diterima</td>
                </tr>
                <tr>
                    <td class="text-center">1</td>
                    <td>Joko Widodo</td>
                    <td>1462000012</td>
                    <td>Teknik Industri</td>
                    <td class="text-center">2020</td>
                    <td class="text-center">Diterima</td>
                </tr>
                <tr>
                    <td class="text-center">1</td>
                    <td>Joko Widodo</td>
                    <td>1462000012</td>
                    <td>Teknik Elektro</td>
                    <td class="text-center">2020</td>
                    <td class="text-center">Diterima</td>
                </tr>
                <tr>
                    <td class="text-center">1</td>
                    <td>Joko Widodo</td>
                    <td>1462000012</td>
                    <td>Teknik Informatika</td>
                    <td class="text-center">2020</td>
                    <td class="text-center">Diterima</td>
                </tr> -->