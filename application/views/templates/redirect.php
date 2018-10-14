<?php
if(isset($this->session->userdata['type']) == 'admin'){
    redirect('admin');
}
if(isset($this->session->userdata['type']) == 'student'){
    //  todo
}
if(isset($this->session->userdata['type']) == 'teacher'){
	redirect('teacher'); 
}
?>