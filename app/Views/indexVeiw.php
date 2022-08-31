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
            <div class="card">
                <h2 class="card-title"><?= $card["title"]; ?></h2>
                <p class="card-text"><?= $card["content"]; ?></p>
                <a href="/games/<?= $card["id"] ?>" class="btn stretched-link">See Game</a>
            </div>
        </div>
    <?php endforeach ?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="text">
                    <input type="password">
                    <div class="modal-footer">
                        <input type="submit" value="Sign in" class="btn btn-secondary" data-dismiss="modal">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>