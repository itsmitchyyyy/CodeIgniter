<?php
class Teacher extends CI_Controller {
	public function index(){
		$data['title'] = 'Subjects';
		$data['subjects'] = $this->teacher_model->getSubjects(null, $this->session->userdata['logged_in']);

		$this->load->view('templates/user-header.php');
		$this->load->view('teacher/index', $data);
		$this->load->view('templates/user-footer.php');
	}

	//Add Grade
	public function addStudentGrade(){
		$this->load->library('user_agent');
		$config = array(
            array('field' => 'grade','label' => 'Grade','rules' => 'required|decimal|less_than_equal_to[5.0]', 'errors' => array(
            	'decimal' => '%s is not a valid grade')),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() === FALSE){
        	$error = $this->session->set_flashdata('error', validation_errors());
        	redirect($this->agent->referrer());
        }else{
        	$this->teacher_model->addGrade();
        	$this->session->set_flashdata('message', 'Added Grade');
        	redirect($this->agent->referrer());
        }
	}

	public function subjects($subject = null, $section = null){
		$data['subjects'] = $this->teacher_model->getStudentSubjects($subject, $section);
		$data['currentSubject'] = $this->teacher_model->getSubject($subject);
		if(empty($data['subjects'])){
			show_404();
		}


		$this->load->view('templates/user-header.php');
		$this->load->view('teacher/views/students', $data);
		$this->load->view('templates/user-footer.php');
	}

	//Students

	public function students($section = null, $student = null){
		$data['students'] = $this->teacher_model->getStudents($section, $student);
		$data['title'] = 'Students';

		$this->load->view('templates/user-header.php');
		$this->load->view('teacher/students', $data);
		$this->load->view('templates/user-footer.php');
	}
}