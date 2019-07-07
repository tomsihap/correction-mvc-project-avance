<?php ob_start(); ?>

<h1>Bienvenue dans le gestionnaire de cours de Harvard !</h1>

<ul>
    <li><a href="<?= url('students') ?>">Liste des étudiants</li>
    <li><a href="<?= url('courses') ?>">Liste des cours</li>
    <li><a href="<?= url('registrations') ?>">Liste des inscriptions</li>
</ul>


<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>