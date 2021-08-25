<div class="row singleComment mt-2" data-id="<?php echo e($comment->id); ?>" data-post="<?php echo e($comment->commentable->id); ?>">
<div class="col-1">
	<div class="profilePicXS mt-0 ml-0 mr-2 mb-2 ml-md-3 shadow-sm">
		<a href="<?php echo e(route('profile.show', ['username' => $comment->commentator->profile->username ])); ?>">
			<img src="<?php echo e($comment->commentator->profile->profilePicture); ?>" alt="" width="40" height="40">
		</a>
	</div>
</div>
<div class="col-11">
	<div class="comment-item p-2 mb-0 ml-1">
	<a href="<?php echo e(route('profile.show', ['username' => $comment->commentator->profile->username ])); ?>">
		<?php echo e($comment->commentator->name); ?>

	</a> <small class="text-secondary"><?php echo e($comment->created_at->diffForHumans()); ?></small><br>

	<div class="text-wrap comment-content" data-id="<?php echo e($comment->id); ?>" data-post="<?php echo e($comment->commentable->id); ?>"><?php echo e($comment->comment); ?></div>
	<div class="comment-form" data-id="<?php echo e($comment->id); ?>" data-post="<?php echo e($comment->commentable->id); ?>"></div>
	
	<?php if( auth()->check() AND auth()->id() == $comment->user_id ): ?>
	<div class="comment-actions mt-2 border-top pt-2 text-secondary">
	<a href="javascript:void(0)" class="edit-comment text-secondary" data-id="<?php echo e($comment->id); ?>">
		<small><i class="fas fa-pencil-alt"></i> <?php echo app('translator')->get('post.edit-comment'); ?></small>
	</a>
	&nbsp;&nbsp;&nbsp;
	<?php endif; ?>
	
	<?php if( auth()->check() AND auth()->id() == $comment->user_id OR $comment->commentable->user_id == auth()->id() ): ?>
	<a href="javascript:void(0)" class="delete-comment text-secondary" data-id="<?php echo e($comment->id); ?>" data-post="<?php echo e($comment->commentable->id); ?>">
		<small><i class="fas fa-ban"></i> <?php echo app('translator')->get('post.delete-comment'); ?></small>
	</a>
	<?php endif; ?>

	</div>
</div>
</div><?php /**PATH /home/fansyme/domains/fansyme.com/private_html/resources/views/posts/ajax-single-comment.blade.php ENDPATH**/ ?>