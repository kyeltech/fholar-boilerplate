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
        <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light py-3">
            <div class="container-fluid">
                <a class="navbar-brand mr-5" href="<?php base_url() ?>"><img src="<?php base_url('assets/images/logo.png') ?>" alt="" class="logo"></a>
                <button class="navbar-toggler" onclick="openNav()" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Howdy, <?php print ucfirst($user_graph['firstname']) ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="#">Security</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="<?php base_url('signout') ?>">Sign Out</a>
                            </div>
                          </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid bg-light">
            <div class="container page-wrapper-dashboard page-wrapper-height">
                <div class="row">
                    <div class="col-md-2">
                        <aside class="dashboard-nav" id="Sidenav">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            <ul class="nav flex-column">
                              <li class="nav-item">
                                <a class="nav-link" href="#"><small>MENU</small></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link <?php print empty(getval()[0]) ? 'active' : NULL ?>" href="<?php base_url('console') ?>"><i class="fa fa-dashboard text-light"></i> Dashboard</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link  <?php print getval()[0] == 'users' ? 'active' : NULL ?>" href="<?php base_url(LOADER_OPT['dir'].'/users') ?>"><i class="fa fa-user-friends text-light"></i> Users</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link <?php print getval()[0] == 'events' ? 'active' : NULL ?>" href="<?php base_url(LOADER_OPT['dir'].'/events') ?>"><i class="fa fa-calendar text-light"></i> Events</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-shopping-cart text-light"></i> Products</a>
                                <ul style="list-style:none;padding-left:10px;">
                                    <li><a class="nav-link <?php print getval()[0] == 'new_product' ? 'active' : NULL ?>" href="<?php base_url(LOADER_OPT['dir'].'/new_product') ?>"><span class="text-light">*</span> New Product</a></li>
                                    <li><a class="nav-link" href="#"><span class="text-light">*</span> All Products</a></li>
                                </ul>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-list-alt text-light"></i> Orders</a>
                                <ul style="list-style:none;padding-left:10px;">
                                    <li><a class="nav-link <?php print getval()[0] == 'new_orders' ? 'active' : NULL ?>" href="<?php base_url(LOADER_OPT['dir'].'/new_orders') ?>"><span class="text-light">*</span> New Orders</a></li>
                                    <li><a class="nav-link <?php print getval()[0] == 'fulfilled_orders' ? 'active' : NULL ?>" href="<?php base_url(LOADER_OPT['dir'].'/fulfilled_orders') ?>"><span class="text-light">*</span> Fulfilled Orders</a></li>
                                </ul>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link <?php print getval()[0] == 'transactions' ? 'active' : NULL ?>" href="<?php base_url(LOADER_OPT['dir'].'/transactions') ?>"><i class="fa fa-exchange-alt text-light"></i> Transactions</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link <?php print getval()[0] == 'security' ? 'active' : NULL ?>" href="<?php base_url(LOADER_OPT['dir'].'/security') ?>"><i class="fa fa-lock text-light"></i> Security</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="<?php base_url('signout') ?>"><i class="fa fa-power-off text-light"></i> Sign Out</a>
                              </li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-md-10">