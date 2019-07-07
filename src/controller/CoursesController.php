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
        $course = Course::findOne($id);
        view ('courses.edit', compact('course'));
    }

    // Route: POST courses/$id/edit
    public function update($id) {
        $course = Course::findOne($id);
        $course->setTitle($_POST['title']);
        $course->setTeacher($_POST['teacher']);
        $course->update();
    }

    // Route: GET courses/$id/delete
    public function delete($id) {

    }

    // Route: GET courses/$id
    public function show($id) {
        view ('courses.show');
    }
}