@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-success">
				<div class="panel panel-heading">Details
				<button class="btn btn-danger" id="refresh-me"><i class="fa fa-icon fa-refresh"></i></button>
				</div>
				<div class="panel panel-body" id="loadHere">
					@if($seniorCitizens)
					@foreach ($seniorCitizens as $seniorCitizen)
						<div class="panel panel-primary">
							<div class="panel panel-body">
								<?php $senior = $seniorCitizen[0]; ?>
								Name: {{$senior->firstname}} {{$senior->lastname}}
							</div>
						</div>
					@endforeach
					@endif

					<div class="pagination"> {{ $seniorCitizens->render() }} </div>
				</div>			
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
@endsection