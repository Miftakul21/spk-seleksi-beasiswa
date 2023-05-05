<nav class="main-header navbar bg-danger navbar-expand d-flex justify-content-end">
	<!-- Left navbar links / Menu Button -->
    <ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
    </ul>

	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<div class="nav-link d-flex align-items-center" data-toggle="dropdown">
				<i class="fa fa-user-circle fs-2 mr-2" style="font-size: 26px;"></i>
                <span class="text-white fw-semibold">Admin</span>
			</div>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="<?= base_url('login/logout'); ?>" class="dropdown-item text-danger">
					<i class="fas fa-sharp fa-solid fa-door-open mr-2"></i>Log Out
					<span class="float-right text-muted text-sm"></span>
				</a>
			</div>
		</li>
	</ul>
</nav>
