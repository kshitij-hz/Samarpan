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
						<form action="profile/update" method="POST" enctype="multipart/form-data" files="true">
							{{csrf_field()}}
							<label>Full Name:</label>
							<div class="row">
						        <div class="col-md-4">
						            <div class="md-form">
						                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First Name" value="{{$details->firstname}}">
						                @if ($errors->has('firstname'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('firstname') }}</strong>
				                            </span>
				                        @endif
						            </div>
						        </div>
						        <div class="col-md-4">
						            <div class="md-form">
						                <input type="text" id="middlename" name="middlename" class="form-control" placeholder="Middle Name" value="{{$details->middlename}}">
						                @if ($errors->has('middlename'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('middlename') }}</strong>
				                            </span>
				                        @endif
						            </div>
						        </div>
						        <div class="col-md-4">
						            <div class="md-form">
						                <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last Name" value="{{$details->lastname}}">
						                @if ($errors->has('lastname'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('lastname') }}</strong>
				                            </span>
				                        @endif
						            </div>
						        </div>
						    </div>	
						    <label>Date of Birth:</label>
							<div class="md-form">
								<input name="date_of_birth" type="date" class="form-control" id="date_of_birth" placeholder="Date of Birth" value="{{$details->date_of_birth->toDateString()}}">
								@if ($errors->has('date_of_birth'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('date_of_birth') }}</strong>
		                            </span>
		                        @endif
							</div>

							<label>Choose Gender:</label>
							<div class="form-inline">
								@if($details->gender == "male")
					            	<fieldset class="form-group">
						                <input name="gender" type="radio" id="male" value="male" checked="checked">
						                <label for="male">Male</label>
						            </fieldset>

						            <fieldset class="form-group">
						                <input name="gender" type="radio" id="male" value="female">
						                <label for="female">Female</label>
						            </fieldset>

						            <fieldset class="form-group">
						                <input name="gender" type="radio" id="other" value="other">
						                <label for="other">Other</label>
						            </fieldset>
					            @elseif($details->gender == "female")
					            	<fieldset class="form-group">
						                <input name="gender" type="radio" id="male" value="male">
						                <label for="male">Male</label>
						            </fieldset>

						            <fieldset class="form-group">
						                <input name="gender" type="radio" id="male" value="female" checked="checked">
						                <label for="female">Female</label>
						            </fieldset>

						            <fieldset class="form-group">
						                <input name="gender" type="radio" id="other" value="other">
						                <label for="other">Other</label>
						            </fieldset>
					            @elseif($details->gender == "others")
					            	<fieldset class="form-group">
						                <input name="gender" type="radio" id="male" value="male">
						                <label for="male">Male</label>
						            </fieldset>

						            <fieldset class="form-group">
						                <input name="gender" type="radio" id="male" value="female">
						                <label for="female">Female</label>
						            </fieldset>

						            <fieldset class="form-group">
						                <input name="gender" type="radio" id="other" value="other" checked="checked">
						                <label for="other">Other</label>
						            </fieldset>
					            @endif

							</div>	

							<label>Primary Contact No:</label>
							<div class="md-form">
								<input name="contact_mobile" type="number" class="form-control" id="mobNumber" placeholder="Contact Number" disabled value="{{Auth::user()->contact}}">
							</div>
							<label>Contact Home:</label>
							<div class="md-form">
								<input name="contact_home" type="number" class="form-control" id="mobNumber" placeholder="Home's Number" value="{{$details->contact_home}}">
								@if ($errors->has('contact_home'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('contact_home') }}</strong>
		                            </span>
		                        @endif
							</div>
							<label>Contact Fax:</label>
							<div class="md-form">
								<input name="contact_fax" type="number" class="form-control" id="mobNumber" placeholder="Fax Contact Number" value="{{$details->contact_fax}}">
								@if ($errors->has('contact_fax'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('contact_fax') }}</strong>
		                            </span>
		                        @endif
							</div>
							<label>Contact Pager:</label>
							<div class="md-form">
								<input name="contact_pager" type="text" class="form-control" id="mobNumber" placeholder="Contact Pager" value="{{$details->contact_pager}}">
								@if ($errors->has('contact_pager'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('contact_pager') }}</strong>
		                            </span>
		                        @endif
							</div>
							<label>Any Other Contact No:</label>
							<div class="md-form">
								<input name="contact_alternate" type="number" class="form-control" id="mobNumber" placeholder="Other Contact Number" value="{{$details->contact_other}}">
								@if ($errors->has('contact_alternate'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('contact_alternate') }}</strong>
		                            </span>
		                        @endif
							</div>
							<label>Personal Email Address:</label>
							<div class="md-form">
								<input name="email_personal" type="email" class="form-control" id="email" placeholder="Personal Email Address" value="{{Auth::user()->email}}" disabled>
								@if ($errors->has('email_personal'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('email_personal') }}</strong>
		                            </span>
		                        @endif
							</div>
							<label>Other Email Address:</label>
							<div class="md-form">
								<input name="email_other" type="email" class="form-control" id="email" placeholder="Alternate Email Address" value="{{$details->email_other}}">
								@if ($errors->has('email_other'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('email_other') }}</strong>
		                            </span>
		                        @endif
							</div>
							<label>Complete Permanent Address:</label>
							<div class="md-form">
								<textarea name="address_permanent" rows="1" class="md-textarea form-control" placeholder="Permanent Address" value="">{{$details->address_permanent}}</textarea>
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
						                <input type="number" name="pincode_permanent" class="form-control" placeholder="Pincode" value="{{$details->pincode_permanent}}">
						            </div>
						        </div>
						    </div>
						    <label>Complete Current Address:</label>
							<div class="md-form">
								<textarea name="address_current" rows="1" class="md-textarea form-control" placeholder="Current Address" value="">{{$details->address_current}}</textarea>
							</div>
							<div class="row">
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="city_current" class="form-control" placeholder="City" value="{{$details->city_current}}">
						            </div>
						        </div>
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="state_current" class="form-control" placeholder="State" value="{{$details->state_current}}">
						            </div>
						        </div>
						    </div>
						    <div class="row">
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="country_current" class="form-control" placeholder="Country" value="{{$details->country_current}}">
						            </div>
						        </div>
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="number" name="pincode_current" class="form-control" placeholder="Pincode" value="{{$details->pincode_current}}">
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
						                <input type="number" name="pincode_alternate" class="form-control" placeholder="Pincode" value="{{$details->pincode_alternate}}">
						            </div>
						        </div>
						    </div>
						    <label>Retirement date:</label>
							<div class="md-form">
								<input name="retirement" type="date" class="form-control" id="retirement" placeholder="Retirement date" value="{{$details->retirement->toDateString()}}">
							</div>
							<label>Biography:</label>
							<div class="md-form">
								<textarea name="biography" rows="1" class="md-textarea form-control" placeholder="Biography" >{{$details->biography}}</textarea>
							</div>
							<label>Goals:</label>
							<div class="md-form">
								<input name="goals" type="text" class="form-control" placeholder="Goals" value="{{$details->goals}}">
							</div>
							<label>Interest:</label>
							<div class="md-form">
								<input name="interests" type="text" class="form-control" placeholder="Interest" value="{{$details->interests}}">
							</div>
							<label>Expertise in:</label>
							<div class="md-form">
								<input name="expertise_in" type="text" class="form-control" placeholder="Field of Expertise" value="{{$details->expertise_in}}">
							</div>
							<label>Facebook Profile link:</label>
							<div class="md-form">
								<input name="fb" type="text" class="form-control" placeholder="fb Profile link" value="{{$details->fb}}">
								@if ($errors->has('fb'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('fb') }}</strong>
		                            </span>
		                        @endif
							</div>
							<label>Google+ Profile link:</label>
							<div class="md-form">
								<input name="google" type="text" class="form-control" placeholder="Google+ Profile link:" value="{{$details->google}}">
								@if ($errors->has('google'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('google') }}</strong>
		                            </span>
		                        @endif
							</div>
							<label>LinkedIn Profile link:</label>
							<div class="md-form">
								<input name="linkedin" type="text" class="form-control" placeholder="LinkedIn Profile link" value="{{$details->linkedin}}">
							</div>
							<label>Skype ID:</label>
							<div class="md-form">
								<input name="skype" type="text" class="form-control" placeholder="Skype ID" value="{{$details->skype}}">
							</div>
							<label>Upload a Picture of yours:</label>
							<div class="file-field">
						        <div class="btn btn-primary">
						            <span>Choose file</span>
						            <input type="file" name="photofile">
						        </div>
						        <div class="file-path-wrapper">
						           <input class="file-path validate" type="text" placeholder="Upload a pic">
						        </div>
						        @if ($errors->has('photofile'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('photofile') }}</strong>
		                            </span>
		                        @endif
						    </div>
						    <label>Upload your Resume:</label>
						    <div class="file-field">
						        <div class="btn btn-primary">
						            <span>Choose file</span>
						            <input type="file" name="cvfile">
						        </div>
						        <div class="file-path-wrapper">
						           <input class="file-path validate" type="text" placeholder="Upload a Resume">
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