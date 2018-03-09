$(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })


  // Get image and file url and set image tag
  $(".filePath").change(function(){
    var ext = $(this).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
      if (this.files && this.files[0]) {
        var className = $(this).data('class');
        var reader = new FileReader();
        reader.onload = function (e) {
          $('.'+className).attr('href', e.target.result);
          $('.'+className).attr('src', '');
          $('span.'+className).slideDown("slow");
        }
        reader.readAsDataURL(this.files[0]);
      }
    }
    else {
      if (this.files && this.files[0]) {
        var className = $(this).data('class');
        var reader = new FileReader();
        reader.onload = function (e) {
          $('.'+className).attr('href', e.target.result);
          $('.'+className).attr('src', e.target.result);
          $('span.'+className).slideUp("slow");
        }
        reader.readAsDataURL(this.files[0]);
      }
    }
  });
  //on form submit change Admin Profile picture
$('#change_admin_profile_pic').change(function(e){
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
                $('.image-box > img').attr('src', response.img);
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
            alert('Image uploading failed');
        }
    });
});