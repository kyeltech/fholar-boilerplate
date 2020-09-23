let tags_list = [];

function add_tag(){
    let tag = $("input[name='tag']").val();
    if (tag !== '') {
        tags_list.push(tag);
        $("input[name='tag']").val('');
        $("input[name='tag']").focus();
    
        // console.log()
        let html = '';
        tags_list.forEach(tag => {
            html += `
                <div class="alert alert-primary alert-dismissible fade show mr-2" role="alert">
                    <span>${tag}</span>
                    <button type="button" onclick="removeTag('${tag}')" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            `;
        });
       
    
        html += '<input type="text" class="form-control" id="tagForm" name="tag" placeholder="Tag Name" onblur="add_tag();" />';
    
        $("#tags_cont").html(html);

        $("input#tagForm").focus();

        
    }


}


function removeTag(tag){
    // let tags_lists = JSON.parse(sessionStorage.tags_list);
    tags_list = tags_list.filter(tag_name => tag_name !== tag);
    

}

// added tags
$(() => {
    let ue_code = window.location.pathname.split('/')[5];

    axios
     .post(base_url+'api_get_event_tags', {ue_code})
     .then(res => {
        if(res.data.error === 0){
            tags_list = res.data.tags.split(',');
            tags_list = tags_list.filter(tag => tag !== '');

            let html = '';
            tags_list.forEach(tag => {
                html += `
                    <div class="alert alert-primary alert-dismissible fade show mr-2" role="alert">
                        <span>${tag}</span>
                        <button type="button" onclick="removeTag('${tag}')" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                `;
            });
        
        
            html += '<input type="text" class="form-control" id="tagForm" name="tag" placeholder="Tag Name" onblur="add_tag();" />';
        
            $("#tags_cont").html(html);

        }
     })
     .catch(err => {
        console.log(err);
     })
})

$(() => {
    $("#second_event_tab").fadeOut();
    
    // go to second tab
    $("#to_second_tab").click(() => {
        $("#first_event_tab").fadeOut('slow', () => {
            $("#second_event_tab").fadeIn();
        });
    });
    
    // previous go to first tab
    $("#to_first_tab").click(() => {
        $("#second_event_tab").fadeOut('slow', () => {
            $("#first_event_tab").fadeIn();
        });
    });

    

});


// load image file
$("input[name='image_icon']").change(() => {
    if ($("input[name='image_icon']").val() !== '') {
        
        let img = $("input[name='image_icon']")[0].files[0].name;
        $("#img_cont").html(`<div class="alert alert-primary">${img}</div>`);
    }
    else{
        $("#img_cont").html('');
    }

})

// validation for the event fields
setInterval(() => {
    let groom, bride, celebrant, bridal_shower, baby, housewarming = '';
    // if ($("input[name='groom']").length == 1 && $("input[name='bride']").length === 1) {
    //     groom = $("input[name='groom']").val();
    //     bride = $("input[name='bride']").val();
    // }
    // else if ($("input[name='celebrant']").length === 1) {
    //     celebrant = $("input[name='celebrant']").val();
    // }
    // else if ($("input[name='bridal_shower']").length === 1) {
    //     bridal_shower = $("input[name='bridal_shower']").val();
    // }
    // else if ($("input[name='baby']").length === 1) {
    //     baby = $("input[name='baby']").val();
    // }
    // else if ($("input[name='housewarming']").length === 1) {
    //     housewarming = $("input[name='housewarming']").val();
    // }
    
    let imageFile = $("input[name='image_icon']").val();
    let event_date = $("input[name='event_date']").val();
    let greetings_message = $("textarea[name='greetings_message']").val();
    let tag = tags_list.length;
    
    // let imageFile = $("input[name='imageFile']").val();

    if(window.location.pathname === '/wishlist/account/event/wedding'){
        groom = $("input[name='groom']").val();
        bride = $("input[name='bride']").val();
        if(!groom || !bride || !imageFile || !event_date || !greetings_message || tag === 0){
            $("button#to_second_tab").attr('disabled', 'disabled');
        }
        else{
            $("button#to_second_tab").removeAttr('disabled');

        }
    }
    else if(window.location.pathname === '/wishlist/account/event/birthday'){
        celebrant = $("input[name='celebrant']").val();
        if(!celebrant || !imageFile || !event_date || !greetings_message || tag === 0){
            $("button#to_second_tab").attr('disabled', 'disabled');
        }
        else{
            $("button#to_second_tab").removeAttr('disabled');

        }
    }
    else if(window.location.pathname === '/wishlist/account/event/bridal-shower'){
        bridal_shower = $("input[name='bridal_shower']").val();
        if(!bridal_shower || !imageFile || !event_date || !greetings_message || tag === 0){
            $("button#to_second_tab").attr('disabled', 'disabled');
        }
        else{
            $("button#to_second_tab").removeAttr('disabled');

        }
    }
    else if(window.location.pathname === '/wishlist/account/event/baby-shower'){
        baby = $("input[name='baby']").val();
        if(!baby || !imageFile || !event_date || !greetings_message || tag === 0){
            $("button#to_second_tab").attr('disabled', 'disabled');
        }
        else{
            $("button#to_second_tab").removeAttr('disabled');

        }
    }
    else if(window.location.pathname === '/wishlist/account/event/housewarming'){
        housewarming = $("input[name='housewarming']").val();
        if(!housewarming || !imageFile || !event_date || !greetings_message || tag === 0){
            $("button#to_second_tab").attr('disabled', 'disabled');
        }
        else{
            $("button#to_second_tab").removeAttr('disabled');

        }
    }
    
}, 1000);

