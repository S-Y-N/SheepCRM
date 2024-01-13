@php
    $modelName = 'company';
    $tableName = 'companies';
    $title = 'Companies';
@endphp

@extends('layouts.table')

@section('table-head')
    <th>{{__('Logo')}}</th>
    <th>{{__('Name')}}</th>
    <th>{{__('Email')}}</th>
    <th>{{__('Website')}}</th>
@endsection

@section('datatable-columns')
    {
    data: 'companies__logo',
    visible: true,
        render: function(data, type, full, meta) {
            return '<div style="width: 100px; height: 100px; overflow: hidden;">' +
                '<img src="'+ data +'" alt="Company logo" style="width: 100%; height: 100%; object-fit: cover;" />' +
                '</div>'
        }
    },
    { data: 'companies__name' },
    { data: 'companies__email' },
    { data: 'companies__website' }
@endsection
