<div class="container-fluid hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?= base_url() ?>"><b>LOGIN</b> PAGE</a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg text-uppercase">Sign in to your account</p>
				<?= $this->session->flashdata('flashmsg'); ?>

				<form action="<?= base_url('dashboard/auth') ?>" method="post">
					<div class="input-group ">
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email') ?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<?= form_error('email', '<small class="text-danger pl-1" role="alert">', '</small>') ?>
					<div class="input-group mt-2">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<?= form_error('password', '<small class="text-danger pl-1" role="alert">', '</small>') ?>
					<div class="row mt-2">
						<div class="col-4">
							<!-- <div class="icheck-primary">
								<input type="checkbox" id="remember">
								<label for="remember">
									Remember Me
								</label>
							</div> -->
						</div>
						<div class="col-4"></div>
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
						<!-- /.col -->
					</div>
				</form>

				<div class="row mt-2">
					<div class="col-md-6 col-sm-12">
						<p class="mt-1 ml-1">
							<a href="forgot-password.html" class="float-left">Forgot my password</a>
						</p>
					</div>
					<div class="col-md-6 col-sm-12">
						<p class="mt-1 mr-1">
							<a href="<?= base_url('register'); ?>" class="float-right">Register</a>
						</p>
					</div>
				</div>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->
</div>
