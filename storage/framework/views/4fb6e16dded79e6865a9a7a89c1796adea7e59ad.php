<div class="col-12 col-md-4 d-none d-sm-none d-md-none d-lg-block">
	<div class="sticky-top sticky-sidebar">
	
	<?php if( isset($feed) && $feed->count() ): ?>
		<div class="lastId d-none"><?php echo e($feed->last()->id); ?></div>
	<?php endif; ?>

	<?php
if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount('creators-sidebar')->dom;
} elseif ($_instance->childHasBeenRendered('9o3geFn')) {
    $componentId = $_instance->getRenderedChildComponentId('9o3geFn');
    $componentTag = $_instance->getRenderedChildComponentTagName('9o3geFn');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('9o3geFn');
} else {
    $response = \Livewire\Livewire::mount('creators-sidebar');
    $dom = $response->dom;
    $_instance->logRenderedChild('9o3geFn', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?>

	<br>
	</div>
</div><?php /**PATH /var/www/html/private_html/resources/views/posts/sidebar-desktop.blade.php ENDPATH**/ ?>