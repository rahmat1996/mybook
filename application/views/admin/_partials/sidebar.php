<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?php echo site_url(); ?>" class="brand-link">
		<div class="brand-text font-weight-light" style="text-align: center;font-size: 24px;"><b>My</b>Book</div>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?php echo site_url('dashboard'); ?>" class="nav-link <?php echo $menu_active == 'dashboard' ? 'active' : ''; ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview <?php echo in_array($menu_active, array('author', 'category')) ? 'menu-open' : '' ?>">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-th-list"></i>
						<p>
							Master Data
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo site_url('author'); ?>" class="nav-link <?php echo $menu_active == 'author' ? 'active' : ''; ?>">
								<i class="fas fa-user nav-icon"></i>
								<p>Author</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('category'); ?>" class="nav-link <?php echo $menu_active == 'category' ? 'active' : ''; ?>">
								<i class="fas fa-list-alt nav-icon"></i>
								<p>Category</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('book'); ?>" class="nav-link <?php echo $menu_active == 'book' ? 'active' : ''; ?>">
						<i class="nav-icon fas fa-book"></i>
						<p>
							Manage Book
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('auth'); ?>" class="nav-link <?php echo $menu_active == 'auth' ? 'active' : ''; ?>">
						<i class="nav-icon fas fa-users"></i>
						<p>
							Manage User
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
