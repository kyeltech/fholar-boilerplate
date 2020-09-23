<div class="container-fluid signup-signin-bg p-0">
    <div class="container page-wrapper">
        <div class="col-md-5 mx-auto bg-white shadow-sm rounded-lg">
            <div class="card bg-transparent border-0 py-3">
                <div class="card-body">
                    <h4 class="text-primary">Sign In</h4>
                    <hr class="underline mb-4" />
                    <div id="response"><?php Response() ?></div>
                    <form method="POST" id="signin_form">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail" required autocomplete="off" />
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="off" />
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <a href="<?php base_url('signup') ?>" class="text-primary">Create an account</a>
                            <a href="#" class="text-primary">Forgot Password?</a>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" style="width:200px" name="submit">Goto account <i class="fa fa-angle-right"></i></button>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>