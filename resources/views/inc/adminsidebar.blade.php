<!--***** SIDE NAVBAR *****-->
<nav class="side-navbar">
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="/uploads/avatars/{{ Auth::user()->picture }}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h4">{{ Auth::user()->first_name }}</h1>
            <span>{{ Auth::user()->email }}</span>
        </div>
    </div>  
    <hr>
    <!-- Sidebar Navidation Menus-->
    <ul class="list-unstyled">
        <li class="active"> <a href="/admin"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="/profile/{{ Auth::user()->id }}"><i class="fa fa-user-o"></i> <span>Profile</span></a></li>
        <li><a href="#booklate" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-book"></i>Booklate </a>
            <ul id="booklate" class="collapse list-unstyled">
                <li><a href="/booklate">All Booklate</a></li> 
                <li><a href="/booklate/create">Add Booklate</a></li> 
            </ul>
        </li>
        <li><a href="#questions" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-question"></i>Questions </a>
            <ul id="questions" class="collapse list-unstyled">
                <li><a href="/questions">All Questions</a></li> 
                <li><a href="/questions/create">Add Questions</a></li> 
            </ul>
        </li>
        <li><a href="#"><i class="fa fa-users"></i> <span>Users</span></a></li>
        <li><a href="#"><i class="fa fa-envelope"></i> <span>Messages</span></a></li>
    </ul>
</nav>