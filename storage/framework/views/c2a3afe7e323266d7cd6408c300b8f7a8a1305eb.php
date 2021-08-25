<?php $__env->startComponent('mail::message'); ?>

Hi <?php echo e($user->name); ?>,<br><br>


Not so good news, your profile <a href="<?php echo e(route('profile.show', ['username' => $user->profile->username])); ?>"><?php echo e($user->profile->handle); ?></a> has been rejected.<br>

If you have any questions regarding this, contact our support at:<br>
<?php echo e(env('SENDING_EMAIL')); ?><br><br>

Regards,<br>
<?php echo e(env('APP_NAME')); ?>


<?php echo $__env->renderComponent(); ?><?php /**PATH /home/fansyme/domains/fansyme.com/private_html/resources/views/emails/profileRejected.blade.php ENDPATH**/ ?>