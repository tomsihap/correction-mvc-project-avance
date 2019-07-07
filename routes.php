<?php

$router = new Router();

$router->get('', 'PagesController@home');

/** Model: Student */
$router->get('students',            'StudentsController@list');    // Liste des students
$router->get('students/add',        'StudentsController@add');      // Ajout (affichage formulaire)
$router->post('students/add',       'StudentsController@save');      // Ajout (traitement formulaire)
$router->get('students/{id}/edit',  'StudentsController@edit');     // Édition (affichage formulaire)
$router->post('students/{id}/edit', 'StudentsController@update');   // Édition (traitement formulaire)
$router->get('students/{id}/delete', 'StudentsController@delete');   // Suppression
$router->get('students/{id}',       'StudentsController@show');     // Affichage d'un student

/** Model: Course */
$router->get('courses',            'CoursesController@list');    // Liste des cours
$router->get('courses/add',        'CoursesController@add');      // Ajout (affichage formulaire)
$router->post('courses/add',       'CoursesController@save');      // Ajout (traitement formulaire)
$router->get('courses/{id}/edit',  'CoursesController@edit');     // Édition (affichage formulaire)
$router->post('courses/{id}/edit', 'CoursesController@update');   // Édition (traitement formulaire)
$router->get('courses/{id}/delete', 'CoursesController@delete');   // Suppression
$router->get('courses/{id}',       'CoursesController@show');     // Affichage d'un cours

/** Model: Registration */
$router->get('registrations',            'RegistrationsController@list');    // Liste des inscriptions
$router->get('registrations/add',        'RegistrationsController@add');      // Ajout (affichage formulaire)
$router->post('registrations/add',       'RegistrationsController@save');      // Ajout (traitement formulaire)
$router->get('registrations/{id}/edit',  'RegistrationsController@edit');     // Édition (affichage formulaire)
$router->post('registrations/{id}/edit', 'RegistrationsController@update');   // Édition (traitement formulaire)
$router->get('registrations/{id}/delete', 'RegistrationsController@delete');   // Suppression
$router->get('registrations/{id}',       'RegistrationsController@show');     // Affichage d'une inscription

$router->run();
