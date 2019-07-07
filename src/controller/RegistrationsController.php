<?php

class RegistrationsController {
    // Route: GET registrations
    public function list() {

        $registrations = Registration::findAll();
        view ('registrations.list', compact('registrations'));
    }

    // Route: GET registrations/add
    public function add() {
        view ('registrations.add');
    }

    // Route: POST registrations/add
    public function save() {

    }

    // Route: GET registrations/$id/edit
    public function edit($id) {
        view ('registrations.edit');
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