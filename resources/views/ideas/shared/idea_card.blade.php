<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-image" src="{{ $idea->user->getImageUrl() }}"
                    alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0">
                        <a href="{{ route('users.show', $idea->user->id) }}"> {{ $idea->user->name }}</a>
                    </h5>
                </div>
            </div>
            <div>
                @auth
                    @can('idea.destroy', $idea)
                        <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a class="mx-2" href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                            <a href="{{ route('ideas.show', $idea->id) }}">View</a>
                            <button class="btn btn-danger btn-sm m-1">
                                X
                            </button>
                        </form>
                    @endcan
                @endauth
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form method="POST" action="{{ route('ideas.update', $idea->id) }}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
                    @error('content')
                        <span class="fs-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-dark btn-sm"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between mb-2">
            @include('ideas.shared.like_button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock">

                    </span> {{ $idea->created_at->diffForHumans() }} </span>
            </div>
        </div>
        <div>

            @include('shared.comments_box')
        </div>
    </div>
</div>
