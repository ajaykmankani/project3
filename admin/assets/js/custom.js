(function($) {
    "use strict";
    $('#sendotp').click(function(){
      $('#otp-block').show();
      $('#sendotp').hide();
      $('#validotp').show();
    });
    // $('.newv').click(function(){
    //   $('#newVeh').hide();
    //   $('#oldVeh').hide();
    //   $('#rtoNumber').show();
    // });
    $('.vehiclesde input[type="radio"]').click(function(){
      $('.oldd').hide();
      $('.neww').hide();
      var demovalue = $(this).val(); 
        $('.'+demovalue).show();
    });  
    $('.policyprev input[type="radio"]').click(function(){
      $('.prevno').show();
      var policyvalue = $(this).val(); 
        $('.'+policyvalue).hide();
    }); 
    $('.claimst input[type="radio"]').click(function(){
      $('.claimno').hide();
      var claimvalue = $(this).val(); 
        $('.'+claimvalue).show();
    });   
    $('.gst input[type="radio"]').click(function(){
      $('.gstyes').hide();
      var claimvalue = $(this).val(); 
        $('.'+claimvalue).show();
    }); 
    $('input[type="checkbox"]').click(function(){
        $('.insur').toggle();
    }); 

    $("#issuetype").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".issue-item").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{

                $(".issue-item").hide();
            }
        });
    }).change();
})(jQuery);
jQuery(document).ready(function($) {
  $(".select2").select2({
  });
});

window.setTimeout(function() {
  $(".alert").fadeTo(400, 0).slideUp(400, function(){
    $(this).remove(); 
  });
}, 3000);
