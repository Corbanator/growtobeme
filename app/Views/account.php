<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <div class="container">
        <div class="row">
            <div class="custom-control custom-switch col-md-5 ml-5">
                <input type="checkbox" class="custom-control-input" disabled id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1">Family Mode</label>
            </div>
            <div class="col-md-5">
                <div class="container pl-2">
                    <form action="/account" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email">
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
            </div>
        </div>
    </div>
<?= $this->endSection() ?>