<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?= base_url() . 'css/style.css' ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title><?= $title; ?></title>
</head>

<body>
    <img src="<?= base_url('assets/images/') . 'bg.jpg'; ?>" class="body-bg position-fixed" id="bg-body">
    <div class="d-flex flex-column justify-content-between min-vh-100">
        <header class="container-fluid text-bg-success p-3">
            <div class="container-fluid d-flex justify-content-between">
                <div>
                    <a href="<?= base_url(); ?>"><img src="<?= base_url('assets/images/') . 'logo.png'; ?>" class="logo"></a>
                </div>

                <?php if (isset($page)) : if ($page == 'home') : ?>
                        <div>
                            <a href="<?= base_url('Index/login'); ?>" class="btn btn-lg btn-warning position-relative fs-4"><span class="material-icons me-2">deck</span><span class=" fw-thick">BOOK NOW!</span></a>
                        </div>
                <?php endif;
                endif; ?>
            </div>
        </header>

        <div class="container-fluid row m-0 px-0 py-3"> <!-- Start of main content row -->