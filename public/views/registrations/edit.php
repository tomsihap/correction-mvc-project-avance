<?php ob_start(); ?>

<!-- Contenu de la vue -->
<a href="<?= url('registrations') ?>">< Retour à l'inscription</a>

<form action="<?= url('registrations/' . $registration->getId() . '/edit') ?>" method="post">

    <div class="form-group">
        <label for="studentForm">Choix de l'étudiant</label>
        <select name="student_id" id="studentForm" class="form-control">
            <?php foreach($students as $student): ?>
            <option value="<?= $student->getId()?>" <?= ($registration->getStudentId() == $student->getId() ? 'selected' : '') ?>>
                <?= $student->getName(); ?> (<?= $student->getEmail(); ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="courseForm">Choix du cours</label>
        <select name="course_id" id="courseForm" class="form-control">
            <?php foreach($courses as $course): ?>
            <option value="<?= $course->getId()?>" <?= ($registration->getCourseId() == $course->getId() ? 'selected' : '') ?>>
                <?= $course->getTitle(); ?> (<?= $course->getTeacher(); ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button class="btn btn-warning float-right">Mettre à jour l'inscription</button>
</form>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>