// create event
$(() => {
    
    $("#third_event_tab").fadeOut();
    
    $(document).on("submit", "#create_event_form", function(e){
        e.preventDefault();
        let formData = new FormData(this);
        // console.log(formData);
    
        axios
         .post(base_url+'api_create_event', formData)
         .then(res => {
    
                // console.log(res);
                if (res.data.error == 1) {
                    response_display('danger', res.data.msg); 
                    $("#response").focus();
                }
                else{
    
                    // save tags
                    axios
                    .post(base_url+`api_save_event_tags`, {ue_id: res.data.ue_id, tags: tags_list})
                    .then(response => {
    
                        if (response.data.error == 1) {
                            response_display('danger', response.data.msg); 
                            $("#response").focus();
                        }
                        else{
                            // go to third tab
                            $("#second_event_tab").fadeOut('slow');
                            $("#first_event_tab").fadeOut('slow');
                            $("#third_event_tab").removeClass(' d-none').fadeIn();
    
                        }
    
                    });
                    
                    
                }
    
            })
            .catch(err => {
                console.log(err);
            })
            
    });

})

// choose delivery/shipping address
function choose_address(delivery_id) {
    
    axios
     .post(base_url+'api_choose_address', {delivery_id})
     .then(res => {
         if(res.data.error === 0){

             let html = '';

             res.data.delivery_addresses.map(delivery => {
                html += `
                    <div class="d-flex py-3 border-bottom">
                                                
                        <div class="align-self-center">
                            <a href="#" class="text-primary">
                                ${delivery.address}, ${delivery.delivery_city}, ${delivery.delivery_state}, ${delivery.delivery_country}<br />
                                Zip Code: ${delivery.zip_code}, ${delivery.delivery_tel}<br/>
                                <span class="text-muted">Added ${delivery.delivery_created_at}</span>
                            </a>
                        </div>
                        <div class="align-self-center ml-auto view-btn">
                        `;

                        if(parseInt(delivery_id) === parseInt(delivery.delivery_id)){
                            html += `
                                <a class="btn btn-outline-primary btn-sm float-right" id='choose_address${delivery.delivery_id}' disabled>Selected <i class="fa fa-check-circle"></i></a>
                            `;

                        }
                        else{
                            html += `
                                <a class="btn btn-primary btn-sm float-right" id='choose_address${delivery.delivery_id}' onclick="choose_address(${delivery.delivery_id})" >Choose <i class="fa fa-check-circle"></i></a>
                            `;

                        }

                html += `
                        </div>
                    </div>
                `;


             });

             $("#delivery_address_cont").html(html);

             $("#shipping_address_fields").fadeOut('slow', () => {
                 $("input[name='address']").removeAttr("required");
                 $("input[name='zip']").removeAttr("required");
                 $("input[name='city']").removeAttr("required");
                 $("input[name='state']").removeAttr("required");
                 $("select[name='country']").removeAttr("required");
                 $("input[name='tel']").removeAttr("required");

                 $("#create_shipping_address").removeClass(' d-none').fadeIn();
             });
         }
     })
     .catch(err => {
        console.log(err);
     });

}

// Create shipping address
$(() => {
    $("#create_shipping_address").click(() => {
        $("#shipping_address_fields").fadeIn('slow', () => {
            $("#create_shipping_address").addClass(" d-none").fadeOut();
        });
    });
});

// update event

$(() => {
    
    $("#third_event_tab").fadeOut();
    
    $(document).on("submit", "#update_event_form", function(e){
        e.preventDefault();
        let formData = new FormData(this);
        console.log(formData);
    
        axios
         .post(base_url+'api_update_event', formData)
         .then(res => {
    
                // console.log(res);
                if (res.data.error == 1) {
                    response_display('danger', res.data.msg); 
                    $("#response").focus();
                }
                else{
    
                    // save tags
                    axios
                    .post(base_url+`api_update_event_tags`, {ue_id: res.data.ue_id, tags: tags_list})
                    .then(response => {
    
                        if (response.data.error == 1) {
                            response_display('danger', response.data.msg); 
                            $("#response").focus();
                        }
                        else{
                            // go to third tab
                            window.location = base_url+'account/my-events';
    
                        }
    
                    });
                    
                    
                }
    
            })
            .catch(err => {
                console.log(err);
            })
            
    });

})