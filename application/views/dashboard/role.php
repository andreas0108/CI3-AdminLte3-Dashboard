<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $title4 ?> Manager</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#"><?= $title2 ?></a></li>
						<li class="breadcrumb-item"><a href="#"><?= $title3 ?></a></li>
						<li class="breadcrumb-item active"><?= $title4 ?></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<!-- Default box -->
				<div class="card">
					<div class="card-header">
						<h3 class="card-title"><?= $title4 ?> List</h3>

						<div class="card-tools">
							<a href="" type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#addRoleModal">Add Role</a>
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
					</div>
					<div class="card-body">
						<?= form_error(
							'menu',
							'<div class="alert alert-warning alert-dismissible fade show" role="alert">',
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    			<span aria-hidden="true">&times;</span></button></div>'
						); ?>

						<?= $this->session->flashdata('notif'); ?>
						<table class="table table-bordered table-hover" id="example2">
							<thead>
								<tr>
									<th style="width: 1%">
										#
									</th>
									<th style=>
										Role Name
									</th>
									<th style="width: 5%" class="text-center">
										Status
									</th>
									<th style="width: 15%">
									</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($role as $r) : ?>
									<tr>
										<td>
											<?= $i; ?>
										</td>
										<td>
											<a>
												<?= $r['role'] ?>
											</a>
										</td>
										<td class="project-state text-center">
											<span class="badge badge-success">Active</span>
										</td>
										<td class="project-actions text-right">
											<!-- <a href="<?= base_url('admin/roleconfig/') . $r['id']; ?>" type="button" class="btn btn-sm btn-outline-warning"><i class="fas fa-fw fa-cog"></i></a>
											<a href="<?= base_url('admin/edit/') . $r['id']; ?>" type="button" class="btn btn-sm btn-outline-info">Edit</a>
											<a href="<?= base_url('admin/delete/') . $r['id']; ?>" type="button" class="btn btn-sm btn-outline-danger">Delete</a> -->
											<a class="btn btn-warning btn-sm" href="<?= base_url('dashboard/home/roleconfig/') . $r['id']; ?>">
												<i class="fas fa-fw fa-cog">
												</i>
												Config
											</a>
											<a class="btn btn-danger btn-sm" href="<?= base_url('dashboard/home/delete/') . $r['id']; ?>">
												<i class="fas fa-trash">
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
	<div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="addMenuModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addRoleModal">Add New Role</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= base_url('dashboard/role'); ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control" id="role" name="role" placeholder="Role name">
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button class="btn btn-primary" type="submit">Add Role</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /.content-wrapper -->
