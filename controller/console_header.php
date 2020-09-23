<?php
class Console_header extends fh_ctrl{
    protected $users,
                $user_id;
    
    function index(){
        global $data;
        
        // import users model
        $this->users = inst('users','model');
        
        // define user_id
        $this->user_id = call_sess(USER_SESSION,'user_id');
        
        $param['where'] = array('user_id' => $this->user_id);
        $data['user_graph'] = $this->users->getRow($param);
    }
}