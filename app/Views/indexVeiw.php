<?= $this->extend('layout') ?>

<?= $this->section('menu') ?>
<div class="row">
    <div class="col-6 span6" style="float: none; margin: 0 auto;">
        <button type="button" class="btn btn-primary border-0 w-25" data-toggle="modal" data-target="#exampleModalCenter">
            Sign In
        </button>
        <a href="/create"><button class="btn btn-primary border-0">Create Account</button></a>
    </div>

    <div class="col-4" id="signin">
        <?php if(isset($signin)) : ?>

            <?php if($signin) : ?>
                <div class='card text-center' style='background-color: #f7a028;'>
                    <h4>Welcome <?= $username ?></h4>
                    <a href='/account'>Account</a>
                </div>
            <?php endif; ?>

            <?php if(!$signin) : ?>
                <div class='card text-center' style='background-color: #f7a028;'>
                    <h4><?= $error ?></h4>
                    <a href='/account'>Account</a>
                </div>
            <?php endif; ?>

        <?php endif; ?>
    </div>

</div>
<?= $this->endSection() ?>

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
            <div class="card">
                <h2 class="card-title"><?= $card["gameName"]; ?></h2>
                <img src="<?= $card["imgPath"] ?>" class="rounded thumbnail" alt="Image of <?= $card['gameName']; ?>">
                <p class="card-text"><?= $card["gameDescription"]; ?></p>
                <a href="/games/<?= $card["filePath"] ?>" class="btn stretched-link">See Game</a>
            </div>
        </div>
    <?php endforeach ?>
</div>


<?= $this->endSection() ?>