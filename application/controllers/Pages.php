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
                    'logged_in' => $result['data']['id'],
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
                echo 'TODO STUDENT';
            }
            $this->session->set_flashdata('message', 'Invalid Credentials');
            redirect('');
        }
    }

    public function logout(){
        $items = array('logged_in', 'name', 'type');
        $this->session->unset_userdata($items);
        redirect(base_url());
    }
}