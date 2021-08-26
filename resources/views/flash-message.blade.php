@if( Auth::user()->profile->isVerified != 'Yes' )
    <div class="alert alert-danger" role="alert">
        @if( Auth::user()->profile->isVerified == 'No' )
            @lang( 'dashboard.not-verified' )
            <br>
            <a href="{{ route( 'profile.verifyProfile' ) }}">@lang('dashboard.verify-profile')</a>
        @elseif( Auth::user()->profile->isVerified = 'Pending' )
            @lang( 'dashboard.verification-pending' )
        @endif
    </div>
@endif
