<div class="breadcrumb-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="breadcome-heading">
                                <h3>@yield('nav-title')</h3>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <ul class="nav menu-listing">
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('unassigned_list') ? 'active' : '' }}"
                                        href="{{ route('unassigned_list') }}">Unassigned
                                        List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('collection_pending_list') ? 'active' : '' }}"
                                        href="{{ route('collection_pending_list') }}">Collection
                                        Pending</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('collected') ? 'active' : '' }}"
                                        href="{{ route('collected') }}">Collected</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('customer_list') ? 'active' : '' }}"
                                        href="{{ route('customer_list') }}">Customer
                                        List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('employe_list') ? 'active' : '' }}"
                                        href="{{ route('employe_list') }}">Employe List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('route_list') ? 'active' : '' }}"
                                        href="{{ route('route_list') }}">Route List</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
