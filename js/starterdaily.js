

$(document).ready(function(){

   // Time Ago

   moment.lang('es');

   // Fixed Social Icon

   $(document).on("scroll",function(){
      if($(document).scrollTop()>1200){
          $(".middle").addClass("fixedsocial");
      } else{
          $(".middle").removeClass("fixedsocial");
      }
   });

  // Function Generics Reset

    jQuery.fn.reset = function () {
        $(this).each (function() { this.reset(); });
    };

  // Validation Registro

  clearTimeout($.data(this, 'timer'));

        // Set Search String
        var search_string = $(this).val();

        // Do Search
        if (search_string == '') {
          $("ul#resultados").fadeOut();
          $('h4#resultados-text').fadeOut();
        }else{
          $("ul#resultados").fadeIn();
          $('h4#results-text').fadeIn();
          $(this).data('timer', setTimeout(searchpro, 100));
        };






  // Buttonn Like Ajax

  $('.like').click(function(){
    
    var ID         = $(this).attr("id");    
    var sid        = ID.split("Like");    
    var New_ID     = sid[1];    
    var REL        = $(this).attr("rel");    
    var URL        ='http://ohmy.gift/product_like_ajax.php';   
    var dataString = 'pid=' + New_ID +'&rel='+ REL;

    $.ajax({

      type: "POST",
      url: URL,
      data: dataString,
      cache: false,

      success: function(html){

        if(REL=='Like'){

          $("#youlike"+New_ID).slideDown('slow').prepend("<span id='you"+New_ID+"'><a href='#'>You</a> like this.</span>.");          
          $("#likes"+New_ID).prepend("<span id='you"+New_ID+"'><a href='#'>You</a>, </span>");         
          $('#'+ID).html('').attr('rel', 'Unlike').attr('title', 'Unlike').addClass('silove').removeClass('nolove');
        }

        else{

          $("#youlike"+New_ID).slideUp('slow');
          $("#you"+New_ID).remove();
          $('#'+ID).attr('rel', 'Like').attr('title', 'Like').html('').addClass('nolove').removeClass('silove');  
        }

      }
    });

    return false;
  });


}); // End jQuery document

// Function Facebook

      window.fbAsyncInit = function() {

        FB.init({
        appId      : '1379201438990837', // replace your app id here
        channelUrl : 'http://localhost/starterdaily/', 
        status     : true, 
        cookie     : true, 
        xfbml      : true  
        });
      };

      (function(d){

        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id; js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);

      }(document));

      function FBLogin(){

        FB.login(function(response){
          if(response.authResponse){
            window.location.href = "http://localhost/starterdaily/registro.php?action=fblogin";
          }
        }, {scope: 'email,user_likes'});
      }

// END Facebook Sdk Script
    







