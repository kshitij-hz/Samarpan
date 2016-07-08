@extends('layouts.default')
@section('content')
<section id="team" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12">
				<div class="card">
					<div class="title-style text-center">
						<h1 class="heading">Edit Profile</h1>
					</div>	
					<div class="content">
						@if($errors->any())
							<ul class="alert alert-danger">
								@foreach($errors->all() as $error)
									<li>{{$error}}</li>
								@endforeach
							</ul>
						@endif
						<form action="profile/update" method="POST" files="true" enctype="multipart/form-data">
							{{csrf_field()}}
							<label>Company Full Name:</label>
					        <div class="md-form">
				                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Full Name" value="{{$details->firstname}}">
						    </div>	
						    <label>Date of Origin:</label>
							<div class="md-form">
								<input name="date_of_birth" type="date" class="form-control" id="date_of_birth" placeholder="Date of Birth" value="{{$details->date_of_birth->toDateString()}}">
							</div>
							<label>Primary Contact No:</label>
							<div class="md-form">
								<input name="contact_mobile" type="number" class="form-control" id="mobNumber" placeholder="Contact Number" disabled value="{{Auth::user()->contact}}">
							</div>
							<label>Contact Work:</label>
							<div class="md-form">
								<input name="contact_work" type="number" class="form-control" id="mobNumber" placeholder="Work's Number" value="{{$details->contact_work}}">
							</div>
							<label>Contact Fax:</label>
							<div class="md-form">
								<input name="contact_fax" type="number" class="form-control" id="mobNumber" placeholder="Fax Contact Number" value="{{$details->contact_fax}}">
							</div>
							<label>Contact Pager:</label>
							<div class="md-form">
								<input name="contact_pager" type="text" class="form-control" id="mobNumber" placeholder="Contact Pager" value="{{$details->contact_pager}}">
							</div>
							<label>Any Other Contact No:</label>
							<div class="md-form">
								<input name="contact_alternate" type="number" class="form-control" id="mobNumber" placeholder="Other Contact Number" value="{{$details->contact_other}}">
							</div>
							<label>Primary Email Address:</label>
							<div class="md-form">
								<input name="email_personal" type="email" class="form-control" id="email" placeholder="Primary Email Address" value="{{Auth::user()->email}}" disabled>
							</div>
							<label>Work Email Address:</label>
							<div class="md-form">
								<input name="email_work" type="email" class="form-control" id="email" placeholder="Work Email Address" value="{{$details->email_work}}" disabled>
							</div>
							<label>Other Email Address:</label>
							<div class="md-form">
								<input name="email_other" type="email" class="form-control" id="email" placeholder="Alternate Email Address" value="{{$details->email_other}}">
							</div>
							<label>Complete Office Address:</label>
							<div class="md-form">
								<textarea name="address_permanent" rows="1" class="md-textarea form-control" placeholder="Office Address" value="">{{$details->address_permanent}}</textarea>
							</div>
							<div class="row">
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="city_permanent" class="form-control" placeholder="City" value="{{$details->city_permanent}}">
						            </div>
						        </div>
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="state_permanent" class="form-control" placeholder="State" value="{{$details->state_permanent}}">
						            </div>
						        </div>
						    </div>
						    <div class="row">
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="country_permanent" class="form-control" placeholder="Country" value="{{$details->country_permanent}}">
						            </div>
						        </div>
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="pincode_permanent" class="form-control" placeholder="Pincode" value="{{$details->pincode_permanent}}">
						            </div>
						        </div>
						    </div>
						    <label>Complete Alternate Address:</label>
							<div class="md-form">
								<textarea name="address_alternate" rows="1" class="md-textarea form-control" placeholder="Alternate Address" value="">{{$details->address_alternate}}</textarea>
							</div>
							<div class="row">
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="city_alternate" class="form-control" placeholder="City" value="{{$details->city_alternate}}">
						            </div>
						        </div>
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="state_alternate" class="form-control" placeholder="State" value="{{$details->state_alternate}}">
						            </div>
						        </div>
						    </div>
						    <div class="row">
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="country_alternate" class="form-control" placeholder="Country" value="{{$details->country_alternate}}">
						            </div>
						        </div>
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="pincode_alternate" class="form-control" placeholder="Pincode" value="{{$details->pincode_alternate}}">
						            </div>
						        </div>
						    </div>
						    <label>Description:</label>
							<div class="md-form">
								<textarea name="description" rows="1" class="md-textarea form-control" placeholder="Description" >{{$details->description}}</textarea>
							</div>
							<label>Expertise in:</label>
							<div class="md-form">
								<input name="expertise_in" type="text" class="form-control" placeholder="Field of Expertise" value="{{$details->expertise_in}}">
							</div>
							<label>No. of Members:</label>
							<div class="md-form">
								<input type="number" name="members" class="form-control" placeholder="No. of Members" value="{{$details->members}}">
							</div>
							<label>Facebook Profile link:</label>
							<div class="md-form">
								<input name="fb" type="text" class="form-control" placeholder="fb Profile link" value="{{$details->fb}}">
							</div>
							<label>Google+ Profile link:</label>
							<div class="md-form">
								<input name="google" type="text" class="form-control" placeholder="Google+ Profile link:" value="{{$details->google}}">
							</div>
							<label>LinkedIn Profile link:</label>
							<div class="md-form">
								<input name="linkedin" type="text" class="form-control" placeholder="LinkedIn Profile link" value="{{$details->linkedin}}">
							</div>
							<label>Skype ID:</label>
							<div class="md-form">
								<input name="skype" type="text" class="form-control" placeholder="Skype ID" value="{{$details->skype}}">
							</div>
							<label>Website link:</label>
							<div class="md-form">
								<input name="website" type="text" class="form-control" placeholder="Website link" value="{{$details->website}}">
							</div>
							<label>Update Company's logo:</label>
							<div class="file-field">
						        <div class="btn btn-primary">
						            <span>Choose file</span>
						            <input type="file" name="photofile" id="photofile">
						        </div>
						        <div class="file-path-wrapper">
						           <input class="file-path validate" type="text" placeholder="Upload a logo">
						        </div>
						    </div>
							<div class="md-form col-md-4 pull-right">
								<input name="submit" type="submit" class="btn-secondary-outline waves-effect form-control" id="submit" value="Update Portfolio">
							</div>
						</form>
					</div>	
				</div>
			</div>
		</div>
	</div>		
</section>
@stop