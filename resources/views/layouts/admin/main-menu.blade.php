<li class="header">MAIN MENU</li>
<!-- Optionally, you can add icons to the links -->
@php
    if(!isset($selectedMenuItem)) {
        $selectedMenuItem = 'unknown';
    }
@endphp
<li @if($selectedMenuItem == 'dashboard') class="active" @endif ><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
<li @if($selectedMenuItem == 'new-blog-post') class="active" @endif><a href="{{url('/admin/blog/edit-post/new')}}"><i class="fa fa-pencil"></i> <span>{{__('New Post')}}</span></a></li>
<li @if($selectedMenuItem == 'blog-posts-list') class="active" @endif><a href="{{url('/admin/blog/posts')}}"><i class="fa fa-pencil-square-o"></i> <span>{{__('Blog Posts')}}</span></a></li>
<li @if($selectedMenuItem == 'tasks-list') class="active" @endif><a href="{{url('/admin/tasks')}}"><i class="fa fa-tasks"></i> <span>{{__('Tasks')}}</span></a></li>
<li @if($selectedMenuItem == 'profile') class="active" @endif ><a href="{{ url('/admin/profile') }}"><i class="fa fa-user"></i> <span>Profile</span></a></li>
<li class="treeview">
    <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="#">Link in level 2</a></li>
        <li><a href="#">Link in level 2</a></li>
    </ul>
</li>
