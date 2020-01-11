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
						<h3 class="card-title"><?= $title3 ?> List</h3>

						<div class="card-tools">
							<a href="" type="button" class="btn btn-sm btn-outline-primary useradd" data-toggle="modal" data-target="#addUserModal">Add <?= $title3 ?></a>
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
						<table class="table table-bordered table-hover" id="example1">
							<thead>
								<tr class="text-center">
									<th style="width: 1%">
										#
									</th>
									<th style="width: 10%">
										Judul
									</th>
									<th style="width: 10%">
										Content
									</th>
									<th style="width: 10%">
										Gambar
									</th>
									<th style="width: 10%">
										Video
									</th>
									<th style="width: 10%">
										Penulis
									</th>
									<th style="width: 10%">
										Dibuat
									</th>
									<th style="width: 10%">
										Diubah
									</th>
									<th style="width: 10%" class="text-center">
										Status
									</th>
									<th style="width: 10%">
										Slug
									</th>
									<th style="width: 9%">
									</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<!-- <?php foreach ($userman as $um) : ?> -->
								<tr>
									<td>
										<?= $i ?>
									</td>
									<td>
									</td>
									<td>
									</td>
									<td>
									</td>
									<td>
									</td>
									<td>
									</td>
									<td>
									</td>
									<td>
									</td>
									<td>
									</td>
									<td>

									</td>
									<td>
									</td>
									<td class="project-actions text-right">
										<a class="btn btn-info btn-sm userView" href="#" data-toggle="modal" data-target="#addUserModal">
											<i class="fas fa-fw fa-eye">
											</i>
											Config
										</a>
										<!-- <a class="btn btn-info btn-sm" href="<?= base_url('dashboard/edit/') . $um['id']; ?>">
												<i class="fas fa-pencil-alt">
												</i>
												Edit
											</a> -->
										<a class="btn btn-danger btn-sm userRemove" href="<?= base_url('dashboard/deleteUser/') . $um['id']; ?>">
											<i class="fas fa-trash">
											</i>
											Delete
										</a>
									</td>
								</tr>
								<?php $i++; ?>
								<!-- <?php endforeach ?> -->
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
						<span aria-hidden="true">Ãƒâ€”</span>
					</button>
				</div>
				<form action="<?= base_url('dashboard/userman'); ?>" method="POST">
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
							<input type="password" class="form-control form-control-user" id="pasword1" name="password1" placeholder="Password">
							<?= form_error('password1', '<small class="text-danger pl-4" role="alert">', '</small>') ?>
						</div>
						<div class="form-group">
							<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
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
