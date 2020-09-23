<div class="card border-0 p-4">
    <div class="card-body ">
        
        <form method="POST" id="create_event_form">

            <div class="" id="event_form_tabs">
                
                <div id="response"></div>
                <div class="" id="first_event_tab">
                    <div>
                        <h3 class="mb-0">
                            <?php echo $event_arr['event_title']; ?>
                        </h3>
                        <h5><?php echo $event_arr['event_short_note']; ?></h5>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-xl-9">
                            <input type="hidden" name="eventID" value="<?php echo $event_arr['event_id']; ?>" />
                            <?php if(strtolower($event_arr['event_title']) == 'wedding'): ?>
                                <div class="row form-group">
                                    <div class="col-12 col-xl-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-male"></i></div>
                                            </div>
            
                                            <input type="text" class="form-control" name="groom" id="exampleInputEmail1" placeholder="Groom Name" required />
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-xl-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-female"></i></div>
                                            </div>
            
                                            <input type="text" class="form-control" name="bride"  id="exampleInputEmail1" placeholder="Bride Name" required />
                                        </div>
                                    </div>
                                </div>
                            <?php elseif(strtolower($event_arr['event_title']) == 'birthday'): ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="celebrant" id="exampleInputEmail1" placeholder="Celebrant's Name" required />
                                </div>
                            <?php elseif(strtolower($event_arr['event_title']) == 'bridal shower'): ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="bridal_shower" id="exampleInputEmail1" placeholder="Bride's Name" required />
                                </div>
                            <?php elseif(strtolower($event_arr['event_title']) == 'baby shower'): ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="baby" id="exampleInputEmail1" placeholder="Baby's Name" required />
                                </div>
                            <?php elseif(strtolower($event_arr['event_title']) == 'housewarming'): ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="housewarming" id="exampleInputEmail1" placeholder="Housewarming Event Name" required />
                                </div>
                            <?php else: ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="erejrer" id="exampleInputEmail1" placeholder="Event Name" required />
                                </div>
                            <?php endif; ?>
                        
                        </div>
                        <div class="col-12 col-xl-3 ">
                            <div class="float-right">
                                <input type="file" class="form-control d-none" id="imageFile" name="image_icon" required />
                                <label for="imageFile" class="btn btn-success" id="get_image"><i class="fa fa-picture-o"></i> Choose Image</label>
                                
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="mr-auto d-flex justify-content-end">
                        <p id="img_cont" class="mb-0"></p>
                    </div>
                    <div class="form-group">
                        <label>Event Date</label>
                        <div class="input-group">
                            <input type="date" class="form-control" name="event_date" id="exampleInputPassword1" style="height:50px !important; border:1px solid #eaeaea; border-radius:0px;" placeholder="Event Date" required />
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <textarea name="greetings_message" class="form-control" placeholder="Write your greetings message" required /></textarea>
                    </div>
        
                    <div class="form-group">
                        <div class="card">
                            <div class="card-body row" id="tags_cont">
                                
                                <input type="text" id="tagForm" class="form-control" name="tag" placeholder="Tag Name" onblur="add_tag();" />
                            </div>
                        </div>
                        <small>Type your desired tag and click out of the box</small>
                    </div>
        
                    
        
                    <button type="button" class="btn btn-primary float-right" id="to_second_tab" style="width:200px">Next <i class="fa fa-long-arrow-right"></i></button>
    
                </div>
    
                <!-- second event tab -->
                <a class="float-right btn btn-success d-none text-white" id="create_shipping_address"><i class="fa fa-plus-circle"></i> Create Shipping</a>

                <div class="my-4" id="second_event_tab">
    
                    <div>
                        <h3 class="mb-0">
                            <?php echo $event_arr['event_title']; ?>
                        </h3>
                        <h5><?php echo $event_arr['event_short_note']; ?></h5>
                    </div>

                    <h3 class="mt-4">Where do you want your gifts to be shipped to?</h3>
                    
                    
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
                                <input type="text" name="address" class="form-control mr-sm-2" placeholder="Enter Address" required />
                            </div>
                        </div>
            
                        <div class="row form-group">
                            <div class="col-12 col-xl-6">
                                <div class="input-group">
                                   
    
                                    <input type="text" class="form-control" name="zip" id="exampleInputEmail1" placeholder="Enter Zip Code" required />
                                </div>
                            </div>
                            
                            <div class="col-12 col-xl-6">
                                <div class="input-group">
                                    
    
                                    <input type="text" class="form-control" name="city"  id="exampleInputEmail1" placeholder="Enter City" required />
                                </div>
                            </div>
                        </div>
            
                        <div class="row form-group">
                            <div class="col-12 col-xl-6">
                                <div class="input-group">
                                   
    
                                    <input type="text" class="form-control" name="state" id="exampleInputEmail1" placeholder="Enter State" required />
                                </div>
                            </div>
                            
                            <div class="col-12 col-xl-6">
                                <div class="input-group">
                                    <select class="custom-select mr-sm-2" name="country" id="inlineFormCustomSelect" required>
                                        <option value="" selected disabled>Choose country...</option>
                                        <?php foreach($countries as $country): ?>
                                            <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
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
                                <input type="text" name="tel" class="form-control mr-sm-2" placeholder="Enter Telephone No." required />
                            </div>
                        </div>

                    </div>
    
                    <div class="form-group mt-4">
                        <center>
                            <button class="btn btn-primary" id="to_first_tab" style="width:200px"><i class="fa fa-long-arrow-left"></i> Previous</button>
    
                            <button type="submit" class="btn btn-primary event_submit" id="to_third_tab" style="width:200px">Submit <i class="fa fa-check-circle"></i></button>
                        </center>
                    </div>
                </div>

            </div>
            

            <!-- third event tab -->
            <div class="d-none" id="third_event_tab">

                <div class="col-md-6 m-auto">
                    <div class="card">
                        <div class="card-body m-auto text-center">
                            <img src="<?php base_url('assets/images/success_icon.png'); ?>" class="img-fluid" style="width: 20em"/>
                            <h5>Your <?php echo $event_arr['event_title']; ?> event has been created successfully!</h5>
                        </div>
                    </div>
                    <a href="<?php base_url('account/my-events'); ?>" class="btn btn-primary btn-block mt-3">Proceed <i class="fa fa-long-arrow-right"></i></a>

                </div>

            </div>

        
        </form>
    </div>
</div>