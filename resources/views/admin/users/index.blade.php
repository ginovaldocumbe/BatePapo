@extends('layout.layout')
@section('title', 'Admin Users')

@section('content')
    <div class="row">
        @include('admin.shared.left_sider')
        <div class="col-9">
            <div>
                <h1 class=" ">Users</h1>
            </div>
            @include('shared.success_message')

            <table class="table table-striped mt-3">
                <thead class="table-primary ">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->toDateString() }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('users.edit', $user->id) }}">
                                        <button class="btn text-primary btn-sm" type="button">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn text-danger btn-sm" type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $users->links() }}
            </div>
            <div class="col-12 mt-3">
                {{-- <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add New User</a> --}}
            </div>
        </div>
    </div>
@endsection
