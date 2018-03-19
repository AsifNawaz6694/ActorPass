$(document).ready(function () {
    //for jquery functions


  // call validation on form
  $("#Sign_up_form").validate();

  //contact form validation
  $("#contact_form").validate();
  
   //signin form validation
  $("#signin_form").validate();
    
     //signin form validation
  $("#registration_form").validate();

    //monthly cost
  $("#monthlycost_form").validate();
});


$(function() {
        
  $("#my-menu").mmenu({
    extensions  : [ "shadow-panels", "fx-panels-slide-100", "border-none", "theme-black", "fullscreen" ],
    navbars   : {
      content : [ "prev", "<img src='public/assets/images/logo_actor.png' class='mobile-logo' />", "close" ],
      height  : 2
    },
    setSelected: true,
    searchfield: {
      resultsPanel: true
    }}, { 
  });

  $(".mh-head.mm-sticky").mhead({
    scroll: {
      hide: 200
    }
  });

  $(".mh-head:not(.mm-sticky)").mhead({
    scroll: false
  });

  $('body').on( 'click',
    'a[href^="#/"]',
    function() {
      alert( "Thank you for clicking, but that's a demo link." );
      return false;
    }
  );
});

//for custom javascript functions function

//on form submit Upload Video And Description
$('#submit_video').submit(function(e){
    e.preventDefault();
    console.log("herezz");
    var form = new FormData(this);
     $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
      });  
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: form,
        processData: false,
        contentType: false,
        success: function(response){
            if(response.code === 200){              
                // alert(response.img);
            }
            if(response.code === 202){
                // alert(response.error);
                //alert(response.img);
            }
            if(response.code === 202){
                //alert(response.error);
            }
        },
        error: function(){
            alert('Video uploading failed');
        }
    });
});



//on form submit change Cover Photo Of Student Profile
$('#change_cover').change(function(e){
   e.preventDefault();
    console.log("herezz");
    var form = new FormData(this);
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
      });  
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: form,
        processData: false,
        contentType: false,
        success: function(response){
            console.log(response);
            if(response.code === 200){
              location.reload();
                //$('.img_banner > img').attr('src', response.img);
                // alert(response.img);
            }
            if(response.code === 302){
                location.reload();
                // alert(response.error);
                //alert(response.img);
            }
            if(response.code === 202){
                //alert(response.error);
            }
        },
        error: function(){
            alert('Image uploading failed');
        }
    });
});

