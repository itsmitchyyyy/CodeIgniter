<?php
class Admin extends CI_Controller{
    public function index(){
        $data['title'] = 'Admin';
        $data['students'] = $this->admin_model->getStudents();

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
        }
        $this->form_validation->set_rules('firstName', 'First Name' ,'required');
        $this->form_validation->set_rules('lastName', 'Last Name' ,'required');
        $this->form_validation->set_rules('contactNo', 'Contact No' ,'required');
        $this->form_validation->set_rules('address', 'Address' ,'required');
        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/admin-header');
            $this->load->view('admin/index', $data);
            $this->load->view('templates/admin-footer');
        }else{
            $data = $this->admin_model->createStudent($data);
            $this->session->set_flashdata('message', 'Student Added');
            redirect('admin');
        }
    }

    public function teacher(){
        $data['title'] = 'Teacher';
        
        $this->load->view('templates/admin-header');
        $this->load->view('admin/teacher', $data);
        $this->load->view('templates/admin-footer');
    }

    public function subject(){
        $data['title'] = 'Teacher';
        
        $this->load->view('templates/admin-header');
        $this->load->view('admin/subject', $data);
        $this->load->view('templates/admin-footer');
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
            $this->load->view('templates/admin-header');
            $this->load->view('admin/section');
            $this->load->view('templates/admin-footer');
        }else{
            $this->session->set_flashdata('message', 'Section Added');
            $this->admin_model->createSection();
            redirect('admin/section');
        }
    }

    
}