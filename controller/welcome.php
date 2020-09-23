<?php
class welcome extends fh_ctrl{   
    public function index(){
        global $data;
        
        $data['title'] = $this->title("Home");
    }
}