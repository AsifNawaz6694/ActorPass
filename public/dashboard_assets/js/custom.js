$(document).ready(function () {


    /* Classes Datatable users Profile */
    $('#classesTable').DataTable();

    /*oclassTable = $('#classes').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": 'http://localhost/actor-pass/' + "/dashboard/get-classes-dt",
          "columns": [
              {data: 'title', name: 'title'},
              {data: 'fullname', name: 'fullname'},
              {data: 'cost', name: 'cost'},
              {data: 'age', name: 'age'},
          ]
    }); */


    $('.dashboard_navigation ul li a').click(function () {
        $('ul li a').removeClass("actives");
        $(this).addClass("actives");
    });

    ///*===THis is avatar Box image change function ===*/
    $('.camera_image i').on('click', function () {
        $('#image_upload').trigger('click');
        var Img = $('#image_upload').val();
    });
    ///*===End Avatar Image Function ===*//

    var Window_Height_right = $('.right_dash').height();
    var Window_Height_left = $('.left_dash').height();

    if (Window_Height_right <= Window_Height_left) {
        $('.right_dash').css({'height': Window_Height_left + 'px', 'background-color': '#ffffff'});
    } else {
        $('.left_dash').css({'height': Window_Height_right + 'px', 'background-color': '#ffffff'});
    }

    //Responsive Jquery
    if ($(window).width() < 767) {
        var btn_menu = $('<button type="button" class="btn btn-primary btn_menu" id="mob_menu"><i class="fa fa-bars" aria-hidden="true"></i></button>');
        $('.dashboard_left_side').append(btn_menu);
        $('#mob_menu').on('click', function () {
            $('.dashboard_navigation ul').toggle('slow');
        });
        $('.left_dash').css({'height': 'auto', 'background-color': '#ffffff'});

        $('.navbar-form').addClass('clearfix');
    }

    //Image Upload Jquery
    $("#image_upload").change(function(e){
       e.preventDefault();
       console.log("Image uploadz");

        var image = $('#image_upload')[0].files[0];
        var form = new FormData();
        var url = $("#Singleimage_upload_form").attr('action');

        form.append('image_upload', image);
        console.log(form);
 
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
        });

        $.ajax({
              type: 'post',
              url: url,             
              data: form,             
              processData: false,
              contentType: false,
              success: function(response){
                console.log(response);
                location.reload();
              },
              error: function(response){
                   console.log(response);

                  console.log('Image uploading failed');
              }
          });
    });

});


