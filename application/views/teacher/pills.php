<ul class="nav nav-pills w-75 mr-auto ml-auto">
	<li class="nav-item">
		<a href="<?= base_url().'teacher' ?>" class="nav-link <?= (basename($_SERVER['REQUEST_URI']) == 'teacher') ? 'active' : '' ?>">Subjects</a>
	</li>
	<li class="nav-item">
		<a href="<?= site_url('teacher/students/') ?>" class="nav-link <?= (basename($_SERVER['REQUEST_URI']) == 'students') ? 'active' : '' ?>">Students</a>
	</li>
</ul>