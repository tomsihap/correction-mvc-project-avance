<?php

class StudentsController {
    // Route: GET students
    public function list() {

        $students = Student::findAll();
        view('students.list', compact('students'));
    }

    // Route: GET students/add
    public function add() {
        view ('students.add');
    }

    // Route: POST students/add
    public function save() {
        $student = new Student;
        $student->setName($_POST['name']);
        $student->setEmail($_POST['email']);
        $student->save();
    }

    // Route: GET students/$id/edit
    public function edit($id) {
        $student = Student::findOne($id);
        view('students.edit', compact('student'));
    }

    // Route: POST students/$id/edit
    public function update($id) {
        $student = Student::findOne($id);
        $student->setName($_POST['name']);
        $student->setEmail($_POST['email']);
        $student->update();
    }

    // Route: GET students/$id/delete
    public function delete($id) {

    }

    // Route: GET students/$id
    public function show($id) {
        view('students.show');
    }
}