<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<?php if (isset($scores)) : ?>
    <div class="row">
        <?php foreach ($scores as $score) : ?>
            <div class="col-md-3">
                <h2><?= $score["username"] ?></h2>
                <table class="table">
                    <!-- <tr class="">
                        <th scope="col">Game</th>
                        <th scope="col">Score</th>
                    </tr> -->
                    <?php for ($i = 0; $i < count($score) - 1; $i++) : ?>
                        <tr>
                            <th scope="row"><?= $score[$i]["game"] ?></th>
                            <th scope="row"><?= $score[$i]["score"] ?></th>
                        </tr>
                    <?php endfor ?>
                </table>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>
<?= $this->endSection() ?>