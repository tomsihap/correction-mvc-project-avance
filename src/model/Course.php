<?php

class Course extends Db {

    const TABLE_NAME = "course";

    protected $id;
    protected $title;
    protected $teacher;

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setTeacher($teacher) {
        $this->teacher = $teacher;
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getTeacher() {
        return $this->teacher;
    }

    public function save()
    {
        $data = [
            "title"    => $this->getTitle(),
            "teacher"  => $this->getTeacher(),
        ];
        //if ($this->id > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);
        return $this;
    }

    public static function findAll() {
        $data = Db::dbFind(self::TABLE_NAME);

        $courses = [];
        foreach($data as $d) {
            $course = new Course;
            $course->setId($d['id']);
            $course->setTitle($d['title']);
            $course->setTeacher($d['teacher']);

            $courses[] = $course;
        }

        return $courses;
    }
}