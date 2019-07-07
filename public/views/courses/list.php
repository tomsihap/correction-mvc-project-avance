<?php ob_start(); ?>

<!-- Contenu de la vue -->
<a href="<?= url('') ?>">< Retour à la page d'accueil</a><br>
<a href="<?= url('courses/add') ?>" class="btn btn-sm btn-primary">Ajouter un cours</a>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Cours</th>
            <th>Professeur</th>
            <th>Nombre d'inscrits</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($courses as $course) : ?>
            <tr>
                <td><?= $course->getId(); ?></td>
                <td><?= $course->getTitle(); ?></td>
                <td><?= $course->getTeacher(); ?></td>
                <td>1</td>
                <td><a href="<?= url('courses/' . $course->getId() . '/edit') ?>" class="btn btn-warning btn-sm">Éditer</a></td>
                <td><a href="<?= url('courses/' . $course->getId() . '/delete') ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer cet élément ?)">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>