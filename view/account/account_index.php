<h4 class="text-center mb-4">Hi <span class="text-primary"><?php print ucfirst($user_graph['firstname']) ?>!</span> Welcome back to your Account</h4>
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-0 p-3 mb-3 shadow-sm">
            <div class="card-body text-center">
                <div class="card-img">
                    <img src="<?php base_url('assets/images/svg/new_event.svg') ?>" style="width:120px" class="img-fluid mx-auto d-block">
                </div>

                <p>Create a new event</p>
                <center class="mt-3">
                    <a href="#" class="btn btn-warning text-white"><small>Add Event <i class="fa fa-plus"></i></small></a>
                </center>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 p-3 mb-3 shadow-sm">
            <div class="card-body text-center">
                <div class="card-img">
                    <img src="<?php base_url('assets/images/svg/my_events.svg') ?>" style="width:120px" class="img-fluid mx-auto d-block">
                </div>

                <p>All your created events <span class="badge badge-pill badge-warning">19</span></p>
                <center class="mt-3">
                    <a href="#" class="btn btn-warning text-white"><small>View All <i class="fa fa-angle-right"></i></small></a>
                </center>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 p-3 mb-3 shadow-sm">
            <div class="card-body text-center">
                <div class="card-img">
                    <img src="<?php base_url('assets/images/svg/security.svg') ?>" style="width:120px" class="img-fluid mx-auto d-block">
                </div>

                <p>Update your security</p>
                <center class="mt-3">
                    <a href="#" class="btn btn-info text-white"><small>Update <i class="fa fa-lock"></i></small></a>
                </center>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card border-0 p-3 shadow-sm">
            <div class="card-header bg-white border-0">
                <div class="d-flex justify-content-between">
                    <div><i class="fa fa-calendar text-light"></i> Upcoming Events</div>
                    <a href="#" class="text-primary">View all <i class="fa fa-angle-right"></i></a>
                </div>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-between mb-4">
                    <a href="#" class="text-info">My Wedding coming...</a>
                    <div>21st, August 2020</div>
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <a href="#" class="text-info">My 50th Birthday</a>
                    <div>21st, August 2020</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php //echo hyphenate('eireirieu'); ?>