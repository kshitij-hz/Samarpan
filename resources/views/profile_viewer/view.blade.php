@extends('layouts.default')
@section('content')
<section id="team" class="parallax-section">
	<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10 col-sm-12 text-center">
		@if($seniorCitizens)
			<h1 class="heading">Results : Senior Citizens</h1>
			<div class="card">
				<div class="col-md-12" style="margin-top:10px;">
				Searched For: 
				A "{{Input::get('rank')}}" employee
				@if(Input::get('position'))
					holding a position of {{Input::get('position')}}, 
				@endif
				 who worked
				@if(Input::get('company'))
					at {{Input::get('company')}}, 
				@else
					in
				@endif
				@if(Input::get('department'))
					{{Input::get('department')}}, 
				@endif
				@if(Input::get('ministry'))
					{{Input::get('ministry')}}, 
				@endif
				{{Input::get('category')}} ({{Input::get('sector')}})
				</div>
				<div class="col-md-4 pull-right">
					<a href="{{url('search_senior_citizens')}}" class="btn btn-primary waves-effect">Start a new search <i class="fa fa-search"></i></a>
				</div>
			</div>
		@foreach($seniorCitizens as $seniorCitizen)
		<?php $senior = $seniorCitizen[0]; ?>
		
			{{-- card : begin --}}
			<div class="card">
				<div class="row">
					<div class="col-md-2" style="padding: 1% 0% 0% 3%;">
					  <!--Card image-->
					<center>
						@if($senior->photo)
							<img class="img-fluid" src="{{url('photo/'.$senior->photo)}}" alt="{{$senior->name}}" style="margin-bottom:6px;">
						@else
							<img class="img-fluid" src="{{url('images/user.jpg')}}" alt="{{$senior->name}}" style="margin-bottom:6px;">
						@endif
					</center>
					  <!--/.Card image-->
					<span>
					<b class=" ">{{$senior->firstname}} {{$senior->middlename}} {{$senior->lastname}}</b>
					</span>
				</div>
					<div class="col-md-10">
						 <!--Card content-->
						<div class="card-block">
							<div class="row">
							   <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
								  <b>Expertise :</b>
							   </div>
							   <div class="col-sm-12 col-md-10 text-xs-left">
								  <p>{{$senior->expertise_in}}.</p>
							   </div>
							   <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
								  <b>Interests :</b>
							   </div>
							   <div class="col-sm-12 col-md-10 text-xs-left">
								  <p>{{$senior->interests}}.</p>
							   </div>
							   <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
								  <b>Retirement :</b>
							   </div>
							   <div class="col-sm-12 col-md-10 text-xs-left">
								  <p>{{$senior->retirement->diffForHumans()}} (At the age of 
								  {{$senior->retirement->diffInYears($senior->date_of_birth)}})</p>
							   </div>                               
							   <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
								  <b>Age :</b>
							   </div>
							   <div class="col-sm-12 col-md-4 text-xs-left">
								  <p>{{ $senior->date_of_birth->diffInYears()}} years old</p>
							   </div>
							   <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
								  <b>Location :</b>
							   </div>
							   <div class="col-sm-12 col-md-4 text-xs-left">
								  <p>{{$senior->address_current}} {{$senior->city_current}}</p>
							   </div>
							</div>
							<a href="{{url('view_senior_citizen', $senior->user_id)}}" class="btn btn-primary pull-xs-right">Full Profile</a>
							@if($senior->cv)
							<a href="{{ url('cvdownload', $senior->id) }}" class="btn btn-primary pull-xs-right">Resume</a>
							@endif
						</div>
						<!--/.Card content-->
					</div>
				</div>
			</div>
			{{-- card : end --}}
		@endforeach
			<div class="pagination">{{ $seniorCitizens->appends(Request::all())->render() }}</div>
		@endif
		</div>
	</div>
	</div>
</section>

@stop
