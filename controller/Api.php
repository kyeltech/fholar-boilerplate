<?php
class Api extends fh_ctrl{
    protected $users,
                $events,
                $users_events,
                $event_tags,
                $delivery_address,
                $user_id;
    
    function index(){
        // import users model
        $this->users = inst('users','model');
        
        // import events model
        $this->events = inst('events','model');
        
        // import users_events model
        $this->users_events = inst('users_events','model');
        
        // import event_tags model
        $this->event_tags = inst('event_tags','model');

        // import delivery_address model
        $this->delivery_address = inst('delivery_address','model');

        // import form helpers
        $this->fh = inst('form_helpers','helper');
        
        if(!empty(call_sess(USER_SESSION))){
            $this->user_id = call_sess(USER_SESSION,'user_id');
        }
    }
    
    function create_account(){
        $this->postVal('first_name',function(){
            $fields['firstname'] = $this->post('first_name');
            $fields['lastname'] = $this->post('last_name');
            $fields['email'] = $this->post('email');
            $fields['tel'] = $this->post('tel');
            $fields['password'] = $this->post('password');
            $fields['ret_password'] = $this->post('ret_password');
            
            try{
                $this->check_fields($fields, array(
                    'First Name is empty',
                    'Last Name is empty',
                    'E-mail is empty',
                    'Phone Number is empty',
                    'Password is empty',
                    'Confirm password',
                ));
                
                // validate email
                $this->check_email($fields['email']);
                
                // confirm passwords
                $this->confirm_pass($fields['password'],$fields['ret_password']);
                
                // check if user email is registered
                if($this->users->checkTable(array('email' => $fields['email']))){
                    throw new Exception('Preferred e-mail is already registered');
                }
                
                // save new data and send verification mail
                
                unset($fields['ret_password']);
                $fields['password'] = sha1($fields['password']);
                $fields['user_date_created'] = now();
                
                // send mail
                $content['header_color'] = 'white';
                $content['to'] = $fields['email'];
                $content['from'] = "michael@greenmousetech.com";
                $content['subject'] = 'Welcome to '.SITENAME.', '.$fields['firstname'];
                $content['logo'] = BASE_URL.'assets/images/logo.png';

                $vlink = BASE_URL.'verify/'.simple_encrypt($fields['email']);
                $content['body'] = '<p style="font-size:1.5em">Hi, '.ucfirst($fields['firstname']).'</p>';
                $content['body'] .= '<p>Welcome to '.ucfirst(SITENAME).'</p>';
                $content['body'] .= '<p>We are glad to have you on board and can\'t wait for you to start working with all the amazing features we offer.</p>';
                $content['body'] .= '<p>To proceed kindly click the button below to confirm your email</p>';
                $content['body'] .= '<p style="margin-top:30px">
                                        <a href="'.$vlink.'" target="_BLANK" alt="click to verify your email" style="padding:20px;color:white;font-size:1.2em;background-color:#651652;text-decoration:none;border-radius:5px;border:0">Confirm email</a>
                                    </p>';
                $content['footer'] = NULL;

                if(fh_mail($content,TRUE) == TRUE){
                    // create new user
                    if(!$this->users->storeRow($fields)){
                        throw new Exception('Unable to create your account at the moment');
                    }
                    
                    $mail_provider = explode('@',$fields['email'])[1];
                    print json_encode(array(
                        'error' => 0,
                        'msg' => 'Signup Complete.<br />We sent a verification link to your mail.<br /><a href="http://'.$mail_provider.'">Check Mail</a>'
                    ));
                }
                
            }
            catch(Exception $e){
                print json_encode(array(
                        'error' => 1,
                        'msg' => $e->getMessage()
                    ));
            }
        });
        
        $this->ajax();
    }
    
    function signin(){
        $this->postVal('email',function(){
            $fields['email'] = $this->post('email');
            $fields['password'] = sha1($this->post('password'));
            
            try{
                // check fields
                $this->check_fields($fields, array(
                   'E-mail is empty',
                   'Password is empty'
                ));
                
                // check if user exists
                if(!$this->users->checkTable($fields)){
                    throw new Exception('Invalid E-mail or Password');
                }
                
                // get data
                $param['where'] = $fields;
                $user_data = $this->users->getRow($param);
                
                if($user_data['email_verify'] == 0){
                    throw new Exception('You have not verified your mail.<br />Please refer to the mail sent upon sign up.');
                }
                
                if($user_data['user_status'] == 0){
                    throw new Exception('Your account is currently deactivated.<br />Kindly contact the admin of this platform.');
                }
                
                $user_id = $user_data['user_id'];
                $name = $user_data['firstname'].' '.$user_data['lastname'];
                $email = $user_data['email'];
                
                // create sign in session
                $this->user_session($this->createUser_graph("1,$name,$email,$user_id"));
                
                print json_encode(array(
                        'error' => 0,
                        'msg' => 'Authentication successful.<br />Redirecting...'
                    ));
            }
            catch(Exception $e){
                print json_encode(array(
                        'error' => 1,
                        'msg' => $e->getMessage()
                    ));
            }
        });
            
        $this->ajax();
    }
    
