<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon">
            <img src="{{asset('assets/images/logo/')}}/logo1.png" width="20%">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
@can('isSuper')
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
@endcan
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Links
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @can('isSuper')
    <li class="nav-item {!! Request::is('view-add-role-page') ? 'active':'' !!}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span>
        </a>
        <div id="collapseTwo" class="collapse @if(Request::is('view-add-role-page')|| Request::is('status-page') || Request::is('priority-page') || Request::is('caseType-page') || Request::is('department-page'))   show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">All Settings:</h6>
                <a class="collapse-item {!! Request::is('view-add-role-page') ? 'active':'' !!}" href="{{url('/view-add-role-page')}}">Add Role</a>
            </div>
        </div>
    </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-users-cog"></i>
                <span>Employee</span>
            </a>
            <div id="collapseUtilities" class="collapse {!! Request::is('manager-registration-page') ? 'show':'' !!}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Employee Related:</h6>
                    <a class="collapse-item {!! Request::is('manager-registration-page') ? 'active':'' !!}" href="{{url('/manager-registration-page')}}">Employee Management</a>
                 </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCase" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-users-cog"></i>
                <span>Photos</span>
            </a>
            <div id="collapseCase" class="collapse @if(Request::is('upload-photo-form') || Request::is('all-cases')) show @endif" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Photo Related:</h6>
                    <a class="collapse-item {!! Request::is('upload-photo-form') ? 'active':'' !!}" href="{{url('upload-photo-form')}}">Upload</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePatient" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-users-cog"></i>
                <span>Index Video</span>
            </a>
            <div id="collapsePatient" class="collapse {!! Request::is('home-video') ? 'show':'' !!}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Video Related:</h6>
                    <a class="collapse-item {!! Request::is('home-video') ? 'active':'' !!}" href="{{url('home-video')}}">Home Video</a>
                    {{--                <a class="collapse-item {!! Request::is('/all-cases') ? 'active':'' !!}" href="{{url('/all-cases')}}">All Cases</a>--}}
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlog" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-users-cog"></i>
                <span>Blog</span>
            </a>
            <div id="collapseBlog" class="collapse {!! Request::is('blog-form') ? 'show':'' !!}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Blog Related:</h6>
                    <a class="collapse-item {!! Request::is('blog-form') ? 'active':'' !!}" href="{{url('blog-form')}}">Blogs</a>
                    {{--                <a class="collapse-item {!! Request::is('/all-cases') ? 'active':'' !!}" href="{{url('/all-cases')}}">All Cases</a>--}}
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvent" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-users-cog"></i>
                <span>Event</span>
            </a>
            <div id="collapseEvent" class="collapse {!! Request::is('event-form') ? 'show':'' !!}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Event Related:</h6>
                    <a class="collapse-item {!! Request::is('event-form') ? 'active':'' !!}" href="{{url('event-form')}}">Events</a>
                    {{--                <a class="collapse-item {!! Request::is('/all-cases') ? 'active':'' !!}" href="{{url('/all-cases')}}">All Cases</a>--}}
                </div>
            </div>
        </li>
    @endcan


    <!-- Divider -->
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
