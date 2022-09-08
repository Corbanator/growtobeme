<?= $this->extend('layout') ?>


<?= $this->section('content') ?>
<style>
    .card {
        padding: 10px;
        margin-bottom: 3%;
    }

    .btn {
        background-color: #4fc3cb;
    }
</style>

<div class="row">
    <?php foreach ($cards as $card) : ?>
        <div class="col-md-4">
            <div class="card" >
                <h2 class="card-title"><?= $card["gameName"]; ?></h2>
                <img src="<?= $card["imgPath"] ?>" class="rounded thumbnail" alt="Image of <?= $card['gameName']; ?>">
                <h4 class="card-text"><?= $card["gameDescription"]; ?></h4>
                <a href="/games/<?= $card["filePath"] ?>" class="btn stretched-link">See Game</a>
            </div>
        </div>
    <?php endforeach ?>
</div>


<?= $this->endSection() ?>