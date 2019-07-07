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
        if (strlen($name) < 1) {
            throw new Exception ('Le champ est vide.');
        }

        $this->name = $name;
        return $this;
    }

    public function setEmail($email) {
        if (strlen($email) < 1) {
            throw new Exception ('Le champ est vide.');
        }

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

    public function update() {
        if ($this->id > 0) {
            $data = [
                "id"      => $this->getId(),
                "name"    => $this->getName(),
                "email"   => $this->getEmail()
            ];
            Db::dbUpdate(self::TABLE_NAME, $data);
            return $this;
        }
        return;
    }

    public function delete() {
        $data = [
            'id' => $this->id(),
        ];

        Db::dbDelete(self::TABLE_NAME, $data);
        return;
    }

    public static function findAll() {
        $data = Db::dbFind(self::TABLE_NAME);

        $students = [];
        foreach ($data as $d) {
            $student = new Student;
            $student->setId($d['id']);
            $student->setName($d['name']);
            $student->setEmail($d['email']);

            $students[] = $student;
        }

        return $students;
    }

    public static function findOne(int $id) {
        $request = [
            ['id', '=', $id]
        ];
        $element = Db::dbFind(self::TABLE_NAME, $request);
        if (count($element) > 0) $element = $element[0];
        else return;

        $student = new Student;
        $student->setId($element['id']);
        $student->setName($element['name']);
        $student->setEmail($element['email']);

        return $student;
    }
}