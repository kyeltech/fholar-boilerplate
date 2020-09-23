<?php
class Pages extends fh_ctrl{
    function index(){}
    
    function gifts(){
        global $data;
        
        $data['title'] = 'Gifts';
    }
    
    function how_it_works(){
        global $data;
        
        $data['title'] = 'How it Works';
    }
    
    function registry(){
        global $data;
        
        $data['title'] = 'Registry';
    }
    
    function faqs(){
        global $data;
        
        $data['title'] = 'FAQs';
    }
    
    function contact(){
        global $data;
        
        $data['title'] = 'Contact';
    }
    
    function console(){
        global $data;
        
        $data['new_header'] = 'no_header';
        $data['new_footer'] = 'no_footer';
    }
    
    function build(){
        global $data;
        
        $data['new_header'] = 'build_header';
        $data['new_footer'] = 'build_footer';
    }
}