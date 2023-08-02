<div class="navbar-top">
    <div class="navbar-top-left">
        {{-- @include ('admin::layouts.mobile-nav') --}}

        <div class="brand-logo">
            <a href="{{route('admin.dashboard')}}">
                <img src="{{ asset('admin/images/logo.png') }}" alt="logo">
            </a>
        </div>
    </div>

    <div class="navbar-top-right">
        <div class="profile">
            <span class="avatar">
            </span>

            {{-- <div class="store">
                <div>
                    <a href="/" target="_blank" style="display: inline-block; vertical-align: middle;">
                        <span class="icon store-icon" data-toggle="tooltip" data-placement="bottom"
                            title="{{ __('admin::app.layouts.visit-shop') }}"></span>
                    </a>
                </div>
            </div> --}}

            <div class="notifications dropdown-open">
                <div data-toggle="tooltip" data-placement="bottom" title="Notification" class="dropdown-toggle">
                    <i class="icon notification-icon active" style="margin-left: 0px;"></i>
                </div>
                <div class="dropdown-list bottom-right notification" style="display: none;">
                    <div class="dropdown-container">
                        <ul class="notif">
                            <div id="notif-title">Notifications</div>
                            <li class="bottom-li">
                                <a href="http://127.0.0.1:8080/admin/notifications">View All Notifications</a>
                                <button disabled="disabled" class="read-all" style="opacity: 0.5;">
                                    Mark as Read
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- <notification
                notif-title="{{ __('admin::app.notification.notification-title', ['read' => 0]) }}"
                get-notification-url="{{ route('admin.notification.get_notification') }}"
                view-all="{{ route('admin.notification.index') }}"
                order-view-url="{{ \URL::to('/') }}/{{ config('app.admin_url')}}/viewed-notifications/"
                pusher-key="{{ env('PUSHER_APP_KEY') }}"
                pusher-cluster="{{ env('PUSHER_APP_CLUSTER') }}"
                title="{{ __('admin::app.notification.title-plural') }}"
                view-all-title="{{ __('admin::app.notification.view-all') }}"
                get-read-all-url="{{ route('admin.notification.read_all') }}"
                order-status-messages="{{ json_encode($orderStatusMessages) }}"
                read-all-title="{{ __('admin::app.notification.read-all') }}"
                locale-code={{ core()->getCurrentLocale()->code }}>

                <div class="notifications">
                    <div class="dropdown-toggle">
                        <i class="icon notification-icon active" style="margin-left: 0px;"></i>
                    </div>
                </div>

            </notification> --}}

            <div class="profile-info">
                <div class="dropdown-toggle">
                    <div style="display: inline-block; vertical-align: middle;">
                        <div class="profile-info-div">
                            <div class="profile-info-icon">
                                <img src="https://cdn1.iconfinder.com/data/icons/avatar-2-2/512/Programmer-512.png"
                                    alt="Avata" />
                            </div>


                            <div class="profile-info-desc">
                                <span class="name">
                                    Ikram Asif Khan
                                </span>

                                <span class="role">
                                    Super Admin
                                </span>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="dropdown-list bottom-right">
                    <div class="dropdown-container">
                        <ul>
                            <li>
                                {{-- <a href="{{route('admin.profile.edit')}}">Edit account</a> --}}
                                <a href="{{route('admin.account')}}">My account</a>
                            </li>

                            <li>
                                <form action="{{route('admin.logout')}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Logout</button>
                                </form>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
