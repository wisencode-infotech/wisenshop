@extends('layouts.installer')

@section('title', '> Complete')

@section('content')
    <div class="container">

        <h1 class="text-success">Database Configured!</h1>
        <p class="alert-info">We have configured your database settings.</p>

        <p class="text-grey text-sm italic">Note: After installation, some of the data/entries will be seeded as dummy in database which you can manage via backend panel.</p>
        
        <form id="wisenshop-install-complete-form" action="{{ route('install.on-complete') }}" method="POST">
            @csrf

            <label for="APP_ADMIN_EMAIL">Admin Username</label>
            <input type="text" name="APP_ADMIN_EMAIL" id="APP_ADMIN_EMAIL" value="{{ old('APP_ADMIN_EMAIL') ?? 'admin@wisenshop.com' }}" required>

            <label for="APP_ADMIN_PASSWORD">Admin Password</label>
            <input type="text" name="APP_ADMIN_PASSWORD" id="APP_ADMIN_PASSWORD" value="{{ old('APP_ADMIN_PASSWORD') ?? 'wisenshop450#!' }}" required>

            <button type="submit">Finish Installation</button>
        </form>
    </div>
@endsection

@section('scripts')
@endsection