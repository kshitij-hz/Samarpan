@extends('layouts.default')
@section('content')

	@if(!count($details))
		@include('profile_viewer.registration')	
	@else
		<section id="home" class="parallax-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<h1>Welcome</h1><br>
						<h3>{{Auth::user()->name}}</h3>
						<br><br>
						<a class="btn btn-primary btn-circle btn-x1">
						View Profile<br>
						<i class="fa fa-arrow-down"></i>
						</a>
					</div>
				</div>
			</div>		
		</section>
	@endif
@stop