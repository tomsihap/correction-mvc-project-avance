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
        <tr>
            <td>1</td>
            <td>Han Solo</td>
            <td>Thermodynamique spatiale</td>
            <td><a href="#" class="btn btn-warning btn-sm">Éditer</a></td>
            <td><a href="#" class="btn btn-danger btn-sm">Supprimer</a></td>
        </tr>
    </tbody>
</table>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>