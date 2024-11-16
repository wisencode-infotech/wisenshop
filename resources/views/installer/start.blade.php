@extends('layouts.installer')

@section('title', '> Start')

@section('content')
    <div class="container">
        <h1>Install your e-Commerce Shop</h1>
        <form id="wisenshop-install-start-form" action="{{ route('install.step-1.proceed') }}" method="POST">
            @csrf
            <label for="APP_NAME">App Name</label>
            <input type="text" name="APP_NAME" id="APP_NAME" value="{{ old('APP_NAME') ?? 'WisenShop' }}" required>
            
            <label for="DB_HOST">Database Host</label>
            <input type="text" name="DB_HOST" id="DB_HOST" value="{{ old('DB_HOST') ?? 'localhost' }}" required>
            
            <label for="DB_PORT">Database Port</label>
            <input type="text" name="DB_PORT" id="DB_PORT" value="{{ old('DB_PORT') ?? '3306' }}">
            
            <label for="DB_DATABASE">Database Name</label>
            <input type="text" name="DB_DATABASE" id="DB_DATABASE" value="{{ old('DB_DATABASE') ?? 'wisenshop_master' }}" required>
            
            <label for="DB_USERNAME">Database Username</label>
            <input type="text" name="DB_USERNAME" id="DB_USERNAME" value="{{ old('DB_USERNAME') ?? 'root' }}" required>
            
            <label for="DB_PASSWORD">Database Password</label>
            <input type="password" name="DB_PASSWORD" id="DB_PASSWORD">
            
            <button type="submit">Next Step</button>
        </form>
    </div>
@endsection

@section('scripts')
@endsection