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
			<div class="col-md-offset-2 col-md-8 col-sm-12" id="accordion">
				<h1 align="center" class="heading">Work Experiences</h1>
				<p>
					<a class="btn btn-primary" data-toggle="collapse" href="#add" aria-expanded="false" data-parent="#accordion">
					Add new Work Experience <i class="fa fa-plus"></i>
					</a>
				</p>
				<div class="collapse" id="add">
				  <div class="card">
					<div class="content">
						@if($errors->any())
							<ul class="alert alert-danger">
								@foreach($errors->all() as $error)
									<li>{{$error}}</li>
								@endforeach
							</ul>
						@endif
						<form action="{{url('profile/add_experience')}}" method="post">
							{{csrf_field()}}
							<select class="mdb-select" required id="sector" name="sector">
						    <option value="" disabled selected>Choose Sector</option>
							    <option value="Public Sector" id="public">Public Sector</option>
							    <option value="Private Sector" id="private">Private Sector</option>
							</select>

							<div id="addAccording">
							</div>

							<div id="inPublic">
							</div>
							<div class="md-form col-md-4 pull-right">
								<input name="submit" type="submit" class="btn-secondary-outline waves-effect form-control" id="submit" value="SUBMIT">
							</div>
						</form>
					</div>	
				  </div>
				</div>
				@foreach($work_experiences as $experience)
				<div class="card">
					<table class="table">
					  <thead>
					    <tr>
					      <td colspan="2" class="text-center"><strong>Organization/Society/Company:</strong> {{$experience->company}}</td>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
							<td><strong>Started Working:</strong> {{$experience->from->diffForHumans()}}</td>
					      	<td><strong>Ended Working:</strong> {{$experience->to->diffForHumans()}}</td>
					    </tr>
					    <tr>
					    	<td><strong>Sector of Employement:</strong> {{$experience->sector}}</td>
					    	<td><strong>Category:</strong> {{$experience->category}}</td>
					    </tr>
					    <tr>
					    	<td><strong>Ministry:</strong> {{$experience->ministry}}</td>
					    	<td><strong>Department:</strong> {{$experience->department}}</td>
					    </tr>
					    <tr>
					    	<td><strong>Role in Organization:</strong> {{$experience->role}}</td>
					    	<td><strong>Grade Rank:</strong> {{$experience->rank}}</td>
					    </tr>
					    <tr>
					    	<td><strong>Position Held:</strong> {{$experience->position}}</td>
					    	<td><strong>Location:</strong> {{$experience->location}}</td>
					    </tr>
					    <tr>
					    	<td colspan="2"><strong>Description:</strong> {{$experience->description}}</td>
					    </tr>
					  </tbody>
					</table>
				</div>
				@endforeach
					
				
			</div>
		</div>
	</div>		
</section>
@stop
