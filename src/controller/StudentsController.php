<?php

class StudentsController {
    // Route: GET students
    public function list() {
        view('students.list');
    }

    // Route: GET students/add
    public function add() {
        view ('students.add');
    }

    // Route: POST students/add
    public function save() {

    }

    // Route: GET students/$id/edit
    public function edit($id) {
        view('students.edit');
    }

    // Route: POST students/$id/edit
    public function update($id) {

    }

    // Route: GET students/$id/delete
    public function delete($id) {

    }

    // Route: GET students/$id
    public function show($id) {
        view('students.show');
    }
}