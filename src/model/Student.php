<?php

class Student extends Db {

    const TABLE_NAME = "student";

    protected $id;
    protected $name;
    protected $email;

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function save()
    {
        $data = [
            "name"  => $this->getName(),
            "email" => $this->getEmail()
        ];
        //if ($this->id > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);
        return $this;
    }

    public static function findAll() {
        $data = Db::dbFind(self::TABLE_NAME);

        $students = [];
        foreach ($data as $d) {
            $student = new Student;
            $student->setId($d['id']);
            $student->setName($d['name']);
            $student->setEmail($d['email']);
            $student->save();

            $students[] = $student;
        }

        return $students;
    }
}