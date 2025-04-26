@extends('layout.layout')

@section('content')
    <div class="row">
        @include('shared.left_sider')
        <div class="col-6">
            <div>
                <h1 class="text-center">Terms and Conditions</h1>
                <p class="text-justify">Welcome to our website! By accessing or using our services, you agree to comply with
                    and be bound by the following terms and conditions. Please read them carefully.</p>
                <h2>1. Acceptance of Terms</h2>
                <p>By using our website, you acknowledge that you have read, understood, and agree to be bound by these
                    terms.</p>
                <h2>2. User Responsibilities</h2>
                <p>You are responsible for maintaining the confidentiality of your account information and for all
                    activities that occur under your account.</p>
                <h2>3. Intellectual Property</h2>
                <p>All content on this website is the property of our company and is protected by copyright laws.</p>
                <h2>4. Limitation of Liability</h2>
                <p>We are not liable for any damages arising from your use of our website.</p>
                <h2>5. Changes to Terms</h2>
                <p>We reserve the right to modify these terms at any time. Your continued use of the website after changes
                    indicates your acceptance of the new terms.</p>
            </div>

        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
    </div>
@endsection
