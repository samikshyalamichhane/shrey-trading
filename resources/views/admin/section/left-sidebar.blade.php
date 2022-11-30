<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{asset('/assets/admin/images/admin-avatar.png')}}" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong"></div>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="{{route('dashboard')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            @if(auth()->user())
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-plane"></i>
                    <span class="nav-label">Users</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('users.create')}}">
                            <span class="fa fa-plus"></span>
                            Add User
                        </a>
                    </li>
                    <li>
                        <a href="{{route('users.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Users
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-plane"></i>
                    <span class="nav-label">Clients</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('clients.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Clients
                        </a>
                    </li>
                    <li>
                        <a href="{{route('clients.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Clients
                        </a>
                    </li>

                </ul>
            </li>
            @endif
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-plane"></i>
                    <span class="nav-label">Products</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    @if(auth()->user())
                    <li>
                        <a href="{{route('products.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Product
                        </a>
                    </li>
                    @endif
                    @if(auth()->guard('client')->user() || auth()->user())
                    <li>
                        <a href="{{route('products.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Products
                        </a>
                    </li>
                    @endif

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-plane"></i>
                    <span class="nav-label">Orders</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    @if(auth()->user())
                    <li>
                        <a href="{{route('orders.index')}}">
                            <span class="fa fa-plus"></span>
                            All Orders
                        </a>
                    </li>
                    @endif
                    @if(auth()->guard('client')->user())
                    <li>
                        <a href="{{route('orders.index')}}">
                            <span class="fa fa-circle-o"></span>
                            My Orders
                        </a>
                    </li>
                    @endif

                </ul>
            </li>
           
        </ul>
    </div>
</nav>