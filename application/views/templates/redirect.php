<?php
if(isset($this->session->userdata['type']) == 'admin'){
    header('location: admin');
}else
if(isset($this->session->userdata['type']) == 'student'){
    //  todo
}else 
if(isset($this->session->userdata['type']) == 'teacher'){
// 
}
?>