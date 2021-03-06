@if(Auth::user()->hasRole(['ROLE_ADMIN']))
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3>
            <span class="fa-fw open-close">
                <i class="ti-close ti-menu"></i>
            </span>
                <span class="hide-menu">Navigation</span>
            </h3>
        </div>
        <div class="user-profile">
        </div>
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{url('/admin')}}" class="waves-effect">
                    <i data-icon="7" class="mdi mdi-av-timer fa-fw"></i>
                    <span class="hide-menu">Dashboard </span>
                </a>
            </li>
            <li>
                <a href="https://webmail.habexagro.com" target="_blank" class="waves-effect">
                    <i class="mdi mdi-email"></i>
                    <span class="hide-menu"> Mail</span>
                    <i class="mdi mdi-open-in-new pull-right"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)" class="waves-effect">
                    <i data-icon="/" class="mdi mdi-account-multiple"></i>
                    <span class="hide-menu"> Farmers<span class="fa arrow"></span>
                    <span class="label label-rouded label-purple pull-right"></span>
                </span>
                </a>
                <ul class="nav nav-second-level">
                    @if(Auth::user()->hasRole(['ROLE_ADMIN']) && !Auth::user()->hasRole(['ROLE_VIEW']))
                    <li>
                        <a href="{{url('/admin/farmer/add')}}">
                            <i data-icon=")" class="mdi mdi-account-plus"></i>
                            <span class="hide-menu"> New Farmer </span>
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{url('/admin/farmers')}}">
                            <i class="mdi mdi-account-multiple"></i>
                            <span class="hide-menu"> Farmers Accounts </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)" class="waves-effect">
                    <i data-icon="" class="mdi mdi-account-multiple"></i>
                    <span class="hide-menu"> Agronomists
                        <span class="fa arrow"></span>
                    </span>
                </a>
                <ul class="nav nav-second-level">
                    @if(Auth::user()->hasRole(['ROLE_ADMIN']) && !Auth::user()->hasRole(['ROLE_VIEW']))
                    <li>
                        <a href="{{url('/admin/agronomist/add')}}">
                            <i data-icon="/" class="mdi mdi-account-plus"></i>
                            <span class="hide-menu"> New Agronomist </span>
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{url('/admin/agronomists')}}">
                            <i data-icon="7" class="mdi mdi-account-multiple"></i>
                            <span class="hide-menu"> Agronomists Accounts </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{url('farm/map')}}" class="waves-effect">
                    <i class="mdi mdi-google-maps"></i>
                    <span class="hide-menu"> Farm Distribution </span>
                </a>
            </li>
            <li>
                <a href="{{url('/admin/farminfo')}}" class="waves-effect">
                    <i data-icon="" class="mdi mdi-pine-tree"></i>
                    <span class="hide-menu"> Farm Info </span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)" class="waves-effect">
                    <i data-icon="" class="mdi mdi-wallet"></i>
                    <span class="hide-menu"> Financials
                        <span class="fa arrow"></span>
                    </span>
                </a>
                <ul class="nav nav-second-level">
                    @if(Auth::user()->hasRole(['ROLE_ADMIN']) && !Auth::user()->hasRole(['ROLE_VIEW']))
                    <li>
                        <a href="{{url('/admin/order/addItem')}}">
                            <i data-icon="/" class="fa fa-file-o"></i>
                            <span class="hide-menu"> New Item</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/admin/order/add')}}">
                            <i data-icon="/" class="fa fa-edit"></i>
                            <span class="hide-menu"> New Order</span></a>
                    </li>
                    @endif
                    <li>
                        <a href="{{url('/admin/order/listItems')}}">
                            <i data-icon="/" class="fa fa-list-alt"></i>
                            <span class="hide-menu"> List Items</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/admin/orders')}}">
                            <i data-icon="7" class="fa  fa-list"></i>
                            <span class="hide-menu"> Orders</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)" class="waves-effect">
                    <i data-icon="" class="mdi mdi-wallet"></i>
                    <span class="hide-menu"> Payroll
                        <span class="fa arrow"></span>
                    </span>
                </a>
                <ul class="nav nav-second-level">
                    @if(Auth::user()->hasRole(['ROLE_ADMIN']) && !Auth::user()->hasRole(['ROLE_VIEW']))
                        <li>
                            <a href="{{url('/admin/salaries')}}">
                                <i class="fa fa-money"></i>
                                <span class="hide-menu"> Salaries</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/admin/payroll/add')}}">
                                <i data-icon="/" class="fa fa-edit"></i>
                                <span class="hide-menu"> New Payment</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{url('/admin/payroll/all')}}">
                            <i data-icon="7" class="fa  fa-list"></i>
                            <span class="hide-menu"> Payments</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li><a href="{{url('/admin/leave/all')}}" class="waves-effect">
                    <i data-icon="" class="mdi mdi-airplane-takeoff"></i>
                    <span class="hide-menu"> Leave Requests</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</div>
