<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $title3 ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#"><?= $title2 ?></a></li>
						<li class="breadcrumb-item active"><?= $title3 ?></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- <div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Vardump</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
					</div>
					<div class="card-body">
						<?= var_dump($userman) ?>
					</div>
				</div>
			</div>
		</div> -->
		<div class="row">
			<div class="col-12">
				<!-- Default box -->
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">User List</h3>
						<div class="card-tools">
							<a href="<?= base_url('dashboard/home/role') ?>" type="button" class="btn btn-sm btn-outline-primary useradd">Role Manager</a>
							<a href="" type="button" class="btn btn-sm btn-outline-primary useradd" data-toggle="modal" data-target="#addUserModal">Add User</a>
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
					</div>
					<div class="card-body">
						<?php if (validation_errors()) : ?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<?= validation_errors() ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span></button>
							</div>
						<?php endif; ?>
						<?= $this->session->flashdata('notif'); ?>
						<div class="alert alert-info alert-dismissible">
							<a style="color: white" type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-fw fa-window-close"></i></a>
							<h5><i class="icon fas fa-info"></i> Informasi.</h5>
							<p class="text-sm italic">Untuk saat ini, perubahan user, hanya bisa dilakukan oleh pengguna.</p>
						</div>
						<table class="table table-bordered table-hover" id="example1">
							<thead>
								<tr>
									<th style="width: 1%">
										#
									</th>
									<th style="width: 5%">
										Picture
									</th>
									<th style="width: 15%">
										Name
									</th>
									<th style="width: 20%">
										Email
									</th>
									<th style="width: 10%">
										Role
									</th>
									<th style="width: 20%">
										Address
									</th>
									<th style="width: 5%" class="text-center">
										Status
									</th>
									<th style="width: 10%">
									</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($userman as $um) : ?>
									<tr>
										<td>
											<?= $i; ?>
										</td>
										<td>
											<img alt="Avatar" class="table-avatar img-bordered-sm img-md align-items-center" src="<?= base_url('assets/img/profile/') . $um['img']; ?>">
										</td>
										<td>
											<a>
												<?= $um['name'] ?>
											</a>
											<br />
											<small>
												Created <?= date('d M Y', $um['date_created']) ?>
											</small>
										</td>
										<td>
											<?= $um['email'] ?>
										</td>
										<td>
											<?= $um['role'] ?>
										</td>
										<td>
											<?= $um['address'] ?>
										</td>
										<td class="project-state text-center">
											<?php if ($um['status'] == '1') : ?>
												<span class="badge badge-success">Online</span>
											<?php else : ?>
												<span class="badge badge-secondary">Offline</span>
											<?php endif ?>
										</td>
										<td class="project-actions text-right">
											<!-- <a class="btn btn-info btn-sm userView btn-config-user" href="#" data-toggle="modal" data-target="#addUserModal" data-baseurl="<?= base_url(); ?>" data-userid="<?= $um['id'] ?>">
												<i class="fas fa-fw fa-eye">
												</i>
												Config
											</a> -->
											<a class="btn btn-danger btn-sm userRemove btn-remove-user" href="<?= base_url('dashboard/home/deleteUser/') . $um['id']; ?>" data-username="<?= $um['name']; ?>">
												<i class=" fas fa-trash">
												</i>
												Delete
											</a>
										</td>
									</tr>
									<?php $i++; ?>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>
	</section>
	<!-- /.content -->
	<!-- modal-section -->
	<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addMenuModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addUserModalTitle">Add New User</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= base_url('dashboard/home/userman'); ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<input type="hidden" class="form-control" id="iduser" name="iduser">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
						</div>
						<div class="form-group">
							<input type="password" class="form-control form-control-user txt-password1" id="password1" name="password1" placeholder="Password">
							<?= form_error('password1', '<small class="text-danger pl-4" role="alert">', '</small>') ?>
						</div>
						<div class="form-group">
							<input type="password" class="form-control form-control-user txt-password2" id="password2" name="password2" placeholder="Repeat Password">
						</div>
						<div class="form-group">
							<select name="role_id" id="role_id" class="form-control">
								<option value="">User Level</option>
								<?php foreach ($userRole as $ur) : ?>
									<option value="<?= $ur['id'] ?>"><?= $ur['role'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button class="btn btn-primary" type="submit">Add Sub Menu</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /.modal-section -->
</div>
<!-- /.content-wrapper -->
