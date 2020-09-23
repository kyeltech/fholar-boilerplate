<div class="container-fluid p-0 bg-light vh-100">
    <div class="container page-wrapper">
        <center class="mb-4">
            <img src="<?php base_url('assets/images/logo.png') ?>" alt="" class="logo">
        </center>
        <div class="col-md-5 mx-auto bg-white shadow-sm rounded-lg">
            <div class="card border-0 py-3">
                <div class="card-body">
                    <h4 class="text-primary">Console Sign in</h4>
                    <hr class="underline mb-4" />
                    <div id="response"><?php Response() ?></div>
                    <form method="POST" id="console_signin_form">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail" required autocomplete="off" />
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="off" />
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" style="width:200px" name="submit">Sign in <i class="fa fa-angle-right"></i></button>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>