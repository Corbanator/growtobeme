<?= $this->extend('layout') ?>


<?= $this->section('content') ?>

<div class="container">
    <form action="/create" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Email Address</label>
            <input type="text" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
</div>
<?= $this->endSection() ?>