@extends('masterlayout')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="about_content">
				THIS MONTH'S ONLINE CLASSES
			</h3>
		</div>
	</div>
	<hr>
</div>
<section class="takeatime">
	<div class="container">
		@foreach($classes as $class)
		<div class="row">
			<div class="col-md-3">
				@if(!empty($class->profile_pic) || $class->profile_pic != '' )
					<div class="image_takeatime">
						<img src="{{ asset('public/storage/profile-pictures/' . $class->profile_pic) }}">
					</div>
					@else
					<div class="image_takeatime">
						<img src="{{ asset('public/storage/profile-pictures/placeholder.png') }}">
					</div>
				@endif
				<div class="image_content">
					<img src="{{ asset('public/assets/images/take_image.png') }}">
				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-9">
						<h3 class="s_main_content">
							{{$class->title}}
						</h3>
						<h3 class="inner_content">
							with {{$class->fullname}}
						</h3>
						<h3 class="small_content">
							DEADLINE TO SIGN UP: {{date('F-m-Y', strtotime($class->date))}}
						</h3>
					</div>
					<div class="col-md-3">
						<div class="button_take"><a href="{{$class->link}}" class="btn" type="button">SIGN UP NOW</a></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p class="content_take">{!!html_entity_decode($class->description)!!}</p>
					</div>
				</div>
			</div>
		</div>
		<hr>
		@endforeach
	</div>
		<div class="pagination">
			{{ $classes->render() }}
		</div>
</section>
@endsection