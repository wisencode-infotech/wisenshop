@extends('errors::minimal')

@section('title', __trans('Forbidden'))
@section('code', '403')
@section('message', __trans($exception->getMessage() ?: 'Forbidden'))
