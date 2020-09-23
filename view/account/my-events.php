<div class="card border-0 p-4">
    <div class="card-body ">
        <div class=" mb-4">
            <span class="mb-4" style="font-size: 1.8em;">My Events</span>
            <span class="badge badge-pill badge-primary">
                <?php echo count($my_events); ?>
            </span>
        </div>
        
        <div id="response"></div>
        

        <!-- get events -->
        <?php if(count($my_events) > 0): ?>
            <div class="" style="max-width: 100%; width: 100%; overflow-x: auto;">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Details</th>
                            <th scope="col">Greeting messages/Tags</th>
                            <th scope="col" colspan="2" style="width: 50em;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index = 1; ?>
                        <?php foreach ($my_events as $event): ?>
                            <tr>
                                <th scope="row"><?php echo $index; ?></th>
                                <td>
                                    <img src="<?php base_url('uploads/users_events/'.$event['event_image_icon']) ?>" class="img-fluid" style="width: 5em;"/>
                                </td>
                                <td>
                                    <small class="mb-0 float-right badge badge-secondary"><?php echo $event['event_title']; ?></small>
                                    <h5 class="mb-0"><?php echo $event['user_event_title']; ?></h5>
                                    <p class="mb-0"><?php echo base_url('event/'.hyphenate($event['event_title']).'/').$event['ue_code'] ?></p>
                                    <p class="font-weight-bold">Event Date: <?php echo $event['event_date']; ?></p>
                                </td>
                                <td >
                                    <p class="mb-0"><?php echo $event['greetings_message']; ?></p>
                                    <?php $tags = explode(',', $event['tags']); ?>
                                    <div class="d-flex mt-2">
                                        <?php for($i=0; $i < count($tags)-1; $i++): ?>
                                            <span class="badge badge-primary mr-2" style="font-size: 1em;"><?php echo $tags[$i]; ?></span>
                                        <?php endfor; ?>
                                    </div>
                                </td>
                                <td><a href="<?php base_url('account/my-event/'.hyphenate($event['event_title']).'/'.$event['ue_code']); ?>" class="btn btn-dark btn-sm" title="Edit"><i class="fa fa-pencil"></i></button></td>
                                <td><button class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></button></td>
                            </tr>
                            <?php $index++; ?>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>

        <?php else: ?>
            <div class="d-flex justify-content-between">
                <h5>No events created yet!</h5>
            </div>
        <?php endif; ?>
    </div>
</div>