@extends('layouts.default')
@section('content')
<style type="text/css">
	.heading{
		padding-bottom: 5%;
		color: red;
		font-size: 25px;
		text-decoration: underline;
	}
	input[type=submit] {
    padding-top: 5%;
}
</style>
<section id="team" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12">
				<h1 align="center" class="heading">Work Experiences</h1>
				@foreach($work_experiences as $experience)
				<div class="card">
					<p>Sector of Employement: {{$experience->sector}}</p>
					<p>Category: {{$experience->category}}</p>
					<p>Ministry: {{$experience->ministry}}</p>
					<p>Department: {{$experience->department}}</p>
					<p>Organization/Society/Company: {{$experience->company}}</p>
					<p>Location: {{$experience->location}}</p>
					<p>Grade Rank: {{$experience->rank}}</p>
					<p>Role in Organization: {{$experience->role}}</p>
					<p>Position Held: {{$experience->position}}</p>
					<p>Started Working: {{$experience->from->diffForHumans()}}</p>
					<p>Ended Working: {{$experience->to->diffForHumans()}}</p>
					<p>Description: {{$experience->description}}</p>
				</div>
				@endforeach
				<p>
				  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				    Add new Experience
				  </a>
				</p>
				<div class="collapse" id="collapseExample">
				  <div class="card">
					<div class="content">
						<form action="{{url('profile/add_experience')}}" method="post">
							{{csrf_field()}}
							<select class="mdb-select" id="sector" name="sector">
							    <option value="" disabled selected>Choose Sector</option>
							    <option value="Public Sector" id="public">Public Sector</option>
							    <option value="Private Sector" id="private">Private Sector</option>
							</select>

							<div id="addAccording">
							</div>

							<div id="inPublic">
							</div>

							<!-- <label>Enter Org/Society/Company:</label> -->
							<!-- <div class="md-form">
								<input name="company" type="text" class="form-control" placeholder="Enter organization/Society/Company name" id="company">
							</div>
							<div class="md-form">
								<input name="location" type="text" class="form-control" placeholder="Enter Location" id="location">
							</div>
							<div class="md-form">
								<select name="rank" id="rank" class="mdb-select">
									<option value="" disabled selected>Choose Grade Rank</option>
									<option value="Group A">Group A or Grade Rank 1</option>
									<option value="Group A">Group B or Grade Rank 2</option>
									<option value="Group A">Group C or Grade Rank 3</option>
									<option value="Group A">Group D or Grade Rank 4</option>
								</select>
							</div>
							<div class="md-form">
								<input name="position" type="text" class="form-control" placeholder="Enter your Position" id="position">
							</div>
							<div class="md-form">
								<input name="role" type="text" class="form-control" placeholder="Enter your Role" id="role">
							</div>
							<div class="md-form">
								<div class="col-md-3"><label>Start date: </label></div>
								<div class="col-md-9"><input name="from" type="date" class="form-control" placeholder="Start date"></div>
							</div>
							<div class="md-form">
								<div class="col-md-3"><label>End date: </label></div>
								<div class="col-md-9"><input name="to" type="date" class="form-control" placeholder="End date"></div>
							</div>
							<div class="md-form">
								<textarea name="description" rows="1" class="md-textarea form-control" placeholder="Enter Description"></textarea>
							</div> -->
							<div class="md-form col-md-4 pull-right">
								<input name="submit" type="submit" class="btn-secondary-outline waves-effect form-control" id="submit" value="SUBMIT">
							</div>
						</form>
					</div>	
				  </div>
				</div>		
				
			</div>
		</div>
	</div>		
</section>
@stop
