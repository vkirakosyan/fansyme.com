<?php $__env->startSection('section_title'); ?>
	<strong>Profile Verification Requests</strong>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section_body'); ?>

<?php if($vreq): ?>
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
		<?php $__currentLoopData = $vreq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td>
				<?php echo e($v->id); ?>

			</td>
			<td>
				<?php echo e($v->user->email); ?>

			</td>

			<?php if($v->user_meta): ?>
				<td>
					<?php if(isset($v->user_meta['first_name'])): ?>
						<?php echo e($v->user_meta['first_name']); ?><br>
					<?php endif; ?>
				</td>
				<td>
					<?php if(isset($v->user_meta['last_name'])): ?>
						<?php echo e($v->user_meta['last_name']); ?><br>
					<?php endif; ?>
				</td>
				<td>
					<?php if(isset($v->user_meta['date_of_birth'])): ?>
						<?php echo e($v->user_meta['date_of_birth']); ?><br>
					<?php endif; ?>
				</td>

				<td>
					<?php if(isset($v->user_meta['explicit_content'])): ?>
						<?php echo e($v->user_meta['explicit_content']); ?><br>
					<?php endif; ?>
				</td>

				<td>
					<?php if(isset($v->user_meta['address'])): ?>
						<?php echo e($v->user_meta['address']); ?><br>
					<?php endif; ?>

					<?php if(isset($v->user_meta['address2'])): ?>
						<?php echo e($v->user_meta['address2']); ?><br>
					<?php endif; ?>

					<?php if(isset($v->user_meta['city'])): ?>
						<?php echo e($v->user_meta['city']); ?>,
					<?php endif; ?>
					<?php if(isset($v->user_meta['country'])): ?>
						<?php echo e($v->user_meta['country']); ?><br>
					<?php endif; ?>
				</td>

				<?php else: ?>
				<td>--</td>
				<td>--</td>
				<td>--</td>
				<td>--</td>

				<?php endif; ?>





			<td>
				<?php if($v->user_meta): ?>
					<?php if(isset($v->user_meta['id'])): ?>
						<?php if(isset($v->user_meta['verificationDisk'])): ?>
						<a href="<?php echo e(\Storage::disk($v->user_meta['verificationDisk'])->url($v->user_meta['id'])); ?>" target="_blank">
							<img src="<?php echo e(\Storage::disk($v->user_meta['verificationDisk'])->url($v->user_meta['id'])); ?>" width="100" class="img-responsive"/>
						</a>
						<?php else: ?>
						<a href="<?php echo e(asset('public/uploads/' . $v->user_meta['id'])); ?>" target="_blank">
							<img src="<?php echo e(asset('public/uploads/' . $v->user_meta['id'])); ?>" width="100" class="img-responsive"/>
						</a>
						<?php endif; ?>
					<?php else: ?>
						No ID Uploaded
					<?php endif; ?>
				<?php else: ?>
					--
				<?php endif; ?>
			</td>


			<td>
				<?php if($v->user_meta): ?>
					<?php if(isset($v->user_meta['id_backside'])): ?>
						<?php if(isset($v->user_meta['verificationDisk'])): ?>
						<a href="<?php echo e(\Storage::disk($v->user_meta['verificationDisk'])->url($v->user_meta['id_backside'])); ?>" target="_blank">
							<img src="<?php echo e(\Storage::disk($v->user_meta['verificationDisk'])->url($v->user_meta['id_backside'])); ?>" width="100" class="img-responsive"/>
						</a>
						<?php else: ?>
						<a href="<?php echo e(asset('public/uploads/' . $v->user_meta['id_backside'])); ?>" target="_blank">
							<img src="<?php echo e(asset('public/uploads/' . $v->user_meta['id_backside'])); ?>" width="100" class="img-responsive"/>
						</a>
						<?php endif; ?>
					<?php else: ?>
						No ID Backside Uploaded
					<?php endif; ?>
				<?php else: ?>
					--
				<?php endif; ?>
			</td>


			<td>
				<?php if($v->user_meta): ?>
					<?php if(isset($v->user_meta['id_selfie'])): ?>
						<?php if(isset($v->user_meta['verificationDisk'])): ?>
						<a href="<?php echo e(\Storage::disk($v->user_meta['verificationDisk'])->url($v->user_meta['id_selfie'])); ?>" target="_blank">
							<img src="<?php echo e(\Storage::disk($v->user_meta['verificationDisk'])->url($v->user_meta['id_selfie'])); ?>" width="100" class="img-responsive"/>
						</a>
						<?php else: ?>
						<a href="<?php echo e(asset('public/uploads/' . $v->user_meta['id_selfie'])); ?>" target="_blank">
							<img src="<?php echo e(asset('public/uploads/' . $v->user_meta['id_selfie'])); ?>" width="100" class="img-responsive"/>
						</a>
						<?php endif; ?>
					<?php else: ?>
						No ID Selfie Uploaded
					<?php endif; ?>
				<?php else: ?>
					--
				<?php endif; ?>
			</td>


			<td>
				<?php if($v->isVerified == 'Rejected'): ?>
					<span class="text-danger"><strong><?php echo e($v->isVerified); ?></strong></span>
				<?php else: ?>
					<span class="text-info"><strong><?php echo e($v->isVerified); ?></strong></span>
				<?php endif; ?>
			</td>
			<td>
				 <div class="btn-group">
    				<a href="/admin/approve/<?php echo e($v->id); ?>" class="text-success">
						<strong>Approve</strong>
					</a><br>
					<a href="/admin/reject/<?php echo e($v->id); ?>" class="text-danger" onclick="return confirm('are you sure?')">
						Reject
					</a>
				</div>
			</td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
	</table>
<?php else: ?>
	No verification requests in database.
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fansyme/domains/fansyme.com/private_html/resources/views/admin/verification-requests.blade.php ENDPATH**/ ?>