<nav id="sidebar">
            <div class="sidebar-header">
                <h3>Portal</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Admin</p>
                <li class="<?php echo ($this->uri->uri_string() == 'admin') ? 'active' : '' ?>">
                    <a href="<?php echo base_url() ?>admin">Student</a>
                </li>
                <li class="<?php echo ($this->uri->uri_string() == 'admin/teacher') ? 'active' : '' ?>">
                    <a href="<?php echo base_url() ?>admin/teacher">Teacher</a>
                </li>
                <li class="<?php echo ($this->uri->uri_string() == 'admin/subject') ? 'active' : '' ?>">
                    <a href="<?php echo base_url() ?>admin/subject">Subject</a>
                </li>
                <li class="<?php echo ($this->uri->uri_string() == 'admin/section') ? 'active' : '' ?>">
                    <a href="<?php echo base_url() ?>admin/section">Section</a>
                </li>
                <li class="<?= ($this->uri->uri_string() == 'admin/reports') ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>admin/reports">Reports</a>
                </li>
            </ul>
        </nav>