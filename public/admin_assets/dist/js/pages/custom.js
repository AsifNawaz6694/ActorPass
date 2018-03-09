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