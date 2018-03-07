@extends('masterlayout')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="about_content">
				CONTACT US
			</h3>
			<h3 class="content_middle">
				Over the phone or online
			</h3>
			
		</div>
	</div>
</div>



<div class="container">
	<div class="row">
		<div class="col-md-6 form">
			<p class="about_paragraph">
				If you're talented and looking for a job, contact us here:
			</p>

			<div class="form-area">  
				<form role="form" id="contact_form">
					
					
					<div class="form-group">
						<label>NAME</label>
						<input type="text" class="form-control required fullname" id="name" name="name">
					</div>
					<div class="form-group">
						<label>EMAIL</label>
						<input type="text" class="form-control required email" id="email" name="email">
					</div>
					<div class="form-group">
						<label>SUBJECT</label>
						<input type="text" class="form-control required" id="address" name="address">
					</div>
					
					<div class="form-group">
						<label>MESSAGE</label>
						<textarea class="form-control required" type="textarea" id="message" maxlength="140" rows="7"></textarea>
						
					</div>
					
					<div class="button_submit"><button type="button" id="submit" name="submit" class="btn btn-primary pull-right">SEND MESSAGE
					</button></div>
				</form>
			</div>

		</div>
		<div class="col-md-6 form">
			<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.uk/maps?f=q&source=s_q&hl=en&geocode=&q=15+Springfield+Way,+Hythe,+CT21+5SH&aq=t&sll=52.8382,-2.327815&sspn=8.047465,13.666992&ie=UTF8&hq=&hnear=15+Springfield+Way,+Hythe+CT21+5SH,+United+Kingdom&t=m&z=14&ll=51.077429,1.121722&output=embed"></iframe>
			
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<ul class="address_contact">
						<li>Email us at: info@mysite.com</li>
						<li>Call us at: 123-456-7890</li>
						
					</ul>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<ul class="address_contact_right">
						<li>Visit us at: ABC 12 Road,</li>
						<li>Lorem Ipsum</li>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection