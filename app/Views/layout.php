<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="/favicon.ico" type="image/ico">
    <title><?= $site_title ?></title>

    <style>
        body {
            font-family: 'Raleway', Arial, sans-serif;
            padding-left: 10%;
            padding-right: 10%;
        }
    </style>

</head>

<body>

    <div class="container p-3 my-3 text-dark">
        <div class="card rounded d-flex flex-row">
            <div class="w-50">
                <h1><?= $site_title ?></h1>
                <p>Be a Creator | Not a Consumer</p>
            </div>
            <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#exampleModalCenter">
                Sign In
            </button>
            <div class="w-50">
                <img src="/GrowToBeMe_LOGO_hp.png" class="img-fluid">
            </div>
        </div>
    </div>

    <?= $this->renderSection('content') ?>

</body>

</html>