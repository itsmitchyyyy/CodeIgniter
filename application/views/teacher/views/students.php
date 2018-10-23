<?php $this->load->view('teacher/navbar'); ?>

<div class="container-fluid">
	<?php $this->load->view('teacher/pills'); ?>
	<?php if(!empty($this->session->flashdata('message'))): ?>
		<div class="snackbar" id="snackbar"><?= $this->session->flashdata('message') ?></div>
	<?php endif; ?>
	<div class="d-flex ml-auto mr-auto mt-4 w-75">
		<h4>Subject Name: <?= $currentSubject['subjectName']; ?></h4>
	</div>
	<table class="table mt-2 w-75 mr-auto ml-auto table-bordered table-striped">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Section</th>
			<th>Grade</th>
			<th>Remarks</th>
		</tr>
		<?php foreach($subjects as $subject): ?>
		<tr>
			<td><?= $subject['firstName']; ?></td>	
			<td><?= $subject['lastName']; ?></td>	
			<td><?= $subject['sectionName']; ?></td>	
			<td>
				<?= ($subject['grade'] == null) ? "<button class='btn btn-info' onclick='addGrade(".$subject['studSubId'].")'>Add Grade</button>" : $subject['grade']; ?>
			</td>		
			<td><?= ($subject['remarks'] == null) ? "Pending" : $subject['remarks']; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>

	<div class="modal fade" id="addGradeModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Grade</h5>
					<button class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?= form_open('teacher/addStudentGrade'); ?>
					<div class="form-group">
						<input type="hidden" name="studentId" id="studentId">
						<input type="text" name="grade" placeholder="Grade" id="grade" class="form-control <?= (!empty($this->session->flashdata('error'))) ? 'is-invalid' : ''; ?>">
						<div class="invalid-feedback">
							<?= $this->session->flashdata('error'); ?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button class="btn btn-info">Save</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>