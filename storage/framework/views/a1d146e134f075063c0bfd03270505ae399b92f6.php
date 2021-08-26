<nav class="navbar navbar-expand-md navbar-light navbar-white fixed-top bg-white">
<div class="collapse navbar-collapse d-none d-sm-none d-md-block" id="navbarsExampleDefault">
  <ul class="topnavi">
    <li class="nav-item">
      <a class="nav-link" href="/"><img src="<?php echo e(asset("images/icons/home.svg")); ?>" alt="Home Icon"></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo e(route('notifications.index')); ?>"><img src="<?php echo e(asset("images/icons/bell.svg")); ?>" alt="Bell Icon"></a>
    </li>
    <li class="nav-item">
      <a class="nav-link add-content" href="/">+</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo e(route('messages.inbox')); ?>"><img src="<?php echo e(asset("images/icons/chat-dots.svg")); ?>" alt="Chat-Dots Icon"></a>
    </li>
  </ul>
  <div class="hamburger-content">
    <button class="hamburger" type="button" data-toggle="dropdown">
      <img src="<?php echo e(asset("images/icons/menu.svg")); ?>" alt="Menu Icon">
    </button>
    <ul class="flex-column dropdown-menu">
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
        <li class="nav-item nav-item-side d-none mobile-only">
          <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'notifications'): ?> side-active <?php endif; ?>"  href="<?php echo e(route('notifications.index')); ?>">
            <i class="fas fa-bell mr-1"></i> <?php echo app('translator')->get('navigation.myNotifications'); ?>
          </a>
        </li>
        <li class="nav-item nav-item-side d-none mobile-only">
          <a class="nav-link nav-side-link <?php if(isset($active) && $active == 'add-content'): ?> side-active <?php endif; ?>"  href="/">
            <img src="images/icons/plus.svg" alt="Plus Icon"> <?php echo app('translator')->get('navigation.add-content'); ?>
          </a>
        </li>
        <li class="nav-item nav-item-side d-none mobile-only">
          <a class="nav-link nav-side-link" href="<?php echo e(route('messages.inbox')); ?>">
            <i class="far fa-envelope mr-1"></i> <?php echo app('translator')->get('navigation.messages'); ?>
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