<?php

class RegistrationsController {
    // Route: GET registrations
    public function list() {

        $registrations = Registration::findAll();
        view ('registrations.list', compact('registrations'));
    }

    // Route: GET registrations/add
    public function add() {

        $students = Student::findAll();
        $courses = Course::findAll();
        view ('registrations.add', compact('students', 'courses'));
    }

    // Route: POST registrations/add
    public function save() {
        $registration = new Registration;
        $registration->setStudentId($_POST['student_id']);
        $registration->setCourseId($_POST['course_id']);
        $registration->save();
    }

    // Route: GET registrations/$id/edit
    public function edit($id) {
        $registration = Registration::findOne($id);
        view ('registrations.edit', compact('registration'));
    }

    // Route: POST registrations/$id/edit
    public function update($id) {

    }

    // Route: GET registrations/$id/delete
    public function delete($id) {
    }

    // Route: GET registrations/$id
    public function show($id) {
        view ('registrations.show');
    }
}