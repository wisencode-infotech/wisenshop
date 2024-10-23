@extends('errors::minimal')

@section('title', __trans('Too Many Requests'))
@section('code', '429')
@section('message', __trans('Too Many Requests'))
