<?php 

function simpanMahasiswa()
{
        // $data = array(
        //     'nim'=>$this->input->post('nim'),
        //     'nama'=>$this->input->post('nama'),
        //     'jurusan'=>$this->input->post('jurusan')
        //     );
        //     $this->db->insert('mahasiswa',$data);
}
?>


<form method="post" id="form">
    <div class="form-group">
        <label for="email">NIM:</label>
        <input type="text" class="form-control"  name="nim" placeholder="Masukan NIM">
    </div>
    <div class="form-group">
         <label for="email">Nama:</label>
        <input type="text" class="form-control"  name="nama" placeholder="Masukan nama" >
    </div>
    <div class="form-group">
            <label>Jurusan:</label>
        <select class="form-control" name="jurusan">
            <option value="TI">Teknik Informatika</option>
            <option value="SI">Sistem Informasi</option>
            <option value="TK">Teknik Komputer</option>
            <option value="MI">Manajemen Informatika</option>
        </select>
    </div>
    <button id="tombol_tambah" type="button" class="btn btn-primary" data-dismiss="modal" >Tambah</button>
</form>
<script type="text/javascript">
        $(document).ready(function(){
            $("#tombol_tambah").click(function(){
                var data = $('#form').serialize();
                $.ajax({
                    type	: 'POST',
                    url	: "<?php echo base_url(); ?>/mahasiswa/simpanMahasiswa",
                    data: data,
                    cache	: false,
                    success	: function(data){
                        $('#tampil').load("<?php echo base_url(); ?>/mahasiswa/tampilMahasiswa");
                    }
                });
            });
        });
</script> 




