<?php
// fhola
class loader extends url_helper{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function loader(){
        // get dynamic data
        global $data;
        
        //loop through data var
        if(isset($data)){
            foreach($data as $key => $value){
                $$key = $value;
            }   
        }
        // load header
        if(isset($new_header) && $new_header !== NULL){
            $header = $new_header;
        }
        else{
            $header = LOADER_OPT['header'];
        }
        
        if($header !== FALSE){        
            include_once "templates/".$header.".php";   
        }
    
        if(isset($error404) && $error404 == TRUE){
            load(PAGE_404);
        }
        else if($this->count_array > $this->basename_key){
            // check dir
            $dir = (LOADER_OPT['dir'] == NULL) ? NULL : LOADER_OPT['dir']."/";

            // check if there is a get request
            if(strpos($this->page,'?') !== FALSE){
                $page = explode('?',$this->page)[0];
            }
            else{
                $page = $this->page;
            }
            
            // check if file exist
            $path = 'view/'.$dir.$page.'.php';
            
            if(!file_exists($path)){
                // check if file is html
                $path2= 'view/'.$dir.$page.'.html';
                if(!file_exists($path2)){
                    load(PAGE_404);
                }
                else{
                    include_once $path2;
                }
            }
            else{
                include_once $path;
            }
        }
        else{
            include_once 'view/welcome.php';
        }
        
        // load footer
        if(isset($new_footer) && $new_footer !== NULL){
            $footer = $new_footer;
        }
        else{
            $footer = LOADER_OPT['footer'];
        }
        
        if($footer !== FALSE){
            include_once "templates/".$footer.".php";   
        }
        include_once "misc/misc.php";
    } 
}

// fhola