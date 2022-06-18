<?php if (session()->has('message')) : ?>
    <div class="fs14i mt-3 alert alert-success">
        <?= session('message') ?>
    </div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
    <div class="fs14 mt-3 alert alert-danger list-unstyled">
        <?= session('error') ?>
    </div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
    <ul class="fs14 mt-3 alert alert-danger list-unstyled">
        <?php foreach (session('errors') as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>