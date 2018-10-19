<ul class="nav nav-pills w-75 mr-auto ml-auto mt-3">
	<li class="nav-item">
		<a href="<?= base_url().'teacher' ?>" class="nav-link <?= (basename($_SERVER['REQUEST_URI']) == 'teacher') ? 'active' : '' ?>">Subjects</a>
	</li>
	<li class="nav-item">
		<a href="<?= site_url('teacher/students/'. $this->session->userdata['logged_in']['sectionId']) ?>" class="nav-link <?= (strpos($this->uri->uri_string(), 'students') !== false) ? 'active' : '' ?>">Students</a>
	</li>
</ul>