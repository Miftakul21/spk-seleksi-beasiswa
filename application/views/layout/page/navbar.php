<nav class="main-header navbar bg-danger navbar-expand d-flex justify-content-end">
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<div class="nav-link d-flex justify-content-center" data-toggle="dropdown">
				<img src="<?= base_url() ?>assets/image/avatar.png" 
				alt="logo-admin" >
				<span class="text-white">Admin</span>
			</div>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<div class="dropdown-divider"></div>
				<a href="<?= base_url('login/logout'); ?>" class="dropdown-item text-danger">
					<i class="fas fa-sharp fa-solid fa-door-open mr-2"></i>Log Out
					<span class="float-right text-muted text-sm"></span>
				</a>
			</div>
		</li>
	</ul>
</nav>
