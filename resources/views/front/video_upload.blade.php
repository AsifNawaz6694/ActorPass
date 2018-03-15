@extends('masterlayout')
@section('content')	
<section class="upload_section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="heading-primary">UPLOAD</h2>
				<p class="upload_content">Go ahead and upload your design</p>
				<!-- <div class="upload_icon">	<i class="fa fa-cloud-upload"></i></div> -->
				<form id="submit_video" enctype="multipart/form-data" method="POST" action="{{route('ajax_submit_video')}}">	
					{{csrf_field()}}
					<div class="icon_cloud">
						<span id="fileselector">
							<label class="btn btn-default" for="imageUpload">
								<input type="hidden" name="class_id" value="{{$class_id}}">	
								<input type="file" name="video" id="imageUpload" class="hide"/> 
								<i class="fa fa-cloud-upload"></i>
								<img src="" id="imagePreview" alt="" width="100px";/>
							</label>
						</span>
					</div>
					<br>
					<br>
					<div class="center" style="text-align: center;">
						<label class="">Description</label>
							<textarea name="description"></textarea>
					</div>
					<div class="center" style="text-align: center;">
						<button type="submit">upload</button>
					</div>
				</form>
				<p class="description">Integer vel vestibulum turpis. Nulla eros urna, molestie eu est et, laoreet aliquet libero. Cras vitae molestie erat. Donec </p>
			</div>
		</div>
	</div>
</section>
@endsection