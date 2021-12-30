<form class="form-inline mr-auto" action="#">
    <ul class="navbar-nav mr-3">
        @if(Auth::user()->id == 1)
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        @endif

    </ul>
</form>
<ul class="navbar-nav navbar-right">

    @if (Auth::user()->id == 1)

    <li class="dropdown">
        <a class="fa fa-bell nav-link nav-link-lg nav-link-user  " href="#" data-toggle="dropdown">
            <span class="badge badge-danger" style="">{{auth()->user()->unreadNotifications->count()}}</span>
            {{-- <span class="badge text-danger">{{auth()->user()->unreadNotifications->count()}}</span> --}}
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Notificacion</div>
            @foreach (auth()->user()->unreadNotifications as $notification)
                <a class="dropdown-item" href="#">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$notification->created_at}}</h6>
                            <p class="card-text">
                                {{$notification->data['name'].' '.$notification->data['last_name']}}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </li>
    @endif

    @if(\Illuminate\Support\Facades\Auth::user())
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('img/logo.png') }}"
                class="rounded-circle mr-1 thumbnail-rounded user-thumbnail ">
            <div class="d-sm-none d-lg-inline-block">
                ¡Hello! {{\Illuminate\Support\Facades\Auth::user()->name}}
                {{\Illuminate\Support\Facades\Auth::user()->last_name}}</div>
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">
                Welcome, {{\Illuminate\Support\Facades\Auth::user()->name}}</div>


            <a class="dropdown-item has-icon" data-toggle="modal" data-target="#changePasswordModal"
                href="{{ route('changepassword')}}" data-id="{{ \Auth::id() }}"><i class="fa fa-lock"> </i>Change
                Password</a>

            <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                {{ csrf_field() }}
            </form>
        </div>
    </li>
    @else
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            {{--                <img alt="image" src="#" class="rounded-circle mr-1">--}}
            <div class="d-sm-none d-lg-inline-block">{{ __('messages.common.hello') }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">{{ __('messages.common.login') }}
                / {{ __('messages.common.register') }}</div>
            <a href="{{ route('login') }}" class="dropdown-item has-icon">
                <i class="fas fa-sign-in-alt"></i> {{ __('messages.common.login') }}
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('register') }}" class="dropdown-item has-icon">
                <i class="fas fa-user-plus"></i> {{ __('messages.common.register') }}
            </a>
        </div>
    </li>
    @endif
</ul>