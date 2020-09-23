<div class="container-fluid signup-bg">
    <div class="container page-wrapper-ex vh-100">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <form id="signup_form" method="POST"></form>
                <div class="wishlist-tab-content wl-tab-active" id="tab_name">
                    <h2>Start by letting us know your name...</h2>
                    <hr class="underline mb-5" />
                    <div class="response"></div>
                    <div class="form-group row mb-4">
                        <div class="col-md-6 grid-stack mb-3">
                            <input type="text" name="first_name" form="signup_form" class="form-control" placeholder="First Name" required autocomplete="off" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="last_name" form="signup_form" class="form-control" placeholder="Last Name" required autocomplete="off" />
                        </div>
                    </div>

                    <div class="form-group">
                        <center>
                            <button class="btn btn-primary" onclick="wlt_target('tab_contact','tab_name')" style="width:200px">Next <i class="fa fa-angle-right"></i></button>
                        </center>
                    </div>
                </div>

                <div class="wishlist-tab-content" id="tab_contact">
                    <h2>We promise not to spam your inbox...</h2>
                    <hr class="underline mb-5" />
                    <div class="response"></div>
                    <div class="form-group row mb-4">
                        <div class="col-md-6 grid-stack">
                            <input type="email" name="email" form="signup_form" class="form-control" placeholder="E-mail" required autocomplete="off" />   
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="tel" form="signup_form" class="form-control" placeholder="Phone Number" required autocomplete="off" />
                        </div>
                    </div>

                    <div class="form-group">
                        <center>
                            <button class="btn btn-primary"  onclick="wlt_target('tab_name')" style="width:200px"><i class="fa fa-angle-left"></i> Previous</button>

                            <button class="btn btn-primary" onclick="wlt_target('tab_security','tab_contact')" style="width:200px">Next <i class="fa fa-angle-right"></i></button>
                        </center>
                    </div>
                </div>

                <div class="wishlist-tab-content" id="tab_security">
                  <h2>Lastly, Create your password</h2>
                  <hr class="underline mb-5" />
                  <div id="response"></div>
                  <div class="form-group row mb-4">
                        <div class="col-md-6 grid-stack">
                            <input type="password" name="password" form="signup_form" class="form-control" placeholder="Password" required autocomplete="off" />
                        </div>
                        <div class="col-md-6">
                            <input type="password" name="ret_password" form="signup_form" class="form-control" placeholder="Re-type Password" required autocomplete="off" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" form="signup_form" name="terms" id="terms_check" required>
                          <label class="custom-control-label" for="terms_check">I accept the <a href="#" class="text-primary">Terms & Conditions</a></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <center>
                            <button class="btn btn-primary" onclick="wlt_target('tab_contact')" style="width:200px"><i class="fa fa-angle-left"></i> Previous</button>
                            <button type="submit" class="btn btn-primary" form="signup_form" style="width:200px" name="create_account">Let's Go</button>
                        </center>
                    </div>
                </div>
                
                <center class="fixed-bottom py-4">
                    <p class="text-primary">Already have an account? <a href="<?php base_url('signin') ?>">Sign in</a></p>
                </center>
            </div>
        </div>
    </div>
</div>