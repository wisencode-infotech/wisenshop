@extends('backend.layouts.master')

@section('title') Payout @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Payout @endslot
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
        
        <form action="{{ route('backend.payout.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Payout Info Section -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Payout Information</h4>

                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror" id="amount" placeholder="Enter amount" value="{{ old('amount') }}">
                                @error('amount')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="iban" class="form-label">IBAN</label>
                                <input type="text" name="iban" class="form-control @error('iban') is-invalid @enderror" id="iban" placeholder="Enter IBAN" value="{{ old('iban', auth()->user()->ibans) }}">
                                @error('iban')
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
                        <button type="submit" class="btn btn-success btn-rounded">Create Payout</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
