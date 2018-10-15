<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a href="#" class="navbar-brand">Online Grading System</a>
	<button class="navbar-toggler" data-toggle="collapse" data-target="#navItems">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
					<?= $this->session->userdata['name']; ?>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<a href="#" data-target="#editPasswordModal" data-toggle="modal" class="dropdown-item">Password</a>
					<a href="<?= site_url('pages/logout') ?>" class="dropdown-item">Logout</a>
				</div>
			</li>
		</ul>
	</div>
</nav>

<div class="modal fade" id="editPasswordModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
					Change Password
				</h4>
				<button class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<?= form_open('pages/updatePassword') ?>
				<?php if(!empty($this->session->flashdata('passwordErrors'))): ?>
				<div class="d-flex flex-column alert alert-danger" id="validationErrors"></div>
				<?php endif; ?>
				<div class="form-group">
					<input type="password" name="currentPassword" id="currentPassword" class="form-control" placeholder="Current Password">
				</div>
				<div class="form-group">
					<input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="New Password">
				</div>
				<div class="form-group">
					<input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Password">
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button class="btn btn-info">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>