    function profile_update(){
        $this->postVal('firstname',function(){
            $fields['firstname'] = $this->post('firstname');
            $fields['lastname'] = $this->post('lastname');
            $fields['tel'] = $this->post('tel');
            
            try{
                // check fields
                $this->check_fields($fields, array(
                   'Firstname is empty',
                   'Lastname is empty',
                   'Phone No is empty',
                ));
                
                $fields['bio'] = $this->post('bio');
                
                if(!$this->users->updateRow($fields,array('user_id' => $this->user_id))){
                    throw new Exception('Unable to update profile');
                }
                
                print json_encode(array(
                        'error' => 0,
                        'msg' => 'Profile Updated'
                    ));
            }
            catch(Exception $e){
                print json_encode(array(
                        'error' => 1,
                        'msg' => $e->getMessage()
                    ));
            }
        });
            
        $this->ajax();
    }
    
    function security_update(){
        $this->postVal('cur_pass',function(){
            $fields['password'] = $this->post('cur_pass');
            $fields['new_password'] = $this->post('new_pass');
            
            try{
                $this->check_fields($fields, array(
                    'Current password is empty',
                    'New password is empty'
                ));

                // encrypt passwords
                $fields['password'] = sha1($fields['password']);
                $fields['new_password'] = sha1($fields['new_password']);

                // check if current password is correct
                if(!$this->users->checkTable(array('password' => $fields['password']))){
                    throw new Exception('Current password is incorrect');
                }
                
                // update password
                if(!$this->users->updateRow(array('password' => $fields['new_password']),array('user_id' => $this->user_id))){
                    throw new Exception('Unable to update password');
                }
                
                print json_encode(array(
                        'error' => 0,
                        'msg' => 'Password Updated'
                    ));
            }   
            catch(Exception $e){
                print json_encode(array(
                        'error' => 1,
                        'msg' => $e->getMessage()
                    ));
            }
            
        });
        
        $this->ajax();
    }
    
    
    // console signin
    function console_signin(){
        $this->postVal('email',function(){
            $fields['email'] = $this->post('email');
            $fields['password'] = sha1($this->post('password'));
            
            try{
                // check fields
                $this->check_fields($fields, array(
                   'E-mail is empty',
                   'Password is empty'
                ));
                
                $fields['role'] = 'admin';
                
                // check if user exists
                if(!$this->users->checkTable($fields)){
                    throw new Exception('Invalid E-mail or Password');
                }
                
                // get data
                $param['where'] = $fields;
                $user_data = $this->users->getRow($param);
                
                $user_id = $user_data['user_id'];
                $name = $user_data['firstname'].' '.$user_data['lastname'];
                $email = $user_data['email'];
                
                // create sign in session
                $this->user_session($this->createUser_graph("2,$name,$email,$user_id"));
                
                print json_encode(array(
                        'error' => 0,
                        'msg' => 'Authentication successful.<br />Redirecting...'
                    ));
            }
            catch(Exception $e){
                print json_encode(array(
                        'error' => 1,
                        'msg' => $e->getMessage()
                    ));
            }
        });
            
        $this->ajax();
    }

