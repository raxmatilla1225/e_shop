<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('admin_lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar users panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('storage/'.Auth::user()->image ) }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('personal')}}" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/users*')) active @endif">

                                <i class="fas fa-user nav-icon"></i>
                                <p>{{__('user.users')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('roles.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/roles')) active @endif">
                                <i class="fas fa-address-card nav-icon"></i>
                                <p>{{__('warehouse.roles')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('warehouse.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/warehouse*')) active @endif">
                                <i class="fas fa-landmark nav-icon"></i>
                                <p>{{__('warehouse.warehouse')}}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('status.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/status*')) active @endif">
                                <i class="fas fa-dice-one nav-icon"></i>
                                <p>{{__('status.status')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('types.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/type*')) active @endif">
                                <i class="fas fa-lightbulb nav-icon"></i>
                                <p>{{__('type.type')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('categories.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/categories*')) active @endif">

                                <i class="nav-icon fas fa-list"></i>
                                <p>{{__('category.categories')}}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('products.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/products*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('product.products')}}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('authors.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/authors*')) active @endif">
                                <i class="nav-icon fas fa-user"></i>
                                <p>{{__('author.authors')}}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('newsCategory.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/newsCategory*')) active @endif">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>{{__('new_category.new_category')}}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('news.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/news*')) active @endif">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>{{__('new.news')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user_role.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/user_role*')) active @endif">
                                <i class="nav-icon fas fa-users"></i>
                                <p>{{__('role_user.rolesUsers')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('propertytype.index')}}" class="nav-link">
                                <i class="fas fa-box     nav-icon"></i>
                                <p>PropertyTypes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('client.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/client*')) active @endif">
                                <i class="fas fa-person-booth nav-icon"></i>
                                <p>{{__('user.clients')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('provinces.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/provinces*')) active @endif">
                                <i class="fa fa-home nav-icon"></i>
                                <p>{{__('province.provinces')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>

    </div>

</aside>
