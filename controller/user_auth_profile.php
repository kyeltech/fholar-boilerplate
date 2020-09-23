<?php
class User_auth_profile extends fh_ctrl{
    protected $users,
                $user_info,
                $events,
                $users_events,
                $event_tags,
                $delivery_address,
                $fh,
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

        // import user_id model
        $this->user_id = call_sess(USER_SESSION,'user_id');
        if(call_sess(USER_SESSION,'user_id')){
            $this->user_info = $this->users->getRow(['where' => ['user_id' => $this->user_id] ] );
        }

    }
    
    function signin(){
        global $data;
        
        $data['title'] = 'Sign In';
        
        $this->validateSigninSession();
    }
    
    function signup(){
        global $data;
        
        $data['title'] = 'Sign Up';
        
        $data['new_header'] = 'signup_header';
        $data['new_footer'] = 'no_footer';
        
        $this->validateSigninSession();
    }
    
    // account verification
    function verify($arg){
        global $data;
        
        $data['title'] = $this->title('Verify E-mail');
        
        if(isset($arg[0])){
            try{
                $email = simple_decrypt(clean_data($arg[0]));
                
                // check if user exists
                if(!$this->users->checkTable(array("email" => $email))){
                    throw new Exception("We could not find that email");
                }
                
                // check if user is already active
                if($this->users->checkTable(array("email" => $email,"email_verify" => 1))){
                    throw new Exception(
                        '<h4>Your e-mail has already been verified</h4>
                        <p>your account is active<p>'
                    );
                }
                
                // update status
                if(!$this->users->updateRow(array("email_verify" => 1),array("email" => $email))){
                    throw new Exception("Unable to verify your e-mail at the moment");
                }
                
                // output html feed
                htmlFeed(
                            'success',
                            'Your account has been verified.<br />
                            Your account is now active.'
                        );
                
                // redirect
                redir("signin");
            }
            catch(Exception $e){
                htmlFeed("warning",$e->getMessage());
                // redirect
                redir("signin");
            }
        }
    }
    
    function dashboard(){
        
    }

    // A single event page
    function user_event($event_name){
        global $data;

        $event_name = unhyphenate($event_name[0]);
        $data['title'] = $event_name;

        $data['countries'] = $this->fh->countries();
        
        // events
        if ($this->events->checkTable(['event_title' => $data['title']])) {
            $param['where'] = ['event_title' => $data['title']];
            $data['event_arr'] = $this->events->getRow($param);

            // delivery address
            unset($param['where']);
            $param['where'] = ['user_id' => $this->user_id];
            $data['delivery_addresses'] = $this->delivery_address->getRows($param);
            

        }
        else{
            $data['error404'] = true;
        }

    }

    function my_events(){
        global $data;

        // my events - user's events
        $param['table2'] = 'event_tags';
        $param['table3'] = 'events';
        $param['where'] = ['user_id' => $this->user_id];
        $param['column_append'] = 'events.event_id=users_events.event_id AND users_events.user_event_id=event_tags.ue_id ORDER BY event_created_at DESC';
        $data['my_events'] = $this->users_events->getJointRowsThree($param);
        // print_r($data['my_events']);
        // exit();

    }

    function my_event($params){
        global $data;

        $user_event_id = $params[1];
        $event_name = unhyphenate($params[0]);
        $data['title'] = $event_name;

        $data['countries'] = $this->fh->countries();
        
        // events
        if ($this->users_events->checkTable(['ue_code' => $user_event_id])) {
            
            $param['table2'] = 'events';
            $param['where'] = ['ue_code' => $user_event_id];
            $param['column_append'] = 'events.event_id=users_events.event_id';
            $data['event_arr'] = $this->users_events->getJointRows($param)[0];

            // Event tags
            /* ---Not Used--- */
            unset($param);
            $param['where'] = ['ue_id' => $data['event_arr']['user_event_id']];
            $data['event_tags'] = $this->event_tags->getRow($param);

            // Delivery address for the event
            unset($param);
            $param['table2'] = 'users';
            $param['where'] = ['delivery_address.delivery_id' => $this->user_info['delivery_id'] ];
            $param['column_append'] = 'users.user_id=delivery_address.user_id';
            $data['event_delivery_address'] = $this->delivery_address->getJointRows($param)[0];

            // delivery address
            unset($param);
            $param['where'] = ['user_id' => $this->user_id];
            $data['delivery_addresses'] = $this->delivery_address->getRows($param);
            

        }
        else{
            $data['error404'] = true;
        }
    }
    
    function user_profile(){
        global $data;
        
        $data['title'] = 'Profile';
    }
    
    private function validateSigninSession(){
        if(!empty(call_sess(USER_SESSION))){
            if(call_sess(USER_SESSION,'role') == 1){
                redir('account');   
            }
            else if(call_sess(USER_SESSION,'role') == 2){
                redir('console');
            }
        }
    }
    
    function signout(){
        if(!empty(call_sess(USER_SESSION))){
            if(call_sess(USER_SESSION,'role') == 1){
                $redir_uri = 'signin';
            }
            else if(call_sess(USER_SESSION,'role') == 2){
                $redir_uri = 'console';
            }
            
            // remove session
            $this->remove_sess(USER_SESSION);
            
            // redirect
            redir($redir_uri);
        }
        else{
            // redirect
            redir('signin');
        }
    }
}