AOS.init();

$(document).ready(function () {
    //for jquery functions

});
 //for AOS Animation
 
//for custom javascript functions function

$('.collapse').on('shown.bs.collapse', function(){
$(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
}).on('hidden.bs.collapse', function(){
$(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
});


$('#imageUpload').change(function(){			
			readImgUrlAndPreview(this);
			function readImgUrlAndPreview(input){
				 if (input.files && input.files[0]) {
			            var reader = new FileReader();
			            reader.onload = function (e) {			            	
			                $('#imagePreview').attr('src', e.target.result);
							}
			          };
			          reader.readAsDataURL(input.files[0]);
			     }	
		});