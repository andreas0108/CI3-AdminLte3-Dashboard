<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $title4 ?> Config</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#"><?= $title2 ?></a></li>
						<li class="breadcrumb-item"><a href="#"><?= $title3 ?></a></li>
						<li class="breadcrumb-item"><a href="#"><?= $title4 ?></a></li>
						<li class="breadcrumb-item active"><?= $role['role']; ?></li>
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
						<h3 class="card-title">Configurating <?= $role['role']; ?> Role</h3>

						<div class="card-tools">
							<!-- <a href="" type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#addRoleModal">Add Role</a> -->
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
									<th width="65%">
										Menu
									</th>
									<th class="text-center" width="30%">
										Access
									</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($menu as $m) : ?>
									<tr>
										<td>
											<?= $i; ?>
										</td>
										<td>
											<?= $m['menu'] ?>
										</td>
										<td class="project-state text-center">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id'] ?>" data-menu="<?= $m['id'] ?>">
											</div>
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
</div>
<!-- /.content-wrapper -->
