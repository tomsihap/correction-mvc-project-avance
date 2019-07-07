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
        $this->student_id = $student_id;
        return $this;
    }

    public function setCourseId($course_id) {
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

    public static function findAll() {
        $data = Db::dbFind(self::TABLE_NAME);
        return $data;
    }
}