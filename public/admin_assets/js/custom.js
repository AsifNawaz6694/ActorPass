var base_url = 'http://localhost/actor-pass/';
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

//on form submit change Admin Profile picture
$('#change_admin_profile_pic').change(function(e){
    e.preventDefault();
    console.log("herezz");
    var form = new FormData(this);
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

$('.video_lecture').click(function(e){

    var link = $(this).data('message');
    var description = $(this).data('description');
    var src= base_url+"public/assets/lecturevideos/"+link;
    $("#video_link_model").attr("src", src);  
    $("#video_description > p").text(description);  

    console.log(src);
});

// $('#package_id').on('change', function(e){
//     e.preventDefault();
//     console.log("herezz");
//     console.log($(this).val());
//     var user_type_id = $(this).val();
//     if(user_type_id == 3){
//         var stu_html = `<label for="inputStatus" class="col-sm-2 control-label">Student Package</label><div class="col-sm-10">
//                                     <select name="student_package" class="form-control">
//                                         <option selected disabled>Select a Student Package</option>
//                                         <option value="1">Normal</option>
//                                         <option value="0">Premium</option>
//                                     </select>
//                                 </div>`;
//         console.log(stu_html);
//         $('#student_div').html(stu_html);
//     }else{
//           $('#student_div').html('');          
//     }
// });