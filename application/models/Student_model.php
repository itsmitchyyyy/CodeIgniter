<?php
class Student_model extends CI_Model {
    
    public function __construct(){
        $this->load->database();
    }

    public function getSubjects($student = null, $subject = null){
        if($subject === null){
        $query = $this->db->select('*')
            ->from('student_subjects')
            ->join('students', 'student_subjects.studentId = students.id')
            ->join('subjects', 'student_subjects.subjectId = subjects.id')
            ->join('user_student', 'students.id = user_student.studentId')
            ->where('user_student.userId', $student)
            ->get();
            return $query->result_array();
        }
        $query = $this->db->select('*')
            ->select_avg('student_subjects.grade')
            ->from('student_subjects')
            ->join('students', 'student_subjects.studentId = students.id')
            ->join('subjects', 'student_subjects.subjectId = subjects.id')
            ->join('user_student', 'students.id = user_student.studentId')
            ->where(array('user_student.id' => $student, 'subjects.id' => $subject))
            ->get();
            return $query->row_array();
    }
}