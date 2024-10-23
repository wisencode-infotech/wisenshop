@extends('errors::minimal')

@section('title', __trans('Not Found'))
@section('code', '404')


@section('message')
    @if($exception->getMessage() == "product_not_found")
        <span>{{ __trans("Oops! Looks like this isn't a page") }}</span>
    @else
        <span>{{ __trans('Page Not Found') }}</span>
    @endif
@endsection
