<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="max-width:100px" class="me-3 avatar-sm rounded-image" src="{{ $user->getImageUrl() }}"
                        alt=" {{ $user->name }}">
                    <div>
                        <input type="text" name="name" class="form-control mb-2" value="{{ $user->name }}">
                        @error('name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @auth
                    @if (Auth::id() == $user->id)
                        <a href="{{ route('users.show', $user->id) }}">View</a>
                    @endif
                @endauth
            </div>
            <div class="mt-3">
                <label for="image">Profile Picture</label>
                <input type="file" name="image" class="form-control mt-2 mb-2" accept="image/*">
                @error('image')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <textarea name="bio" class="form-control mb-2" rows="3">{{ $user->bio }}</textarea>
                @error('bio')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary btn-sm my-3"> Save </button>
                @include('users.shared.user_stats')
                @auth
                    @if (Auth::id() !== $user->id)
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm"> Follow </button>
                        </div>
                    @endif

                @endauth

            </div>

        </form>
    </div>
</div>
{{-- <hr> --}}
