<?php
class Admin_model extends CI_Model {
    public function __construct(){
        $this->load->database();
    }

    public function getStudents($student = null){
        if($student === null){
            $query = $this->db->select('*')
                ->from('students')
                ->join('user_student', 'user_student.studentId = students.id')
                ->join('users', 'users.id = user_student.userId')
                ->join('sections', 'sections.id = students.sectionId')
                ->get();
            return $query->result_array();
        }

        $query = $this->db->select('*')
            ->from('students')
            ->join('user_student', 'user_student.studentId = students.id')
            ->join('users', 'users.id = user_student.userId')
                ->join('sections', 'sections.id = students.sectionId')
            ->where('students.id', $student)
            ->get();
        return $query->row_array();
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
            $lastId = substr($generateId[0]['studentId'], -4);
            $idNumber = $baseID.''.str_pad($lastId + 1, $digits, '0', STR_PAD_LEFT);
        }
        $studentData = array(
            'studentId' => $idNumber,
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'contactNo' => $this->input->post('contactNo'),
            'address' => $this->input->post('address'),
            'sectionId' => $this->input->post('sectionId')
        );
        $userData = array(
            'avatar' => $data,
            'username' => $idNumber,
            'password' => password_hash($idNumber, PASSWORD_DEFAULT)
        );
        $this->db->insert('users', $userData);
        $lastUserId = $this->db->insert_id();
        $this->db->insert('students', $studentData);
        $lastStudentId = $this->db->insert_id();
        $userStudent = array(
            'studentId' => $lastStudentId,
            'userId' => $lastUserId
        );
        $subjects = $this->input->post('subjectId[]');
        foreach ($subjects as $subject) {
            $subjectList = array('studentId' => $lastStudentId, 'subjectId' => $subject);
            $this->db->insert('student_subjects', $subjectList);
        }
        return $this->db->insert('user_student', $userStudent);
    }

    //Teacher
 public function getTeachers($teacher = null){
        if($teacher === null){
            $query = $this->db->select('*')
                ->from('teachers')
                ->join('user_teacher', 'user_teacher.teacherId = teachers.id')
                ->join('users', 'users.id = user_teacher.userId')
                ->join('sections', 'sections.id = teachers.sectionId')
                ->get();
            return $query->result_array();
        }

        $query = $this->db->select('*')
                ->from('teachers')
                ->join('user_teacher', 'user_teacher.teacherId = teachers.id')
                ->join('users', 'users.id = user_teacher.userId')
                ->join('sections', 'sections.id = teachers.sectionId')
            ->where('students.id', $teacher)
            ->get();
        return $query->row_array();
    }

    public function createTeacher($data){
        $teacherData = array(
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'contactNo' => $this->input->post('contactNo'),
            'address' => $this->input->post('address'),
            'sectionId' => $this->input->post('sectionId')
        );
        $userData = array(
            'avatar' => $data,
            'username' => $this->input->post('firstName'),
            'password' => password_hash($this->input->post('lastName'), PASSWORD_DEFAULT)
        );
        $this->db->insert('users', $userData);
        $lastUserId = $this->db->insert_id();
        $this->db->insert('teachers', $teacherData);
        $lastTeacherId = $this->db->insert_id();
        $userTeacher = array(
            'teacherId' => $lastTeacherId,
            'userId' => $lastUserId
        );
        $subjects = $this->input->post('subjectId[]');
        foreach ($subjects as $subject) {
            $subjectList = array('teacherId' => $lastTeacherId, 'subjectId' => $subject);
            $this->db->insert('teacher_subjects', $subjectList);
        }
        return $this->db->insert('user_teacher', $userTeacher);
    }


    // SECTION

    public function getSections($section = null){
        if($section === null){
            $query = $this->db->get('sections');
            return $query->result_array();
        }
        $query = $this->db->get_where('sections', array('id' => $section));
            return $query->row_array();
    }

    public function createSection(){
        $sectionData = array('sectionName' => $this->input->post('sectionName'));
        return $this->db->insert('sections', $sectionData);
    }

    // Subjects

    public function getSubjects($subject = null){
        if($subject === null){
            $query = $this->db->get('subjects');
            return $query->result_array();
        }
        $query = $this->db->get_where('subjects', array('id' => $subject));
            return $query->row_array();
    }

    public function createSubject(){
        $subjectData = array(
            'edpCode' => $this->input->post('edpCode'),
            'subjectName' => $this->input->post('subjectName'),
            'maxCapacity' => $this->input->post('maxCapacity'),
            'units' => $this->input->post('units'),);
        return $this->db->insert('subjects', $subjectData);
    }

    // Student Subjects
    public function studentSubjects($student = null){
        if($student === null){
            $query = $this->db->select('*')
                ->from('students')
                ->join('student_subjects', 'student_subjects.studentId = students.id')
                ->join('subjects', 'subjects.id = student_subjects.subjectId')
                ->get();
            return $query->result_array();
        }
        $query = $this->db->select('*')
            ->from('students')
            ->join('student_subjects', 'student_subjects.studentId = students.id')
            ->join('subjects', 'subjects.id = student_subjects.subjectId')
            ->where('students.id' , $student)
            ->get();
        return $query->result_array();
    }

    //TEACHER SUBJECTS
    public function teacherSubjects($teacher = null){
        if($teacher === null){
            $query = $this->db->select('*')
                ->from('teachers')
                ->join('teacher_subjects', 'teacher_subjects.teacherId = teachers.id')
                ->join('subjects', 'subjects.id = teacher_subjects.subjectId')
                ->get();
            return $query->result_array();
        }
        $query = $this->db->select('*')
                ->from('teachers')
                ->join('teacher_subjects', 'teacher_subjects.teacherId = teachers.id')
                ->join('subjects', 'subjects.id = teacher_subjects.subjectId')
            ->where('teachers.id' , $teacher)
            ->get();
        return $query->result_array();
    }

    //REPORTS
    public function reportTeachers(){
        $query = $this->db->select('*')
            ->from('teachers')
            ->join('sections', 'teachers.sectionId = sections.id')
            ->get();
        return $query->result_array();
    }

    public function reportSubjects(){
        $query = $this->db->select('*')
            ->from('teacher_subjects')
            ->join('teachers', 'teacher_subjects.teacherId = teachers.id')
            ->join('subjects', 'teacher_subjects.subjectId = subjects.id')
            ->get();
        return $query->result_array();
    }
}