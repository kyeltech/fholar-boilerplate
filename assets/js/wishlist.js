const base_url = 'http://localhost/wishlist/'

$(document).ready(function(){
    $(document).scroll(function() {
        var y = $(this).scrollTop();
        if (y > 800) {
            $('#scrollToTop').fadeIn();
        } else {
            $('#scrollToTop').fadeOut();
        }
    });

    $('#scrollToTop').click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });
});

// custom tab scripting
var wlt_target = (el,el2) =>{
    el2 = el2 || 0;
    let fb = 0;
    if(el2 != 0){
        $('#'+el2+' :input').each(function() {
            //console.log(this.value);
            if(this.value == '') {
                $('#'+el2+' .response').html('<div class="text-danger mb-3 h6">Please fill the fields correctly</div>')
                fb++
            }
            else{
                fb--
            }
        });
        
        if(fb<=0){
            // remove all error messages
            $('.response').html('');

            // hide all other elements
            $('.wishlist-tab-content').removeClass("wl-tab-active");
            $('.wishlist-tab-content').hide();

            // show current element
            $('#'+el).fadeIn('fast'); 
        }
    }
    else{
       // hide all other elements
        $('.wishlist-tab-content').removeClass("wl-tab-active");
        $('.wishlist-tab-content').hide();

        // show current element
        $('#'+el).fadeIn('fast');    
    }
}

/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("Sidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("Sidenav").style.width = "0";
}
