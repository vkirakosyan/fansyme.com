@extends('admin.base')

@section('section_title')
	<strong>Profile Verification Requests</strong>
@endsection

@section('section_body')

@if($vreq)
	<table class="table table-striped table-bordered table-responsive dataTable">
	<thead>
	<tr>
		<th>ID</th>
		<th>Email</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Date of Birth</th>
		<th>Explicit Content</th>
		<th>Location</th>
		<th>Photo</th>
		<th>ID Backside</th>
		<th>ID Selfie</th>
		<th>Status</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody>
		@foreach( $vreq as $v )
		<tr>
			<td>
				{{ $v->id }}
			</td>
			<td>
				{{ $v->user->email }}
			</td>

			@if($v->user_meta)
				<td>
					@isset($v->user_meta['first_name'])
						{{ $v->user_meta['first_name'] }}<br>
					@endisset
				</td>
				<td>
					@isset($v->user_meta['last_name'])
						{{ $v->user_meta['last_name'] }}<br>
					@endisset
				</td>
				<td>
					@isset($v->user_meta['date_of_birth'])
						{{ $v->user_meta['date_of_birth'] }}<br>
					@endisset
				</td>

				<td>
					@isset($v->user_meta['explicit_content'])
						{{ $v->user_meta['explicit_content'] }}<br>
					@endisset
				</td>

				<td>
					@isset($v->user_meta['address'])
						{{ $v->user_meta['address'] }}<br>
					@endisset

					@isset($v->user_meta['address2'])
						{{ $v->user_meta['address2'] }}<br>
					@endisset

					@isset($v->user_meta['city'])
						{{ $v->user_meta['city'] }},
					@endisset
					@isset($v->user_meta['country'])
						{{ $v->user_meta['country'] }}<br>
					@endisset
				</td>

				@else
				<td>--</td>
				<td>--</td>
				<td>--</td>
				<td>--</td>

				@endif





			<td>
				@if($v->user_meta)
					@isset($v->user_meta['id'])
						@if(isset($v->user_meta['verificationDisk']))
						<a href="{{ \Storage::disk($v->user_meta['verificationDisk'])->url($v->user_meta['id']) }}" target="_blank">
							<img src="{{ \Storage::disk($v->user_meta['verificationDisk'])->url($v->user_meta['id']) }}" width="100" class="img-responsive"/>
						</a>
						@else
						<a href="{{ asset('public/uploads/' . $v->user_meta['id']) }}" target="_blank">
							<img src="{{ asset('public/uploads/' . $v->user_meta['id']) }}" width="100" class="img-responsive"/>
						</a>
						@endif
					@else
						No ID Uploaded
					@endif
				@else
					--
				@endif
			</td>


			<td>
				@if($v->user_meta)
					@isset($v->user_meta['id_backside'])
						@if(isset($v->user_meta['verificationDisk']))
						<a href="{{ \Storage::disk($v->user_meta['verificationDisk'])->url($v->user_meta['id_backside']) }}" target="_blank">
							<img src="{{ \Storage::disk($v->user_meta['verificationDisk'])->url($v->user_meta['id_backside']) }}" width="100" class="img-responsive"/>
						</a>
						@else
						<a href="{{ asset('public/uploads/' . $v->user_meta['id_backside']) }}" target="_blank">
							<img src="{{ asset('public/uploads/' . $v->user_meta['id_backside']) }}" width="100" class="img-responsive"/>
						</a>
						@endif
					@else
						No ID Backside Uploaded
					@endif
				@else
					--
				@endif
			</td>


			<td>
				@if($v->user_meta)
					@isset($v->user_meta['id_selfie'])
						@if(isset($v->user_meta['verificationDisk']))
						<a href="{{ \Storage::disk($v->user_meta['verificationDisk'])->url($v->user_meta['id_selfie']) }}" target="_blank">
							<img src="{{ \Storage::disk($v->user_meta['verificationDisk'])->url($v->user_meta['id_selfie']) }}" width="100" class="img-responsive"/>
						</a>
						@else
						<a href="{{ asset('public/uploads/' . $v->user_meta['id_selfie']) }}" target="_blank">
							<img src="{{ asset('public/uploads/' . $v->user_meta['id_selfie']) }}" width="100" class="img-responsive"/>
						</a>
						@endif
					@else
						No ID Selfie Uploaded
					@endif
				@else
					--
				@endif
			</td>


			<td>
				@if($v->isVerified == 'Rejected')
					<span class="text-danger"><strong>{{ $v->isVerified }}</strong></span>
				@else
					<span class="text-info"><strong>{{ $v->isVerified }}</strong></span>
				@endif
			</td>
			<td>
				 <div class="btn-group">
    				<a href="/admin/approve/{{ $v->id }}" class="text-success">
						<strong>Approve</strong>
					</a><br>
					<a href="/admin/reject/{{ $v->id }}" class="text-danger" onclick="return confirm('are you sure?')">
						Reject
					</a>
				</div>
			</td>
		</tr>
		@endforeach
	</tbody>
	</table>
@else
	No verification requests in database.
@endif

@endsection