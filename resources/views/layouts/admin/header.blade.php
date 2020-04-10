<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1 col-xs-6">
                <div class="hamburger sidebar-toggle">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </div>
            <div class="col-lg-11 col-xs-6">
                <div class="float-right">
                    <ul>
                        <li class="header-icon dib"><i class="ti-bell"></i>
                            <div class="drop-down">
                                <div class="dropdown-content-heading">
                                    <span class="text-left">Recent Notifications</span>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        @php
                                            $unreadNotification = Auth::user()->unreadNotifications;
                                        @endphp
                                        @if(count($unreadNotification))
                                            @foreach($unreadNotification as $notification)
                                                @isset($notification->data['payment'])
                                                    <li>
                                                        <a href="#">
                                                            <div class="notification-content">
                                                                <small
                                                                    class="notification-timestamp pull-right">{{ $notification->created_at->diffForHumans() }}
                                                                </small>
                                                                <div class="notification-heading">
                                                                    {{ $notification->data["message"] }}
                                                                </div>
                                                                <div class="notification-text">$4000</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endisset
                                            @endforeach
                                        @else
                                            <li class="text-center">
                                                <p>No New Notification</p>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="header-icon dib"><span class="user-avatar">{{ Auth::user()->name }} <i
                                    class="ti-angle-down f-s-10"></i></span>
                            <div class="drop-down dropdown-profile">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="{{ route('admin.profile') }}"><i
                                                    class="ti-user"></i> <span>Change Profile</span></a></li>
                                        <li><a href="#" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                <i class="ti-power-off"></i>
                                                <span>{{ __('Logout') }}</span>
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
