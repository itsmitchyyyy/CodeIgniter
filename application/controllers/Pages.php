<?php
class Pages extends CI_Controller {
    public function view($page = 'home'){
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }
        $data['title'] = ucfirst($page);
        
        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
    }

    public function login(){
        $config = array(
            array('field' => 'username','label' => 'Username','rules' => 'required' ),
            array('field' => 'password','label' => 'Password','rules'=> 'required', 'errors' => array('required' => 'You must provide a %s'))
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('pages/home');
            $this->load->view('templates/footer');
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $result = $this->page_model->login(array($username, $password));
            if($result['status'] == true){
                $data = array(
                    'logged_in' => $result['data'],
                    'name' => $result['name'],
                    'type' => $result['user']
                );
                $this->session->set_userdata($data);
                if($result['user'] == 'admin'){
                    redirect('admin');
                }
                if($result['user'] == 'teacher'){
                    redirect('teacher');
                }
                    redirect('student');
            }
            $this->session->set_flashdata('message', 'Invalid Credentials');
            redirect('');
        }
    }

    public function updatePassword(){
        $this->load->library('user_agent');
        $config = array(
            array('field' => 'currentPassword', 'label' => 'Current Password', 'rules' => 'required'),
            array('field' => 'newPassword', 'label' => 'New Password', 'rules' => 'required'),
            array('field' => 'confirmPassword', 'label' => 'Confirm Password', 'rules' => 'required|matches[newPassword]')
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() === FALSE){
            $this->session->set_flashdata('passwordErrors', validation_errors());
            redirect($this->agent->referrer());
        }
        $data = $this->page_model->updatePassword();
        if($data == 0){
            $this->session->set_flashdata('passwordErrors', 'Current Password is invalid');
        }else{
            $this->session->set_flashdata('message', 'Password Updated');
        }
        redirect($this->agent->referrer());
    }

    public function logout(){
        $items = array('logged_in', 'name', 'type');
        $this->session->unset_userdata($items);
        redirect(base_url());
    }
}