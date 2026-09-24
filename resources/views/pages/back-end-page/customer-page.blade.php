@extends('layouts.dashboard-sidenav')
@section('title','কাস্টমার তালিকা')
@section('content')
    @include('components.back-end.Customer.customer-list')
    @include('components.back-end.Customer.customer-create')
    @include('components.back-end.Customer.customer-update')
    @include('components.back-end.Customer.customer-delete')
@endsection
