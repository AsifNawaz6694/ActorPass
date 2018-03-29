<?php include 'header.php'; ?>

<section class="upload_section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="heading-primary">UPLOAD</h2>
				<p class="upload_content">Go ahead and upload your design</p>

				<!--<div class="upload_icon"><i class="fa fa-cloud-upload"></i></div>-->
				<form enctype="multipart/form-data" method="POST" action="#">
					
					<div class="icon_cloud">
						<span id="fileselector">
							<label class="btn btn-default" for="imageUpload">
								<input type="file" name="imageUpload" id="imageUpload" class="hide"/> 

								<i class="fa fa-cloud-upload"></i>
								<img src="" id="imagePreview" alt="" width="100px";/>

								


							</label>
						</span>

					</div>
				</form>
				

				
				<p class="description">Integer vel vestibulum turpis. Nulla eros urna, molestie eu est et, laoreet aliquet libero. Cras vitae molestie erat. Donec.Integer vel vestibulum turpis. Nulla eros urna, molestie eu est et, laoreet aliquet libero. Cras vitae molestie erat. Donec.Integer vel vestibulum turpis. Nulla eros urna, molestie eu est et, laoreet aliquet libero. Cras vitae molestie erat. Donec </p>
			</div>
		</div>
	</div>







</section>

<?php include 'footer.php'; ?>