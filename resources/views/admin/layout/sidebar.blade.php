<div class="navbar-left" v-bind:class="{'open': isMenuOpen}">
    <ul class="menubar">
        <li class="menu-item" title="Dashboard">
            <a href="{{ route('admin.dashboard') }}"
                class="menubar-anchor {{ currentRoute() === 'admin.dashboard' ? 'active' : '' }}">
                <span class="icon-menu icon dashboard-icon"></span>
                <span class="menu-label">Dashboard</span>
            </a>
        </li>

        <li class="menu-item {{ currentRoute() === 'admin.domains.index' ? 'active' : '' }}">
            <a href="{{route('admin.domains.index')}}" class="menubar-anchor">
                <span class="icon-menu icon catalog-icon"></span>
                <span class="menu-label">Customers</span>
                <span class="icon arrow-icon arrow-icon-left"></span>
            </a>
            <ul class="sub-menubar">
                <li class="sub-menu-item {{ currentRoute() === 'admin.domains.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.domains.index') }}">
                        <span class="menu-label">Domain</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{request()->segment(2) === 'staffs' || request()->segment(2) === 'customers' ? 'active' : ''}}">
            <a href="{{route('admin.cutomers.index')}}" class="menubar-anchor">
                <span class="icon-menu icon customer-icon"></span> 
                <span class="menu-label">Customers</span> 
                <span class="icon arrow-icon arrow-icon-left"></span>
            </a>
            <ul class="sub-menubar">
                <li class="sub-menu-item {{ currentRoute() === 'admin.staffs.index' ? 'active' : '' }}">
                    <a href="{{route('admin.staffs.index')}}">
                        <span class="menu-label">Staffs</span>
                    </a>
                </li>

                <li class="sub-menu-item {{ currentRoute() === 'admin.cutomers.index' ? 'active' : '' }}">
                    <a href="{{route('admin.cutomers.index')}}">
                        <span class="menu-label">Customers</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <nav-slide-button id="nav-expand-button" icon-class="accordian-right-icon"></nav-slide-button>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $(".menubar-anchor").click(function() {
                if ($(this).parent().attr('class') == 'menu-item active') {
                    $(this).parent().removeClass('active');
                    $('.arrow-icon-left').removeClass('rotate-arrow-icon');
                    $('.arrow-icon-right').removeClass('rotate-arrow-icon');
                    $(".sub-menubar").hide();
                    event.preventDefault();
                }
            });
        });
    </script>
@endpush
