@auth
    <h4> Share yours ideas </h4>
    <div class="row">
        <form method="POST" action="{{ route('ideas.store') }}">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3"></textarea>
                @error('content')
                    <span class="fs-6 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> Share </button>
            </div>
        </form>
    </div>

@endauth
@guest
    <h4>{{ __('ideas.login_to_share_ideas') }} </h4>
@endguest
