<?php

class Registration extends Db {

    const TABLE_NAME = "registration";

    protected $id;
    protected $student_id;
    protected $course_id;


    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setStudentId($student_id) {
        if (strlen($student_id) < 1) {
            throw new Exception ('Le champ est vide.');
        }

        $this->student_id = $student_id;
        return $this;
    }

    public function setCourseId($course_id) {
        if (strlen($course_id) < 1) {
            throw new Exception ('Le champ est vide.');
        }

        $this->course_id = $course_id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStudentId()
    {
        return $this->student_id;
    }

    public function getCourseId()
    {
        return $this->course_id;
    }

    public function save()
    {
        $data = [
            "student_id"    => $this->getStudentId(),
            "course_id"     => $this->getCourseId(),
        ];
        //if ($this->id > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);
        return $this;
    }

    public function update() {
        if ($this->id > 0) {
            $data = [
                "id"            => $this->getId(),
                "student_id"    => $this->getStudentId(),
                "course_id"     => $this->getCourseId()
            ];
            Db::dbUpdate(self::TABLE_NAME, $data);
            return $this;
        }
        return;
    }

    public function delete() {
        $data = [
            'id' => $this->getId(),
        ];

        Db::dbDelete(self::TABLE_NAME, $data);
        return;
    }

    public static function findAll() {
        $data = Db::dbFind(self::TABLE_NAME);

        $registrations = [];
        foreach($data as $d) {
            $registration = new Registration;
            $registration->setId($d['id']);
            $registration->setStudentId($d['student_id']);
            $registration->setCourseId($d['course_id']);

            $registrations[] = $registration;
        }

        return $registrations;
    }

    public static function findOne(int $id) {
        $request = [
            ['id', '=', $id]
        ];
        $element = Db::dbFind(self::TABLE_NAME, $request);
        if (count($element) > 0) $element = $element[0];
        else return;

        $registration = new Registration;
        $registration->setId($element['id']);
        $registration->setStudentId($element['student_id']);
        $registration->setCourseId($element['course_id']);

        return $registration;
    }

    public function getStudent() {
        $student = Student::findOne($this->getStudentId());
        return $student;
    }

    public function getCourse() {
        $course = Course::findOne($this->getCourseId());
        return $course;
    }
}