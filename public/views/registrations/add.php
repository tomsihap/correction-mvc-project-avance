<?php ob_start(); ?>

<!-- Contenu de la vue -->
<a href="<?= url('registrations') ?>">< Retour à la liste des inscriptions</a>

<form action="<?= url('registrations/add') ?>" method="post">

    <div class="form-group">
        <label for="studentForm">Choix de l'étudiant</label>
        <select name="student_id" id="studentForm" class="form-control">
            <option selected disabled>Choisir un étudiant...</option>
        </select>
    </div>

    <div class="form-group">
        <label for="courseForm">Choix du cours</label>
        <select name="course_id" id="courseForm" class="form-control">
            <option selected disabled>Choisir un cours...</option>
        </select>
    </div>

    <button class="btn btn-success float-right">Créer l'inscription</button>
</form>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>