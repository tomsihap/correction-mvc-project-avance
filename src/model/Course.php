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

        if (strlen($title) < 1) {
            throw new Exception ('Le champ est vide.');
        }

        $this->title = $title;
        return $this;
    }

    public function setTeacher($teacher)
    {
        if (strlen($teacher) < 1) {
            throw new Exception('Le champ est vide.');
        }

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

    public static function findOne(int $id) {
        $request = [
            ['id', '=', $id]
        ];
        $element = Db::dbFind(self::TABLE_NAME, $request);
        if (count($element) > 0) $element = $element[0];
        else return;

        $course = new Course;
        $course->setId($element['id']);
        $course->setTitle($element['title']);
        $course->setTeacher($element['teacher']);

        return $course;

    }
}