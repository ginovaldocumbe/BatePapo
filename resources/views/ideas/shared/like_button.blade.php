<div class="d-flex justify-content-between align-items-center align-items-center gap-2">
    {{-- Display number of views --}}
    {{-- Display number of likes --}}
    @auth
        @if (Auth::user()->likesIdea($idea))
            <form action="{{ route('ideas.unlike', $idea->id) }}" method="post">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6">
                    <span class="fas fa-heart text-danger me-1"> </span> {{ $idea->likes_count  }}
                </button>
            </form>
        @else
            <form action="{{ route('ideas.like', $idea->id) }}" method="post">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6">
                    <span class="far fa-heart me-1"> </span> {{ $idea->likes_count  }}
                </button>
            </form>
        @endif
    @endauth
    @guest
        <a href="{{ route('login') }}" class="fw-light nav-link fs-6">
            <span class="fas fa-heart  me-1"> </span> {{ $idea->likes_count }}
        </a>
    @endguest
    {{-- Display number of comments --}}
  
        <span class="fas fa-comments"> </span> {{ $idea->comments_count }}

    
</div>
