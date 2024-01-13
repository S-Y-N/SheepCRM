@extends('layouts.main')

@push('stylesheets')
    <style>
        .stat-card-text {
            font-size: 0.9rem;
            text-align: left;
        }
    </style>
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">SheepFish</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <div class="row">
                                <h3 class="ml-3">{{__('Total')}}: {{$totalEmployees}}</h3>
                                <div class="col stat-card-text">
                                    <div>+{{$employeesToday}} {{__('today')}}</div>
                                    <div>+{{$employeesWeek}} {{__('for 7 days')}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{ route('employee.index') }}" class="small-box-footer">
                            {{__('To the list of employees')}}
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="small-box bg-fuchsia">
                        <div class="inner">
                            <div class="row">
                                <h3 class="ml-3">{{__('Total')}}: {{$totalCompanies}}</h3>
                                <div class="col stat-card-text">
                                    <div>+{{$companiesToday}} {{__('today')}}</div>
                                    <div>+{{$companiesWeek}} {{__('for 7 days')}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{ route('company.index') }}" class="small-box-footer">
                            {{__('To the list of companies')}}
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
