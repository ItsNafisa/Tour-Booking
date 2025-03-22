<div class="side-menu">
                <ul>
                    <!-- <li>
                       <a href="">
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li> -->
                    <li>
                       <a href="{{url('admin/profile')}}" class="{{Request::is('admin/profile') ? 'active':''}}">
                            <span class="las la-user-alt"></span>
                            <small>Profile</small>
                        </a>
                    </li>
                    <li>
                       <a href="{{url('admin/destination')}}" class="{{Request::is('admin/destination') ? 'active':''}}">
                            <span class="las la-envelope"></span>
                            <small>Destination</small>
                        </a>
                    </li>
                    <li>
                       <a href="{{url('admin/type')}}" class="{{Request::is('admin/type') ? 'active':''}}">
                            <span class="las la-clipboard-list"></span>
                            <small>Types</small>
                        </a>
                    </li>
                    <li>
                       <a href="{{url('admin/package/index')}}" class="{{Request::is('admin/package/index') ? 'active':''}}">
                            <span class="las la-shopping-cart"></span>
                            <small>Packages</small>
                        </a>
                    </li>
                    <li>
                       <a href="{{url('admin/reservation/index')}}" class="{{Request::is('admin/reservation/index') ? 'active':''}}">
                            <span class="las la-tasks"></span>
                            <small>Reservation</small>
                        </a>
                    </li>

                </ul>
            </div>
        </div>