<?php
    if(isset($this->session->userdata['type'])){
        if($this->session->userdata['type'] == 'admin'){
            redirect('admin');
        }
        if($this->session->userdata['type'] == 'teacher'){
            redirect('teacher');
        }
        if($this->session->userdata['type'] == 'student'){
            redirect('student');
        }
    }