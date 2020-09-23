<!-- Footer -->
    <div class="container-fluid bg-white pt-5 px-5 section footer">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-5">
                <div class="card border-0 bg-white">
                    <div class="card-body">
                        <a href=""><img src="<?php base_url('assets/images/logo.png') ?>" width="200" alt=""></a>
                        <p class="card-text mt-4">mywishlist is the best way to create an online gift registry or online wishing well for Wedding, Engagement Party, Baby Shower, Housewarming, Birthday Party or any other events.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-2">
                <div class="card border-0 bg-white">
                    <div class="card-body">
                        <h5 class="text-primary">Navigation</h5>
                        <ul class="list-group">
                            <li class="list-group-item pl-0 py-1 border-0">
                                <a href="<?php base_url('gifts') ?>" class="list-group-link">Gifts</a>
                            </li>
                            <li class="list-group-item pl-0 py-1 border-0">
                                <a href="<?php base_url('signin') ?>" class="list-group-link">Login</a>
                            </li>
                            <li class="list-group-item pl-0 py-1 border-0">
                                <a href="<?php base_url('signup') ?>" class="list-group-link">Register</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-2">
                <div class="card border-0 bg-white">
                    <div class="card-body">
                        <h5 class="text-primary">Quick Links</h5>
                        <ul class="list-group">
                            <li class="list-group-item pl-0 py-1 border-0">
                                <a href="<?php base_url('how_it_works') ?>" class="list-group-link">How it Works</a>
                            </li>
                            <li class="list-group-item pl-0 py-1 border-0">
                                <a href="<?php base_url('faqs') ?>" class="list-group-link">FAQs</a>
                            </li>
                            <li class="list-group-item pl-0 py-1 border-0">
                                <a href="<?php base_url('contact') ?>" class="list-group-link">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-3">
                <div class="card border-0 bg-white">
                    <div class="card-body">
                        <h5 class="text-primary">Follow Us</h5>
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item pl-0 border-0">
                                <a href="" class="list-group-link"><i class="fab fa-facebook text-light"></i></a>
                            </li>
                            <li class="list-group-item pl-0 border-0">
                                <a href="" class="list-group-link"><i class="fab fa-twitter text-light"></i></a>
                            </li>
                            <li class="list-group-item pl-0 border-0">
                                <a href="" class="list-group-link"><i class="fab fa-instagram text-light"></i></a>
                            </li>
                            <li class="list-group-item pl-0 border-0">
                                <a href="" class="list-group-link"><i class="fab fa-youtube text-light"></i></a>
                            </li>
                        </ul>
                        <h5 class="text-primary mt-3">Newsletter</h5>
                        <div class="input-group mt-3">
                            <input type="text" class="form-control" placeholder="Email address..." aria-label="Email address..." aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="button-addon2">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 border-top mt-5">
                <div class="card border-0">
                    <div class="card-body text-center">
                        <small>&copy; <?php print date("Y") ?> mywishlistng. All rights reserved</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <button type="button" id="scrollToTop" class="btn btn-primary rounded-circle scroll-to-top sticky-bottom shadow">top</button>

    <!-- End -->
    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- axios progressbar -->
    <script src="https://cdn.rawgit.com/rikmms/progress-bar-4-axios/0a3acf92/dist/index.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <script src="<?php base_url('assets/js/wishlist.js') ?>"></script>
    <script src="<?php base_url('assets/js/wishlist_account.js') ?>"></script>

</body>
</html>