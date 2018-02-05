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
      content : [ "prev", "<img src='assets/images/logo_actor.png' class='mobile-logo' />", "close" ],
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


