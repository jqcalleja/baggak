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
    <img src="<?= base_url('assets/images/').'bg.jpg'; ?>" class="body-bg position-fixed" id="bg-body">
    <div class="d-flex flex-column justify-content-between min-vh-100">
        <header class="container-fluid text-bg-primary p-3">
            <div class="d-flex align-items-center justify-content-between mx-3">
                <div>
                    <img src="<?= base_url('assets/images/') . 'logo.png'; ?>" class="logo">
                    <span class="text-light fs-3 fw-bold ms-3">Baggak Resort</span>
                </div>
            </div>
        </header>
        <!-- Start of main content row -->
        <div class="container-fluid row m-0 px-0 py-3"> 
            <!-- Image viewer -->
            <div class="col-md">
                <div class="text-center">
                    <img src="<?= $image; ?>" alt="<?= $alt; ?>" class="img-fluid" id="image-preview" style="width: 50%">
                </div>
            </div>