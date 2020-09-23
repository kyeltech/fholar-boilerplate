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
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
        <div class="container-fluid">
            <a class="navbar-brand mr-5" href="<?php base_url() ?>"><img src="<?php base_url('assets/images/logo.png') ?>" alt="" class="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="<?php base_url('how_it_works') ?>">How it Works</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="<?php base_url('registry') ?>">Registry</a>
                    </li>
                    
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="<?php base_url('gifts') ?>">Gifts</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="<?php base_url('faqs') ?>">FAQ's</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if(!empty(call_sess(USER_SESSION))): ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Howdy, <?php print ucfirst(explode(' ',call_sess(USER_SESSION,'name'))[0]) ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <?php if(call_sess(USER_SESSION,'role') == 1): ?>
                                                  <a class="dropdown-item" href="<?php base_url('account') ?>">Account</a>
                                                  <a class="dropdown-item" href="<?php base_url('account/profile') ?>">Profile</a>
                                                  <div class="dropdown-divider"></div>
                                      <?php elseif(call_sess(USER_SESSION,'role') == 2): ?>
                                                  <a class="dropdown-item" href="<?php base_url('console') ?>">Dashboard</a>
                                                  <a class="dropdown-item" href="<?php base_url('console/new_orders') ?>">Orders</a>
                                                  <a class="dropdown-item" href="<?php base_url('console/events') ?>">Events</a>
                                                  <div class="dropdown-divider"></div>
                                      <?php endif ?>
                                        <a class="dropdown-item" href="<?php base_url('signout') ?>">Sign Out</a>
                                    </div>
                                  </li>
                    <?php else: ?>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="<?php base_url('signin') ?>">Sign In</a>
                            </li>
                            <li class="nav-item d-block d-lg-block d-xl-block mr-3">
                                <a class="nav-link btn btn-primary rounded-pill px-4" href="<?php base_url('signup') ?>">Get Started</a>
                            </li>
                    <?php endif ?>
                    <li class="nav-item d-none d-xl-block">
                        <a class="nav-link mt-1" href="#"><i class="fa fa-shopping-basket icon"></i><small class="cart-badge badge badge-pill badge-secondary">1</small></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End -->