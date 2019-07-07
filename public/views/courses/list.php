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
        <tr>
            <td>1</td>
            <td>Thermodynamique spatiale</td>
            <td>Lando Calrissian</td>
            <td>1</td>
            <td><a href="#" class="btn btn-warning btn-sm">Éditer</a></td>
            <td><a href="#" class="btn btn-danger btn-sm">Supprimer</a></td>
        </tr>
    </tbody>
</table>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>