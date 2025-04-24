@extends('layout.layout')

@section('content')
    <div class="row">
        @include('shared.left_sider')
        <div class="col-6">
            @include('shared.success_message')
            @include('ideas.shared.submit_idea')
            <hr>
            @foreach ($ideas as $idea)
                <div class="mt-3">
                    @include('ideas.shared.idea_card')
                </div>
            @endforeach
            <div class="mt-3">
                {{ $ideas->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
    </div>
@endsection
