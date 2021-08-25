<?php $__env->startSection('section_title'); ?>
<strong>Admin Login Configuration</strong>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section_body'); ?>

<form method="POST" action="/admin/save-logins">
<?php echo e(csrf_field()); ?>

	<dl>
		<dt>Admin Login Email</dt>
		<dd>
			<input type="text" name="admin_user" value="<?php echo e(auth()->user()->email); ?>" class="form-control">
		</dd>
	</dl>
	<dl>
		<dt>Admin New Password</dt>
		<dd>
			<input type="password" name="admin_pass" value="" class="form-control">
		</dd>
	</dl>
	<dl>
		<dt>Admin Confirm New Password</dt>
		<dd>
			<input type="password" name="admin_pass_confirmation" value="" class="form-control">
		</dd>
	</dl>

	<input type="submit" name="sb_settings" value="Save Admin Details" class="btn btn-primary">	
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fansyme/domains/fansyme.com/private_html/resources/views/admin/config-logins.blade.php ENDPATH**/ ?>