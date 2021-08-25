<nav class="navbar navbar-expand-md navbar-light navbar-white fixed-top bg-white">
<a class="navbar-brand" href="<?php echo e(route('home')); ?>">
  <?php if($logo = opt('site_logo')): ?>
    <img src="<?php echo e(asset($logo)); ?>" alt="logo" class="site-logo"/>
  <?php else: ?>
    <?php echo e(opt( 'site_title' )); ?>

  <?php endif; ?>
</a>
<div class="collapse navbar-collapse d-none d-sm-none d-md-block" id="navbarsExampleDefault">
<ul class="navbar-nav">
  <?php if( auth()->guest() ): ?>
  <li class="nav-item">
    <a class="nav-link" href="/"><?php echo app('translator')->get( 'navigation.home' ); ?> <span class="sr-only">(current)</span></a>
  </li>
  <?php endif; ?>
  <?php if( !auth()->guest() ): ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('feed')); ?>"><?php echo app('translator')->get('navigation.feed'); ?></a>
  </li>
  <li class="nav-item">
    <?php
if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount('notifications-icon')->dom;
} elseif ($_instance->childHasBeenRendered('OPrjfON')) {
    $componentId = $_instance->getRenderedChildComponentId('OPrjfON');
    $componentTag = $_instance->getRenderedChildComponentTagName('OPrjfON');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OPrjfON');
} else {
    $response = \Livewire\Livewire::mount('notifications-icon');
    $dom = $response->dom;
    $_instance->logRenderedChild('OPrjfON', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?>
  </li>
  <li class="nav-item">
      <?php
if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount('unread-messages-count')->dom;
} elseif ($_instance->childHasBeenRendered('lZM6gbg')) {
    $componentId = $_instance->getRenderedChildComponentId('lZM6gbg');
    $componentTag = $_instance->getRenderedChildComponentTagName('lZM6gbg');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('lZM6gbg');
} else {
    $response = \Livewire\Livewire::mount('unread-messages-count');
    $dom = $response->dom;
    $_instance->logRenderedChild('lZM6gbg', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?>
  </li>
  <?php endif; ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php if(auth()->guest()): ?> <?php echo e(route('register')); ?> <?php else: ?> <?php echo e(route('profile.show', ['username' => auth()->user()->profile->username ])); ?> <?php endif; ?>">
      <?php if( auth()->guest() ): ?>
        <?php echo app('translator')->get('navigation.startMyPage'); ?>
      <?php else: ?>
        <?php echo app('translator')->get('navigation.myProfile'); ?>
      <?php endif; ?>
    </a>
  </li>
  <?php if(!auth()->guest()): ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('startMyPage')); ?>">
      <?php echo app('translator')->get('navigation.account'); ?>
      <?php if(auth()->user()->profile->isVerified == 'Yes' && auth()->user()->profile->monthlyFee): ?>
      <small><?php echo e('(' . opt('payment-settings.currency_symbol') . number_format(auth()->user()->balance,2) . ')'); ?></small>
      <?php endif; ?>
    </a>
  </li>
  <?php endif; ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('browseCreators')); ?>"><?php echo app('translator')->get('navigation.exploreCreators'); ?></a>
  </li>
  <?php if( auth()->guest() ): ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo app('translator')->get('navigation.signUp'); ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('navigation.login'); ?></a>
  </li>
  <?php else: ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><?php echo app('translator')->get('navigation.logout'); ?></a>
  </li>
  <?php endif; ?>
</ul>
</div>


<div class="mobile-navi d-block d-sm-block d-md-none">
  
  
  
  
    
    <a href="<?php echo e(route('startMyPage')); ?>" class="text-dark" data-toggle="collapse" data-target="#collapseExampleMobile" aria-expanded="false" aria-controls="collapseExampleMobile">
      <i class="fas fa-bars mr-1"></i>
    </a>
                                          
</ul>
</div>
</nav>

<?php if(! auth()->guest() ): ?>
<div class="collapse" id="collapseExample">
  <div class="card card-body mt-5">
    <ul class="nav flex-column">
      <?php if( isset( auth()->user()->profile ) ): ?>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="/<?php echo e(auth()->user()->profile->username); ?>">
          <i class="far fa-meh-blank mr-1"></i>
          <?php echo app('translator')->get('dashboard.viewProfile'); ?>
        </a>
      </li>
      <?php endif; ?>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'my-profile'): ?> side-active <?php endif; ?>" href="<?php echo e(route('startMyPage')); ?>">
          <i class="far fa-edit mr-1"></i>
          <?php echo app('translator')->get('dashboard.myProfile'); ?>
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="/<?php echo e(auth()->user()->profile->username); ?>">
          <i class="fas fa-pen-alt mr-1"></i>
            <?php echo app('translator')->get('dashboard.createPost'); ?>
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="<?php echo e(route('messages.inbox')); ?>">
          <i class="far fa-envelope mr-1"></i> 
          <?php echo app('translator')->get('navigation.messages'); ?>
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'my-subscribers'): ?> side-active <?php endif; ?>" href="<?php echo e(route('mySubscribers')); ?>">
          <i class="fas fa-user-lock"></i> 
          <?php echo app('translator')->get('navigation.my-subscribers'); ?>
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'my-subscriptions'): ?> side-active <?php endif; ?>" href="<?php echo e(route('mySubscriptions')); ?>">
          <i class="fas fa-user-edit"></i>
          <?php echo app('translator')->get('navigation.my-subscriptions'); ?>
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="<?php echo e(route('billing.history')); ?>">
          <i class="fas fa-file-invoice-dollar mr-2"></i>
          <?php echo app('translator')->get('navigation.billing'); ?>
        </a>
      </li>
      <?php if( opt('stripeEnable', 'No') == 'Yes' OR opt('card_gateway', 'Stripe') == 'PayStack' ): ?>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="<?php echo e(route('billing.cards')); ?>">
          <i class="fas fa-credit-card mr-1"></i> 
          <?php echo app('translator')->get('navigation.cards'); ?>
        </a>
      </li>
      <?php endif; ?>
      <?php if(auth()->user()->profile->isVerified == 'Yes'): ?>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'withdraw'): ?> side-active <?php endif; ?>" href="<?php echo e(route( 'profile.withdrawal' )); ?>">
          <i class="fas fa-coins mr-1"></i> <?php echo app('translator')->get('dashboard.withdrawal'); ?>
        </a>
      </li>
      <?php endif; ?>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'set-fee'): ?> side-active <?php endif; ?>" href="<?php echo e(route( 'profile.setFee' )); ?>">
          <i class="fas fa-comment-dollar mr-1"></i> <?php echo app('translator')->get('dashboard.creatorSetup'); ?>
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'settings'): ?> side-active <?php endif; ?>" href="<?php echo e(route('accountSettings')); ?>">
          <i class="fas fa-cog mr-1"></i> <?php echo app('translator')->get('dashboard.accountSettings'); ?>
        </a>
      </li>
    </ul>
  </div>
