@extends( 'welcome' )

@section('seo_title') {{ $profile->handle }} - @endsection

@section( 'content' )
<div class="coverPic">
</div>





<div class="white-smoke-bg white-smoke-bg-profile-page">
	<div class="white-bg add-padding shadow-sm">
		<div class="container">

			<div class="row">
				<div class="col-12 col-sm-4 col-md-3 col-lg-2 mb-5 mb-sm-0">
					<div class="profilePic @if($profile->user->isOnline()) profilePicOnline @else profilePicOffline @endif shadow">
						<a href="{{ $profile->url }}">
							<img src="{{ secure_image($profile->profilePic, 150, 150) }}" alt="profile pic" class="img-fluid">
						</a>
					</div>
				</div>
				<div class="col-12 col-sm-8 col-md-9 col-lg-10 text-center text-sm-left">
					<div class="row">
						<div class="col-12 col-sm-6">
							<h4 class="profile-name">
								<a href="{{ $profile->url }}">
									{{ $profile->name }}
								</a>
							</h4>
							<a href="{{ $profile->url }}">
								{{ $profile->handle }} @if($profile->isVerified == 'Yes') <i class="fas fa-check-circle text-primary"></i> @endif  
							</a>
							<br><br>

							@include( 'profile.sidebar' )

							
						</div>

						<div class="col-12 col-sm-6 text-sm-right">

							<i class="far fa-grin-stars mr-1"></i> {{ $profile->fans_count }} @lang('general.paid-fans')
							<br>
							
							<i class="fas fa-users"></i> {{ $profile->followers->count() }} @lang('general.free-subscribers')
							<br>

							<i class="fas fa-align-left" data-toggle="tooltip" title="Total Posts"></i> {{ $profile->posts->count() }} &nbsp;
							<i class="fas fa-image" data-toggle="tooltip" title="Images"></i> {{ $profile->posts->where('media_type', 'Image')->count() }} &nbsp;
							<i class="fas fa-music" data-toggle="tooltip" title="Audios"></i> {{ $profile->posts->where('media_type', 'Audio')->count() }} &nbsp;
							<i class="fas fa-video" data-toggle="tooltip" title="Videos"></i> {{ $profile->posts->where('media_type', 'Video')->count() }} 
						</div>
						
					</div>

					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-3 col-md-2 col-lg-1 mb-5 mb-sm-0">
				</div>
				<div class="col-12 col-sm-9 col-md-10 col-lg-11 text-center text-sm-left ">
					<div class="row ml-4" >
						<div class="col-12 col-sm-5 col-md-4 col-lg-3 followgroupbtn mt-2" style="float: left;">
						@livewire( 'followbutton', [ 'profileId' => $profile->id ] )
						</div>
						<div class=" col-12 col-sm-6 col-md-6 col-lg-6 monthlyfeebtn mt-2">
						@if($profile->monthlyFee)

							@if(auth()->check() && auth()->user()->hasSubscriptionTo($profile->user))
								<a href="{{  route('mySubscriptions') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-eye"></i> @lang('general.viewSubscription')</a>
							@else
								<div class="dropdown show z-9999">
								<a href="javascript:void(0)" class="btn btn-primary btn-sm mb-2 dropdown-toggle" id="premiumPostsLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-unlock mr-1"></i> @lang( 'profile.unlock' ) - {{ opt('payment-settings.currency_symbol') . number_format($profile->monthlyFee,2) }}
								</a>
								<div class="dropdown-menu" aria-labelledBy="premiumPostsLink">

									{{-- Stripe Button --}}
									@if(opt('card_gateway', 'Stripe') == 'Stripe')
										@if(auth()->check() && opt('stripeEnable', 'No') == 'Yes' && auth()->user()->paymentMethods()->count())
											<a class="dropdown-item" href="{{ route('subscribeCreditCard', [ 'user' => $profile->user->id ]) }}">
												@lang('general.creditCard')
											</a>
										@elseif(auth()->check() && !auth()->user()->paymentMethods()->count() && opt('stripeEnable', 'No') == 'Yes')
											<a class="dropdown-item" href="{{ route('billing.cards') }}">
												@lang('general.addNewCard')
											</a>
										@elseif(opt('stripeEnable', 'No') == 'Yes')
											<a class="dropdown-item" href="{{ route('login') }}">
												@lang('general.creditCard')
											</a>
										@endif
									@endif

									{{-- CCBill Button --}}
									@if(opt('card_gateway', 'Stripe') == 'CCBill')
										<a class="dropdown-item" href="{{ route('subscribeCCBill', [ 'user' => $profile->user->id ]) }}">
											@lang('general.creditCard')
										</a>
									@endif

									{{-- PayStack Button --}}
									@if(opt('card_gateway', 'Stripe') == 'PayStack')
										@if(auth()->check() && auth()->user()->paymentMethods()->count())
											<a class="dropdown-item" href="{{ route('subscribePayStack', [ 'user' => $profile->user->id ]) }}">
												@lang('general.creditCard')
											</a>
										@elseif(auth()->check() && !auth()->user()->paymentMethods()->count())
											<a class="dropdown-item" href="{{ route('billing.cards') }}">
												@lang('general.addNewCard')
											</a>
										@else
											<a class="dropdown-item" href="{{ route('login') }}">
												@lang('general.creditCard')
											</a>
										@endif
									@endif

									{{-- MercadoPago Button --}}
									@if(opt('card_gateway', 'Stripe') == 'MercadoPago')
										@if(auth()->check())
											<a class="dropdown-item" href="{{ route('subscribeMercadoPago', [ 'user' => $profile->user->id ]) }}">
												@lang('general.creditCard')
											</a>
										@else
											<a class="dropdown-item" href="{{ route('login') }}">
												@lang('general.creditCard')
											</a>
										@endif
									@endif

									{{-- TransBank WebpayPlus Button --}}
									@if(opt('card_gateway', 'Stripe') == 'TransBank')
										<a class="dropdown-item" href="{{ route('subscribeWithWBPlus', [ 'user' => $profile->user->id ]) }}">
											@lang('general.creditCard')
										</a>
									@endif

									{{-- PayPal Button --}}
									@if(opt('paypalEnable', 'No') == 'Yes')
										<a class="dropdown-item" href="{{ route('subscribeViaPaypal', [ 'user' => $profile->user->id ]) }}">
											@lang('general.PayPal')
										</a>
									@endif
								</div>
								</div>
							@endif{{--  if not already subscribed --}}
						@endif {{-- if monthly fee --}}
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<br>
	<div class="container no-padding">
		<div class="row">



			<div class="col-12 col-md-12">

				@if( auth()->check() AND auth()->user()->profile->id == $profile->id )
					@include('posts.create-post', [ 'user' => auth()->user() ])
				@endif

				<div class="postsList">
					@include( 'posts.feed', [ 'profile' => $profile ] )
				</div>

				<div class="text-center loadingPostsMsg d-none">
				  <h3 class="text-secondary"><i class="fas fa-spinner fa-spin mr-2"></i> @lang( 'post.isLoading' )</h3>
				</div>

				<div class="text-center noMorePostsMsg d-none mb-5">
					<div class="card shadow p-3">
						<h3 class="text-secondary">@lang( 'post.noMorePosts' )</h3>
					</div>
				</div>

			</div><!-- col-sm-8 col-12 -->



		</div>	<!-- . posts -->

	</div>