@elseif(Auth::user()->hasRole(['ROLE_AGRONOMIST']) || Auth::user()->hasRole(['ROLE_NURSERY']))
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3>
                    <span class="fa-fw open-close">
                        <i class="ti-close ti-menu"></i>
                    </span>
                    <span class="hide-menu">Navigation</span>
                </h3>
            </div>
            <div class="user-profile">
            </div>
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{url('/agronomist')}}" class="waves-effect">
                        <i data-icon="7" class="mdi mdi-av-timer fa-fw"></i>
                        <span class="hide-menu">Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="https://webmail.habexagro.com" target="_blank" class="waves-effect">
                        <i class="mdi mdi-email"></i>
                        <span class="hide-menu"> Mail</span>
                        <i class="mdi mdi-open-in-new pull-right"></i>
                    </a>
                </li>
                @if(Auth::user()->hasRole(['ROLE_AGRONOMIST']) && !Auth::user()->hasRole('ROLE_NURSERY'))
                <li>
                    <a href="javascript:void(0)" class="waves-effect">
                        <i data-icon="/" class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu"> Farmers
                            <span class="fa arrow"></span>
                            <span class="label label-rouded label-purple pull-right"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/agronomist/farmer/add')}}">
                                <i data-icon=")" class="mdi mdi-account-plus"></i>
                                <span class="hide-menu"> New Farmer </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/agronomist/farmers')}}">
                                <i class="mdi mdi-account-multiple"></i>
                                <span class="hide-menu"> Farmers Accounts </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('farm/map')}}" class="waves-effect">
                        <i class="mdi mdi-google-maps"></i>
                        <span class="hide-menu"> Farm Distribution </span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/agronomist/farminfo')}}" class="waves-effect">
                        <i data-icon="" class="mdi mdi-pine-tree"></i>
                        <span class="hide-menu"> Farm Info </span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->hasRole(['ROLE_NURSERY']))
                    <li>
                        <a href="{{url('/agronomist/nursery')}}" class="waves-effect">
                            <i data-icon="" class="mdi mdi-pine-tree"></i>
                            <span class="hide-menu"> Nursery</span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{url('/agronomist/leave/all')}}" class="waves-effect">
                        <i data-icon="" class="mdi mdi-airplane-takeoff"></i>
                        <span class="hide-menu"> Leave Requests</span>
                    </a>
                </li>
                <li>
                    <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="waves-effect">
                        <i class="mdi mdi-logout fa-fw"></i>
                        <span class="hide-menu">Log out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>
@elseif(Auth::user()->hasRole('ROLE_FINANCE'))
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3>
                    <span class="fa-fw open-close">
                        <i class="ti-close ti-menu"></i>
                    </span>
                    <span class="hide-menu">Navigation</span>
                </h3>
            </div>
            <div class="user-profile">
            </div>
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{url('/agronomist')}}" class="waves-effect">
                        <i data-icon="7" class="mdi mdi-av-timer fa-fw"></i>
                        <span class="hide-menu">Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="https://webmail.habexagro.com" target="_blank" class="waves-effect">
                        <i class="mdi mdi-email"></i>
                        <span class="hide-menu"> Mail</span>
                        <i class="mdi mdi-open-in-new pull-right"></i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="waves-effect">
                        <i data-icon="" class="mdi mdi-wallet"></i>
                        <span class="hide-menu"> Financials
                        <span class="fa arrow"></span>
                    </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/finance/orders')}}">
                                <i data-icon="7" class="fa  fa-list"></i>
                                <span class="hide-menu"> Orders</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="waves-effect">
                        <i data-icon="" class="mdi mdi-wallet"></i>
                        <span class="hide-menu"> Payroll
                        <span class="fa arrow"></span>
                    </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/finance/salaries')}}">
                                <i class="fa fa-money"></i>
                                <span class="hide-menu"> Salaries</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/finance/payroll/add')}}">
                                <i data-icon="/" class="fa fa-edit"></i>
                                <span class="hide-menu"> New Payment</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/finance/payroll/all')}}">
                                <i data-icon="7" class="fa  fa-list"></i>
                                <span class="hide-menu"> Payments</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('/finance/leave/all')}}" class="waves-effect">
                        <i data-icon="" class="mdi mdi-airplane-takeoff"></i>
                        <span class="hide-menu"> Leave Requests</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="waves-effect">
                        <i class="mdi mdi-logout fa-fw"></i>
                        <span class="hide-menu">Log out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>
@endif