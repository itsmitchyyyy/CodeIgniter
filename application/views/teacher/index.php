<?php $this->load->view('teacher/navbar'); ?>

<div class="container-fluid">
	<?php $this->load->view('teacher/pills'); ?>
	<div class="w-75 mt-4 mr-auto ml-auto">
		<h4>Subject List</h4>
	</div>
	<table class="table mt-2 w-75 mr-auto ml-auto table-bordered table-striped">
		<tr>
			<th>Edp Code</th>
			<th>Subject Name</th>
			<th>Status</th>
		</tr>
		<?php foreach($subjects as $subject): ?>
		<tr>
			<td><a href="<?php echo site_url('teacher/subjects/'. $subject['subjectId'].'/'. $subject['sectionId']) ?>"><?= $subject['edpCode']; ?></a></td>	
			<td><?= $subject['subjectName']; ?></td>	
			<td><?= ($subject['status'] == 1) ? 'Open' : 'Closed'; ?></td>			
		</tr>
		<?php endforeach; ?>
	</table>
</div>