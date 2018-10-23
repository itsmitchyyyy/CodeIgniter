<ul class="nav nav-pills nav-fill">
    <li class="nav-item">
        <a href="<?= base_url().'admin/reports' ?>" class="nav-link  <?= (basename($_SERVER['REQUEST_URI']) == 'reports') ? 'nav-active' : '' ?>">Teachers</a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url().'admin/student_reports' ?>" class="nav-link  <?= (basename($_SERVER['REQUEST_URI']) == 'student_reports') ? 'nav-active' : '' ?>">Students</a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link  <?= (basename($_SERVER['REQUEST_URI']) == 'user_logs') ? 'nav-active' : '' ?>">User Logs</a>
    </li>
</ul>