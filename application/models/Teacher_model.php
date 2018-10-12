<?php
class Teacher_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function getSubjects($subject = null, $teacher = null){
		if($subject === null){
			$query = $this->db->select('*')
				->from('subjects')
				->join('teacher_subjects','teacher_subjects.subjectId = subjects.id')
				->join('teachers', 'teachers.id = teacher_subjects.teacherId')
				->where('teachers.id', $teacher)
				->get();
				return $query->result_array();
		}
			$query = $this->db->select('*')
				->from('subjects')
				->join('teacher_subjects','teacher_subjects.subjectId = subjects.id')
				->join('teachers', 'teachers.id = teacher_subjects.teacherId')
				->where(array('subjects.id' => $subject, 'teachers.id' => $teacher))
				->get();
				return $query->result_array();
	}

	// Add Grade

	public function addGrade(){
		$id = $this->input->post('studentId');
		$grade = $this->input->post('grade');
		$remarks = ($grade > 3) ? 'Failed' : 'Passed';
		$gradeData = array('grade' => $grade, 'remarks' => $remarks);
		return $this->db->update('student_subjects', $gradeData, array('id' => $id));
	}


// Students Subject
	public function getStudentSubjects($subject = null){
		if($subject === null){
			$query = $this->db->select('*, student_subjects.id as studSubId')
				->from('subjects')
				->join('student_subjects','student_subjects.subjectId = subjects.id')
				->join('students', 'students.id = student_subjects.studentId')
				->join('sections' ,'sections.id = students.sectionId')
				->get();
				return $query->result_array();
		}
			$query = $this->db->select('*, student_subjects.id as studSubId')
				->from('subjects')
				->join('student_subjects','student_subjects.subjectId = subjects.id')
				->join('students', 'students.id = student_subjects.studentId')
				->join('sections' ,'sections.id = students.sectionId')
				->where('subjects.id', $subject)
				->get();
				return $query->result_array();
	}
}