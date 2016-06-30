@extends('layouts.default')
@section('content')
<section id="team" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12">
				<div class="card">
					<div class="title-style text-center">
						<h1 class="heading">Complete Profile</h1>
					</div>	
					<div class="content">
						<form action="profile/new" method="POST" files="true" enctype="multipart/form-data">
							{{csrf_field()}}
							<label>Company Full Name:</label>
							<div class="md-form">
				                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Company Name">
				            </div>
						    <label>Date of Origin:</label>
							<div class="md-form">
								<input name="date_of_birth" type="date" class="form-control" id="date_of_birth" placeholder="Date of Origin">
							</div>
							<label>Primary Contact No:</label>
							<div class="md-form">
								<input name="contact_mobile" type="number" class="form-control" id="mobNumber" placeholder="Contact Number" disabled value="{{Auth::user()->contact}}">
							</div>
							<label>Contact Work:</label>
							<div class="md-form">
								<input name="contact_work" type="number" class="form-control" id="mobNumber" placeholder="Work's Number">
							</div>
							<label>Contact Fax:</label>
							<div class="md-form">
								<input name="contact_fax" type="number" class="form-control" id="mobNumber" placeholder="Fax Contact Number">
							</div>
							<label>Contact Pager:</label>
							<div class="md-form">
								<input name="contact_pager" type="text" class="form-control" id="mobNumber" placeholder="Contact Pager">
							</div>
							<label>Any Other Contact No:</label>
							<div class="md-form">
								<input name="contact_other" type="number" class="form-control" id="mobNumber" placeholder="Other Contact Number">
							</div>
							<label>Work Email Address:</label>
							<div class="md-form">
								<input name="email_work" type="email" class="form-control" id="email" placeholder="Work Email Address" value="{{Auth::user()->email}}" disabled>
							</div>
							<label>Other Email Address:</label>
							<div class="md-form">
								<input name="email_other" type="email" class="form-control" id="email" placeholder="Alternate Email Address">
							</div>
							<label>Complete Office Address:</label>
							<div class="md-form">
								<textarea name="address_permanent" rows="1" class="md-textarea form-control" placeholder="Office Address"></textarea>
							</div>
							<div class="row">
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="city_permanent" class="form-control" placeholder="City">
						            </div>
						        </div>
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="state_permanent" class="form-control" placeholder="State">
						            </div>
						        </div>
						    </div>
						    <div class="row">
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="country_permanent" class="form-control" placeholder="Country">
						            </div>
						        </div>
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="pincode_permanent" class="form-control" placeholder="Pincode">
						            </div>
						        </div>
						    </div>
						    <label>Complete Alternate Address:</label>
							<div class="md-form">
								<textarea name="address_alternate" rows="1" class="md-textarea form-control" placeholder="Alternate Address"></textarea>
							</div>
							<div class="row">
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="city_alternate" class="form-control" placeholder="City">
						            </div>
						        </div>
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="state_alternate" class="form-control" placeholder="State">
						            </div>
						        </div>
						    </div>
						    <div class="row">
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="country_alternate" class="form-control" placeholder="Country">
						            </div>
						        </div>
						        <div class="col-md-6">
						            <div class="md-form">
						                <input type="text" name="pincode_alternate" class="form-control" placeholder="Pincode">
						            </div>
						        </div>
						    </div>
							<label>Description:</label>
							<div class="md-form">
								<textarea name="description" rows="1" class="md-textarea form-control" placeholder="Description about Company"></textarea>
							</div>
							<label>Expertise in:</label>
							<div class="md-form">
								<input name="expertise_in" type="text" class="form-control" placeholder="Field of Expertise">
							</div>
							<label>No. of Members:</label>
							<div class="md-form">
								<input type="number" name="members" class="form-control" placeholder="No. of Members">
							</div>
							<label>Facebook Profile link:</label>
							<div class="md-form">
								<input name="fb" type="text" class="form-control" placeholder="fb Profile link">
							</div>
							<label>Google+ Profile link:</label>
							<div class="md-form">
								<input name="google" type="text" class="form-control" placeholder="Google+ Profile link:">
							</div>
							<label>LinkedIn Profile link:</label>
							<div class="md-form">
								<input name="linkedin" type="text" class="form-control" placeholder="LinkedIn Profile link">
							</div>
							<label>Skype ID:</label>
							<div class="md-form">
								<input name="skype" type="text" class="form-control" placeholder="Skype ID">
							</div>
							<label>Website link:</label>
							<div class="md-form">
								<input name="website" type="text" class="form-control" placeholder="Website link">
							</div>
							<label>Upload Company's logo:</label>
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
								<input name="submit" type="submit" class="btn-secondary-outline waves-effect form-control" id="submit" value="Create Portfolio">
							</div>
						</form>
					</div>	
				</div>
			</div>
		</div>
	</div>		
</section>
@stop