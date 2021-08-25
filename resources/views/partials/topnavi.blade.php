<nav class="navbar navbar-expand-md navbar-light navbar-white fixed-top bg-white">
<a class="navbar-brand" href="{{ route('home') }}">
  @if($logo = opt('site_logo'))
    <img src="{{ asset($logo) }}" alt="logo" class="site-logo"/>
  @else
    {{ opt( 'site_title' ) }}
  @endif
</a>
<div class="collapse navbar-collapse d-none d-sm-none d-md-block" id="navbarsExampleDefault">
<ul class="navbar-nav">
  @if( auth()->guest() )
  <li class="nav-item">
    <a class="nav-link" href="/">@lang( 'navigation.home' ) <span class="sr-only">(current)</span></a>
  </li>
  @endif
  @if( !auth()->guest() )
  <li class="nav-item">
    <a class="nav-link" href="{{ route('feed') }}">@lang('navigation.feed')</a>
  </li>
  <li class="nav-item">
    @livewire('notifications-icon')
  </li>
  <li class="nav-item">
      @livewire('unread-messages-count')
  </li>
  @endif
  <li class="nav-item">
    <a class="nav-link" href="@if(auth()->guest()) {{ route('register') }} @else {{ route('profile.show', ['username' => auth()->user()->profile->username ]) }} @endif">
      @if( auth()->guest() )
        @lang('navigation.startMyPage')
      @else
        @lang('navigation.myProfile')
      @endif
    </a>
  </li>
  @if(!auth()->guest())
  <li class="nav-item">
    <a class="nav-link" href="{{  route('startMyPage') }}">
      @lang('navigation.account')
      @if(auth()->user()->profile->isVerified == 'Yes' && auth()->user()->profile->monthlyFee)
      <small>{{ '(' . opt('payment-settings.currency_symbol') . number_format(auth()->user()->balance,2) . ')' }}</small>
      @endif
    </a>
  </li>
  @endif
  <li class="nav-item">
    <a class="nav-link" href="{{ route('browseCreators') }}">@lang('navigation.exploreCreators')</a>
  </li>
  @if( auth()->guest() )
  <li class="nav-item">
    <a class="nav-link" href="{{ route('register') }}">@lang('navigation.signUp')</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">@lang('navigation.login')</a>
  </li>
  @else
  <li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">@lang('navigation.logout')</a>
  </li>
  @endif
</ul>
</div>


<div class="mobile-navi d-block d-sm-block d-md-none">
  
  
  
  
    
    <a href="{{ route('startMyPage') }}" class="text-dark" data-toggle="collapse" data-target="#collapseExampleMobile" aria-expanded="false" aria-controls="collapseExampleMobile">
      <i class="fas fa-bars mr-1"></i>
    </a>
                                          
</ul>
</div>
</nav>

@if(! auth()->guest() )
<div class="collapse" id="collapseExample">
  <div class="card card-body mt-5">
    <ul class="nav flex-column">
      @if( isset( auth()->user()->profile ) )
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="/{{ auth()->user()->profile->username }}">
          <i class="far fa-meh-blank mr-1"></i>
          @lang('dashboard.viewProfile')
        </a>
      </li>
      @endif
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'my-profile') side-active @endif" href="{{ route('startMyPage') }}">
          <i class="far fa-edit mr-1"></i>
          @lang('dashboard.myProfile')
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="/{{ auth()->user()->profile->username }}">
          <i class="fas fa-pen-alt mr-1"></i>
            @lang('dashboard.createPost')
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="{{ route('messages.inbox') }}">
          <i class="far fa-envelope mr-1"></i> 
          @lang('navigation.messages')
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'my-subscribers') side-active @endif" href="{{ route('mySubscribers') }}">
          <i class="fas fa-user-lock"></i> 
          @lang('navigation.my-subscribers')
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'my-subscriptions') side-active @endif" href="{{ route('mySubscriptions') }}">
          <i class="fas fa-user-edit"></i>
          @lang('navigation.my-subscriptions')
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="{{ route('billing.history') }}">
          <i class="fas fa-file-invoice-dollar mr-2"></i>
          @lang('navigation.billing')
        </a>
      </li>
      @if( opt('stripeEnable', 'No') == 'Yes' OR opt('card_gateway', 'Stripe') == 'PayStack' )
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="{{ route('billing.cards') }}">
          <i class="fas fa-credit-card mr-1"></i> 
          @lang('navigation.cards')
        </a>
      </li>
      @endif
      @if(auth()->user()->profile->isVerified == 'Yes')
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'withdraw') side-active @endif" href="{{ route( 'profile.withdrawal' )}}">
          <i class="fas fa-coins mr-1"></i> @lang('dashboard.withdrawal')
        </a>
      </li>
      @endif
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'set-fee') side-active @endif" href="{{ route( 'profile.setFee' )}}">
          <i class="fas fa-comment-dollar mr-1"></i> @lang('dashboard.creatorSetup')
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'settings') side-active @endif" href="{{ route('accountSettings') }}">
          <i class="fas fa-cog mr-1"></i> @lang('dashboard.accountSettings')
        </a>
      </li>
    </ul>
  </div>
