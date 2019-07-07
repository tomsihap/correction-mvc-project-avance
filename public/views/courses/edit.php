<?php ob_start(); ?>

<!-- Contenu de la vue -->
<a href="<?= url('courses/' . $course->getId() ) ?>">< Retour au cours</a>

<form action="<?= url('courses/edit') ?>" method="post">

    <div class="form-group">
        <label for="courseNameForm">Nom du cours</label>
        <input type="text" name="title" id="courseNameForm" class="form-control" value="<?= $course->getTitle() ?>">
    </div>

    <div class="form-group">
        <label for="courseTeacherForm">Nom du professeur</label>
        <input type="text" name="teacher" id="courseTeacherForm" class="form-control" value="<?= $course->getTeacher() ?>">
    </div>

    <button class="btn btn-warning float-right">Mettre à jour le cours</button>
</form>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>