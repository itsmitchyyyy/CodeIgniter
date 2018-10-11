<?php
class Page_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function login($data){
        $this->db->where('username', $data[0]);
        $query = $this->db->get('users');
        $result = $query->row_array();
        if(!empty($result) && password_verify($data[1], $result['password'])){
            $status = true;
            if($result['username'] == 'admin'){
                   $name = "Admin Admin";
                   return array('status' => $status, 'user' => 'admin', 'name' => $name, 'data' => $result);
            }else{
                $student = $this->checkStudent($result['id']);
                if($student == null){
                    $teacher = $this->checkTeacher($result['id']);
                    $name = $teacher['firstName'].' '.$teacher['lastName'];
                    return array('status' => $status, 'user' => 'teacher', 'name' => $name, 'data' => $teacher);
                }
                $name = $student['firstName'].' '.$student['lastName'];
                return array('status' => $status, 'user' => 'student', 'name' => $name, 'data' => $student);
            }
        }else{
            $status = false;
            return array('status' => $status);
        }
    }

    public function checkStudent($id){
        $query = $this->db->select('*')
            ->from('students')
            ->join('user_student', 'user_student.studentId = students.id')
            ->where('user_student.userId', $id)
            ->get();
        return $query->row_array();
    }

    public function checkTeacher($id){
        $query = $this->db->select('*')
            ->from('teachers')
            ->join('user_teacher', 'user_teacher.teacherId = teachers.id')
            ->where('teachers.id', $id)
            ->get();
        return $query->row_array();
    }
}