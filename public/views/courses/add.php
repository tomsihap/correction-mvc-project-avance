<?php ob_start(); ?>

<!-- Contenu de la vue -->
<a href="<?= url('courses') ?>">< Retour à la liste des cours</a>

<form action="<?= url('courses/add') ?>" method="post">

    <div class="form-group">
        <label for="courseNameForm">Nom du cours</label>
        <input type="text" name="title" id="courseNameForm" class="form-control">
    </div>

    <div class="form-group">
        <label for="courseTeacherForm">Nom du professeur</label>
        <input type="text" name="teacher" id="courseTeacherForm" class="form-control">
    </div>

    <button class="btn btn-success float-right">Créer le cours</button>
</form>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>