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
        <form action="<?= base_url('dashboard/content/edita'); ?>" method="post" enctype="multipart/form-data">
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
                <div class="col-9">
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
                <div class="col-3">
                    <div class="card">
                        <!-- <div class="card-body">
							<div class="form-group">
								<label for="">Status Publikasi :</label>
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
						</div> -->
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Penulis :</b>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Penulis" value="<?= $lA['name'] ?>" style="background-color: #F8F8F8;outline-color: none;border:0;color:blue;" disabled>
                                <!-- <input type="text" name="penulis_id" class="form-control" value="<?= $lA['id'] ?>" required hidden> -->
                                <input type="text" name="editor_id" class="form-control" value="<?= $user['id'] ?>" required hidden>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Media</b>
                        </div>
                        <!-- <div class="card-body">
							<div class="form-group">
								<label for="poster">Cover : </label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="poster" name="poster">
										<label class="custom-file-label" for="poster">Pilih File poster</label>
									</div>
								</div>
								<div class="mt-1">
									<?php if ($lA['gambar'] != '' || null) : ?>
										<img src="<?= base_url('assets/img/article/poster/') . $lA['gambar'] ?>" alt="" srcset="" class="img-thumbnail">
									<?php else : ?>
										<div class="callout callout-info">
											<h5>Informasi : </h5>
											<p>Anda belum menambahkan poster di artikel ini.</p>
										</div>
									<?php endif ?>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<label for="youtube_id">Youtube Video : </label>
								<input type="text" name="youtube_id" id="youtube_id" class="form-control" placeholder="ijn9d8c4fxU" aria-describedby="keterangan_yt" value="<?= $lA['video'] ?>">
								<small id="keterangan_yt" class="text-muted">Masukan id video yang tertera di url.<br>(https://www.youtube.com/watch?v=<b>ijn9d8c4fxU</b>)</small>
								<div class="mt-1">
									<?php if ($lA['video'] != '' || null) : ?>
										<iframe src="http://www.youtube.com/embed/<?= $lA['video'] ?>" style="resize: both" frameborder="1" width="100%" height="210px"></iframe>
									<?php else : ?>
										<div class="callout callout-info">
											<h5>Informasi : </h5>
											<p>Anda belum menambahkan video di artikel ini.</p>
										</div>
									<?php endif ?>
								</div>
							</div>
						</div> -->
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
