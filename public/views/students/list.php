<?php ob_start(); ?>

<!-- Contenu de la vue -->
<a href="<?= url('') ?>">< Retour à la page d'accueil</a><br>
<a href="<?= url('students/add') ?>" class="btn btn-sm btn-primary">Ajouter un étudiant</a>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Prénom et nom</th>
            <th>Adresse universitaire</th>
            <th>Nombre de cours</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <?php foreach($students as $student) : ?>
            <tr>
                <td><?= $student->getId(); ?></td>
                <td><?= $student->getName(); ?></td>
                <td><?= $student->getEmail(); ?></td>
                <td>1</td>
                <td><a href="<?= url('students/' . $student->getId() . '/edit') ?>" class="btn btn-warning btn-sm">Éditer</a></td>
                <td><a href="<?= url('students/' . $student->getId() . '/delete') ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer cet élément ?)">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
        </tr>
    </tbody>
</table>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>