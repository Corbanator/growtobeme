<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <?php if(isset($scores)) : ?>
        <p><?= $scores ?></p>
    <?php endif ?>
<?= $this->endSection() ?>