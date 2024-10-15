@extends('backend.layouts.master')

@section('title') User @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') User @endslot
@slot('title') Create @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('backend.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- User Info Section -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">User Information</h4>

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter full name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter user email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter phone number" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Affiliate Code -->
                            <div class="mb-3">
                                <label for="affiliate_code" class="form-label">Affiliate Code</label>
                                <input type="text" name="affiliate_code" class="form-control @error('affiliate_code') is-invalid @enderror" id="affiliate_code" placeholder="Enter affiliate code" value="{{ old('affiliate_code') }}">
                                @error('affiliate_code')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Credit -->
                            <div class="mb-3">
                                <label for="credit" class="form-label">Credit</label>
                                <input type="text" name="credit" class="form-control @error('credit') is-invalid @enderror" id="credit" placeholder="Enter credit" value="{{ old('credit') }}">
                                @error('credit')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Commission -->
                            <div class="mb-3">
                                <label for="commission" class="form-label">Commission</label>
                                <input type="text" name="commission" class="form-control @error('commission') is-invalid @enderror" id="commission" placeholder="Enter commission" value="{{ old('commission', 2) }}">
                                @error('commission')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Affiliate Earnings -->
                            <div class="mb-3">
                                <label for="affiliate_earnings" class="form-label">Affiliate Earnings</label>
                                <input type="text" name="affiliate_earnings" class="form-control @error('affiliate_earnings') is-invalid @enderror" id="affiliate_earnings" placeholder="Enter affiliate earnings" value="{{ old('affiliate_earnings', 2) }}">
                                @error('affiliate_earnings')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- IBAN -->
                            <div class="mb-3">
                                <label for="iban" class="form-label">IBAN</label>
                                <input type="text" name="iban" class="form-control @error('iban') is-invalid @enderror" id="iban" placeholder="Enter IBAN" value="{{ old('iban') }}">
                                @error('iban')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Referral Code -->
                            <div class="mb-3">
                                <label for="referral_code" class="form-label">Referral Code</label>
                                <input type="text" name="referral_code" class="form-control @error('referral_code') is-invalid @enderror" id="referral_code" placeholder="Enter referral code" value="{{ old('referral_code') }}">
                                @error('referral_code')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter address" value="{{ old('address') }}">
                                @error('address')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter password">
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" class="form-select @error('role') is-invalid @enderror">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                            {{ $role->role }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="profile_image" class="form-label">Profile Image</label>
                                <input type="file" name="profile_image" class="form-control @error('profile_image') is-invalid @enderror">
                                @error('profile_image')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="row">
                <div class="col-12">
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-success btn-rounded">Create User</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
