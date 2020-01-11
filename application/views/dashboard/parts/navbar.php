<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="/" class="nav-link">Home</a>
		</li>
		<li class="nav-item mt-auto">
			<a href="#" class="nav-link">View Site</a>
		</li>
		<!-- <li class="nav-item mt-auto">
			<a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">Logout</a>
		</li> -->
	</ul>

	<ul class="navbar-nav ml-auto">
		<!-- <li class="nav-item d-none d-sm-inline-block">
			<div class="user-panel d-flex">
				<div class="image">
					<img src="<?= base_url('assets/img/profile/') . $user['img']; ?>" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="#" class="d-block"><?= $user['name']; ?></a>
				</div>
			</div>
		</li> -->

		<!-- <a class="nav-link" data-toggle="dropdown" href="#">
			<i class="far fa-bell"></i>
			<span class="badge badge-warning navbar-badge">15</span>
		</a> -->
		<li class="nav-item dropdown">
		</li>

		<li class="nav-item dropdown">
			<a href="#" class="nav-link mb-2" data-toggle="dropdown" aria-expanded="false">
				<div class="user-panel d-flex">
					<div class="info">
						<span class="user-name"><?= $user['name']; ?></i></span>
					</div>
					<div class="image">
						<img class="img-circle img-sm" src="<?= base_url('assets/img/profile/') . $user['img']; ?>" width="40" height="40" alt="">
					</div>
				</div>
			</a>
			<!-- <a class="nav-link" data-toggle="dropdown" href="#">
			</a> -->
			<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
				<!-- <span class="dropdown-item float-left">15 Notifications</span> -->
				<a href="#" class="dropdown-item">
					<div class="row">
						<div class="col-3">
							<i class="fas fa-envelope"></i>
						</div>
						<div class="col-9">
							Profile
						</div>
					</div>
				</a>
				<a href="#" class="dropdown-item">
					<div class="row">
						<div class="col-3">
							<i class="fas fa-users"></i>
						</div>
						<div class="col-9">
							Change password
						</div>
					</div>
				</a>
				<a href="#" class="dropdown-item">
					<div class="row">
						<div class="col-3">
							<i class="fas fa-file"></i>
						</div>
						<div class="col-9">
							3 new reports
						</div>
					</div>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
					<div class="row">
						<div class="col-3">
							<i class="fas fa-file"></i>
						</div>
						<div class="col-9">
							Logout
						</div>
					</div>
				</a>
			</div>
		</li>
	</ul>


</nav>
