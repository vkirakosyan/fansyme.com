@push('extraCSS')
<style>
    .hide {
        display: none;
    }
    .show {
        display: block;
    }
</style>
@endpush

<div>
    <a href="javascript:msgShow();" class="btn btn-secondary btn-sm" wire:click="toggleFollow">
	<i class="fas fa-hand-sparkles mr-1"></i> <span class="follow-text">
	@if( auth()->check() && !auth()->user()->isFollowing( $this->profile->user->id ) )
		 @lang( 'profile.subscribe' )
	@elseif( auth()->check() && auth()->user()->isFollowing( $this->profile->user->id ) )
		 @lang( 'profile.unsubscribe' )
	@else
		@lang( 'profile.subscribe' )
	@endif
	</span>
	</a>
	<div wire:loading wire:target="toggleFollow">
        <i class="fas fa-spinner fa-spin"></i> @lang( 'profile.pleaseWait' )
    </div>
</div>


	<div class = "mt-2 " id="followmsgbtn">
	    <a href="{{ route('conversation', [ 'user' => $this->profile->user->id])  }}" class="btn btn-secondary btn-sm" >
		<i class="fas fa-envelope mr-1 "></i> <span class="follow-text">
			@lang( 'profile.messageMe' )
		</span>
		</a>
		
	</div>


@push( 'extraJS' )
<script>
		var msg_show = 1;
		@if( auth()->check() AND auth()->user()->isFollowing( $this->profile->user->id ) )
			$('#followmsgbtn').addClass("show");
			msg_show = 0;
		@else
			$('#followmsgbtn').addClass("hide");
			msg_show = 1;
		@endif
		
		function msgShow() {
			if(msg_show == 1) {
				$('#followmsgbtn').removeClass("hide");
				$('#followmsgbtn').addClass("show");
				msg_show = 0;				
			} else {
				$('#followmsgbtn').removeClass("show");
				$('#followmsgbtn').addClass("hide");
				msg_show = 1;
			}
		}	
	</script>
@endpush

