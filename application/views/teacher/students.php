<?php $this->load->view('teacher/navbar'); ?>

<div class="container-fluid">
	<?php $this->load->view('teacher/pills'); ?>
	<div class="d-flex flex-column w-75 mr-auto ml-auto mt-4">
                <!-- MESSAGE SESSION -->
                <?php if($this->session->flashdata('message')): ?>
                    <div class="alert alert-success">
                        <p><?php echo $this->session->flashdata('message'); ?></p>
                    </div>
                <?php endif; ?>
                <!-- END SESSION -->
                <div class="d-flex">
                	
		<h4>Student List</h4>
                </div>
	</div>
	<table class="table mt-2 w-75 mr-auto ml-auto table-bordered table-striped">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Contact No.</th>
			<th>Address</th>
			<th>Option</th>
		</tr>
		<?php foreach ($students as $student): ?>
			<tr>
				<td><?= $student['firstName'] ?></td>
				<td><?= $student['lastName'] ?></td>
				<td><?= $student['contactNo'] ?></td>
				<td><?= $student['address'] ?></td>
				<td>
					<a href="#" data-edit="<?= $student['id']; ?>" id="editStudentButton"><i class="text-info material-icons">edit</i></a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>

	<!-- EDIT MODAL -->
	<div class="modal fade" id="editStudentModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Student</h4>
					<button class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?= form_open('teacher/updateStudent', array('id' => 'editStudentForm')); ?>
					<div class="form-group">
						<input type="text" name="firstName" class="form-control" id="firstName" placeholder="First Name">
					</div>
					<div class="form-group">
						<input type="text" name="lastName" class="form-control" id="lastName" placeholder="Last Name">
					</div>
					<div class="form-group">
						<input type="text" name="contactNo" class="form-control" id="contactNo" placeholder="Contact No">
					</div>
					<div class="form-group">
						<input type="text" name="address" class="form-control" id="address" placeholder="Address">
						<input type="hidden" name="id">
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
	<!-- END EDIT -->
</div>