</div>
<?php endif; ?>


<div class="collapse" id="collapseExampleMobile">
  <div class="card card-body mt-5">
    <ul class="nav flex-column">
      <?php if(! auth()->guest() ): ?>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'feed'): ?> side-active <?php endif; ?>"  href="<?php echo e(route('feed')); ?>">
          <i class="fas fa-home mr-1"></i> <?php echo app('translator')->get('navigation.feed'); ?>
        </a>        
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'browse-creators'): ?> side-active <?php endif; ?>"  href="<?php echo e(route('browseCreators')); ?>">
          <i class="fas fa-safari mr-1"></i> <?php echo app('translator')->get('navigation.exploreCreators'); ?>
        </a>        
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'notifications'): ?> side-active <?php endif; ?>"  href="<?php echo e(route('notifications.index')); ?>">
          <i class="fas fa-bell mr-1"></i> <?php echo app('translator')->get('navigation.myNotifications'); ?>
        </a>        
      </li>      
      
      <?php if( isset( auth()->user()->profile ) ): ?>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="/<?php echo e(auth()->user()->profile->username); ?>">
          <i class="far fa-meh-blank mr-1"></i>
          <?php echo app('translator')->get('dashboard.viewProfile'); ?>
        </a>
      </li>
      <?php endif; ?>

      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'my-profile'): ?> side-active <?php endif; ?>" href="<?php echo e(route('startMyPage')); ?>">
          <i class="far fa-edit mr-1"></i>
          <?php echo app('translator')->get('dashboard.myProfile'); ?>
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="/<?php echo e(auth()->user()->profile->username); ?>">
          <i class="fas fa-pen-alt mr-1"></i>
            <?php echo app('translator')->get('dashboard.createPost'); ?>
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="<?php echo e(route('messages.inbox')); ?>">
          <i class="far fa-envelope mr-1"></i> 
          <?php echo app('translator')->get('navigation.messages'); ?>
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'my-subscribers'): ?> side-active <?php endif; ?>" href="<?php echo e(route('mySubscribers')); ?>">
          <i class="fas fa-user-lock"></i> 
          <?php echo app('translator')->get('navigation.my-subscribers'); ?>
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'my-subscriptions'): ?> side-active <?php endif; ?>" href="<?php echo e(route('mySubscriptions')); ?>">
          <i class="fas fa-user-edit"></i>
          <?php echo app('translator')->get('navigation.my-subscriptions'); ?>
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="<?php echo e(route('billing.history')); ?>">
          <i class="fas fa-file-invoice-dollar mr-2"></i>
          <?php echo app('translator')->get('navigation.billing'); ?>
        </a>
      </li>
      <?php if( opt('stripeEnable', 'No') == 'Yes' OR opt('card_gateway', 'Stripe') == 'PayStack' ): ?>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="<?php echo e(route('billing.cards')); ?>">
          <i class="fas fa-credit-card mr-1"></i> 
          <?php echo app('translator')->get('navigation.cards'); ?>
        </a>
      </li>
      <?php endif; ?>
      <?php if(auth()->user()->profile->isVerified == 'Yes'): ?>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'withdraw'): ?> side-active <?php endif; ?>" href="<?php echo e(route( 'profile.withdrawal' )); ?>">
          <i class="fas fa-coins mr-1"></i> <?php echo app('translator')->get('dashboard.withdrawal'); ?>
        </a>
      </li>
      <?php endif; ?>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'set-fee'): ?> side-active <?php endif; ?>" href="<?php echo e(route( 'profile.setFee' )); ?>">
          <i class="fas fa-comment-dollar mr-1"></i> <?php echo app('translator')->get('dashboard.creatorSetup'); ?>
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'settings'): ?> side-active <?php endif; ?>" href="<?php echo e(route('accountSettings')); ?>">
          <i class="fas fa-cog mr-1"></i> <?php echo app('translator')->get('dashboard.accountSettings'); ?>
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'logout'): ?> side-active <?php endif; ?>"  href="<?php echo e(route('logout')); ?>"                    
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt mr-1"></i> <?php echo app('translator')->get('navigation.logout'); ?>
        </a>        
      </li>
      <?php else: ?>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'home'): ?> side-active <?php endif; ?>"  href="/">
          <i class="fas fa-home mr-1"></i> <?php echo app('translator')->get('navigation.home'); ?>
        </a>        
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'browse-creators'): ?> side-active <?php endif; ?>"  href="<?php echo e(route('browseCreators')); ?>">
          <i class="fas fa-safari mr-1"></i> <?php echo app('translator')->get('navigation.exploreCreators'); ?>
        </a>        
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'register'): ?> side-active <?php endif; ?>" href="<?php echo e(route('register')); ?>">
          <i class="fas fa-user-plus mr-1"></i> <?php echo app('translator')->get('navigation.signUp'); ?>
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'login'): ?> side-active <?php endif; ?>" href="<?php echo e(route('login')); ?>">
          <i class="fas fa-sign-in-alt mr-1"></i> <?php echo app('translator')->get('navigation.login'); ?>   

        </a>
      </li>

      <?php endif; ?>

    </ul>
  </div>
</div>
<?php /**PATH /var/www/html/private_html/resources/views/partials/topnavi.blade.php ENDPATH**/ ?>