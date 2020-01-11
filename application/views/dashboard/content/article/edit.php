<!-- Content Wrapper. Contains page content -->
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
		<form action="" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title">
								<h4>Tambah <?= $title3 ?></h4>
							</div>
							<div class="card-tools">
								<button type="button" class="btn btn-tool">
									<a href="<?= base_url('dashboard/content/') ?>">
										<i class="fas fa-fw fa-arrow-left"></i>
										Back
									</a>
								</button>
								<button type="submit" class="btn btn-success btn-sm">
									Update
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-7 col-lg-9">
					<!-- Default box -->
					<div class="card">
						<div class="card-body pad">
							<div class="form-group">
								<input type="text" name="title" class="form-control focus" placeholder="Title" value="<?= $lA['judul'] ?>" required>
							</div>
							<div class="form-group">
								<textarea name="article-sum" id="article-sum" class="form-control"><?= $lA['isi'] ?></textarea>
							</div>
						</div>
					</div>
					<!-- /.card -->
				</div>
				<div class="col-sm-12 col-md-5 col-lg-3">
					<div class="card">
						<div class="card-header">
							<b>Status Publikasi :</b>
						</div>
						<div class="card-body pt-3 pb-0">
							<div class="form-group">
								<select class="form-control custom-select" name="status" required>
									<?php if ($lA['status'] == 0) : ?>
										<option selected value="0">Draft</option>
										<option value="1">Publish</option>
									<?php else : ?>
										<option value="0">Draft</option>
										<option selected value="1">Publish</option>
									<?php endif ?>
								</select>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<b>Author :</b>
						</div>
						<div class="card-body pt-3 pb-0">
							<div class="row">
								<div class="col-4 mt-2">
									<b>Penulis</b>
								</div>
								<div class="col-8">
									<div class="form-group">
										<input type="text" name="penulis" id="penulis" class="form-control" placeholder="Penulis" value="<?= $lA['name'] ?>" style="background-color: #F8F8F8;outline-color: none;border:0;color:blue;" disabled>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-4 mt-2">
									<b>Editor</b>
								</div>
								<div class="col-8">
									<div class="form-group">
										<input type="text" name="editor" id="editor" class="form-control" placeholder="Editor" value="<?= $user['name'] ?>" style="background-color: #F8F8F8;outline-color: none;border:0;color:blue;" disabled>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<b>Media</b>
						</div>
						<div class="card-body pt-1 mt-0 pb-0">
							<div class="form-group pt-2">
								<label for="poster">Poster : </label>
								<div class="input-group">
									<div class="custom-file">
										<?php if ($lA['gambar'] != '' || null) : ?>
											<input type="file" class="custom-file-input" id="poster" name="poster">
											<label class="custom-file-label" for="poster"><?= $lA['gambar'] ?></label>
										<?php else : ?>
											<input type="file" class="custom-file-input" id="poster" name="poster">
											<label class="custom-file-label" for="poster">Pilih poster / gambar</label>
										<?php endif ?>
									</div>
								</div>
								<div class="mt-1">
									<?php if ($lA['gambar'] != '' || null) : ?>
										<img src="<?= base_url('assets/img/article/poster/') . $lA['gambar'] ?>" alt="" srcset="" class="img-thumbnail">
									<?php else : ?>
										<div class="alert alert-info alert-dismissible fade show">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h5><i class="icon fas fa-info"></i> Informasi</h5>
											Anda belum menambahkan poster di artikel ini.
										</div>
									<?php endif ?>
								</div>
							</div>
							<hr>
							<div class="form-group mt-2">
								<label for="youtube_id">Youtube Video : </label>
								<input type="text" name="youtube_id" id="youtube_id" class="form-control" placeholder="ijn9d8c4fxU" aria-describedby="keterangan_yt" value="<?= $lA['video'] ?>">
								<small id="keterangan_yt" class="text-muted">Masukan id video yang tertera di url.<br>(https://www.youtube.com/watch?v=<b>ijn9d8c4fxU</b>)</small>
								<div class="mt-1">
									<?php if ($lA['video'] != '' || null) : ?>
										<iframe src="http://www.youtube.com/embed/<?= $lA['video'] ?>" style="resize: both" frameborder="1" width="100%" height="210px"></iframe>
									<?php else : ?>
										<div class="alert alert-info alert-dismissible fade	show">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h5><i class="icon fas fa-info"></i> Informasi</h5>
											Anda belum menambahkan video di artikel ini.
										</div>
									<?php endif ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <input type="text" name="penulis_id" class="form-control" value="<?= $lA['id'] ?>" required hidden> -->
			<input type="text" name="editor_id" class="form-control" value="<?= $user['id'] ?>" required hidden>
		</form>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
