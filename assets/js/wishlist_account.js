loadProgressBar();

function response_display(status,msg){
    $('#response').html('<div class="alert alert-'+status+' alert-dismissible fade show" role="alert">'+msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> \n'+
    '<span aria-hidden="true">&times;</span> \n'+
  '</button></div>')
}

// signup
$(document).on('submit','#signup_form',function(e){
    e.preventDefault();
   
    let formData = $(this).serialize();
    
    axios.post(base_url+'api_create_account/', formData)
    .then(function (response) {
        if(response.data.error == 0){
            var status = 'success';
        }
        else if(response.data.error == 1){
            var status = 'warning';
        }
        
        // output response
        response_display(status,response.data.msg);

    })
    .catch(function (error) {
        // output response
        response_display('warning',error)
    });
});

// sign in
$(document).on('submit','#signin_form',function(e){
    // authenticating
    // $('#response').html('<div class="alert alert-warning">Authenticating...</div>')
    
    e.preventDefault();
   
    let formData = $(this).serialize();
    
    axios.post(base_url+'api_signin/', formData)
     .then(function (response) {
        if(response.data.error == 0){
            // output response
            response_display('success',response.data.msg)
            
            // delay account redirection by 3 seconds
            setTimeout(function(){
                window.location = base_url+'account/';
            },2000)
            console.log("Here");
        }
        else if(response.data.error == 1){
            // output response
            response_display('warning',response.data.msg)
        }
     })
     .catch(function (error) {
        // output response
        response('warning',error)
     });
})

// profile update
$(document).on('submit','#profileForm',function(e){
    e.preventDefault();
   
    let formData = $(this).serialize();
    
    axios.post(base_url+'api_profile_update/', formData)
    .then(function (response) {
        if(response.data.error == 0){
            var status = 'success';
        }
        else if(response.data.error == 1){
            var status = 'warning';
        }
        // output response
        response_display(status,response.data.msg)
    })
    .catch(function (error) {
        // output response
        response_display('warning',error)
    });
});

// security update
$(document).on('submit','#securityForm',function(e){
    e.preventDefault();
   
    let formData = $(this).serialize();
    
    axios.post(base_url+'api_security_update/', formData)
    .then(function (response) {
        if(response.data.error == 0){
            var status = 'success';
            // reset form
            $('#securityForm')[0].reset()
        }
        else if(response.data.error == 1){
            var status = 'warning';
        }
        // output response
        response_display(status,response.data.msg)
    })
    .catch(function (error) {
        response_display('warning',error)
    });
});

// console sign in
$(document).on('submit','#console_signin_form',function(e){
    // authenticating
    $('#response').html('<div class="alert alert-warning">Authenticating...</div>')
    
    e.preventDefault();
   
    let formData = $(this).serialize();
    
    axios.post(base_url+'api_console_signin/', formData)
    .then(function (response) {
        if(response.data.error == 0){
            // output response
            response_display('success',response.data.msg)
            
            // delay account redirection by 3 seconds
            setTimeout(function(){
                window.location = base_url+'console/';
            },2000)
        }
        else if(response.data.error == 1){
            // output response
            response_display('warning',response.data.msg)
        }
    })
    .catch(function (error) {
        // output response
        response('warning',error)
    });
})