@extends('layout.layout')
@section('title', 'Admin Comments')

@section('content')
    <div class="row">
        @include('admin.shared.left_sider')
        <div class="col-9">
            <h1>Comments</h1>
            <div class="card">
                @include('shared.success_message')
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Comment</th>
                                <th>Idea</th>
                                <th>User</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>
                                        {{ $comment->content }}
                                    </td>
                                    <td class="text-truncate" style="max-width: 200px;">
                                        <a href="{{ route('ideas.show', $comment->idea->id) }}">
                                            {{ $comment->idea->content }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('users.show',$comment->user)}}"> {{ $comment->user->name }}</a>

                                    </td>
                                    <td>{{ $comment->created_at->toDateString() }}</td>
                                    <td>
                                        {{-- Delete an comment, but we neet to confirm it first --}}
                                        <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST"
                                            class="d-inline-block"
                                            onsubmit="return confirm('Are you sure you want to delete this comment?');">
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

                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
