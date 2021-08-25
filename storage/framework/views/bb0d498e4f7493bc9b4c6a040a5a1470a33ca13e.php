<?php $__env->startPush('extraCSS'); ?>
<style>
    .hide {
        display: none;
    }
    .show {
        display: block;
    }
</style>
<?php $__env->stopPush(); ?>

<div>
    <a href="javascript:msgShow();" class="btn btn-secondary btn-sm" wire:click="toggleFollow">
	<i class="fas fa-hand-sparkles mr-1"></i> <span class="follow-text">
	<?php if( auth()->check() && !auth()->user()->isFollowing( $this->profile->user->id ) ): ?>
		 <?php echo app('translator')->get( 'profile.subscribe' ); ?>
	<?php elseif( auth()->check() && auth()->user()->isFollowing( $this->profile->user->id ) ): ?>
		 <?php echo app('translator')->get( 'profile.unsubscribe' ); ?>
	<?php else: ?>
		<?php echo app('translator')->get( 'profile.subscribe' ); ?>
	<?php endif; ?>
	</span>
	</a>
	<div wire:loading wire:target="toggleFollow">
        <i class="fas fa-spinner fa-spin"></i> <?php echo app('translator')->get( 'profile.pleaseWait' ); ?>
    </div>
</div>


	<div class = "mt-2 " id="followmsgbtn">
	    <a href="<?php echo e(route('conversation', [ 'user' => $this->profile->user->id])); ?>" class="btn btn-secondary btn-sm" >
		<i class="fas fa-envelope mr-1 "></i> <span class="follow-text">
			<?php echo app('translator')->get( 'profile.messageMe' ); ?>
		</span>
		</a>
		
	</div>


<?php $__env->startPush( 'extraJS' ); ?>
<script>
		var msg_show = 1;
		<?php if( auth()->check() AND auth()->user()->isFollowing( $this->profile->user->id ) ): ?>
			$('#followmsgbtn').addClass("show");
			msg_show = 0;
		<?php else: ?>
			$('#followmsgbtn').addClass("hide");
			msg_show = 1;
		<?php endif; ?>
		
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
<?php $__env->stopPush(); ?>

<?php /**PATH /var/www/html/private_html/resources/views/livewire/followbutton.blade.php ENDPATH**/ ?>