<?php

class CoursesController {
    // Route: GET courses
    public function list() {

        $courses = Course::findAll();
        view ('courses.list', compact('courses'));
    }

    // Route: GET courses/add
    public function add() {
        view ('courses.add');
    }

    // Route: POST courses/add
    public function save() {
        $course = new Course;
        $course->setTitle($_POST['title']);
        $course->setTeacher($_POST['teacher']);
        $course->save();
    }

    // Route: GET courses/$id/edit
    public function edit($id) {
        view ('courses.edit');
    }

    // Route: POST courses/$id/edit
    public function update($id) {

    }

    // Route: GET courses/$id/delete
    public function delete($id) {

    }

    // Route: GET courses/$id
    public function show($id) {
        view ('courses.show');
    }
}