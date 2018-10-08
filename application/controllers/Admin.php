<?php
class Admin extends CI_Controller{
    public function index(){
        $data['title'] = 'Admin';

        $this->load->view('templates/admin-header');
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin-footer');
    }

    public function insertStudent(){
        $config['upload_path'] = base_url().'assets/uploads/';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('userAvatar')){
           $initialData = array('upload_data' => $this->upload->data());
           $data = $initialData['upload_data']['file_name'];
        }else{
            $data = array('upload_data' => null); 
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
            $this->admin_model->createStudent($data);
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

    public function section(){
        $data['title'] = 'Teacher';
        
        $this->load->view('templates/admin-header');
        $this->load->view('admin/section', $data);
        $this->load->view('templates/admin-footer');
    }
}