<?php ob_start(); ?>

<!-- Contenu de la vue -->
<a href="<?= url('students') ?>">< Retour à la liste des cours</a>

<form action="<?= url('students/add') ?>" method="post">

    <div class="form-group">
        <label for="studentNameForm">Prénom et nom de l'étudiant</label>
        <input type="text" name="name" id="studentNameForm" class="form-control">
    </div>

    <div class="form-group">
        <label for="studentEmailForm">Adresse e-mail universitaire</label>
        <input type="text" name="email" id="studentEmailForm" class="form-control">
    </div>

    <button class="btn btn-success float-right">Créer l'étudiant</button>
</form>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>