</div>

<br><br><br>
</div><!-- ./white-smoke bg-->

@endsection

@if($profile->coverPic && !empty( $profile->coverPic ))
@push( 'extraCSS' )
<style>
.coverPic {
	background-image: url('{{ asset('/uploads/' . $profile->coverPicture) }}');
}
</style>
@endpush
@endif

@push( 'extraJS' )
<script>
	$( function() {

		@if( auth()->check() AND auth()->user()->profile->id == $profile->id )
		// auto expand textarea
		document.getElementById('createPost').addEventListener('keyup', function() {
		    this.style.overflow = 'hidden';
		    this.style.height = 0;
		    this.style.height = this.scrollHeight + 'px';
		}, false);
		@endif
		
		$(document.body).on('touchmove', onScroll); // for mobile
		$(window).on('scroll', onScroll);

		function onScroll() {

			if($(window).scrollTop() + $(window).height() >= $(document).height()) {

				// show spinner
				$( '.loadingPostsMsg' ).removeClass( 'd-none' );

				var lastId = $( '.lastId' ).html();

				$.getJSON( '{{ route( 'loadPostsForProfile', [ 'profile' => $profile->id, 'lastId' => '/' ]) }}/' + lastId, function( resp ) {

					if( resp.lastId != 0 ) {

						// append html
						$( '.postsList' ).append( resp.view );
						$('.lastId').html(resp.lastId);

					}else{

						// cancel scroll event
						$(window).off('scroll');

						$( '.noMorePostsMsg' ).removeClass( 'd-none' );
					}

					$( '.loadingPostsMsg' ).addClass( 'd-none' );

					window.livewire.rescan();

				});
			}
		}		

	});
</script>
@endpush