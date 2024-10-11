@extends('backend.layouts.master')

@section('title') Orders @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') <a href="{{ route('backend.inquiry.index') }}">Inquiries</a> @endslot
@slot('title') Inquiry Details #{{ $Inquiry->id }} @endslot
@endcomponent

@php  $InquiryData = json_decode($Inquiry->data, true); @endphp
<div class="row">
    <div class="col-xl-9">
        <div class="card">
            <div class="card-body">
                <!-- <h5 class="fw-semibold">Inquiry Details</h5> -->
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="col">Name</th>
                                <td scope="col">{{ $InquiryData['name'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $InquiryData['email'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Subject</th>
                                <td>{{ $InquiryData['subject'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Description</th>
                                <td>{{ $InquiryData['description'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--end col-->
</div><!--end row-->

@endsection
@section('script')
@endsection