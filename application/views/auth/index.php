<html>

<head>
	<?php $this->load->view('admin/_partials/head'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<?php $this->load->view('admin/_partials/navbar'); ?>
		<?php $this->load->view('admin/_partials/sidebar'); ?>
		<div class="content-wrapper">
			<?php $this->load->view('admin/_partials/header_content'); ?>
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">

							<!-- Default box -->
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">
										<?php echo lang('index_heading'); ?>
									</h3>
								</div>

								<div class="card-body">
									<div id="infoMessage"><?php echo $message; ?></div>
									<div class="table-responsive">
										<table id="tabledata" cellpadding=0 cellspacing=10 class='table table-bordered table-sm'>
											<thead>
												<tr>
													<th class='text-center'><?php echo lang('index_fname_th'); ?></th>
													<th class='text-center'><?php echo lang('index_lname_th'); ?></th>
													<th class='text-center'><?php echo lang('index_email_th'); ?></th>
													<th class='text-center'><?php echo lang('index_groups_th'); ?></th>
													<th class='text-center'><?php echo lang('index_status_th'); ?></th>
													<th class='text-center'><?php echo lang('index_action_th'); ?></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($users as $user) : ?>
													<tr>
														<td class='text-center align-middle'><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
														<td class='text-center align-middle'><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
														<td class='text-center align-middle'><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
														<td class='text-center align-middle'>
															<?php foreach ($user->groups as $group) : ?>
																<?php echo anchor("auth/edit_group/" . $group->id, "<i class='fas fa-users'></i> " . htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'), array('class' => 'btn btn-primary btn-sm mb-1')); ?><br />
															<?php endforeach ?>
														</td>
														<td class='text-center align-middle'><?php echo ($user->active) ? anchor("auth/deactivate/" . $user->id, "<i class='fas fa-sync-alt'></i> " . lang('index_active_link'), ['class' => 'btn btn-primary btn-sm']) : anchor("auth/activate/" . $user->id, "<i class='fas fa-sync-alt'></i> " . lang('index_inactive_link'), ['class' => 'btn btn-primary btn-sm']); ?></td>
														<td class='text-center align-middle'><?php echo anchor("auth/edit_user/" . $user->id, "<i class='fas fa-edit'></i> " . 'Edit', array('class' => 'btn btn-primary btn-sm')); ?></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
									<p class='mt-1'><?php echo anchor('auth/create_user', "<i class='fas fa-plus-square'></i> " . lang('index_create_user_link'), array('class' => 'btn btn-primary btn-sm')) ?> | <?php echo anchor('auth/create_group', "<i class='fas fa-plus-square'></i> " . lang('index_create_group_link'), array('class' => 'btn btn-primary btn-sm')) ?></p>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
					</div>
				</div>
			</section>
			<!-- /.content -->
		</div>
		<?php $this->load->view('admin/_partials/footer'); ?>
	</div>
	<?php $this->load->view('admin/_partials/js'); ?>
	<script>
		$("#tabledata").DataTable({
			columnDefs: [{
				targets: [3, 4, 5],
				searchable: false,
				orderable: false
			}]
		});
	</script>
</body>

</html>
