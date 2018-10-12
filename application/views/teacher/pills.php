<ul class="nav nav-pills w-75 mr-auto ml-auto">
	<li class="nav-item">
		<a href="<?= base_url().'teacher' ?>" class="nav-link <?= (strpos($this->uri->uri_string(), 'teacher') !== false) ? 'active' : '' ?>">Subjects</a>
	</li>
	<li class="nav-item">
		<a href="<?= base_url().'teacher/students' ?>" class="nav-link <?= (strpos($this->uri->uri_string(), 'teacher/students') !== false) ? 'active' : '' ?>">Students</a>
	</li>
</ul>