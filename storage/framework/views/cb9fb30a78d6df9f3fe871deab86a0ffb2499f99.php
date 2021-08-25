<?php $__env->startSection('seo_title'); ?> <?php echo app('translator')->get('dashboard.verify-profile'); ?> - <?php $__env->stopSection(); ?>

<?php $__env->startSection( 'account_section' ); ?>

<div>
<form method="POST" action="<?php echo e(route( 'processVerification2' )); ?>" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<div class="shadow-sm card add-padding">
<br/>
<h2 class="ml-2"><i class="fas fa-user-check mr-2"></i><?php echo app('translator')->get('dashboard.verify-profile'); ?></h2>
<?php echo app('translator')->get( 'dashboard.verification-text' ); ?>
<hr>

	<?php if( isset( $p ) AND $p->isVerified == 'No' ): ?>
	<div class="alert alert-warning" role="alert">
		<?php echo app('translator')->get( 'dashboard.send-for-verification' ); ?>
	</div>
	<?php endif; ?>

	<?php if( isset( $p ) AND $p->isVerified == 'Yes' ): ?>
	<div class='alert alert-success'>
		<h4><i class="fas fa-check-circle"></i> <?php echo app('translator')->get( 'dashboard.successfully-verified' ); ?> </h4>
	</div>
	<?php endif; ?>

	<?php if( isset( $p ) AND $p->isVerified == 'Pending' ): ?>
	<div class='alert alert-info'>
		<h4><i class="fas fa-check-circle"></i> <?php echo app('translator')->get( 'dashboard.pending-verification' ); ?> </h4>
	</div>
	<?php else: ?>

	<label><strong><?php echo app('translator')->get('dashboard.yourCountry'); ?></strong></label>
	<select name="country" class="form-control" required>
	<option value=""><?php echo app('translator')->get('profile.selectCountry'); ?></option>
	<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<option value="<?php echo e($country); ?>"><?php echo e($country); ?></option>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
	<br>


	<label><strong><?php echo app('translator')->get('dashboard.yourCity'); ?></strong></label>
	<input type="text" class="form-control" name="city" value="<?php echo e($p->city ?? old( 'city' )); ?>" required>
	<br>

	<label><strong><?php echo app('translator')->get('dashboard.yourPostCode'); ?></strong></label>
	<input type="text" class="form-control" name="postal_code" value="<?php echo e($p->postal_code ?? old( 'postal_code' )); ?>" required>
	<br>

	<label><strong><?php echo app('translator')->get('dashboard.yourFirstName'); ?></strong></label>
	<input type="text" class="form-control" name="first_name" value="<?php echo e($p->first_name ?? old( 'first_name' )); ?>" required>
	<br>

	<label><strong><?php echo app('translator')->get('dashboard.yourLastName'); ?></strong></label>
	<input type="text" class="form-control" name="last_name" value="<?php echo e($p->last_name ?? old( 'last_name' )); ?>" required>
	<br>

	<label><strong><?php echo app('translator')->get('dashboard.yourDOB'); ?></strong></label>
	<input type="date" class="form-control" name="date_of_birth" value="<?php echo e($p->date_of_birth ?? old( 'date_of_birth' )); ?>" required>
	<br>

	<label><strong><?php echo app('translator')->get('dashboard.yourFullAddress'); ?></strong></label>
	<textarea class="form-control" rows="5" name="address" required><?php echo e($p->address ?? old( 'address' )); ?></textarea>
	<br>

	<label><strong><?php echo app('translator')->get('dashboard.yourFullAddress2'); ?></strong></label>
	<textarea class="form-control" rows="5" name="address2" required><?php echo e($p->address2 ?? old( 'address2' )); ?></textarea>
	<br>

	<label><strong><?php echo app('translator')->get('dashboard.yourPassportNumber'); ?></strong></label>
	<input type="text" class="form-control" name="passport_id_number" value="<?php echo e($p->passport_id_number ?? old( 'passport_id_number' )); ?>" required>
	<br>

	<label><strong><?php echo app('translator')->get('dashboard.yourPassportExpiry'); ?></strong></label>
	<input type="date" class="form-control" name="passport_expiry" value="<?php echo e($p->passport_expiry ?? old( 'passport_expiry' )); ?>" required>
	<br>

	<label><strong><?php echo app('translator')->get('dashboard.yourInstagram'); ?></strong></label>
	<input type="text" class="form-control" name="instagram" value="<?php echo e($p->instagram ?? old( 'instagram' )); ?>" required>
	<br>

	<label><strong><?php echo app('translator')->get('dashboard.yourTwitter'); ?></strong></label>
	<input type="text" class="form-control" name="twitter" value="<?php echo e($p->twitter ?? old( 'twitter' )); ?>" required>
	<br>

	<label><strong><?php echo app('translator')->get('dashboard.explicitContent'); ?></strong></label>

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






	<label><strong><?php echo app('translator')->get('dashboard.idUpload'); ?></strong></label>
    <input type="file" name="idUpload" accept="image/*" required>

    <label><strong><?php echo app('translator')->get('dashboard.idUploadBackside'); ?></strong></label>
    <input type="file" name="idUploadBackside" accept="image/*" required>

    <label><strong><?php echo app('translator')->get('dashboard.idUploadSelfie'); ?></strong></label>
    <input type="file" name="idUploadSelfie" accept="image/*" required>

    <br>

<div class="text-center">
  <br>
  <input type="submit" name="sbStoreProfile" class="btn btn-lg btn-primary" value="<?php echo app('translator')->get('dashboard.sendForApproval'); ?>">
</div><!-- /.white-bg add-padding -->

</form>

<?php endif; ?>

</div><!-- /.white-bg -->

<br/><br/>
</div><!-- /.white-smoke-bg -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make( 'account' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fansyme/domains/fansyme.com/private_html/resources/views/profile2/verify.blade.php ENDPATH**/ ?>