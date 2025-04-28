@extends('layout.layout')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="row">
        @include('admin.shared.left_sider')
        <div class="col-9">
            <h1>Dashboard Admin</h1>
            @include('admin.shared.dashboard_cards')

            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title">Users per Month</h5>
                    <canvas id="usersPerMonthChart" height="100"></canvas>
                </div>
            </div>


        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @vite(['resources/js/usersPerMonthChart.js'])

    <canvas id="usersPerMonthChart"></canvas>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const usersPerMonthData = @json($usersPerMonth);
            if (typeof generateUsersPerMonthChart === 'function') {
                generateUsersPerMonthChart(usersPerMonthData);
            } else {
                console.error('generateUsersPerMonthChart não está definido');
            }
        });
    </script>
@endsection
