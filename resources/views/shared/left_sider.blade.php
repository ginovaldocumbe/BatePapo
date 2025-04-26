<div class="col-3">
    <div class="card overflow-hidden">
        <div class="card-body pt-3">
            <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('dashboard') ? 'text-white bg-primary' : '' }}" href="{{ route('dashboard') }}">
                        <span>Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span>Explore</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span>Feed</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('terms') ? 'text-white bg-primary' : '' }}" href="{{ route('terms') }}">
                        <span>Terms</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span>Support</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span>Settings</span></a>
                </li>
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
