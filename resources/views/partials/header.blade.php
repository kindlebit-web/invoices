<div class="header py-4">
  <div class="container">
    <div class="d-flex">
     <a class="header-brand" href="{{url('/')}}">
        <img src="{{asset('images/logo.svg')}}" class="header-brand-img" alt=" {{ config('app.name', 'Laravel') }}">
        <span>  {{ config('app.name', 'Laravel') }}</span>
    </a>
      <div class="d-flex order-lg-2 ml-auto">
                @auth
                     <div class="dropdown">
                         <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                          <span class="avatar avatar-placeholder"></span>
                          <span class="ml-2 d-none d-lg-block">
                            <span class="text-default">{{ ucfirst(Auth::user()->name) }}</span>
                          </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          {{-- <a class="dropdown-item" href="#">
                            <i class="dropdown-icon fe fe-user"></i> Profile
                          </a> --}}
                          <a class="dropdown-item" href="{{ route('settings.index') }}">
                            <i class="dropdown-icon fe fe-settings"></i> Settings
                          </a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                            <i class="dropdown-icon fe fe-log-out"></i> Sign out
                          </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                        </div>
                      </div>  
                  @else
                      <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                        <li class="nav-item">
                        <a href="{{ route('login') }}">Login</a>
                        </li>

                      @if (Route::has('register'))
                          <li class="nav-item">
                          <a href="{{ route('register') }}">Register</a>
                          </li>
                      @endif
                     </ul>
              @endauth
      </div>
      <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
        <span class="header-toggler-icon"></span>
      </a>
    </div>
  </div>
</div>
<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
  @auth
  <div class="container">
    <div class="row align-items-center">
      
      <!-- search form starts -->
     @php
      $segment = request()->segment(1);
     @endphp
     @if(in_array($segment, ['customers', 'invoices']))
        <div class="col-lg-3 ml-auto">
          <form class="input-icon my-3 my-lg-0" action="{{ route($segment.'.index') }}">
            <input type="search" name="s" class="form-control header-search" placeholder="Search…" tabindex="1" value="{{ request()->get('s') }}">
            <div class="input-icon-addon">
              <i class="fe fe-search"></i>
            </div>
          </form>
        </div>
     @endif
      <!-- search form starts -->

  <div class="col-lg order-lg-first">
    <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
      <li class="nav-item">
        <a href="{{url('/')}}" class="nav-link {{ (!$segment) ? 'active' : '' }}"><i class="fe fe-home"></i> Home</a>
      </li>
      <li class="nav-item">
        <a href="{{url('/dashboard')}}" class="nav-link {{ ($segment == 'dashboard') ? 'active' : '' }}"><i class="fa fa-dashboard"></i> Dashboard</a>
      </li>
      <li class="nav-item">
        <a href="{{url('/customers')}}" class="nav-link  {{ ($segment == 'customers') ? 'active' : '' }}" ><i class="fe fe-user"></i> Customers</a>
      </li>
      <li class="nav-item dropdown">
        <a href="{{url('/invoices')}}" class="nav-link  {{ ($segment == 'invoices') ? 'active' : '' }}" ><i class="fe fe-file"></i> Invoices</a>
      </li>
    </ul>
   </div>
    </div>
  </div>
  @endauth
</div>
