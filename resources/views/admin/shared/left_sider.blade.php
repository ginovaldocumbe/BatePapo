<div class="col-3">
    <div class="card overflow-hidden">
        <div class="card-body pt-3">
            <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.dashboard') ? 'text-white bg-primary' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <span>Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.users.index') ? 'text-white bg-primary' : '' }}"
                        href="{{ route('admin.users.index') }}">
                        <span>Users</span></a>
          
            </ul>
        </div>
        <div class="card-footer text-center py-2">
            <div class="{{ Route::is('users.show') || Route::is('users.edit') ? 'bg-primary' : '' }}">
                <a class="btn btn-link btn-sm {{ Route::is('users.show') || Route::is('users.edit') ? 'text-white' : '' }}"
                    href="#">
                    View Profile
                </a>
            </div>


        </div>
    </div>
</div>