    // create event
    function create_event(){

        $this->postVal('eventID', function(){

            $fields['event_id'] = $this->post('eventID');
            if ($this->post('groom') != false) {
                $fields['user_event_title'] = $this->post('bride').' & '.$this->post('groom');
            }
            else if($this->post('celebrant') != false){
                $fields['user_event_title'] = $this->post('celebrant');
            }
            else if($this->post('bridal_shower') != false){
                $fields['user_event_title'] = $this->post('bridal_shower');
            }
            else if($this->post('baby') != false){
                $fields['user_event_title'] = $this->post('baby');
            }
            else if($this->post('housewarming') != false){
                $fields['user_event_title'] = $this->post('housewarming');
            }
            $fields['event_date'] = $this->post('event_date');
            $fields['greetings_message'] = $this->post('greetings_message');
            
            if ($this->post('address') != false) {
                $delivery_fields['address'] = $this->post('address');
                $delivery_fields['zip_code'] = $this->post('zip');
                $delivery_fields['delivery_city'] = $this->post('city');
                $delivery_fields['delivery_state'] = $this->post('state');
                $delivery_fields['delivery_country'] = $this->post('country');
                $delivery_fields['delivery_tel'] = $this->post('tel');
                $delivery_fields['delivery_created_at'] = now(); 
            }
            $fields['event_created_at'] = now(); 
 
            
            
            try{
                
                $eventImgFile = $this->fh->file_upload('image_icon', 'png,PNG,jpg,JPG,jpeg,JPEG', TRUE, 2);
 
 
                if($eventImgFile !== FALSE){
                    $fields['event_image_icon'] = 'event-'.sha1(now(FALSE)).'.'.$eventImgFile['ext'];
                }
 
                // add remaining fields for user's event to be created
                $fields['user_id'] = $this->user_id;
                $ue_code = rand(10000000000, 999999999999999999);
                $fields['ue_code'] = $ue_code;

                // store in users_events model
                if(!$this->users_events->storeRow($fields)){
                    throw new Exception('unable to store new event');
                }

                
                // check if delivery fields is set
                if ($this->post('address') != false) {
                    
                    // add remaining fields for delivery address
                    $delivery_fields['user_id'] = $this->user_id;
                    
                    // Check delivery_address model
                    $where = [
                        'user_id' => $this->user_id,
                        'address' => $delivery_fields['address'],
                        'zip_code' => $delivery_fields['zip_code'],
                        'delivery_city' => $delivery_fields['delivery_city'],
                        'delivery_state' => $delivery_fields['delivery_state'],
                        'delivery_country' => $delivery_fields['delivery_country'],
                    ];
    
                    if ($this->delivery_address->checkTable($where)) {
                        throw new Exception("A record of that delivery address exists!");
                    }
                    else{

                        // store in delivery_address model
                        if(!$this->delivery_address->storeRow($delivery_fields)){
                            throw new Exception('unable to store new delivery address');
                        }
                        else{
                            // select delivery_address model
                            unset($param);
                            $param['where'] = [
                                'address' => $delivery_fields['address'],
                                'delivery_created_at' => now()
                            ];
                            $delivery_address_row = $this->delivery_address->getRow($param);
            
                            // update users model
                            $data = ['delivery_id' => $delivery_address_row['delivery_id']];
                            $where = ['user_id' => $this->user_id];
                            if(!$this->users->updateRow($data, $where)){
                                throw new Exception('unable to update user');
                            }

                        }

                        

                    }
    
                }

                // upload to the specified folder
                if($eventImgFile !== FALSE){
                    move_files($eventImgFile['tmp_name'], 'uploads/users_events/'.$fields['event_image_icon']);
                }

                // get user's event
                $param['where'] = ['ue_code' => $ue_code];
                $user_event = $this->users_events->getRow($param);

                print json_encode(
                    array(
                        'error' => 0,
                        'ue_id' => $user_event['user_event_id']
                    )
                );

 
            }
            catch(Exception $e){
                print json_encode(
                    array(
                        'error' => 1,
                        'msg' => $e->getMessage()
                    )
                 );
            }
             
        });
        
        $this->ajax();
    }

    // save event tags
    function save_event_tags(){
        
        global $data;
        $data = $this->apiGet();
        
        try{

            $this->apiVal($data,'ue_id',function(){
                global $data;
    
                $fields['ue_id'] = $data['ue_id'];
                $tags = $data['tags'];
    
                $fields['tags'] = '';
    
                foreach ($tags as $tag) {
                    $fields['tags'] .= $tag.',';
                }
    
                // update user's event by storing event_tags with user event code
                // $this->event_tags->updateRow($fields, $where);
                if(!$this->event_tags->storeRow($fields)){
                    throw new Exception('Unable to save tag');
                }
    
                echo json_encode([
                    'error' => 0
                ]);
    
            });

        }
        catch(Exception $e){
            echo json_encode([
                'error' => 1,
                'msg' => $e->getMessage()
            ]);
        }
        

        $this->ajax();
    }

