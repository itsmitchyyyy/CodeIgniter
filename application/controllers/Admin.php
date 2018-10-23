<?php
class Admin extends CI_Controller{
    public function index(){
        $data['title'] = 'Admin';
        $data['students'] = $this->admin_model->getStudents();
        $data['sections'] = $this->admin_model->getSections();
        $data['subjects'] = $this->admin_model->getSubjects();

        $this->load->view('templates/admin-header');
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin-footer');
    }

    public function insertStudent(){
        $config = array(
            'upload_path' => './assets/uploads/',
            'allowed_types' => "gif|jpg|png|jpeg",
        );
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('userPic')){
            $data = null; 
        }else{
           $initialData = array('upload_data' => $this->upload->data());
           $data = $initialData['upload_data']['file_name'];
        };
        $this->form_validation->set_rules('firstName', 'First Name' ,'required');
        $this->form_validation->set_rules('lastName', 'Last Name' ,'required');
        $this->form_validation->set_rules('contactNo', 'Contact No' ,'required');
        $this->form_validation->set_rules('address', 'Address' ,'required');
        $this->form_validation->set_rules('subjectId[]', 'Subjects', 'required', array('required' => 'You must select atleast one subject'));
        $this->form_validation->set_rules('sectionId', 'Section', 'required', array('required' => 'You must select a section'));
        if($this->form_validation->run() === FALSE){
            $this->index();
        }else{
            $data = $this->admin_model->createStudent($data);
            $this->session->set_flashdata('message', 'Student Added');
            redirect('admin');
        }
    }

    //teacher

    public function teacher(){
        $data['title'] = 'Teacher';
        $data['teachers'] = $this->admin_model->getTeachers();
        $data['sections'] = $this->admin_model->getSections();
        $data['subjects'] = $this->admin_model->getSubjects();
        
        $this->load->view('templates/admin-header');
        $this->load->view('admin/teacher', $data);
        $this->load->view('templates/admin-footer');
    }

    public function insertTeacher(){
        $config = array(
            'upload_path' => './assets/uploads/',
            'allowed_types' => "gif|jpg|png|jpeg",
        );
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('userPic')){
            $data = null; 
        }else{
           $initialData = array('upload_data' => $this->upload->data());
           $data = $initialData['upload_data']['file_name'];
        };
        $this->form_validation->set_rules('firstName', 'First Name' ,'required');
        $this->form_validation->set_rules('lastName', 'Last Name' ,'required');
        $this->form_validation->set_rules('contactNo', 'Contact No' ,'required');
        $this->form_validation->set_rules('address', 'Address' ,'required');
        $this->form_validation->set_rules('subjectId[]', 'Subjects', 'required', array('required' => 'You must select atleast one subject'));
        $this->form_validation->set_rules('sectionId', 'Section', 'required', array('required' => 'You must select a section'));
        if($this->form_validation->run() === FALSE){
            $this->teacher();
        }else{
            $data = $this->admin_model->createTeacher($data);
            $this->session->set_flashdata('message', 'Teacher Added');
            redirect('admin/teacher');
        }
    }


    // subject

    public function subject(){
        $data['title'] = 'Teacher';
        $data['subjects'] = $this->admin_model->getSubjects();
        
        $this->load->view('templates/admin-header');
        $this->load->view('admin/subject', $data);
        $this->load->view('templates/admin-footer');
    }

    public function insertSubject(){
        $config = array(
            array('field' => 'edpCode','label' => 'Edp Code','rules' => 'required' ),
            array('field' => 'subjectName','label' => 'Subject Name','rules'=> 'required'),
            array('field' => 'maxCapacity','label' => 'Max Capacity','rules'=> 'required'),
            array('field' => 'units','label' => 'Units','rules'=> 'required')
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() === FALSE){
            $this->subject();
        }else{
            $this->session->set_flashdata('message', 'Subject Added');
            $this->admin_model->createSubject();
            redirect('admin/subject');
        }
    }


    // SECTION

    public function section(){
        $data['sections'] = $this->admin_model->getSections();
        
        $this->load->view('templates/admin-header');
        $this->load->view('admin/section', $data);
        $this->load->view('templates/admin-footer');
    }

    public function insertSection(){
        $this->form_validation->set_rules('sectionName', 'Section Name', 'required');
        if($this->form_validation->run() === FALSE){
            $this->section();
        }else{
            $this->session->set_flashdata('message', 'Section Added');
            $this->admin_model->createSection();
            redirect('admin/section');
        }
    }

    public function reports(){
        $data['teachers'] = $this->admin_model->reportTeachers();

        $this->load->view('templates/admin-header');
        $this->load->view('admin/reports', $data);
        $this->load->view('templates/admin-footer');
    }

    
}