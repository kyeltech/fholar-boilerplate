<div class="card border-0 p-4">
    <div class="card-body ">
        <h5 class="mb-4">Profile</h5>
        <div id="response"></div>
        <form method="POST" id="profileForm">
            <div class="form-group row">
                <div class="col-md-6 grid-stack">
                    <input type="text" class="form-control" id="firstname" value="<?php print $user_graph['firstname'] ?>" name="firstname" placeholder="First Name" required />
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="lastname" value="<?php print $user_graph['lastname'] ?>" name="lastname" placeholder="Last Name" required />
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-6 grid-stack">
                    <input type="email" class="form-control" value="<?php print $user_graph['email'] ?>" name="email" placeholder="E-mail" required disabled />
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="tel" value="<?php print $user_graph['tel'] ?>" name="tel" placeholder="Telephone" required />
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea name="bio" class="form-control" id="bio" placeholder="Short Bio"><?php print $user_graph['bio'] ?></textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary float-right">Update Profile</button>
                </div>
            </div>
        </form>
        
        <h5 class="my-4">Security</h5>
        
        <form method="POST" id="securityForm">
            <div class="form-group row">
                <div class="col-md-6 grid-stack">
                    <input type="password" class="form-control" name="cur_pass" placeholder="Current Password" required />
                </div>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="new_pass" placeholder="New Password" required />
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary float-right">Update Password</button>
                </div>
            </div>
        </form>
    </div>
</div>