<div class="card border-0 p-4">
    <div class="card-body ">
        
        <form method="POST" id="update_event_form">

            <div class="" id="event_form_tabs">
                
                <div id="response"></div>
                <div class="" id="">
                    <div>
                        <h3 class="mb-0">
                            Edit <?php echo $event_arr['event_title']; ?>
                        </h3>
                        <h5><?php echo $event_arr['event_short_note']; ?></h5>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-xl-9">
                            <input type="hidden" name="eventID" value="<?php echo $event_arr['event_id']; ?>" />
                            <input type="hidden" name="ue_code" value="<?php echo $event_arr['ue_code']; ?>" />
                            
                            <div class="form-group">
                                <input type="text" class="form-control" name="event_title" id="exampleInputEmail1" placeholder="Event Name" value="<?php echo $event_arr['user_event_title'] ?>" required />
                            </div>

                            <div class="form-group">
                                <label>Event Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="event_date" id="exampleInputPassword1" style="height:50px !important; border:1px solid #eaeaea; border-radius:0px;" placeholder="Event Date" value="<?php echo $event_arr['event_date']; ?>" required />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="col-12 col-xl-3 ">
                            <div class="float-right">
                                <input type="file" class="form-control d-none" id="imageFile" name="image_icon" />
                                <label for="imageFile" class="" style="cursor: pointer;" id="get_image"><img src="<?php base_url('uploads/users_events/'.$event_arr['event_image_icon']); ?>" class="img-fluid" style="width: 8em;"/></label>
                                
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="mr-auto d-flex justify-content-end">
                        <p id="img_cont" class="mb-0"></p>
                    </div>
                    
                    <div class="form-group">
                        <textarea name="greetings_message" class="form-control" placeholder="Write your greetings message" required /><?php echo $event_arr['greetings_message']; ?></textarea>
                    </div>
        
                    <div class="form-group">
                        <div class="card">
                            <div class="card-body row" id="tags_cont">
                                
                                <input type="text" id="tagForm" class="form-control" name="tag" placeholder="Tag Name" onblur="add_tag();" />
                            </div>
                        </div>
                        <small>Type your desired tag and click out of the box</small>
                    </div>
    
                </div>
    
                <!-- second event tab -->
                <a class="float-right btn btn-success d-none text-white" id="create_shipping_address"><i class="fa fa-plus-circle"></i> Create Shipping</a>

                <div class="my-4" id="">
    

                    <!-- <h3 class="mt-4">Where do you want your gifts to be shipped to?</h3> -->
                    
                    
                    <?php if($delivery_addresses != null): ?>
                        <h5 class="mt-3">Existing shipping addresses</h5>
                        <div class="card">
                            <div class="card-body py-2" style="max-height: 30em; overflow-y: auto;" id="delivery_address_cont">
                                <?php foreach ($delivery_addresses as $delivery): ?>
                                    <div class="d-flex py-3 border-bottom">
                                        
                                        <!-- &nbsp; &nbsp; -->
                                        <div class="align-self-center">
                                            <a href="#" class="text-primary">
                                                <?php echo $delivery['address'].', '.$delivery['delivery_city'].', '.$delivery['delivery_state'].', '.$delivery['delivery_country']; ?><br />
                                                <?php echo 'Zip Code: '.$delivery['zip_code'].', '.$delivery['delivery_tel']; ?><br/>
                                                <span class="text-muted">Added <?php echo $delivery['delivery_created_at']; ?></span>
                                            </a>
                                        </div>
                                        <div class="align-self-center ml-auto view-btn">
                                            <?php if($user_graph['delivery_id'] == $delivery['delivery_id']): ?>
                                                <a class="btn btn-outline-primary btn-sm float-right" address_id="<?php echo $delivery['delivery_id']; ?>" id='choose_address<?php echo $delivery['delivery_id']; ?>' disabled >Selected <i class="fa fa-check-circle"></i></a>
                                            <?php else: ?>
                                                <a class="btn btn-primary btn-sm float-right" value="<?php echo $delivery['delivery_id']; ?>" id='choose_address<?php echo $delivery['delivery_id']; ?>' onclick="choose_address(<?php echo $delivery['delivery_id']; ?>)" >Choose <i class="fa fa-check-circle"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                
                            </div>
                        </div>
                    <?php endif; ?>

                    <div id="shipping_address_fields">

                        <h5  class="mt-4">Create a shipping address</h5>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-map-marker"></i></div>
                                </div>
                                <input type="text" name="address" class="form-control mr-sm-2" placeholder="Enter Address" value="<?php echo $event_delivery_address['address']; ?>" required />
                            </div>
                        </div>
            
                        <div class="row form-group">
                            <div class="col-12 col-xl-6">
                                <div class="input-group">
                                   
    
                                    <input type="text" class="form-control" name="zip" id="exampleInputEmail1" placeholder="Enter Zip Code" value="<?php echo $event_delivery_address['zip_code']; ?>" required />
                                </div>
                            </div>
                            
                            <div class="col-12 col-xl-6">
                                <div class="input-group">
                                    
    
                                    <input type="text" class="form-control" name="city"  id="exampleInputEmail1" placeholder="Enter City" value="<?php echo $event_delivery_address['delivery_city']; ?>" required />
                                </div>
                            </div>
                        </div>
            
                        <div class="row form-group">
                            <div class="col-12 col-xl-6">
                                <div class="input-group">
                                   
    
                                    <input type="text" class="form-control" name="state" id="exampleInputEmail1" placeholder="Enter State" value="<?php echo $event_delivery_address['delivery_state']; ?>" required />
                                </div>
                            </div>
                            
                            <div class="col-12 col-xl-6">
                                <div class="input-group">
                                    <select class="custom-select mr-sm-2" name="country" id="inlineFormCustomSelect" required>
                                        <option value="<?php echo $event_delivery_address['delivery_country']; ?>"><?php echo $event_delivery_address['delivery_country']; ?></option>
                                        <?php foreach($countries as $country): ?>
                                            <?php if($event_delivery_address['delivery_country'] != $country): ?>
                                                <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                </div>
                                <input type="text" name="tel" class="form-control mr-sm-2" placeholder="Enter Telephone No." value="<?php echo $event_delivery_address['delivery_tel']; ?>" required />
                            </div>
                        </div>

                    </div>
    
                    <div class="form-group mt-4">
                        <center>
                            
    
                            <button type="submit" class="btn btn-primary event_submit" id="to_third_tab" style="width:200px">Submit <i class="fa fa-check-circle"></i></button>
                        </center>
                    </div>
                </div>

            </div>
        
        </form>
    </div>
</div>