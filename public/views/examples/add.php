<?php ob_start(); ?>

<form class="form" method="post" action="<?= url('add-example') ?>" enctype="multipart/form-data">
    <input class="form-control" type="text" name="field1" id="">
    <input class="form-control" type="text" name="field2" id="">
    <input class="form-control" type="text" name="field3" id="">
    <input class="form-control" type="date" name="field4" id="">
    <input class="form-control" type="file" name="photo" id="">
    <input type="submit" value="Envoyer">
</form>

<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>