<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>Home</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('animal') }}'><i class='nav-icon las la-paw'></i> Animals</a></li>
@role('Admin')<li class='nav-item'><a class='nav-link' href='{{ backpack_url('animal-species') }}'><i class='nav-icon las la-paw'></i> Animal species</a></li>@endrole
@role('Admin')<li class='nav-item'><a class='nav-link' href='{{ backpack_url('breed') }}'><i class='nav-icon las la-paw'></i> Breeds</a></li>@endrole
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('animal') }}'><i class='nav-icon las la-envelope-open-text'></i> Contacts</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('animal') }}'><i class='nav-icon las la-info'></i> About us</a></li>
<!-- Users, Roles, Permissions -->
@role('Admin')
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>
@endrole

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>