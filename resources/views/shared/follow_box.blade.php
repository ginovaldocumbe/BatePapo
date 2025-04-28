<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">Top Users</h5>
    </div>
    <div class="card-body">
        @foreach ($topUsers as $user)
            <div class="hstack gap-2 mb-3">
                <div class="avatar">
                    <a href="{{ route('users.show', $user->id) }}">
                        {{-- <img class="avatar-img rounded-circle" src="{{ asset('images/avatars/avatar-1.png') }}" alt="avatar"> --}}
                        <img class="avatar-img rounded-circle" src="{{ $user->getImageUrl() }}"
                            alt="{{ $user->name }}'s profile image" width="35" height="35">
                    </a>
                </div>
                <div class="overflow-hidden">
                    <a class="h6 mb-0" href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                    <p class="mb-0 small text-truncate">{{ $user->email }}</p>
                </div>
                {{-- <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#">
                    <i class="fa-solid fa-plus"></i>
                </a> --}}
            </div>
        @endforeach

    </div>
</div>
