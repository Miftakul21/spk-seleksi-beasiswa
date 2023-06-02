    <!-- Top -->
    <?php $this->load->view('layout/page2/top'); ?>
    <!-- Navbar -->
    <?php $this->load->view('layout/page2/navbar'); ?>

    <!-- Content -->
    <div class="container mt-3">
        <div class="card">
            <h5 class="card-header">Profil Mahasiswa</h5>
            <div class="card-body">
                <form action="<?= base_url('profil/update_password'); ?>" method="POST">
                    <?php foreach($user as $u): ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="hidden" value="<?= $u['username'] ?>" name="username">
                        <input type="text" class="form-control" id="username" value="<?= $u['username']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?= $u['password']; ?>">
                    </div>
                    <?php endforeach; ?>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>
    <!-- End Content -->


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
