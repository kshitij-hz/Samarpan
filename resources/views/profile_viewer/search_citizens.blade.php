@extends('layouts.default')
@section('content')
<section id="team" class="parallax-section">
	<div class="container">
	<div class="row">
        <div class="col-md-1"></div>
	    <div class="col-md-10 col-sm-12 text-center">
		<h1 class="heading">Search : Senior Citizens</h1>
        <div class="card">
            <div class="content">
                <form action="{{url('view_senior_citizens')}}" method="GET">
                    {{csrf_field()}}
                    <select class="mdb-select" id="sectorAll" name="sector" required>
                        <option value="" disabled selected>Choose Sector</option>
                        <option value="Public Sector" id="public">Public Sector</option>
                        <option value="Private Sector" id="private">Private Sector</option>
                    </select>
                    <div id="addAccording2"></div>
                    <div id="inPublic"></div>
                    <div class="md-form col-md-4 pull-right">
                        <button name="submit" type="submit" class="btn-secondary-outline waves-effect form-control" id="submit">Search <i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>

@stop
