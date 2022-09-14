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
    <?php if (count($scores) < 1) : ?>
        <div class="container text-center w-75">
            <h2>Find Friends</h2>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
            </svg>
        </div>
    <?php endif ?>
<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('menu') ?>
    <script src="scripts.js"></script>
    <div style="mt-0">
        <div class="card p-4 mt-2 mb-5 w-75" style="margin-right: auto; margin-left: auto;">
            <form>
                <div class="form-group">
                    <label>Friend Username</label>
                    <input type="text" class="form-control" id="friendName">
                </div>
            </form>
            <div class="form-group">
                    <button class="form-control btn btn-primary" onclick="sendFriendRequest();">Enter</button>
                </div>
            <div id="status">

            </div>
        </div>
    </div>
<?= $this->endSection() ?>