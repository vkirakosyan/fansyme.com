<?php if( Auth::user()->profile->isVerified != 'Yes' ): ?>
    <div class="alert alert-danger" role="alert">
        <?php if( Auth::user()->profile->isVerified == 'No' ): ?>
            <?php echo app('translator')->get( 'dashboard.not-verified' ); ?>
            <br>
            <a href="<?php echo e(route( 'profile.verifyProfile' )); ?>"><?php echo app('translator')->get('dashboard.verify-profile'); ?></a>
        <?php elseif( Auth::user()->profile->isVerified = 'Pending' ): ?>
            <?php echo app('translator')->get( 'dashboard.verification-pending' ); ?>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/html/private_html/resources/views/flash-message.blade.php ENDPATH**/ ?>