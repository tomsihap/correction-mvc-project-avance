<?php ob_start(); ?>

<?php foreach ($examples as $example) : ?>

    <tr>
        <td><?= $example['id'] ?></td>
        <td><?= $example['field1'] ?></td>
        <td><?= $example['field2'] ?></td>
        <td><?= $example['field3'] ?></td>
        <td><?= $example['field4'] ?></td>
        <td><img src="uploads/<?= $example['photo'] ?>" height="100"></td>
    </tr>

<?php endforeach; ?>


<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>