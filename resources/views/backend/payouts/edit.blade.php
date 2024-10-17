@extends('backend.layouts.master')

@section('title') Edit Payout @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Payout @endslot
@slot('title') Edit @endslot
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

        <form action="{{ route('backend.payout.update', $payout->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Payout Info Section -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Payout Information</h4>

                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror" id="amount" placeholder="Enter amount" value="{{ old('amount', $payout->amount) }}">
                                @error('amount')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                                <div class="text-muted mt-2">
                                    <small>
                                        <i class="bi bi-info-circle-fill"></i> 
                                        Minimum Payout should be <strong>{{ __setting('minimum_payout') }}</strong>
                                    </small>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="iban" class="form-label">IBAN</label>
                                <input type="text" name="iban" class="form-control @error('iban') is-invalid @enderror" id="iban" placeholder="Enter IBAN" value="{{ old('iban', $payout->iban) }}">
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
                        <button type="submit" class="btn btn-success btn-rounded">Update Payout</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
