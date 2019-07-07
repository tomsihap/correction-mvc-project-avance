<?php ob_start(); ?>

<!-- Contenu de la vue -->
<a href="<?= url('') ?>">< Retour à la page d'accueil</a><br>
<a href="<?= url('registrations/add') ?>" class="btn btn-sm btn-primary">Ajouter une inscription</a>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Étudiant enregistré</th>
            <th>Nom du cours</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($registrations as $registration) : ?>
            <tr>
                <td><?= $registration->getId(); ?></td>
                <td><?= $registration->getStudentId(); ?></td>
                <td><?= $registration->getCourseId(); ?></td>
                <td><a href="<?= url('registrations/' . $registration->getId() . '/edit') ?>" class="btn btn-warning btn-sm">Éditer</a></td>
                <td><a href="<?= url('registrations/' . $registration->getId() . '/delete') ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer cet élément ?)">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>