@extends('layout.layout')
@section('title', 'Idea Dashboard')

@section('content')
    <div class="row">
        @include('admin.shared.left_sider')

        <div class="col-9">
            <h1>Ideas</h1>
            @include('shared.success_message')
            <div class="card mb-3">
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                {{-- Number of likes --}}
                                <th>Likes</th>
                                {{-- Number of comments --}}
                                <th>Comments</th>
                                {{-- Number of followers --}}
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ideas as $idea)
                                <tr>
                                    <td>{{ $idea->content }}</td>
                                    <td>{{ $idea->likes_count }}</td>
                                    <td>{{ $idea->comments_count }}</td>
                                    <td>
                                        {{-- Display user icon, and his name, can be click to user details --}}
                                        <a href="{{ route('users.show', $idea->user->id) }}"
                                            class="text-decoration-none d-flex gap-2 ">
                                            {{-- <img src="{{ $idea->user->getImageUrl() }}" alt="User Image" class="rounded-circle"
                                                width="20" height="20"> --}}
                                            <span class="d-flex flex-nowrap"> {{ $idea->user->name }}</span>

                                        </a>
                                    </td>

                                    <td>{{ $idea->created_at->toDateString() }}</td>
                                    <td>
                                        <a href="{{ route('ideas.show', $idea->id) }}" class="btn text-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        {{-- Delete an idea, but we neet to confirm it first --}}
                                        <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST"
                                            class="d-inline-block"
                                            onsubmit="return confirm('Are you sure you want to delete this idea?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn text-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $ideas->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
