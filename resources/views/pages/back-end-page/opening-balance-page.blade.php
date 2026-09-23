@extends('layouts.dashboard-sidenav')
@section('title','প্রারম্ভিক ব্যালেন্স (Opening Balance)')
@section('content')
    @include('components.back-end.opening-balance.opening-balance-list')
    @include('components.back-end.opening-balance.opening-balance-create')
    @include('components.back-end.opening-balance.opening-balance-update')
    @include('components.back-end.opening-balance.opening-balance-delete')
@endsection