</div>
@endif


<div class="collapse" id="collapseExampleMobile">
  <div class="card card-body mt-5">
    <ul class="nav flex-column">
      @if(! auth()->guest() )
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'feed') side-active @endif"  href="{{ route('feed') }}">
          <i class="fas fa-home mr-1"></i> @lang('navigation.feed')
        </a>        
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'browse-creators') side-active @endif"  href="{{ route('browseCreators') }}">
          <i class="fas fa-safari mr-1"></i> @lang('navigation.exploreCreators')
        </a>        
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'notifications') side-active @endif"  href="{{ route('notifications.index') }}">
          <i class="fas fa-bell mr-1"></i> @lang('navigation.myNotifications')
        </a>        
      </li>      
      
      @if( isset( auth()->user()->profile ) )
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="/{{ auth()->user()->profile->username }}">
          <i class="far fa-meh-blank mr-1"></i>
          @lang('dashboard.viewProfile')
        </a>
      </li>
      @endif

      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'my-profile') side-active @endif" href="{{ route('startMyPage') }}">
          <i class="far fa-edit mr-1"></i>
          @lang('dashboard.myProfile')
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="/{{ auth()->user()->profile->username }}">
          <i class="fas fa-pen-alt mr-1"></i>
            @lang('dashboard.createPost')
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="{{ route('messages.inbox') }}">
          <i class="far fa-envelope mr-1"></i> 
          @lang('navigation.messages')
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'my-subscribers') side-active @endif" href="{{ route('mySubscribers') }}">
          <i class="fas fa-user-lock"></i> 
          @lang('navigation.my-subscribers')
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'my-subscriptions') side-active @endif" href="{{ route('mySubscriptions') }}">
          <i class="fas fa-user-edit"></i>
          @lang('navigation.my-subscriptions')
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="{{ route('billing.history') }}">
          <i class="fas fa-file-invoice-dollar mr-2"></i>
          @lang('navigation.billing')
        </a>
      </li>
      @if( opt('stripeEnable', 'No') == 'Yes' OR opt('card_gateway', 'Stripe') == 'PayStack' )
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link" href="{{ route('billing.cards') }}">
          <i class="fas fa-credit-card mr-1"></i> 
          @lang('navigation.cards')
        </a>
      </li>
      @endif
      @if(auth()->user()->profile->isVerified == 'Yes')
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'withdraw') side-active @endif" href="{{ route( 'profile.withdrawal' )}}">
          <i class="fas fa-coins mr-1"></i> @lang('dashboard.withdrawal')
        </a>
      </li>
      @endif
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'set-fee') side-active @endif" href="{{ route( 'profile.setFee' )}}">
          <i class="fas fa-comment-dollar mr-1"></i> @lang('dashboard.creatorSetup')
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'settings') side-active @endif" href="{{ route('accountSettings') }}">
          <i class="fas fa-cog mr-1"></i> @lang('dashboard.accountSettings')
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'logout') side-active @endif"  href="{{ route('logout') }}"                    
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt mr-1"></i> @lang('navigation.logout')
        </a>        
      </li>
      @else
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'home') side-active @endif"  href="/">
          <i class="fas fa-home mr-1"></i> @lang('navigation.home')
        </a>        
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'browse-creators') side-active @endif"  href="{{ route('browseCreators') }}">
          <i class="fas fa-safari mr-1"></i> @lang('navigation.exploreCreators')
        </a>        
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'register') side-active @endif" href="{{ route('register') }}">
          <i class="fas fa-user-plus mr-1"></i> @lang('navigation.signUp')
        </a>
      </li>
      <li class="nav-item nav-item-side">
        <a class="nav-link nav-side-link @if(isset($active) && $active == 'login') side-active @endif" href="{{ route('login') }}">
          <i class="fas fa-sign-in-alt mr-1"></i> @lang('navigation.login')   

        </a>
      </li>

      @endif

    </ul>
  </div>
</div>
