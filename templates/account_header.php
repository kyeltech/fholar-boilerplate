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
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="<?php base_url() ?>">Home</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="<?php base_url('gifts') ?>">Gifts</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="<?php base_url('faqs') ?>">FAQ's</a>
                        </li>
                        <li class="nav-item d-none d-xl-block">
                            <a class="nav-link mt-1" href="#"><i class="fa fa-shopping-basket icon"></i><small class="cart-badge badge badge-pill badge-secondary">1</small></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Howdy, <?php print ucfirst($user_graph['firstname']) ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="<?php base_url('account') ?>">Account</a>
                              <a class="dropdown-item" href="<?php base_url('account/profile') ?>">Profile</a>
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
                                <a class="nav-link <?php print empty(getval()[0]) ? 'active' : NULL ?>" href="<?php base_url('account') ?>"><i class="fa fa-dashboard text-light"></i> Overview</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link dropdown-toggle" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-plus text-light"></i> New Event</a>
                                <ul class="collapse" id="collapseExample" style="list-style:none;padding-left:10px;">
                                  <?php foreach ($events as $event): ?>
                                    <li><a class="nav-link" href="<?php base_url(LOADER_OPT['dir'].'/event/'.hyphenate($event['event_title'])); ?>"><span class="text-light">*</span> <?php echo $event['event_title']; ?></a></li>
                                    
                                  <?php endforeach; ?>
                                </ul>
                              </li>
                              
                              <li class="nav-item">
                                <a class="nav-link" href="<?php base_url('account/my-events') ?>"><i class="fa fa-calendar text-light"></i> My Events</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link <?php print getval()[0] == 'profile' ? 'active' : NULL ?>" href="<?php base_url(LOADER_OPT['dir'].'/profile') ?>"><i class="fa fa-user-circle text-light"></i> Profile</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="<?php base_url('signout') ?>"><i class="fa fa-power-off text-light"></i> Sign Out</a>
                              </li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-md-10">