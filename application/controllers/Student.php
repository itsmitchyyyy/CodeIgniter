<?php

class Student extends CI_Controller {

    public function index(){
        $data['title'] = 'Student';
        $data['subjects'] = $this->student_model->getSubjects($this->session->userdata['logged_in']['userId']);

        $this->load->view('templates/user-header');
        $this->load->view('students/index', $data);
        $this->load->view('templates/user-footer');
    }
}