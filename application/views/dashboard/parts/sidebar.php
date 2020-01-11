<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url(); ?>" class="brand-link">
		<img src="<?= base_url('assets/') ?>img/logo.png" alt="Site Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light"><?= $title ?></span>
	</a>

	<!-- Query menu -->
	<?php
	$role_id = $this->session->userdata('role_id');
	$queryMenu = "SELECT `user_menu`.`id`, `menu`
                    FROM `user_menu` JOIN `user_access_menu` 
                      ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                   WHERE `user_access_menu`.`role_id` = $role_id
                ORDER BY `user_menu`.`id` ASC
                ";
	$menu = $this->db->query($queryMenu)->result_array();
	?>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('assets/img/profile/') . $user['img']; ?>" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= $user['name']; ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Query menu -->
				<?php
				// menu
				$role_id = $this->session->userdata('role_id');
				$queryMenu = "SELECT `user_menu`.`id`, `menu`, `icon`
                    FROM `user_menu` JOIN `user_access_menu` 
                      ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                   WHERE `user_access_menu`.`role_id` = $role_id
                ORDER BY `user_menu`.`id` ASC
                ";
				$menu = $this->db->query($queryMenu)->result_array();
				?>
				<!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
				<?php foreach ($menu as $m) : ?>
					<li class="nav-header"><?= $m['menu'] ?></li>
					<?php
					// submenu
					$menuID = $m['id'];
					$querySubMenu = "SELECT *
									FROM 	`user_sub_menu` 
									WHERE 	`menu_id` = $menuID -- {$m['id']}
									AND 	`is_active` = 1
									";
					$subMenu = $this->db->query($querySubMenu)->result_array();
					?>
					<?php foreach ($subMenu as $sm) : ?>
						<li class="nav-item">
							<?php if ($title3 == $sm['title']) : ?>
								<a href="<?= base_url($sm['url']); ?>" class="nav-link active">
								<?php else : ?>
									<a href="<?= base_url($sm['url']); ?>" class="nav-link">
									<?php endif ?>
									<i class="nav-icon <?= $sm['icon']; ?>"></i>
									<p><?= $sm['title']; ?></p>
									</a>
						</li>
					<?php endforeach ?>
				<?php endforeach ?>
				<li class="nav-header">Extra</li>
				<li class="nav-item">
					<a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							Logout
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-th"></i>
						<p>
							Simple Link
							<span class="right badge badge-danger">New</span>
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
