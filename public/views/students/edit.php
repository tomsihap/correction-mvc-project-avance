<?php ob_start(); ?>

<!-- Contenu de la vue -->
<a href="<?= url('students/' .  $student->getId() ) ?>">< Retour à l'étudiant</a>

<form action="<?= url('students/' . $student->getId() . '/edit') ?>" method="post">

    <div class="form-group">
        <label for="studentNameForm">Prénom et nom de l'étudiant</label>
        <input type="text" name="name" id="studentNameForm" class="form-control" value="<?= $student->getName() ?>">
    </div>

    <div class="form-group">
        <label for="studentEmailForm">Adresse e-mail universitaire</label>
        <input type="text" name="email" id="studentEmailForm" class="form-control" value="<?= $student->getEmail() ?>">
    </div>

    <button class="btn btn-warning float-right">Mettre à jour l'étudiant</button>
</form>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>