@php
    $modelName = 'employee';
    $tableName = 'employees';
    $title = 'Employees';
@endphp

@extends('layouts.table')

@section('table-head')
    <th>{{__('First name')}}</th>
    <th>{{__('Last name')}}</th>
    <th>{{__('Company')}}</th>
    <th>{{__('Email')}}</th>
    <th>{{__('Phone num')}}</th>
@endsection

@section('datatable-columns')
    { data: 'employees__first_name' },
    { data: 'employees__last_name' },
    { data: 'companies__name' },
    { data: 'employees__email' },
    { data: 'employees__phone' }
@endsection
