<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist Ng <?php print isset($title) ? ' | '.$title : NULL ?></title>

    <!-- Bootstrap css-->
    <link rel="stylesheet" href="<?php base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php base_url('assets/css/wishlist.css') ?>">
    <link rel="stylesheet" href="<?php base_url('assets/css/wishlist-responsive.css') ?>">
    
    <!-- axios progressbar loader -->
    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/rikmms/progress-bar-4-axios/0a3acf92/dist/nprogress.css" />
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/7328382986.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg bg-transparent py-3 fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand mr-5" href="<?php base_url() ?>"><img src="<?php base_url('assets/images/logo.png') ?>" alt="" class="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- End -->