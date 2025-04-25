@extends('layout.layout')

@section('content')
    <div class="row">
        @include('shared.left_sider')
        <div class="col-6">
            @include('shared.success_message')
            @include('ideas.shared.submit_idea')
            <hr>
            @forelse ($ideas as $idea)
                <div class="mt-3">
                    @include('ideas.shared.idea_card')
                </div>
            @empty
                <div class="alert alert-info text-center mt-3">
                    <h5> No ideas found </h5>
                </div>
            @endforelse
            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
    </div>
@endsection