    // choose address
    function choose_address(){

        global $data;
        $data = $this->apiGet();
        
        try{

            $this->apiVal($data,'delivery_id',function(){
                global $data;
    
                $fields['delivery_id'] = $data['delivery_id'];
    
                // update user's model by setting the delivery_id
                if(!$this->users->updateRow($fields, ['user_id' => $this->user_id])){
                    throw new Exception('Unable to update user');
                }

                // get user's delivery addresses
                $param['where']['user_id'] = $this->user_id;
                $addresses = $this->delivery_address->getRows($param);
    
                echo json_encode([
                    'error' => 0,
                    'delivery_id' => $data['delivery_id'],
                    'delivery_addresses' => $addresses
                ]);
    
            });

        }
        catch(Exception $e){
            echo json_encode([
                'error' => 1,
                'msg' => $e->getMessage()
            ]);
        }
        

        $this->ajax();

    }

    // get event tags
    function get_event_tags(){

        global $data;
        $data = $this->apiGet();

        $this->apiVal($data,'ue_code',function(){
            global $data;

            if ($this->users_events->checkTable([ 'ue_code' => $data['ue_code'] ])) {
                // get users events
                $users_events = $this->users_events->getRow(['where' => ['ue_code' => $data['ue_code']] ]);
                // get user's event tags
                $event_tags = $this->event_tags->getRow(['where' => ['ue_id' => $users_events['user_event_id']] ]);
                
                echo json_encode([
                    'error' => 0,
                    'tags' => $event_tags['tags']
                ]);
                
            }
            else{
                echo json_encode([
                    'error' => 1
                ]);
            }

        });

        $this->ajax();

    }

    // Update events
    function update_event(){

        $this->postVal('eventID', function(){

            $fields['event_id'] = $this->post('eventID');
            $data['ue_code'] = $this->post('ue_code');
            
            $fields['user_event_title'] = $this->post('event_title');
            $fields['event_date'] = $this->post('event_date');
            $fields['greetings_message'] = $this->post('greetings_message');
            
            if ($this->post('address') != false) {
                $delivery_fields['address'] = $this->post('address');
                $delivery_fields['zip_code'] = $this->post('zip');
                $delivery_fields['delivery_city'] = $this->post('city');
                $delivery_fields['delivery_state'] = $this->post('state');
                $delivery_fields['delivery_country'] = $this->post('country');
                $delivery_fields['delivery_tel'] = $this->post('tel');
                $delivery_fields['delivery_updated_at'] = now(); 
            }
            $fields['event_updated_at'] = now(); 
 
            
            
            try{
                
                $eventImgFile = $this->fh->file_upload('image_icon', 'png,PNG,jpg,JPG,jpeg,JPEG', FALSE, 2);
 
 
                if($eventImgFile !== FALSE){
                    $fields['event_image_icon'] = 'event-'.sha1(now(FALSE)).'.'.$eventImgFile['ext'];
                }

                // update data in users_events model
                if(!$this->users_events->updateRow($fields, $data)){
                    throw new Exception('unable to update user\'s event data');
                }

                
                // check if delivery fields is set
                if ($this->post('address') != false) {
                    
                    
                    // update data in delivery_address model
                    if(!$this->delivery_address->updateRow($delivery_fields, ['user_id' => $this->user_id] )){
                        throw new Exception('unable to update delivery address');
                    }

                }

                if($eventImgFile !== FALSE){
                    move_files($eventImgFile['tmp_name'], 'uploads/users_events/'.$fields['event_image_icon']);
                }

                // get user's event
                $param['where'] = ['ue_code' => $data['ue_code']];
                $user_event = $this->users_events->getRow($param);
 
                print json_encode(
                    array(
                        'error' => 0,
                        'ue_id' => $user_event['user_event_id']
                    )
                );
 
            }
            catch(Exception $e){
                print json_encode(
                    array(
                        'error' => 1,
                        'msg' => $e->getMessage()
                    )
                 );
            }
             
        });
        
        $this->ajax();

    }

    function update_event_tags(){
        
        global $data;
        $data = $this->apiGet();
        
        try{

            $this->apiVal($data,'ue_id',function(){
                global $data;
    
                $tags_data['ue_id'] = $data['ue_id'];
                $tags = $data['tags'];
    
                $fields['tags'] = '';
    
                foreach ($tags as $tag) {
                    $fields['tags'] .= $tag.',';
                }
    
                // Update user's event tags by ue_id
                if(!$this->event_tags->updateRow($fields, $tags_data)){
                    throw new Exception('Unable to save tag');
                }
    
                echo json_encode([
                    'error' => 0
                ]);
    
            });

        }
        catch(Exception $e){
            echo json_encode([
                'error' => 1,
                'msg' => $e->getMessage()
            ]);
        }
        

        $this->ajax();
    }

}