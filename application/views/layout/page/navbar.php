<nav class="main-header navbar navbar-expand d-flex justify-content-end sidebar-bg-primary">
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="far fa-user mr-2"></i>
				<span>Admin</span>
			</a>
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
