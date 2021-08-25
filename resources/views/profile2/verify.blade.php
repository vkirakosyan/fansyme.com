@extends( 'account' )

@section('seo_title') @lang('dashboard.verify-profile') - @endsection

@section( 'account_section' )

<div>
<form method="POST" action="{{ route( 'processVerification2' ) }}" enctype="multipart/form-data">
@csrf
<div class="shadow-sm card add-padding">
<br/>
<h2 class="ml-2"><i class="fas fa-user-check mr-2"></i>@lang('dashboard.verify-profile')</h2>
@lang( 'dashboard.verification-text' )
<hr>

	@if( isset( $p ) AND $p->isVerified == 'No' )
	<div class="alert alert-warning" role="alert">
		@lang( 'dashboard.send-for-verification' )
	</div>
	@endif

	@if( isset( $p ) AND $p->isVerified == 'Yes' )
	<div class='alert alert-success'>
		<h4><i class="fas fa-check-circle"></i> @lang( 'dashboard.successfully-verified' ) </h4>
	</div>
	@endif

	@if( isset( $p ) AND $p->isVerified == 'Pending' )
	<div class='alert alert-info'>
		<h4><i class="fas fa-check-circle"></i> @lang( 'dashboard.pending-verification' ) </h4>
	</div>
	@else

	<label><strong>@lang('dashboard.yourCountry')</strong></label>
	<select name="country" class="form-control" required>
	<option value="">@lang('profile.selectCountry')</option>
	@foreach( $countries as $country )
	<option value="{{ $country }}">{{ $country }}</option>
	@endforeach
	</select>
	<br>


	<label><strong>@lang('dashboard.yourCity')</strong></label>
	<input type="text" class="form-control" name="city" value="{{ $p->city ?? old( 'city' ) }}" required>
	<br>

	<label><strong>@lang('dashboard.yourPostCode')</strong></label>
	<input type="text" class="form-control" name="postal_code" value="{{ $p->postal_code ?? old( 'postal_code' ) }}" required>
	<br>

	<label><strong>@lang('dashboard.yourFirstName')</strong></label>
	<input type="text" class="form-control" name="first_name" value="{{ $p->first_name ?? old( 'first_name' ) }}" required>
	<br>

	<label><strong>@lang('dashboard.yourLastName')</strong></label>
	<input type="text" class="form-control" name="last_name" value="{{ $p->last_name ?? old( 'last_name' ) }}" required>
	<br>

	<label><strong>@lang('dashboard.yourDOB')</strong></label>
	<input type="date" class="form-control" name="date_of_birth" value="{{ $p->date_of_birth ?? old( 'date_of_birth' ) }}" required>
	<br>

	<label><strong>@lang('dashboard.yourFullAddress')</strong></label>
	<textarea class="form-control" rows="5" name="address" required>{{ $p->address ?? old( 'address' ) }}</textarea>
	<br>

	<label><strong>@lang('dashboard.yourFullAddress2')</strong></label>
	<textarea class="form-control" rows="5" name="address2" required>{{ $p->address2 ?? old( 'address2' ) }}</textarea>
	<br>

	<label><strong>@lang('dashboard.yourPassportNumber')</strong></label>
	<input type="text" class="form-control" name="passport_id_number" value="{{ $p->passport_id_number ?? old( 'passport_id_number' ) }}" required>
	<br>

	<label><strong>@lang('dashboard.yourPassportExpiry')</strong></label>
	<input type="date" class="form-control" name="passport_expiry" value="{{ $p->passport_expiry ?? old( 'passport_expiry' ) }}" required>
	<br>

	<label><strong>@lang('dashboard.yourInstagram')</strong></label>
	<input type="text" class="form-control" name="instagram" value="{{ $p->instagram ?? old( 'instagram' ) }}" required>
	<br>

	<label><strong>@lang('dashboard.yourTwitter')</strong></label>
	<input type="text" class="form-control" name="twitter" value="{{ $p->twitter ?? old( 'twitter' ) }}" required>
	<br>

	<label><strong>@lang('dashboard.explicitContent')</strong></label>

	<div class="form-check form-check-inline">
		<input class="form-check-input" type="radio" id="contentType1" value="Yes" name="explicit_content">
		<label class="form-check-label" for="contentType1">Yes</label>
	    </div>
	    <div class="form-check form-check-inline">
		<input class="form-check-input" type="radio" id="contentType2" value="No" name="explicit_content">
		<label class="form-check-label" for="contentType2">No</label>
	    </div>
	    <div class="form-check form-check-inline">
		<input class="form-check-input" type="radio" id="contentType3" value="Maybe" name="explicit_content">
		<label class="form-check-label" for="contentType3">Maybe</label>
	    </div>
	<br>






	<label><strong>@lang('dashboard.idUpload')</strong></label>
    <input type="file" name="idUpload" accept="image/*" required>

    <label><strong>@lang('dashboard.idUploadBackside')</strong></label>
    <input type="file" name="idUploadBackside" accept="image/*" required>

    <label><strong>@lang('dashboard.idUploadSelfie')</strong></label>
    <input type="file" name="idUploadSelfie" accept="image/*" required>

    <br>

<div class="text-center">
  <br>
  <input type="submit" name="sbStoreProfile" class="btn btn-lg btn-primary" value="@lang('dashboard.sendForApproval')">
</div><!-- /.white-bg add-padding -->

</form>

@endif

</div><!-- /.white-bg -->

<br/><br/>
</div><!-- /.white-smoke-bg -->
@endsection