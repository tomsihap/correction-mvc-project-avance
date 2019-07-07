<?php ob_start(); ?>

<!-- Contenu de la vue -->

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>