<?php
class Admin_model extends CI_Model {
    public function __construct(){
        $this->load->database();
    }

    public function createStudent($data){
        $generateId = $this->db->select('studentId')
                ->order_by('id', 'DESC')
                ->limit(1)
                ->get('students')
                ->result_array();
        $digits = 4;
        $baseID = date('yd');
        if($generateId == null){
            $idNumber = $baseID.''.str_pad(1,$digits,'0',STR_PAD_LEFT);
        }else{
            $lastId = substr($generateId['studentId'], -4);
            $idNumber = $baseID.''.str_pad($lastId + 1, $digits, '0', STR_PAD_LEFT);
        }
        $studentData = array(
            'studentId' => $idNumber,
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'contactNo' => $this->input->post('contactNo'),
            'address' => $this->input->post('address')
        );
        $userData = array(
            'avatar' => $data,
            'username' => $idNumber,
            'password' => $idNumber
        );
        $this->db->insert('users', $userData);
        $lastUserId = $this->db->insert_id();
        $this->db->insert('students', $studentData);
        $lastStudentId = $this->db->insert_id();
        $userStudent = array(
            'studentId' => $lastStudentId,
            'userId' => $lastUserId
        );
        return $this->db->insert('user_student', $userStudent);
    }
}